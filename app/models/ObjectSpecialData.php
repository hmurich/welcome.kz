<?php
class ObjectSpecialData extends Eloquent {
	protected $table = 'object_special_data';
    protected $fillable = array('object_id', 'filter_id', 'filter_key', 'filter_name', 'role_id', 'is_text', 'sort_index', 'show_filter');
    public $timestamps = false;

	public $data_value = false;

    function getCreatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

    function getUpdatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

	function relVal(){
		return $this->hasMany('ObjectSpecialDataVal', 'parent_id');
	}

	function getVal(){
		if ($this->data_value)
			return $this->data_value;

		if ($this->is_text)
			$this->data_value = $this->relVal()->lists('val_text', 'val_int');
		else
			$this->data_value = $this->relVal()->lists('val_text', 'val_int');

		return $this->data_value;
	}

}
