<?php
class SysFilter extends Eloquent {
	protected $table = 'sys_filters';
    protected $fillable = array('spec_key', 'name', 'type_id', 'is_many', 'is_fixed', 'sort_index');
    public $timestamps = false;

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
