<?php
class AdminDirectoryController extends AdminBaseController {
    function getIndex ($parent_id) {
        $parent = SysDirectory::findOrFail($parent_id);

        $data = $this->trimData(Input::all());
        $items = SysDirectoryName::where('directory_id', $parent_id);

        // filter items
        $filter_names = SysDirectoryName::getFilterNameAr();
        $items = $this->filterItems($items, $data, $filter_names);

        // sort items
        $sort_names = SysDirectoryName::getSortNameAr();
        $items = $this->sortItems($items, $data, $sort_names);

        $ar = array();
        $ar['title'] = 'Список элементов справочника "'.$parent->name.'"';
        $ar['items'] = $items->paginate(25);
        $ar['parent'] = $parent;

        return View::make('admin.directory.standart.index', $ar);
    }

    function getItem ($parent_id, $id = 0) {
        $parent = SysDirectory::findOrFail($parent_id);

        $item = SysDirectoryName::find($id);

        $ar = array();
        if (!$item) {
            $ar['title'] = 'Создать элемент справочника "'.$parent->name.'"';
            $ar['action'] = action('AdminDirectoryController@postItem', $parent->id);
            $ar['ar_state'] = array();
        } else {
            $ar['title'] = 'Изменить элемент справочника "'.$parent->name.'"';
            $ar['action'] = action('AdminDirectoryController@postItem', array($parent->id, $item->id));
            $ar['item'] = $item;
        }

        $ar['parent'] = $parent;

        return View::make('admin.directory.standart.item', $ar);
    }

    function postItem($parent_id, $id = 0){
        $parent = SysDirectory::findOrFail($parent_id);

        DB::beginTransaction();

        $item = SysDirectoryName::find($id);
        if (!$item)
            $item = new SysDirectoryName();

        $item->sys_name = Input::get('sys_name');
        $item->name = Input::get('name');
        $item->directory_id = $parent->id;
        $item->save();

        DB::commit();

        return Redirect::action('AdminDirectoryController@getIndex', $parent->id)->with('success', 'Данные успешно сохранены');
    }

    function getDelete ($parent_id, $id) {
        $parent = SysDirectory::findOrFail($parent_id);
        if (!$parent->can_delete)
            return App::abort(404);

        $item = SysDirectoryName::findOrFail($id);
        $item->delete();

        return Redirect::action('AdminDirectoryController@getIndex', $parent->id)->with('success', 'Данные успешно удалены');
    }
}
