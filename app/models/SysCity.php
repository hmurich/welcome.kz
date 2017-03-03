<?php
class SysCity extends SysDirectory {
    const astana_id = 16;
    static function getAr(){
        return parent::getCityAr();
    }

    static function getCityID(){
        if (!Session::has('city_id'))
            return 0;

        return Session::get('city_id');
    }

    static function getCityIDWithDef(){
        if (!Session::has('city_id'))
            return SysCity::astana_id;

        return Session::get('city_id');
    }

    static function setCityID($city_id){
        return Session::put('city_id', $city_id);
    }

    static function getCoordinats(){
        $res = SysDirectoryName::find(SysCity::getCityIDWithDef());
        if (!$res || !$res->sys_name)
            return false;

        return $res->sys_name;
    }

}
