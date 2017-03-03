<?php
class SysFilterRole extends Eloquent {
	protected $table = 'sys_filter_role';
    protected $fillable = array('filter_id', 'role_id', 'sort_index', 'show_filter', 'in_filter');
    public $timestamps = false;

	function relFilter(){
		return $this->belongsTo('SysFilter', 'filter_id');
	}
}
