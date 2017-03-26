<?php
class CabinetFieldController extends PublicController {
    function getIndex ($object_id) {
        $user = Auth::user();
        $company = $user->relCompany;
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);

        $other_objects = Object::where('company_id', $company->id)->lists('role_id', 'id');

        $special_data = $object->relSpecialData()->with('relVal')->get();
        $ar_values = array();
        foreach ($special_data as $s) {
            $ar_values[$s->filter_key] = $s->getVal();
        }

        $ar = array();
        $ar['title'] = $this->translator->getTransNameByKey('edit_infrom');
        $ar['object'] = $object;
        $ar['other_objects'] = $other_objects;
        $ar['standart_data'] = $object->relStandartData;
        $ar['special_data'] = $object->relSpecialData()->orderBy('sort_index', 'asc')->get()->keyBy('special_key')->toArray();
        $ar['ar_values'] = $ar_values;

        $ar['role'] = $object->relRole;

        $ar['ar_role'] = SysCompanyRole::lists('name', 'id');

        $ar['sys_special_data'] = SysFilterRole::where('role_id', $object->role_id)->with('relFilter')->orderBy('sort_index', 'asc')->get();

        $ar['ar_city'] = SysCity::getAr();

        $ar['translator'] = $this->translator;
        $ar['photo_1'] = ObjectSlider::where(array('object_id'=>$object->id, 'sys_key'=>1))->first();
        $ar['photo_2'] = ObjectSlider::where(array('object_id'=>$object->id, 'sys_key'=>2))->first();
        $ar['photo_3'] = ObjectSlider::where(array('object_id'=>$object->id, 'sys_key'=>3))->first();
        $ar['photo_4'] = ObjectSlider::where(array('object_id'=>$object->id, 'sys_key'=>4))->first();
        $ar['photo_5'] = ObjectSlider::where(array('object_id'=>$object->id, 'sys_key'=>5))->first();

