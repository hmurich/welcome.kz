<?php
class AdminSortObjectController extends AdminBaseController {
    function getIndex ($cat_id) {
        $cat = SysCompanyCat::findOrFail($cat_id);
        $ar_role = SysCompanyRoleCat::where('cat_id', $cat->id)->lists('role_id');

        $data = $this->trimData(Input::all());
        $items = Object::where('is_active', 1)->where('is_open', 1);

        $items = $items->whereIn('role_id', $ar_role);

        if (Input::has('role_id') && Input::get('role_id') > 0)
            $items = $items->where('role_id', Input::get('role_id'));

        if (Input::has('city_id') && Input::get('city_id') > 0)
            $items = $items->where('city_id', Input::get('city_id'));

        $ar = array();
        $ar['title'] = 'Сортировка организаций в категории "'.$cat->name.'"';
        $ar['items'] = $items->with('relUser', 'relStandartData')->orderBy('sort_index', 'desc')->paginate(20);

        $ar['ar_role'] = SysCompanyRole::whereIn('id', $ar_role)->lists('name', 'id');
        $ar['ar_city'] = SysCity::getAr();

        $ar['cat_id'] = $cat_id;

        return View::make('admin.modarate.sort_object.index', $ar);
    }

    function postIndex(){
        $data = Input::all();
        
        if (!Input::has('data_sort') || count($data['data_sort']) == 0)
            return Redirect::back()->with('success', 'Данные сохранены');


        $ar_id = array_keys($data['data_sort']);
        $ar_sort = $data['data_sort'];
        $items = Object::whereIn('id', $ar_id)->get();

        DB::beginTransaction();
        foreach ($items as $i) {
            $i->sort_index = $ar_sort[$i->id];
            $i->save();
        }
        DB::commit();

        return Redirect::back()->with('success', 'Данные сохранены');
    }

    function getVip($id){
        $item = Object::findOrFail($id);

        if ($item->is_vip)
            $item->is_vip = 0;
        else
            $item->is_vip = 1;

        $item->save();

        return Redirect::back()->with('success', 'Данные сохранены');
    }

    function getSpecial($id){
        $item = Object::findOrFail($id);

        if ($item->is_special)
            $item->is_special = 0;
        else
            $item->is_special = 1;

        $item->save();

        return Redirect::back()->with('success', 'Данные сохранены');
    }



}
