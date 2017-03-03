<?php
class SysCompanyCat extends Eloquent {
	protected $table = 'sys_company_cats';
    protected $fillable = array('name');
    public $timestamps = false;

	const meal_id = 2;
	const reast_id = 3;
	const party_id = 4;
	const beaty_id = 5;
	const building_id = 6;

	const trans_prefix = 'sys_company_cat_';

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
        return array('name', 'id');
    }
}
