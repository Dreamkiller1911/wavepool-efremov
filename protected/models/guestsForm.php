<?php

/**
 * Created by PhpStorm.
 * User: User3D
 * Date: 20.04.2016
 * Time: 16:14
 */
class guestsForm extends CFormModel
{
    public $date_create;
    public $name;
    public $email;
    public $text;
    public $verifyCode;

    public function rules()
    {
        return array(
            array('name, text, email', 'required'),
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
        );
    }

}