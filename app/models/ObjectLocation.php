<?php
class ObjectLocation extends Eloquent {
	protected $table = 'object_locations';
    protected $fillable = array('object_id', 'lng', 'lat');
    public $timestamps = false;

    function getCreatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

    function getUpdatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}
}
