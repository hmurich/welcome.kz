<?php
class SysDirectoryName extends Eloquent {
	protected $table = 'sys_directory_names';
    protected $fillable = array('name', 'directory_id', 'sys_name');

	const trans_prefix = 'sys_directory_name_';

	public static function boot() {
		$res = parent::boot();
		static::created(function($model){
            $model->createTransWord();
			$model->setNewTransKey();
            return true;
        });

		return $res;
	}

	function createTransWord(){
		if ($this->directory_id != 1)
			return true;

		$ar_keys = TransKey::lists('key', 'id');

        $insert = array();

        $ar_item = array();
        $ar_item['is_have'] = 0;
		$ar_item['lang_id'] = $this->id;

        foreach ($ar_keys as $k=>$v) {
			$ar_item['key_id'] = $k;
	        $ar_item['key'] = $v;

            $insert[] = $ar_item;
        }

        if (count($insert) > 0)
            TransLib::insert($insert);
	}

	function setNewTransKey(){
		$key = static::trans_prefix.$this->id;
		TransKey::createNewWord($key, $this->name);
	}

	static function getTransKey($id){
		return static::trans_prefix.$id;
	}

    static function getFilterNameAr(){
        return array('name'=>'text');
    }

    static function getSortNameAr(){
        return array('name', 'id');
    }


}
