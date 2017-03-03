<?php
class AdminRoleController extends AdminBaseController {
    function getIndex () {
        $data = $this->trimData(Input::all());
        $items = SysCompanyRole::where('id', '>', 0);

        // filter items
        $filter_names = SysCompanyRole::getFilterNameAr();
        $items = $this->filterItems($items, $data, $filter_names);

        // sort items
        $sort_names = SysCompanyRole::getSortNameAr();
        $items = $this->sortItems($items, $data, $sort_names);

        $ar = array();
        $ar['title'] = 'Справочник ролей компаний';
        $ar['items'] = $items->paginate(50);

        $ar['ar_cat'] = SysCompanyCat::lists('name', 'id');
        $ar['ar_yeas'] = array(0=>'Нет', 1=>'Да');

        return View::make('admin.directory.company_role.index', $ar);
    }

    function getCat($id){
        $item = SysCompanyRole::findOrFail($id);

        $ar = array();
        $ar['title'] = 'Категории "'.$item->name.'"';
        $ar['items'] = SysCompanyRoleCat::where('role_id', $item->id)->paginate(25);
        $ar['ar_cat'] = SysCompanyCat::lists('name', 'id');
        $ar['filter'] = $item;

        return View::make('admin.directory.company_role.cats', $ar);
    }

    function postCat($id){
        $item = SysCompanyRoleCat::where(array('role_id'=>$id, 'cat_id'=>Input::get('cat_id')))->first();
        if (!$item)
            $item = SysCompanyRoleCat::create(array('role_id'=>$id, 'cat_id'=>Input::get('cat_id')));

        return Redirect::back()->with('success', 'Данные успешно сохранены');
    }

    function getDeleteCat($id){
        SysCompanyRoleCat::findOrFail($id)->delete();

        return Redirect::back()->with('success', 'Данные успешно удалены');
    }

    function getFilter($id){
        $item = SysCompanyRole::find($id);

        $ar = array();
        $ar['title'] = 'Поля "'.$item->name.'"';
        $ar['ar_filters'] = SysFilter::lists('name', 'id');
        $ar['filters'] = SysFilterRole::where('role_id', $item->id)->orderBy('sort_index', 'asc')->get();
        $ar['ar_show'] = array(0=>'Нет', 1=>'Да');

        return View::make('admin.directory.company_role.filters', $ar);
    }

    function postFilter(){
        //echo '<pre>'; print_r(Input::all()); echo '</pre>';
        foreach (Input::get('data') as $id => $ar) {
            SysFilterRole::find($id)->update($ar);
        }

        return Redirect::back()->with('success', 'Данные успешно сохранены');
    }

    function getItem ($id = 0) {
        $item = SysCompanyRole::find($id);

        $ar = array();
        if (!$item) {
            $ar['title'] = 'Создать роль';
            $ar['action'] = action('AdminRoleController@postItem');
            $ar['ar_state'] = array();
        } else {
            $ar['title'] = 'Изменить роль';
            $ar['action'] = action('AdminRoleController@postItem', $item->id);
            $ar['item'] = $item;
        }
        $ar['ar_cat'] = SysCompanyCat::lists('name', 'id');
        $ar['ar_yeas'] = array(0=>'Нет', 1=>'Да');

        return View::make('admin.directory.company_role.item', $ar);
    }

    function postItem($id = 0){
        DB::beginTransaction();

        $item = SysCompanyRole::find($id);
        if (!$item)
            $item = new SysCompanyRole();

        $item->name = Input::get('name');
        $item->is_reserve = Input::get('is_reserve');
        $item->save();

        DB::commit();

        return Redirect::action('AdminRoleController@getIndex')->with('success', 'Данные успешно сохранены');
    }

    function getDelete ($id) {
        $item = SysCompanyRole::findOrFail($id);
        $item->delete();

        return Redirect::action('AdminRoleController@getIndex')->with('success', 'Данные успешно удалены');
    }
}
