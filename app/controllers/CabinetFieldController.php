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
        $ar['title'] = 'Редактировать информацию';
        $ar['object'] = $object;
        $ar['other_objects'] = $other_objects;
        $ar['standart_data'] = $object->relStandartData;
        $ar['special_data'] = $object->relSpecialData()->orderBy('sort_index', 'asc')->get()->keyBy('special_key')->toArray();
        $ar['ar_values'] = $ar_values;

        $ar['role'] = $object->relRole;

        $ar['ar_role'] = SysCompanyRole::lists('name', 'id');

        $ar['sys_special_data'] = SysFilterRole::where('role_id', $object->role_id)->with('relFilter')->orderBy('sort_index', 'asc')->get();

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

        $object->name = Input::get('name');
        $object->save();

        $standart_data = $object->relStandartData;
        $standart_data->address = Input::get('address');
        $standart_data->slogan = Input::get('slogan');
        $standart_data->phone = Input::get('phone');
        if (Input::hasFile('logo'))
            $standart_data->logo = ModelSnipet::setImage(Input::file('logo'), 'logo', 150, 100);
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

        $ar_files = array();
        $ar = array();
        $ar['object_id'] = $object->id;
        if (Input::hasFile('photo_1')){
            $ar['image'] = ModelSnipet::setImage(Input::file('photo_1'), 'logo', 790, 324);
            $ar_files[] = $ar;
        }
        if (Input::hasFile('photo_2')){
            $ar['image'] = ModelSnipet::setImage(Input::file('photo_2'), 'logo', 790, 324);
            $ar_files[] = $ar;
        }
        if (Input::hasFile('photo_3')){
            $ar['image'] = ModelSnipet::setImage(Input::file('photo_3'), 'logo', 790, 324);
            $ar_files[] = $ar;
        }
        if (Input::hasFile('photo_4')){
            $ar['image'] = ModelSnipet::setImage(Input::file('photo_4'), 'logo', 790, 324);
            $ar_files[] = $ar;
        }
        if (Input::hasFile('photo_5')){
            $ar['image'] = ModelSnipet::setImage(Input::file('photo_5'), 'logo', 790, 324);
            $ar_files[] = $ar;
        }

        if (count($ar_files) > 0)
            ObjectSlider::insert($ar_files);

        DB::commit();

        return Redirect::back()->with('success', 'Информация сохранена успешно');
    }

}
