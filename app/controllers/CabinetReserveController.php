<?php
class CabinetReserveController extends PublicController {
    function getIndex ($object_id) {
        $user = Auth::user();
        $company = $user->relCompany;
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);

        $other_objects = Object::where('company_id', $company->id)->lists('role_id', 'id');

        $ar = array();
        $ar['title'] = 'Бронирование';
        $ar['object'] = $object;
        $ar['other_objects'] = $other_objects;
        $ar['reserves'] = Reserve::where('object_id', $object->id)->orderBy('id', 'desc')->get();

        $ar['role'] = $object->relRole;
        $ar['ar_role'] = SysCompanyRole::lists('name', 'id');

        return View::make('front.cabinet.reserve.index', $ar);
    }

    function getOpenReserve($object_id){
        $user = Auth::user();
        $company = $user->relCompany;
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);

        $object->is_reserve = ($object->is_reserve ? 0 : 1);
        $object->save();

        return Redirect::back()->with('success', 'Данные успешна сохранены');
    }

    function getAccept($object_id, $reserve_id){
        $user = Auth::user();
        $company = $user->relCompany;
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);

        $reserve = Reserve::where(array('object_id'=>$object->id, 'id'=>$reserve_id))->first();
        if (!$reserve)
            return App::abort(404);

        $reserve->is_accept = ($reserve->is_accept ? 0 : 1);
        $reserve->save();

        return Redirect::back()->with('success', 'Данные успешна сохранены');
    }
}
