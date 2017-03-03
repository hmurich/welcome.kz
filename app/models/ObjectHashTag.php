<?php
class ObjectHashTag extends Eloquent {
	protected $table = 'object_hash_tags';
    protected $fillable = array('object_id', 'note');
    public $timestamps = false;

	function setNoteAttribute($text){
		$this->attributes['note'] = $text;

		SysHashTag::checkForIsset($text);
	}
}
