<?php
class CityController extends BaseController {
    function postAjaxChange() {
        if (!Input::has('city_id'))
            return '0';

        SysCity::setCityID(Input::get('city_id'));

        return 1;
    }
}
