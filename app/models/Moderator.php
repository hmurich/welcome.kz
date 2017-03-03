<?php
class Moderator extends Eloquent {
	protected $table = 'moderators';
    protected $fillable = array('name', 'address', 'phone', 'mobile', 'note', 'user_id', 'password');

    static function getFilterNameAr(){
        return array('name'=>'text', 'address'=>'text', 'phone'=>'text', 'mobile'=>'text', 'note'=>'text');
    }

    static function getSortNameAr(){
        return array('name', 'id');
    }

    function relUser(){
        return $this->belongsTo('User', 'user_id');
    }

    function getCreatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

    function getUpdatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}


}
