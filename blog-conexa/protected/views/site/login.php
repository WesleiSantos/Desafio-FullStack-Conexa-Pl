<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
	'Login',
);
?>
<section class="login d-flex justify-content-center align-content-center flex-wrap h-100">
	<div class="card" style="width: 18rem;">
		<div class="card-body">
			<h5 class="card-title text-center">Login</h5>
			<form>
				<div class="mb-3">
					<label for="inputUser" class="form-label">Usuario</label>
					<input type="text" class="form-control" id="inputUser" >
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Senha</label>
					<input type="password" class="form-control" id="exampleInputPassword1">
				</div>
				<div class="mb-3 form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Lembrar-se</label>
				</div>
				<button type="submit" class="btn btn-primary">Login</button>
			</form>
		</div>
	</div>
</section>