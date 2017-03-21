<?php
class MapController extends PublicController {
    function getIndex ($cat_id) {
        $cat = SysCompanyCat::findOrFail($cat_id);

        $filter_1 = SysFilter::whereHas('relCatLine', function($q) use ($cat){
            $q->where('cat_id', $cat->id);
        })->orderBy('sort_index', 'asc')->first();

        $filters = SysFilter::whereHas('relCatLine', function($q) use ($cat){
            $q->where('cat_id', $cat->id);
        });
        if ($filter_1)
            $filters = $filters->where('id', '<>', $filter_1->id);

        $ar = array();
        $ar['title'] = $this->translator->getTransNameByKey(SysCompanyCat::getTransKey($cat->id), $cat->name);

        $ar['cat'] = $cat;
        $ar['filters'] = $filters->orderBy('sort_index', 'asc')->get();
        $ar['filter_1'] = $filter_1;

        $ar['cities'] = SysCity::getAr();
        $ar['city_id'] = SysCity::getCityID();
        $ar['ar_role'] = SysCompanyRole::whereHas('relCatRole', function($q) use ($cat){
            $q->where('cat_id', $cat->id);
        })->lists('name', 'id');

        $ar['city_coords'] = SysCity::getCoordinats();

        $ar['translator'] = $this->translator;

        return View::make('front.map.index', $ar);
    }

    function postGeoObjects(){
        $data = Input::all();
        if (!isset($data['cat_id']))
            return 0;

        if (isset($data['role_id']) && $data['role_id'] > 0)
            $filters = Object::where('role_id', $data['role_id']);
        else{
            $ar_roles = SysCompanyRoleCat::where('cat_id', $data['cat_id'])->lists('role_id');
            $filters = Object::whereIn('role_id', $ar_roles);
        }

        $city_id = SysCity::getCityIDWithDef();
        $filters = $filters->where('city_id', $city_id);

        $filters = $filters->where(array('is_active'=>1, 'is_open'=>1));

        unset($data['cat_id']); unset($data['role_id']);
		$ar = array();
		foreach ($data as $k => $v){
			if (trim($v)=='' || intval($v) == 0)
				continue;
			$ar[$k] = $v;
		}
		$data = $ar;

        if (count($data) > 0){
            $filters = $filters->whereHas('relSpecialData', function($q) use ($data){
                foreach ($data as $k => $v){
                    if (trim($v)=='' || intval($v) == 0)
                        continue;

                    $q->where('filter_key', $k)->whereHas('relVal', function($b) use ($v) {
                        $b->where('val_text', $v);
                    });
                }
            });
        }

        $filters = $filters->with('relLocation', 'relStandartData', 'relSpecialData', 'relSliders')->orderBy('sort_index', 'desc')->get();

        $geo = array();
        foreach($filters as $f){
            $ar = array();
            if (!$f->relLocation || !$f->relStandartData)
                continue;
            $ar['lng'] = $f->relLocation->lng;
            $ar['lat'] = $f->relLocation->lat;
            $ar['id'] = $f->id;
            $ar['name'] = $f->name;
            $ar['address'] = $f->relStandartData->address;
            $ar['note'] = $f->relStandartData->note;

            $geo[] = $ar;
        }

        $items = array();
        $vip = array();
        $specail = array();

        foreach($filters as $f){
            if ($f->is_vip)
                $vip[] = $this->generateRow($f);
            else if ($f->is_special)
                $specail[] = $this->generateRow($f);
            else
                $items[] = $this->generateRow($f);
        }

        echo json_encode(array('geo'=>$geo, 'items'=>$items, 'vip'=>$vip, 'specail'=>$specail));
    }

    function generateRow($f){
        $ar = array();
        $ar['id'] = $f->id;
        $ar['name'] = $f->name;


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

        return $ar;
    }


}
