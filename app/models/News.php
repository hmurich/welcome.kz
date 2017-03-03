<?php
class News extends Eloquent {
	protected $table = 'news';
    protected $fillable = array('title', 'note', 'image', 'meta_key', 'meta_desc', 'object_id');

	function getShortNoteAttribute () {
		if (strlen($this->note) > 250)
			return substr($this->note, 0, 250).'...';

		return  $this->note;
	}

    function getCreatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

    function getUpdatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}
}
