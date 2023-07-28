<?php
use CComponent;
use Yii;

class ApiService extends CComponent
{
    public $baseUrl;
    public function init()
    {
        $this->baseUrl = Yii::app()->params['apiBaseUrl'];
    }

    public function getUsersData()
    {
        return Yii::app()->curl->get($this->baseUrl.'users');
    }
}