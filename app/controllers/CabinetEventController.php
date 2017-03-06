<?php
class CabinetEventController extends PublicController {
    function getIndex ($object_id) {
        $user = Auth::user();
        $company = $user->relCompany;
        $ar_objects = $company->relObjects()->lists('id');
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);

        $events = ObjectEvent::whereIn('object_id', $ar_objects)->with('relObject')->orderBy('id', 'desc')->get();

        $ar = array();
        $ar['title'] = $this->translator->getTransNameByKey('events');
        $ar['object'] = $object;

        $ar['events'] = $events;

        $ar['role'] = $object->relRole;
        $ar['ar_role'] = SysCompanyRole::lists('name', 'id');

        $ar['translator'] = $this->translator;

        return View::make('front.cabinet.event.index', $ar);
    }


}
