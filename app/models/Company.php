<?php
class Company extends Eloquent {
	protected $table = 'company';
    protected $fillable = array('name', 'address', 'phone', 'note', 'user_id');

    function relUser(){
        return $this->belongsTo('User', 'user_id');
    }

	function relObjects(){
		return $this->hasMany('Object', 'company_id');
	}

    function getCreatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

    function getUpdatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}
}
