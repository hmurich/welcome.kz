<?php
class AdminFilterController extends AdminBaseController {
    function getIndex () {
        $data = $this->trimData(Input::all());
        $items = SysFilter::where('id', '>', 0);

        // filter items
        $filter_names = SysFilter::getFilterNameAr();
        $items = $this->filterItems($items, $data, $filter_names);

        // sort items
        $sort_names = SysFilter::getSortNameAr();
        $items = $this->sortItems($items, $data, $sort_names);

        $ar = array();
        $ar['title'] = 'Фильтры. (системный справочник, не для удаленния)';
        $ar['items'] = $items->orderBy('sort_index', 'asc')->paginate(25);

        $ar['ar_type'] = SysFilter::getTypeAr();

        return View::make('admin.filter.index', $ar);
    }

    function getItem ($id = 0) {
        $item = SysFilter::find($id);

        $ar = array();
        if (!$item) {
            $ar['title'] = 'Создать фильтра';
            $ar['action'] = action('AdminFilterController@postItem');
            $ar['ar_state'] = array();
        } else {
            $ar['title'] = 'Изменить фильтр';
            $ar['action'] = action('AdminFilterController@postItem', $item->id);
            $ar['item'] = $item;
        }
        $ar['ar_type'] = SysFilter::getTypeAr();

        return View::make('admin.filter.item', $ar);
    }

    function postItem($id = 0){
        $check = SysFilter::where('spec_key', Input::get('spec_key'));

        $item = SysFilter::find($id);
        if (!$item)
            $item = new SysFilter();
        else
            $check = $check->where('id', '<>', $item->id);

        if ($check->count())
            return Redirect::back()->with('error', 'Введенный системный код уже существует');

        $item->spec_key = Input::get('spec_key');
        $item->name = Input::get('name');
        $item->type_id = Input::get('type_id');
        $item->is_many = Input::get('is_many');
        $item->is_fixed = Input::get('is_fixed');
        $item->sort_index = Input::get('sort_index');

        DB::beginTransaction();

        $item->save();

        DB::commit();

        return Redirect::action('AdminFilterController@getIndex')->with('success', 'Данные успешно сохранены');
    }

    function getDelete ($id) {
        $item = SysFilter::findOrFail($id);
        $item->delete();

        return Redirect::action('AdminFilterController@getIndex')->with('success', 'Данные успешно удалены');
    }

    function getRoles($filter_id){
        $item = SysFilter::findOrFail($filter_id);

        $ar = array();
        $ar['title'] = 'Роли "'.$item->name.'"';
        $ar['items'] = SysFilterRole::where('filter_id', $item->id)->paginate(25);
        $ar['ar_role'] = SysCompanyRole::lists('name', 'id');
        $ar['filter'] = $item;
        $ar['ar_show'] = array(0=>'Скрыть', 1=>'Показать');

        return View::make('admin.filter.role', $ar);
    }

    function postRole($filter_id){
        $filter = SysFilterRole::where(array('filter_id'=>$filter_id, 'role_id'=>Input::get('role_id')))->first();
        if (!$filter)
            $filter = SysFilterRole::create(array('filter_id'=>$filter_id, 'role_id'=>Input::get('role_id'), 'sort_index'=>Input::get('sort_index'), 'show_filter'=>Input::get('show_filter')));

        return Redirect::back()->with('success', 'Данные успешно сохранены');
    }

    function getDeleteRole($id){
        SysFilterRole::findOrFail($id)->delete();

        return Redirect::back()->with('success', 'Данные успешно удалены');
    }

    function getCats($filter_id){
        $item = SysFilter::findOrFail($filter_id);

        $ar = array();
        $ar['title'] = 'Категории "'.$item->name.'"';
        $ar['items'] = SysFilterCat::where('filter_id', $item->id)->paginate(25);
        $ar['ar_cat'] = SysCompanyCat::lists('name', 'id');
        $ar['filter'] = $item;

        return View::make('admin.filter.cat', $ar);
    }

    function postCat($filter_id){
        $filter = SysFilterCat::where(array('filter_id'=>$filter_id, 'cat_id'=>Input::get('cat_id')))->first();
        if (!$filter)
            $filter = SysFilterCat::create(array('filter_id'=>$filter_id, 'cat_id'=>Input::get('cat_id')));

        return Redirect::back()->with('success', 'Данные успешно сохранены');
    }

    function getDeleteCat($id){
        SysFilterCat::findOrFail($id)->delete();

        return Redirect::back()->with('success', 'Данные успешно удалены');
    }

    function getNames($filter_id){
        $item = SysFilter::findOrFail($filter_id);

        $ar = array();
        $ar['title'] = 'Варианты "'.$item->name.'"';
        $ar['items'] = SysFilterName::where('filter_id', $item->id)->paginate(25);
        $ar['filter'] = $item;

        return View::make('admin.filter.name', $ar);
    }

    function postName($filter_id){
        $filter = SysFilterName::where(array('filter_id'=>$filter_id, 'name'=>Input::get('name')))->first();
        if (!$filter)
            $filter = SysFilterName::create(array('filter_id'=>$filter_id, 'name'=>Input::get('name')));

        return Redirect::back()->with('success', 'Данные успешно сохранены');
    }

    function getDeleteName($id){
        SysFilterName::findOrFail($id)->delete();

        return Redirect::back()->with('success', 'Данные успешно удалены');
    }

}
