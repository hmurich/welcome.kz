<?php
class SearchController extends BaseController {
    function getIndex () {

        return View::make('front.sample');
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
