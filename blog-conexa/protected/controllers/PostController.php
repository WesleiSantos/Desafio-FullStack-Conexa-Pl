<?php

class PostController extends Controller
{
    /**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page' => array(
				'class' => 'CViewAction',
			),
		);
	}

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionCreate()
    {
        $model = new Post;
        $this->render('create', array('model' => $model));
    }

    public function actionUpdate()
    {
        $model = new Post;
        $this->render('update', array('model' => $model));
    }

    public function actionDelete()
    {
        $model = new Post;
        $this->render('delete', array('model' => $model));
    }

    public function actionView()
    {
        $model = new Post;
        $this->render('view', array('model' => $model));
    }
}