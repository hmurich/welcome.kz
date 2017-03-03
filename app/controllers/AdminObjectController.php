<?php
class AdminObjectController extends AdminBaseController {
    function getIndex ($status_id = 1) {
        $ar_status = array(
            1 => 'Организации ждушие одобрения', 2=> 'Организации, с закрытыми офисами', 3=>'Организации открытые'
        );

        if (!isset($ar_status[$status_id]))
            return App::abort(404);

        $data = $this->trimData(Input::all());
        $items = Object::where('id', '>', 0);

        if ($status_id == 1)
            $items = $items->where(array('is_active'=>0, 'is_open'=>0));
        else if ($status_id == 2)
            $items = $items->where(array('is_active'=>1, 'is_open'=>0));
        else
            $items = $items->where(array('is_active'=>1, 'is_open'=>1));

        // filter items
        $filter_names = Object::getFilterNameAr();
        $items = $this->filterItems($items, $data, $filter_names);

        // sort items
        $sort_names = Object::getSortNameAr();
        $items = $this->sortItems($items, $data, $sort_names);

        $ar = array();
        $ar['title'] = $ar_status[$status_id];
        $ar['items'] = $items->with('relUser', 'relStandartData')->orderBy('id', 'desc')->paginate(25);
        $ar['status_id'] = $status_id;
        $ar['ar_role'] = SysCompanyRole::lists('name', 'id');
        $ar['ar_city'] = SysCity::getAr();

        $ar['ar_taxi'] = Taxi::lists('name', 'id');

        return View::make('admin.modarate.object.index', $ar);
    }

    function getTaxi($id){
        $item = Object::findOrFail($id);

        $ar = array();
        $ar['title'] = 'Такси';
        $ar['item'] = $item;

        $ar['ar_taxi'] = Taxi::lists('name', 'id');

        return View::make('admin.modarate.object.taxi', $ar);
    }

    function postTaxi($id){
        $item = Object::findOrFail($id);
        $item->taxi_id = Input::get('taxi_id');
        $item->save();

        return Redirect::action('AdminObjectController@getIndex', 1)->with('success', 'Такси успешно сохранен');
    }

    function getAddView($id){
        $item = Object::findOrFail($id);

        $ar = array();
        $ar['title'] = 'Накрутка просмотра';
        $ar['item'] = $item;

        return View::make('admin.modarate.object.add_view', $ar);
    }

    function postAddView($id){
        $item = Object::findOrFail($id);

        $old_add = $item->view_add;
        if ($old_add)
            $item->view_total = ($item->view_total - $old_add) + Input::get('view_add');
        else
            $item->view_total = $item->view_total + Input::get('view_add');

        $item->view_add = Input::get('view_add');
        $item->save();

        return Redirect::action('AdminObjectController@getIndex', 1)->with('success', 'Накрутка успешна сохранена');
    }

    function getAccept($id){
        $item = Object::findOrFail($id);
        $item->is_active = 1;
        $item->is_open = 0;

        $item->save();

        return Redirect::back()->with('success', 'Организация прошла проверку');
    }

    function getClose($id){
        $item = Object::findOrFail($id);
        $item->is_active = 0;
        $item->is_open = 0;

        $item->save();

        return Redirect::back()->with('success', 'Организация на проверке');
    }

    function getDelete($id){
        $item = Object::findOrFail($id);
        $item->delete();

        return Redirect::back()->with('success', 'Организация успешно удалена');
    }


}
