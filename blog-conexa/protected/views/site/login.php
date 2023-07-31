<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
	'Login',
);
?>

<?php
// Verificar se existe a mensagem flash de sucesso na sessão
if (Yii::app()->user->hasFlash('success')) {
    // Exibir a mensagem de sucesso
    echo '<div class="alert alert-success  d-flex justify-content-between" role="alert">'
        . '<div>'
        . Yii::app()->user->getFlash('success')
        . '</div>'
        .'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
        . '</div>';
}
?>

<section class="page login d-flex justify-content-center align-content-center flex-wrap h-100 p-3">
	<div class="card col-xl-4 col-md-6 col-8">
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
			<div class="d-flex justify-content-center">
				<button type="submit" class="btn btn-primary">Login</button>
			</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</section>