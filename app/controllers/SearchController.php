<?php
class SearchController extends PublicController {
    function getIndex () {
        if (!Input::has('search'))
            return App::abort(404);

        $search = Input::get('search');

        $items = Object::where(function($q) use ($search){
            $q->where('name', 'like', '%'.$search.'%')
                ->orWhereHas('relTag', function($b) use ($search) {
                    $b->where('note', 'like', '%'.$search.'%');
                });
        });

        $items = $items->where('city_id', SysCity::getCityIDWithDef());

        if (Input::has('role_id') && Input::get('role_id') > 0)
            $items = $items->where('role_id', Input::get('role_id'));

        //echo $items->toSql(); exit();
        $items = $items->with('relLocation', 'relStandartData', 'relSpecialData', 'relSliders')->orderBy('sort_index', 'desc')->get();
        $items = $this->generateItemAr($items);

        $ar = array();
        $ar['title'] = $this->translator->getTransNameByKey('search_title');
        $ar['ar_role'] = SysCompanyRole::lists('name', 'id');

        $ar['cities'] = SysCity::getAr();
        $ar['city_id'] = SysCity::getCityID();
        $ar['search'] = $search;

        $ar["items"] = $items;

        //echo '<pre>'; print_r($ar["items"]); echo '</pre>'; exit();

        $ar['city_coords'] = SysCity::getCoordinats();

        $ar['translator'] = $this->translator;

        return View::make('front.search.index', $ar);
    }

    function generateItemAr($items){

        $res = array();
        foreach($items as $f){
            $ar = array();
            $ar['id'] = $f->id;
            $ar['name'] = $f->name;

            if ($f->relLocation){
                $ar['lng'] = $f->relLocation->lng;
                $ar['lat'] = $f->relLocation->lat;
            }
            else {
                $ar['lng'] = null;
                $ar['lat'] = null;
            }

			$ar['logo'] = $f->relStandartData->logo_catalog;

            if (!$ar['logo'])
                $ar['logo'] = 'https://api.fnkr.net/testimg/70x90/00CED1/FFF/?text=img+placeholder';

            $ar['time_begin'] = $f->relStandartData->begin_time;
            $ar['time_end'] = $f->relStandartData->end_time;

            $options = array();
            $options['Краткий описание'] = $f->relStandartData->slogan;
            $fields =  $f->relSpecialData()->where('show_filter', 1)->get();
            foreach ($fields as $i) {
                $filter_name = $this->translator->getTransNameByKey(SysFilter::getTransKey($i->filter_id));
                $options[$filter_name] = implode(", ", $i->getVal());
            }
            $options['Адресс'] = $f->relStandartData->address;

            $ar['options'] = $options;

            $res[] = $ar;
        }

        return $res;
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
