<?php
class Taxi extends Eloquent {
	protected $table = 'taxi';
    protected $fillable = array('name', 'phone');

    static function getFilterNameAr(){
        return array('name'=>'text');
    }

    static function getSortNameAr(){
        return array('name', 'id');
    }

    function getCreatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

    function getUpdatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

}
