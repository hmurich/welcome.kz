<?php
class SysFilter extends Eloquent {
	protected $table = 'sys_filters';
    protected $fillable = array('spec_key', 'name', 'type_id', 'is_many', 'is_fixed', 'sort_index');
    public $timestamps = false;

	const trans_prefix = 'sys_filter_';

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
        return array('spec_key'=>'text');
    }

    static function getSortNameAr(){
        return array('spec_key', 'id', 'name');
    }

    static function getTypeAr(){
        return array(
            1 => 'text',
            2 => 'number'
        );
    }

    function getIsManyNameAttribute(){
        if ($this->is_many)
            return 'множественный';

        return 'единственный';
    }

	function getIsFixedNameAttribute(){
        if ($this->is_fixed)
            return 'фиксированный';

        return 'любой';
    }

    function relRole(){
        return $this->belongsToMany('SysCompanyRole', 'sys_filter_role', 'filter_id', 'role_id');
    }

    function relCats(){
        return $this->belongsToMany('SysCompanyCat', 'sys_filter_cats', 'filter_id', 'cat_id');
    }

	function relCatLine(){
		return $this->hasMany('SysFilterCat', 'filter_id');
	}

	function relNames(){
		return $this->hasMany('SysFilterName', 'filter_id');
	}

}
