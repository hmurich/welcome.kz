<?php
class ObjectEvent extends Eloquent {
	protected $table = 'events';
    protected $fillable = array('object_id', 'title', 'note', 'date_event', 'time_event', 'duration', 'is_active', 'image');

	static function getFilterNameAr(){
        return array('title'=>'text');
    }

    static function getSortNameAr(){
        return array('id', 'title');
    }

	static function generateNew($object, $data){
		if (!$object || !isset($data['title']) || !isset($data['note']) || !isset($data['date_event']) || !isset($data['time_event'])
					|| !isset($data['duration']) || !isset($data['image_link']))
			return false;

		$event = new ObjectEvent();
		$event->object_id = $object->id;
		$event->title = $data['title'];
		$event->note = $data['note'];
		$event->date_event = $data['date_event'];
		$event->time_event = $data['time_event'];
		$event->duration = $data['duration'];
		$event->image = $data['image_link'];
		$event->is_active = 0;
		$event->save();

		return $event;
	}

	function relObject(){
		return $this->belongsTo('Object', 'object_id');
	}

	function getDateEventNameAttribute(){
	   return ModelSnipet::formatDate($this->date_event, 'd.m.Y');
	}

	function getTimeEventNameAttribute(){
	   return ModelSnipet::formatDate($this->date_event, 'H:i');
	}

    function getCreatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

    function getUpdatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}
}
