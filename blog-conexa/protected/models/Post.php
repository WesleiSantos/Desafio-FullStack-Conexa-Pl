<?php

class Post extends CModel {

    public $userId;
    public $id;
    public $title;
    public $body;
    public $categoryId;
    public $date;
    public $image;

    public $category;
    public $user;


    public function getPostData()
    {
        return Yii::app()->apiService->getPostData();
    }

    public function attributeNames()
    {
        return array('userId', 'id', 'title', 'body', 'categoryId', 'date', 'image');
    }

    public function rules()
    {
        return array(
            array('userId, id, title, body, categoryId, date', 'required'),
			array('photo', 'length', 'max'=>500),
            array('body', 'length', 'max'=>255),
            array('title', 'length', 'max'=>50),
        );
    }

    public function attributeLabels()
    {
        return array();
    }
}