<?php
class UserForgotPass extends Eloquent {
	protected $table = 'user_forgot_pass';
    protected $fillable = array('user_id', 'confirm_key');
    public $timestamps = false;
    
}
