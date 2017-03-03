<?php
class CabinetController extends PublicController {
    function getIndex ($object_id = false) {
        $user = Auth::user();
        $company = $user->relCompany;
        if (!$object_id)
            $object = Object::where(array('company_id'=>$company->id))->first();
        else
            $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return Redirect::action('TicketController@getIndex')->with('info', 'У Вас нет октрытых организаций/ролей');

        $other_objects = Object::where('company_id', $company->id)->lists('role_id', 'id');

        $ar = array();
        $ar['title'] = 'Личный кабинет';
        $ar['object'] = $object;
        $ar['other_objects'] = $other_objects;
        $ar['standart_data'] = $object->relStandartData;
        $ar['special_data'] = $object->relSpecialData()->orderBy('sort_index', 'asc')->get();
        $ar['tag'] = $object->relTag;
        $ar['location'] = $object->relLocation;
        $ar['reserve'] = $object->relReserve;
        $ar['score'] = $object->relScore;
        $ar['sliders'] = $object->relSliders()->get();
        $ar['slider_1'] = $object->relSliders()->first();

        $ar['role'] = $object->relRole;
        $ar['news'] = News::where('object_id', $object->id)->orderBy('id', 'desc')->take(3)->get();

        $ar['ar_role'] = SysCompanyRole::lists('name', 'id');


        return View::make('front.cabinet.index', $ar);
    }

    function getNews($object_id, $id){
        $user = Auth::user();
        $company = $user->relCompany;
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);

        $other_objects = Object::where('company_id', $company->id)->lists('role_id', 'id');
        $news = News::findOrFail($id);

        $ar = array();
        $ar['title'] = $news->title;
        $ar['news'] = $news;

        $ar['standart_data'] = $object->relStandartData;
        $ar['object'] = $object;
        $ar['other_objects'] = $other_objects;
        $ar['role'] = $object->relRole;
        $ar['ar_role'] = SysCompanyRole::lists('name', 'id');

        return View::make('front.cabinet.view.news', $ar);
    }

    function getOpenDoor($object_id){
        $user = Auth::user();
        $company = $user->relCompany;
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);

        if (!$object->is_active)
            return Redirect::back()->with('error', 'Ваша организация еще не одобрена модератором');

        $object->is_open = ($object->is_open ? 0 : 1);
        $object->save();

        return Redirect::back();
    }

    function getLogout(){
        Auth::logout();
		return Redirect::action('LoginController@getIndex');
    }

}
