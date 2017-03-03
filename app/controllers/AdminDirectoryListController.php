<?php
class AdminDirectoryListController extends AdminBaseController {
    function getIndex () {
        $data = $this->trimData(Input::all());
        $items = SysDirectory::where('id', '>', 0);

        // filter items
        $filter_names = SysDirectory::getFilterNameAr();
        $items = $this->filterItems($items, $data, $filter_names);

        // sort items
        $sort_names = SysDirectory::getSortNameAr();
        $items = $this->sortItems($items, $data, $sort_names);

        $ar = array();
        $ar['title'] = 'Список стандарных справочников';
        $ar['items'] = $items->paginate(25);

        return View::make('admin.directory.standart_list.index', $ar);
    }

    function getItem ($id = 0) {
        $item = SysDirectory::find($id);

        $ar = array();
        if (!$item) {
            $ar['title'] = 'Создать справочник';
            $ar['action'] = action('AdminDirectoryListController@postItem');
            $ar['ar_state'] = array();
        } else {
            $ar['title'] = 'Изменить справочник';
            $ar['action'] = action('AdminDirectoryListController@postItem', $item->id);
            $ar['item'] = $item;
        }

        return View::make('admin.directory.standart_list.item', $ar);
    }

    function postItem($id = 0){
        DB::beginTransaction();

        $item = SysDirectory::find($id);
        if (!$item){
            $item = new SysDirectory();
            $item->can_delete = Input::get('can_delete');
        }


        $item->name = Input::get('name');
        $item->save();

        DB::commit();

        return Redirect::action('AdminDirectoryListController@getIndex')->with('success', 'Данные успешно сохранены');
    }
}
