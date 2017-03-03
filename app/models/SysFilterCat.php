<?php
class SysFilterCat extends Eloquent {
	protected $table = 'sys_filter_cats';
    protected $fillable = array('filter_id', 'cat_id');
    public $timestamps = false;
	

}
