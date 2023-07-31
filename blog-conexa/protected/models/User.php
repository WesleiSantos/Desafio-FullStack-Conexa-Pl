<?php

class User extends CModel {

    public $name;
    public $username;
    public $password;
    public $email;
    public $photo;
    public $typeUser;

    public function getUsersData()
    {
        return Yii::app()->apiService->getUsersData();
    }

    public function attributeNames()
    {
        return array('name', 'username', 'password', 'email', 'photo', 'typeUser');
    }

    public function rules()
    {
        return array(
            array('name, username, password, email', 'required'),
            array('name, username, password, email', 'length', 'max'=>255),
            array('email', 'email'),
        );
    }

    public function attributeLabels()
    {
        return array();
    }
}