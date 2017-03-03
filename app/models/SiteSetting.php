<?php
class SiteSetting extends Eloquent {
	protected $table = 'site_settings';
    protected $fillable = array('key', 'name');
    public $timestamps = false;

    static function getNameByKey($key){
        $el = SiteSetting::where('key', $key)->first();
        if (!$el){
            $el = new SiteSetting();
            $el->key = $key;
            $el->save();
        }

        return $el->name;
    }

    static function getKeyAr(){
        return array_keys(static::getKeyArName());
    }

    static function getKeyArName(){
        return array(
            'facebook' => 'Ссылка на фэйсбук',
            'twitter' => 'Ссылка на твиттер',
			'instagramm' => 'Ссылка на инстаграм',
            'email' => 'Email администратора',
            'max_image' => 'Макс. кол-во изображений слайдера'
        );
    }
}
