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

    public function actionView(string $postId)
    {
        if(Yii::app()->user->getIsGuest()){
            Yii::app()->user->setFlash('unauthenticated', 'Necessário estar logado para acessar essa pagina.');
            $this->redirect('/');
        }
        $post = Yii::app()->apiService->getPostData($postId,array('_embed'=>'comments'));
        $categories = Yii::app()->apiService->getAllCategoriesData();
		$users = Yii::app()->apiService->getAllUsersData();
        $model = Yii::app()->helper->createPostModel($post, $categories, $users);
        $comments = array();
        foreach($post->comments as $comment){
			$comments[] = Yii::app()->helper->createCommentModel($comment, $users);
		}
        $model->comments = $comments;
        $this->render('view', array('model' => $model));
    }
}