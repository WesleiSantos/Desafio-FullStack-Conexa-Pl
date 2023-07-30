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

    public function getAllUsersData()
    {
        $data = Yii::app()->curl->get($this->baseUrl.'users');
        return json_decode($data);  
    }

    public function getAllCategoriesData()
    {
        $data = Yii::app()->curl->get($this->baseUrl.'categories');
        return json_decode($data);
    }

    public function getAllPostsData(Array $params = array())
    {
        $data = Yii::app()->curl->get($this->baseUrl.'posts', $params);
        return json_decode($data);
    }

    public function getCountPostsData(Array $params = array())
    {
        $data = Yii::app()->curl->get($this->baseUrl.'posts',$params);
        $data = json_decode($data);
        $quant_pages = count($data);
        return $quant_pages;
    }
}