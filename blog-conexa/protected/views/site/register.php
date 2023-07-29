<?php
/* @var $this SiteController */
/* @var $model User */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Cadastro';
$this->breadcrumbs = array(
    'Cadastro',
);
?>

<section class="login d-flex justify-content-center align-content-center flex-wrap h-100">
    <div class="card w-25">
        <div class="card-body">
            <h5 class="card-title text-center">Cadastro</h5>
            <?php $form = $this->beginWidget('CActiveForm', array(
                'id' => 'register-form',
                'enableClientValidation' => true,
                'enableAjaxValidation' => false,
            )); ?>
            <div class="mb-3">
                <?php echo $form->labelEx($model, 'Nome:', array('class' => 'form-label')); ?>
                <?php echo $form->textField($model, 'name', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'name', array('class' => 'error text-danger')); ?>
            </div>
            <div class="mb-3">
                <?php echo $form->labelEx($model, 'Usuario:', array('class' => 'form-label')); ?>
                <?php echo $form->textField($model, 'username', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'username', array('class' => 'error text-danger')); ?>
            </div>
            <div class="mb-3">
                <?php echo $form->labelEx($model, 'Email:', array('class' => 'form-label')); ?>
                <?php echo $form->textField($model, 'email',  array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'email', array('class' => 'error text-danger')); ?>
            </div>
            <div class="mb-3">
                <?php echo $form->labelEx($model, 'Senha'); ?>
                <?php echo $form->passwordField($model, 'password', array('type' => 'password', 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'password', array('class' => 'error text-danger')); ?>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
            <?php $this->endWidget(); ?>
        </div>
</section>