<?php
class PublicController extends BaseController {
    public $translator = false;

    function __construct(){
        $this->translator = new Translator();
    }


}
