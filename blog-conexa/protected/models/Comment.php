<?php
class Comment extends CModel
{
    public $postId;
    public $id;
    public $userId;
    public $body;
    public $date;

    public $user;

    public function attributeNames()
    {
        return array('userId', 'id', 'body', 'postId', 'date');
    }

    public function rules()
    {
        return array(
            array('userId, postId, id, body, date', 'required'),
            array('body', 'length', 'max' => 255),
            array('date', 'length', 'max' => 50)
        );
    }

    public function attributeLabels()
    {
        return array();
    }
}
