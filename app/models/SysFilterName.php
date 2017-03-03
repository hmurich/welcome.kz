<?php
class SysFilterName extends Eloquent {
	protected $table = 'sys_filter_names';
    protected $fillable = array('name', 'filter_id');
    public $timestamps = false;

    static function getFilterNameAr(){
        return array('name'=>'text');
    }

    static function getSortNameAr(){
        return array('id', 'name');
    }

}
