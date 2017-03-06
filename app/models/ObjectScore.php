<?php
class ObjectScore extends Eloquent {
	protected $table = 'object_score';
    protected $fillable = array('object_id', 'score_avg',  'score_sum', 'score_count');
    public $timestamps = false;

	function relObject(){
		return $this->belongsTo('Object', 'object_id');
	}

	function getScoreAvgAttribute($score_avg){
		return round($score_avg, 1);
	}

	function setScoreAvgAttribute($score_avg){
		 $this->attributes['score_avg'] = strtolower($score_avg);

		 $score_avg = round($score_avg, 2);
		 $score_avg = $score_avg * 100;
		 $object = $this->relObject;
		 $object->sort_index = $score_avg;
		 $object->save();
	}
}
