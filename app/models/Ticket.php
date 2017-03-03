<?php
class Ticket extends Eloquent {
	protected $table = 'tickets';
    protected $fillable = array('title', 'note', 'status_id', 'cat_id', 'user_id');
	const new_role_cat_id = 8;
	const new_event_cat_id = 9;

	const begin_status_id = 4;

    static function getFilterNameAr(){
        return array('name'=>'text');
    }

    static function getSortNameAr(){
        return array('name', 'id');
    }

    static function getStatusAr(){
        return SysDirectory::getTicketStatusAr();
    }

    static function getTopicAr(){
        return SysDirectory::getTicketTopicAr();
    }

    static function findStatus($status_id){
        $ar = static::getStatusAr();
        if (!isset($ar[$status_id]))
            return false;

        return SysDirectoryName::findOrFail($status_id);
    }

    static function getBeginStatusId () {
        return key(Ticket::getStatusAr());
    }

    function getCreatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

    function getUpdatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

    function relUser(){
        return $this->belongsTo('User', 'user_id');
    }
}
