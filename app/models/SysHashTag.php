<?php
class SysHashTag extends Eloquent {
	protected $table = 'sys_hash_tags';
    protected $fillable = array('name');

	static function checkForIsset($tag_text){
		$ar = explode(",", $tag_text);

		$insert = array();
		foreach ($ar as $name) {
			if (!SysHashTag::where('name', $name)->first()){
				$item = array();
				$item['name'] = $name;
				$item['created_at'] = date('Y-m-d h:i:s');
				$item['updated_at'] = date('Y-m-d h:i:s');

				$insert[] = $item;
			}
		}

		if (count($insert) > 0){
			SysHashTag::insert($insert);
		}
	}

    static function getFilterNameAr(){
        return array('name'=>'text');
    }

    static function getSortNameAr(){
        return array('name', 'id');
    }

    function getCreatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}

    function getUpdatedAtAttribute($value){
	   return ModelSnipet::formatDate($value, 'd.m.Y H:i:s');
	}
}
