<?php

use Leafo\ScssPhp\Node\Number;

class SiteController extends Controller
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

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex(string $page = '1', string $categoryId = null, string $search = null)
	{
		$categories = Yii::app()->apiService->getAllCategoriesData();
		$posts = Yii::app()->apiService->getAllPostsData(array('_sort' => 'date', '_order' => 'asc', '_page' => $page, '_limit' => 4, 'categoryId' => $categoryId, 'q' => $search));
		$users = Yii::app()->apiService->getAllUsersData();
		$quantPages = Yii::app()->apiService->getCountPostsData(array('categoryId' => $categoryId, 'q' => $search));
		$quantPages = (int)ceil($quantPages / 4);
		$postsModel = $this->mapPostsToModels($posts, $categories, $users);

		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index', array('categories' => $categories, 'posts' => $postsModel, 'quantPages' => $quantPages, 'page' => $page, 'search' => $search, 'categoryId' => $categoryId));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model = new ContactForm;
		if (isset($_POST['ContactForm'])) {
			$model->attributes = $_POST['ContactForm'];
			if ($model->validate()) {
				$name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
				$subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
				$headers = "From: $name <{$model->email}>\r\n" .
					"Reply-To: {$model->email}\r\n" .
					"MIME-Version: 1.0\r\n" .
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
				Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact', array('model' => $model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;

		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login', array('model' => $model));
	}

	public function actionRegister()
	{
		$model = new User;
		// uncomment the following code to enable ajax-based validation
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
			echo 'zap';
		}


		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			if ($model->validate()) {
				Yii::app()->user->setFlash('success', 'Registro realizado com sucesso!');
				$this->redirect('login');
			}
		}
		$this->render('register', array('model' => $model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	private function mapPostsToModels(array $posts, array $categories, array $users): array
	{
		$postsModel = [];

		foreach ($posts as $post) {
			$data = new Post();
			$data->attributes = get_object_vars($post);
			$data->image = $post->image;

			$id = $post->categoryId;
			$data->category = array_reduce($categories, function ($foundCategory, $category) use ($id) {
				return $foundCategory ?: ($category->id == $id ? $category : null);
			});

			$userId = $post->userId;
			$data->user = array_reduce($users, function ($foundUser, $user) use ($userId) {
				return $foundUser ?: ($user->id == $userId ? $user : null);
			});

			$postsModel[] = $data;
		}

		return $postsModel;
	}
}
