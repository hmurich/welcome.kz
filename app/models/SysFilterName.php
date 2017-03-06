<?php
class SysFilterName extends Eloquent {
	protected $table = 'sys_filter_names';
    protected $fillable = array('name', 'filter_id');
    public $timestamps = false;

	const trans_prefix = 'sys_filter_name_';

	public static function boot() {
		$res = parent::boot();
		static::created(function($model){
			$model->setNewTransKey();
			return true;
		});

		return $res;
	}

	function setNewTransKey(){
		$key = static::trans_prefix.$this->id;
		TransKey::createNewWord($key, $this->name);
	}

	static function getTransKey($id){
		return static::trans_prefix.$id;
	}

    static function getFilterNameAr(){
        return array('name'=>'text');
    }

    static function getSortNameAr(){
        return array('id', 'name');
    }

}
