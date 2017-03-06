<?php
class TestController extends BaseController {
    function getSampleView(){
        return View::make('front.sample');
    }

    function getGenerateTransWord () {
/*
        $items = SysFilterName::all();
        foreach ($items as $i) {
            $i->setNewTransKey();
        }

        $items = SysFilter::all();
        foreach ($items as $i) {
            $i->setNewTransKey();
        }


        $items = SysDirectoryName::all();
        foreach ($items as $i) {
            $i->setNewTransKey();
        }

        $items = SysDirectory::all();
        foreach ($items as $i) {
            $i->setNewTransKey();
        }

        $items = SysCompanyCat::all();
        foreach ($items as $i) {
            $i->setNewTransKey();
        }

        $items = SysCompanyRole::all();
        foreach ($items as $i) {
            $i->setNewTransKey();
        }
        */
    }

    function getTranslator(){
        //Translator::destroiArCache();

        $translator = new Translator();
    	$translator->setSessionLangId(3);

        echo '<pre>ar at session '; print_r((array)json_decode(Cache::get('ar_lang_1'), true)); echo '</pre>';
        echo $translator->getSessionLangId().'<br />';
        echo $translator->getLangId().'<br />';
        echo SysCompanyCat::getTransKey(SysCompanyCat::meal_id).'<br />';
        echo $translator->getTransNameByKey(SysCompanyCat::getTransKey(SysCompanyCat::meal_id));

        echo '<pre>ar at class after  '; print_r($translator->getArLang()); echo '</pre>';
        /*
        $translator = new Translator();
        echo '<pre>ar at session '; print_r((array)json_decode(Cache::get('ar_lang_1'), true)); echo '</pre>';
        echo $translator->getLangId();
        echo '<pre> ar at class before '; print_r($translator->getArLang()); echo '</pre>';

        $title = $translator->getTransNameByKey('title');
        $sample = $translator->getTransNameByKey('sample');

        echo '$title '.$title.' <br />';
        echo '$sample '.$sample.' <br />';
        $sample_2 = $translator->getTransNameByKey('sample22');
        echo '$sample '.$sample_2.' <br />';
        $sample_2 = $translator->getTransNameByKey('sample22ss');

        echo '<pre>ar at class after  '; print_r($translator->getArLang()); echo '</pre>'; exit();

        $translator->putArLangToCache();
        */
    }
}
