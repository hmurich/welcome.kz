<?php
class Visitor extends Eloquent {
	protected $table = 'visitors';
    protected $fillable = array('name', 'email', 'from', 'external_id', 'user_id');

    function getCreatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

    function getUpdatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

}
