<?php
class ObjectSlider extends Eloquent {
	protected $table = 'object_slider';
    protected $fillable = array('object_id', 'image');
    public $timestamps = false;

    function getCreatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

    function getUpdatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

}
