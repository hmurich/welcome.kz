<?php
class TicketAnswer extends Eloquent {
	protected $table = 'ticket_answer';
    protected $fillable = array('ticket_id', 'note', 'after_status_id', 'before_status_id', 'user_id');
    
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
