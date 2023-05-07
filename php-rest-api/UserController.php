<?php

require_once "BaseController.php";

class UserController extends BaseController
{
    public function listAction(){
        $arrQueryStringParams = $this->getQueryStringParams();
        print_r($arrQueryStringParams);die;
        echo "list action called";
    }
}
