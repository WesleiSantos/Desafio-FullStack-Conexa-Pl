<?php

class Category extends CModel {

    public $id;
    public $name;

    public function getCategoryData()
    {
        return Yii::app()->apiService->getCategoryData();
    }

    public function attributeNames()
    {
        return array('id', 'name');
    }

    public function rules()
    {
        return array(
            array('id, name', 'required')
        );
    }

    public function attributeLabels()
    {
        return array();
    }
}