        return View::make('front.cabinet.field.index', $ar);
    }

    function postIndex ($object_id) {
        $data = Input::all();
        //echo '<pre>'; print_r($data); echo '</pre>'; exit();
        $user = Auth::user();
        $company = $user->relCompany;
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);


        $ar_names = SysFilterName::lists('name', 'id');

        DB::beginTransaction();
        $object->city_id = Input::get('city_id');
        $object->name = Input::get('name');
        $object->save();

        $standart_data = $object->relStandartData;
        $standart_data->address = Input::get('address');
        $standart_data->slogan = Input::get('slogan');
        $standart_data->phone = Input::get('phone');
        $standart_data->note = Input::get('note');
        $standart_data->begin_time = Input::get('begin_time');
        $standart_data->end_time = Input::get('end_time');

        if (Input::hasFile('logo'))
            $standart_data->logo = ModelSnipet::setImage(Input::file('logo'), 'logo', 150, 100);
        if (Input::hasFile('logo_catalog'))
            $standart_data->logo_catalog = ModelSnipet::setImage(Input::file('logo_catalog'), 'logo', 70, 90);

        $standart_data->save();

        ObjectSpecialData::where('object_id', $object->id)->delete();
        $sys_special_data = SysFilterRole::where('role_id', $object->role_id)->with('relFilter')->orderBy('sort_index', 'asc')->get();

        $ar = array();
        $ar['object_id'] = $object->id;
        $ar['role_id'] = $object->role_id;
        foreach($sys_special_data as $s){
            if (!isset($data['data'][$s->relFilter->spec_key]) || count($data['data'][$s->relFilter->spec_key]) == 0)
                continue;

            $ar['filter_id'] = $s->filter_id;
            $ar['filter_key'] = $s->relFilter->spec_key;
            $ar['filter_name'] = $s->relFilter->name;

            $ar['is_text'] = ($s->relFilter->type_id == 1 ? 1 : 0);

            $ar['sort_index'] = $s->sort_index;
            $ar['show_filter'] = $s->show_filter;

            $item = ObjectSpecialData::create($ar);
            foreach ($data['data'][$s->relFilter->spec_key] as $val){
                $ar_val = array();
                $ar_val['parent_id'] = $item->id;

                if ($s->relFilter->is_fixed){
                    $ar_val['val_int'] = $val;
                    if (isset($ar_names[$val]))
                        $ar_val['val_text'] = $ar_names[$val];
                }
                else if ($item->is_text)
                    $ar_val['val_text'] = $val;
                else {
                    $ar_val['val_int'] = $val;
                    $ar_val['val_text'] = $val;
                }


                ObjectSpecialDataVal::create($ar_val);
            }
        }

        if (Input::hasFile('photo_1')){
            $photo = ObjectSlider::where(array('object_id'=>$object->id, 'sys_key'=>1))->first();
            if (!$photo)
                $photo = new ObjectSlider();
            $photo->object_id = $object->id;
            $photo->sys_key = 1;
            $photo->image = ModelSnipet::setImage(Input::file('photo_1'), 'logo', 790, 324);
            $photo->save();
        }
        if (Input::hasFile('photo_2')){
            $photo = ObjectSlider::where(array('object_id'=>$object->id, 'sys_key'=>2))->first();
            if (!$photo)
                $photo = new ObjectSlider();
            $photo->object_id = $object->id;
            $photo->sys_key = 2;
            $photo->image = ModelSnipet::setImage(Input::file('photo_2'), 'logo', 790, 324);
            $photo->save();
        }
        if (Input::hasFile('photo_3')){
            $photo = ObjectSlider::where(array('object_id'=>$object->id, 'sys_key'=>3))->first();
            if (!$photo)
                $photo = new ObjectSlider();
            $photo->object_id = $object->id;
            $photo->sys_key = 3;
            $photo->image = ModelSnipet::setImage(Input::file('photo_3'), 'logo', 790, 324);
            $photo->save();
        }
        if (Input::hasFile('photo_4')){
            $photo = ObjectSlider::where(array('object_id'=>$object->id, 'sys_key'=>4))->first();
            if (!$photo)
                $photo = new ObjectSlider();
            $photo->object_id = $object->id;
            $photo->sys_key = 4;
            $photo->image = ModelSnipet::setImage(Input::file('photo_4'), 'logo', 790, 324);
            $photo->save();
        }
        if (Input::hasFile('photo_5')){
            $photo = ObjectSlider::where(array('object_id'=>$object->id, 'sys_key'=>5))->first();
            if (!$photo)
                $photo = new ObjectSlider();
            $photo->object_id = $object->id;
            $photo->sys_key = 5;
            $photo->image = ModelSnipet::setImage(Input::file('photo_5'), 'logo', 790, 324);
            $photo->save();
        }


        DB::commit();

        return Redirect::back()->with('success', $this->translator->getTransNameByKey('edit_infrom_success_mess'));
    }

    function getDeleteImg($type, $object_id, $id = 0){
        $user = Auth::user();
        $company = $user->relCompany;
        $object = Object::where(array('company_id'=>$company->id, 'id'=>$object_id))->first();
        if (!$object)
            return App::abort(404);

        if ($type == 'logo'){
            $standart_data = $object->relStandartData;
            $standart_data->logo = null;
            $standart_data->save();
        }

        if ($type == 'logo_catalog'){
            $standart_data = $object->relStandartData;
            $standart_data->logo_catalog = null;
            $standart_data->save();
        }

        if ($type == 'photo_1')
            ObjectSlider::where(array('object_id'=>$object->id, 'sys_key'=>1))->delete();

        if ($type == 'photo_2')
            ObjectSlider::where(array('object_id'=>$object->id, 'sys_key'=>3))->delete();

        if ($type == 'photo_3')
            ObjectSlider::where(array('object_id'=>$object->id, 'sys_key'=>3))->delete();

        if ($type == 'photo_4')
            ObjectSlider::where(array('object_id'=>$object->id, 'sys_key'=>4))->delete();

        if ($type == 'photo_5')
            ObjectSlider::where(array('object_id'=>$object->id, 'sys_key'=>5))->delete();

        return Redirect::back();
    }

}
