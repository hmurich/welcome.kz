<?php
class AdminTagController extends AdminBaseController {
    function getIndex () {
        $data = $this->trimData(Input::all());
        $items = SysHashTag::where('id', '>', 0);

        // filter items
        $filter_names = SysHashTag::getFilterNameAr();
        $items = $this->filterItems($items, $data, $filter_names);

        // sort items
        $sort_names = SysHashTag::getSortNameAr();
        $items = $this->sortItems($items, $data, $sort_names);

        $ar = array();
        $ar['title'] = 'Справочник ролей компаний';
        $ar['items'] = $items->paginate(25);


        return View::make('admin.directory.hash_tag.index', $ar);
    }

    function getItem ($id = 0) {
        $item = SysHashTag::find($id);

        $ar = array();
        if (!$item) {
            $ar['title'] = 'Создать роль';
            $ar['action'] = action('AdminTagController@postItem');
            $ar['ar_state'] = array();
        } else {
            $ar['title'] = 'Изменить роль';
            $ar['action'] = action('AdminTagController@postItem', $item->id);
            $ar['item'] = $item;
        }

        return View::make('admin.directory.hash_tag.item', $ar);
    }

    function postItem($id = 0){
        DB::beginTransaction();

        $item = SysHashTag::find($id);
        if (!$item)
            $item = new SysHashTag();

        $item->name = Input::get('name');
        $item->save();

        DB::commit();

        return Redirect::action('AdminTagController@getIndex')->with('success', 'Данные успешно сохранены');
    }

    function getDelete ($id) {
        $item = SysHashTag::findOrFail($id);
        $item->delete();

        return Redirect::action('AdminTagController@getIndex')->with('success', 'Данные успешно удалены');
    }
}
