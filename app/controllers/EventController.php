<?php
class EventController extends PublicController {
    function getIndex () {
        ObjectEvent::where('date_event', '<', date('Y-m-d'))->delete();

        $city_id = SysCity::getCityIDWithDef();

        $events = ObjectEvent::where('is_active', 1)->whereHas('relObject', function($q) use ($city_id){
            $q = $q->where('city_id', $city_id);

            if (Input::has('role_id') && Input::get('role_id'))
                $q = $q->where('role_id', Input::get('role_id'));

            if (Input::has('company_name') && Input::get('company_name'))
                $q = $q->where('name', 'like', '%'.Input::get('company_name').'%');
        });

        if (Input::has('name') && Input::get('name'))
            $events = $events->where('title', 'like', '%'.Input::get('name').'%');

        if (Input::has('date.year') && Input::has('date.month') && Input::has('date.day')){
            $year = Input::get('date.year');
            $month = Input::get('date.month');
            $day = Input::get('date.day');

            $month = str_pad($month, 2, "0", STR_PAD_LEFT);
            $day = str_pad($day, 2, "0", STR_PAD_LEFT);

            $date = $year.'-'.$month.'-'.$day;

            $events = $events->where('date_event', $date);
        }
        else
            $events = $events->where('date_event', date('Y-m-d'));

        $ar = array();
        $ar['title'] = 'НЕ ЗНАЕТЕ КУДА ПОЙТИ?';
        $ar['events'] = $events->with('relObject')->orderBy('date_event', 'asc')->get();

        $ar['cities'] = SysCity::getAr();
        $ar['city_id'] = SysCity::getCityID();
        $ar['ar_role'] = SysCompanyRole::orderBy('name', 'asc')->lists('name', 'id');

        $ar['translator'] = $this->translator;

        return View::make('front.event.index', $ar);
    }



}
