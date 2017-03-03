<?php
class SysCompanyRoleCat extends Eloquent {
	protected $table = 'sys_company_role_cat';
    protected $fillable = array('cat_id', 'role_id');
    public $timestamps = false;

    
}
