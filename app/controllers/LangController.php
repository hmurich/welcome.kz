<?php
class LangController extends PublicController {
    function anyChange () {
        if (Input::has('lang_id'))
            SysLang::setLangID(Input::get('lang_id'));

        return Redirect::back();
    }
}
