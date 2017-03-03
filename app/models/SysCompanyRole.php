<?php
class SysCompanyRole extends Eloquent {
	protected $table = 'sys_company_role';
    protected $fillable = array('name', 'is_reserve');
    public $timestamps = false;

	const trans_prefix = 'sys_company_role_';

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

	function relCats(){
        return $this->belongsToMany('SysCompanyCat', 'sys_company_role_cat', 'role_id', 'cat_id');
    }

	function relCatRole(){
		return $this->hasMany('SysCompanyRoleCat', 'role_id');
	}
}
