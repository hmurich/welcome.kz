<?php
class TransLib extends Eloquent {
	protected $table = 'trans_lib';
    protected $fillable = array('lang_id', 'key_id', 'trans_name', 'is_have', 'key');
    public $timestamps = false;



    static function getFilterNameAr(){
        return array('is_have'=>'number', 'key'=>'text', 'trans_name'=>'text');
    }

    static function getSortNameAr(){
        return array('lang_id', 'id', 'is_have');
    }

	static function getIsHaveAr(){
		return array(0=>'Нет', 1=>'Да');
	}

	function getIsHaveNameAttribute(){
		$ar = TransLib::getIsHaveAr();
		if (!isset($ar[$this->is_have]))
			return 'Нет';

		return $ar[$this->is_have];
	}

	function setTransNameAttribute($val){
		$this->attributes['trans_name'] = $val;

		if (!$val)
			$this->attributes['is_have'] = 0;
		else
			$this->attributes['is_have'] = 1;
	}

	function relKey(){
		return $this->belongsTo('TransKey', 'key_id');
	}
}
