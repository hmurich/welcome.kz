<?php
class Reserve extends Eloquent {
	protected $table = 'reserve';
    protected $fillable = array('object_id', 'name', 'phone', 'email', 'note', 'created_unix', 'enter_date', 'enter_time', 'is_accept');

    function getCreatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

    function getUpdatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

}
