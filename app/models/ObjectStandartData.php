<?php
class ObjectStandartData extends Eloquent {
	protected $table = 'object_standart_data';
    protected $fillable = array('object_id', 'address', 'phone', 'note', 'logo', 'begin_time', 'end_time', 'begin_price', 'end_price', 'slogan');
    public $timestamps = false;

    function getCreatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

    function getUpdatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

	function getBeginTimeAttribute($value){
	   return ModelSnipet::formatDate($value, 'H:i');
	}

	function getEndTimeAttribute($value){
	   return ModelSnipet::formatDate($value, 'H:i');
	}

}
