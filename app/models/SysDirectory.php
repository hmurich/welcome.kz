<?php
class SysDirectory extends Eloquent {
	protected $table = 'sys_directory';
    protected $fillable = array('name', 'can_delete');
	const lang_id = 1;
	const ticket_topic_id = 3;
	const ticket_status_id = 6;
	const city_id = 2;

	const trans_prefix = 'sys_directory_';

	public static function boot() {
		$res = parent::boot();
		static::created(function($model){
			$model->setNewTransKey();
			return true;
		});

		return $res;
	}

	function setNewTransKey(){
		$key = static::trans_prefix.$this->id;
		TransKey::createNewWord($key, $this->name);
	}

	static function getTransKey($id){
		return static::trans_prefix.$id;
	}

	static function getSysArByKey($directory_id){
		return SysDirectoryName::where('directory_id', $directory_id)->lists('sys_name', 'id');
	}


	static function getCityAr(){
		return SysDirectoryName::where('directory_id', static::city_id)->lists('name', 'id');
	}

	static function getLangAr(){
		return SysDirectoryName::where('directory_id', static::lang_id)->lists('name', 'id');
	}

	static function getTicketTopicAr(){
		return SysDirectoryName::where('directory_id', static::ticket_topic_id)->lists('name', 'id');
	}

	static function getTicketStatusAr(){
		return SysDirectoryName::where('directory_id', static::ticket_status_id)->lists('name', 'id');
	}

	static function findLang ($lang_id){
		return SysDirectoryName::where('directory_id', static::lang_id)->where('id', $lang_id)->firstOrFail();
	}

    static function getFilterNameAr(){
        return array('name'=>'text');
    }

    static function getSortNameAr(){
        return array('name', 'id');
    }
}
