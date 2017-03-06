<?php
class CabinetTagController extends PublicController {
    function getIndex ($object_id) {
        $user = Auth::user();
        $company = $user->relCompany;
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);

        $other_objects = Object::where('company_id', $company->id)->lists('role_id', 'id');

        $ar = array();
        $ar['title'] = $this->translator->getTransNameByKey('tag');
        $ar['object'] = $object;
        $ar['other_objects'] = $other_objects;
        $ar['news'] = News::where('object_id', $object->id)->orderBy('id', 'desc')->take(6)->get();
        $ar['tag'] = $object->relTag;

        $ar['role'] = $object->relRole;
        $ar['ar_role'] = SysCompanyRole::lists('name', 'id');

        $ar['translator'] = $this->translator;

        return View::make('front.cabinet.tag.index', $ar);
    }

    function postIndex ($object_id) {
        $user = Auth::user();
        $company = $user->relCompany;
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);

        $tag = $object->relTag;
        $tag->note = Input::get('note');
        $tag->save();

        return Redirect::back()->with('success', $this->translator->getTransNameByKey('tag_save_msg'));
    }
}
