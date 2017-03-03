<?php
class CabinetNewsController extends PublicController {
    function getIndex ($object_id) {
        $user = Auth::user();
        $company = $user->relCompany;
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);

        $other_objects = Object::where('company_id', $company->id)->lists('role_id', 'id');

        $ar = array();
        $ar['title'] = 'Новости';
        $ar['object'] = $object;
        $ar['other_objects'] = $other_objects;
        $ar['news'] = News::where('object_id', $object->id)->orderBy('id', 'desc')->take(6)->get();

        $ar['role'] = $object->relRole;
        $ar['ar_role'] = SysCompanyRole::lists('name', 'id');

        return View::make('front.cabinet.news.index', $ar);
    }

    function getAdd($object_id, $id = 0){
        $user = Auth::user();
        $company = $user->relCompany;
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);

        $ar = array();

        $ar['object'] = $object;

        $ar['role'] = $object->relRole;
        $ar['ar_role'] = SysCompanyRole::lists('name', 'id');

        $news = News::find($id);
        if ($news){
            $ar['title'] = 'Редактирование "'.$news->title.'"';
            $ar['news'] = $news;
            $ar['action'] = action("CabinetNewsController@postAdd", array($object->id, $news->id));
        }
        else {
            $ar['title'] = 'Добавление новости';
            $ar['news'] = false;
            $ar['action'] = action("CabinetNewsController@postAdd", array($object->id));
        }

        return View::make('front.cabinet.news.add', $ar);
    }

    function postAdd ($object_id, $id = 0) {
        $user = Auth::user();
        $company = $user->relCompany;
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);

        $news = News::find($id);
        if (!$news){
            $news = new News();
            $news->object_id = $object->id;
        }

        $news->title = Input::get('title');
        $news->note = Input::get('note');
        $news->meta_key = Input::get('meta_key');
        $news->meta_desc = Input::get('meta_desc');
        if (Input::hasFile('image'))
            $news->image = ModelSnipet::setImage(Input::file('image'), 'logo');
        $news->save();

        return Redirect::action('CabinetNewsController@getIndex', $object->id)->with('success', 'Новость успешно сохранена');
    }

    function getDelete($object_id, $id){
        $user = Auth::user();
        $company = $user->relCompany;
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);

        News::where(array('object_id'=>$object->id, 'id'=>$id))->first()->delete();

        return Redirect::back()->with('success', 'Новость успешно удалена');
    }


}
