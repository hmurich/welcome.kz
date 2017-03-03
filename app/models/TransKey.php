<?php
class TransKey extends Eloquent {
	protected $table = 'trans_keys';
    protected $fillable = array('key', 'name');
    public $timestamps = false;

    public static function boot() {
		$res = parent::boot();
		static::created(function($model){
            $model->createTransWord();
            return true;
        });

		return $res;
	}

	static function createNewWord($key, $name){
		$el = TransKey::where('key', $key)->first();
		if ($el)
			return false;

		$el = new TransKey();
		$el->key = $key;
		$el->name = $name;
		$el->save();

		return true;
	}

    function createTransWord(){
        $ar_lang_id = SysDirectory::getLangAr();
        $key = $this->key;

        $insert = array();

        $ar_item = array();
        $ar_item['is_have'] = 0;
        $ar_item['key_id'] = $this->id;
        $ar_item['key'] = $this->key;
        foreach ($ar_lang_id as $k=>$v) {
            $ar_item['lang_id'] = $k;

            $insert[] = $ar_item;
        }

        if (count($insert) > 0)
            TransLib::insert($insert);
    }


    static function getFilterNameAr(){
        return array('key'=>'text', 'name'=>'text');
    }

    static function getSortNameAr(){
        return array('id', 'key', 'name');
    }

}
