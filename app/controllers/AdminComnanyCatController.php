<?php
class AdminComnanyCatController extends AdminBaseController {
    function getIndex () {
        $data = $this->trimData(Input::all());
        $items = SysCompanyCat::where('id', '>', 0);

        // filter items
        $filter_names = SysCompanyCat::getFilterNameAr();
        $items = $this->filterItems($items, $data, $filter_names);

        // sort items
        $sort_names = SysCompanyCat::getSortNameAr();
        $items = $this->sortItems($items, $data, $sort_names);

        $ar = array();
        $ar['title'] = 'Справочник категорий компаний';
        $ar['items'] = $items->paginate(25);

        return View::make('admin.directory.company_cat.index', $ar);
    }

    function getItem ($id = 0) {
        $item = SysCompanyCat::find($id);

        $ar = array();
        if (!$item) {
            $ar['title'] = 'Создать категорию';
            $ar['action'] = action('AdminComnanyCatController@postItem');
            $ar['ar_state'] = array();
        } else {
            $ar['title'] = 'Изменить категорию';
            $ar['action'] = action('AdminComnanyCatController@postItem', $item->id);
            $ar['item'] = $item;
        }

        return View::make('admin.directory.company_cat.item', $ar);
    }

    function postItem($id = 0){
        DB::beginTransaction();

        $item = SysCompanyCat::find($id);
        if (!$item)
            $item = new SysCompanyCat();

        $item->name = Input::get('name');
        $item->save();

        DB::commit();

        return Redirect::action('AdminComnanyCatController@getIndex')->with('success', 'Данные успешно сохранены');
    }

    function getDelete ($id) {
        $item = SysCompanyCat::findOrFail($id);
        $item->delete();

        return Redirect::action('AdminComnanyCatController@getIndex')->with('success', 'Данные успешно удалены');
    }
}
