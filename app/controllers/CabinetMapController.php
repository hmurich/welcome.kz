<?php
class CabinetMapController extends PublicController {
    function getIndex ($object_id) {
        $user = Auth::user();
        $company = $user->relCompany;
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);

        $map = $object->relLocation;
        if (!$map)
            $map = ObjectLocation::create(array('object_id'=>$object->id));

        $ar = array();
        $ar['title'] = 'Карта';
        $ar['object'] = $object;
        $ar['map'] = $map;

        $ar['role'] = $object->relRole;
        $ar['ar_role'] = SysCompanyRole::lists('name', 'id');

        $ar['def_city'] = SysDirectoryName::findOrFail($object->city_id);

        return View::make('front.cabinet.map.index', $ar);
    }

    function postIndex ($object_id) {
        $user = Auth::user();
        $company = $user->relCompany;
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);

        $map = $object->relLocation;
        if (!$map)
            $map = ObjectLocation::create(array('object_id'=>$object->id));
        $map->lng = Input::get('lng');
        $map->lat = Input::get('lat');
        $map->save();

        return Redirect::back()->with('success', 'Координаты успешно сохранены');
    }
}
