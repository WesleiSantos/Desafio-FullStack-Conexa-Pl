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
			<?php $form = $this->beginWidget('CActiveForm', array(
				'id' => 'login-form',
				'enableClientValidation' => true,
			)); ?>
			<div class="mb-3">
				<?php echo $form->labelEx($model, 'Usuario:', array('class' => 'form-label')); ?>
				<?php echo $form->textField($model, 'username', array('class' => 'form-control')); ?>
				<?php echo $form->error($model, 'username', array('class' => 'error text-danger')); ?>
			</div>
			<div class="mb-3">
				<?php echo $form->labelEx($model, 'Senha:', array('class' => 'form-label')); ?>
				<?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
				<?php echo $form->error($model, 'password', array('class' => 'error text-danger')); ?>
			</div>
			<div class="mb-3 form-check">
				<?php echo $form->checkBox($model, 'rememberMe', array('class' => 'form-check-input')); ?>
				<?php echo $form->label($model,  'Lembrar', array('class' => 'form-check-label')); ?>
				<?php echo $form->error($model, 'rememberMe', array('class' => 'error text-danger')); ?>
			</div>
			<button type="submit" class="btn btn-primary">Login</button>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</section>