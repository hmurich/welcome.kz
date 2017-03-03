<?php
class Comment extends Eloquent {
	protected $table = 'comments';
    protected $fillable = array('title', 'note', 'is_answer', 'score', 'object_id', 'parent_id', 'is_publish', 'user_id');

	function relObject(){
		return $this->belongsTo('Object', 'object_id');
	}

    function relUser(){
        return $this->belongsTo('User', 'user_id');
    }

    function getCreatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y');
	}

    function getUpdatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}
}
