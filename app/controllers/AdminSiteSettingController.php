<?php
class AdminSiteSettingController extends BaseController {
    function getIndex () {
        $ar_keys = SiteSetting::getKeyAr();
        $ar_value = array();
        foreach ($ar_keys as $key) {
            $ar_value[$key] = SiteSetting::getNameByKey($key);
        }
        $ar_titles = SiteSetting::getKeyArName();

        $ar = array();
		$ar['ar_value'] = $ar_value;
        $ar['ar_titles'] = $ar_titles;

		$ar['title'] = 'Настройки сайта';

		return View::make('admin.site_setting.index', $ar);
    }

    function postIndex(){
        //echo '<pre>'; print_r(Input::all()); echo '</pre>'; exit();

        $data = $this->trimData(Input::all());
        if (!isset($data['ar']))
            return App::abort(404);

        $ar_keys = SiteSetting::getKeyAr();

        foreach ($data['ar'] as $key => $name) {
            if (!in_array($key, $ar_keys))
                continue;

            $el = SiteSetting::where('key', $key)->first();
            if (!$el){
                $el = new SiteSetting();
                $el->key = $key;
            }
            $el->name = $name;
            $el->save();
        }

        return Redirect::back()->with('success', 'Данные успешно сохранены');
    }
}
