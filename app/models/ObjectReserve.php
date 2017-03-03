<?php
class ObjectReserve extends Eloquent {
	protected $table = 'object_reserve';
    protected $fillable = array('object_id', 'total_count', 'free_count');
    public $timestamps = false;

    function getCreatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

    function getUpdatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

}
