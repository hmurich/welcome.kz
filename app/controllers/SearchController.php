<?php
class SearchController extends BaseController {
    function getIndex () {
        if (!Input::has('search'))
            return App::abort(404);

        $search = Input:get('search');

        $ar = array();
        $ar['title'] = 'Поиск';
        $ar['ar_role'] = SysCompanyRole::lists('name', 'id');

        $ar['cities'] = SysCity::getAr();
        $ar['city_id'] = SysCity::getCityID();
        $ar['search'] = $search;


        return View::make('front.search.index', $ar);
    }

    function postAjaxTag(){
        $name = Input::get('name');
        $res = SysHashTag::where('name', 'like', '%'.$name.'%')->get();

        $ar = array();
		foreach ($res as $v) {
			$ar[] = array('value'=>$v->id,'label'=>$v->name);
		}

		echo json_encode($ar);
    }

}
