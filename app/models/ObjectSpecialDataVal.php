<?php
class ObjectSpecialDataVal extends Eloquent {
	protected $table = 'object_special_data_val';
    protected $fillable = array('parent_id', 'val_int', 'val_text');
    public $timestamps = false;

    function getCreatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

    function getUpdatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

}
