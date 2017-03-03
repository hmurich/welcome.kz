<?php
class ObjectScore extends Eloquent {
	protected $table = 'object_score';
    protected $fillable = array('object_id', 'score_avg',  'score_sum', 'score_count');
    public $timestamps = false;


}
