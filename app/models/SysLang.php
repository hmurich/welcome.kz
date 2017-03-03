<?php
class SysLang extends SysDirectory {
    static function getAr(){
        return parent::getLangAr();
    }

    static function getLangID(){
        if (!Session::has('lang_id'))
            return 0;

        return Session::get('lang_id');
    }

    static function setLangID($lang_id){
        return Session::put('lang_id', $lang_id);
    }

    static function getSysAr(){
        return SysDirectory::getSysArByKey(SysDirectory::lang_id);
    }

}
