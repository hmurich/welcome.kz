<?php
class IndexController extends PublicController {
    function getIndex () {
        $ar = array();
        $ar['title'] = 'Welcome to Kazakhstan';

        $ar['cities'] = SysCity::getAr();
        $ar['city_id'] = SysCity::getCityID();
        $ar['ar_cat'] = SysCompanyCat::lists('name', 'id');

        $ar['translator'] = $this->translator;

        return View::make('front.index.index', $ar);
    }
}
