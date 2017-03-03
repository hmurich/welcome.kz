<?php
class Object extends Eloquent {
	protected $table = 'objetcs';
    protected $fillable = array('sort_index', 'role_id', 'name', 'view_total', 'view_add', 'is_reserve',
                                'city_id', 'user_id', 'company_id', 'is_active', 'is_open', 'is_vip', 'is_special', 'taxi_id');

	static function getFilterNameAr(){
        return array('name'=>'text');
    }

    static function getSortNameAr(){
        return array('id', 'name');
    }

	function relTaxi(){
		return $this->belongsTo('Taxi', 'taxi_id');
	}

    function relUser(){
        return $this->belongsTo('User', 'user_id');
    }

	function relRole(){
		return $this->belongsTo('SysCompanyRole', 'role_id');
	}

	function relTag(){
		return $this->hasOne('ObjectHashTag', 'object_id');
	}

	function relLocation(){
		return $this->hasOne('ObjectLocation', 'object_id');
	}

	function relReserve(){
		return $this->hasOne('ObjectReserve', 'object_id');
	}

	function relScore(){
		return $this->hasOne('ObjectScore', 'object_id');
	}

	function relSliders(){
		return $this->hasOne('ObjectSlider', 'object_id');
	}

	function relSpecialData(){
		return $this->hasOne('ObjectSpecialData', 'object_id');
	}

	function relStandartData(){
		return $this->hasOne('ObjectStandartData', 'object_id');
	}

	function getVipNameAttribute(){
		if ($this->is_vip)
			return 'Вип';
		else
			return 'Обычное';
	}

	function getSpecailNameAttribute(){
		if ($this->is_special)
			return 'Специальное';
		else
			return 'Обычное';
	}

    function getCreatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

    function getUpdatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

	static function generateNew($company, $role_id, $data = array()){
		$object = new Object();
		$object->sort_index = 0;
		$object->view_total = 0;
		$object->view_add = 0;
		$object->is_active = 0;
		$object->is_open = 0;
		$object->is_vip = 0;
		$object->is_special = 0;

		$object->user_id = $company->user_id;
		$object->company_id = $company->id;

		$object->role_id = $role_id;
		$object->name = (isset($data['name']) ? $data['name'] : $company->name);
		$object->city_id = (isset($data['city_id']) ? $data['city_id'] : SysCity::astana_id);
		$object->save();

		$standart_data = new ObjectStandartData();
		$standart_data->object_id = $object->id;
		$standart_data->address = (isset($data['address']) ? $data['address'] : $company->address);
		$standart_data->phone = (isset($data['phone']) ? $data['phone'] : $company->name);
		$standart_data->note = (isset($data['note']) ? $data['note'] : $company->note);
		$standart_data->save();

		ObjectHashTag::create(array('object_id'=>$object->id));
		ObjectReserve::create(array('object_id'=>$object->id));
		ObjectScore::create(array('object_id'=>$object->id));

		return true;
	}

}
