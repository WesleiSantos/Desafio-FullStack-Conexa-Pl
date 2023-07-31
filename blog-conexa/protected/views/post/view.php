<?php
/* @var $this PostController */
$this->pageTitle = Yii::app()->name;
?>

<section class="post-index">
    <section class="post-top-page d-flex justify-content-center align-content-center bg-primary flex-wrap d-inline-block p-3">
        <div class="card  w-50 bg-primary border-0 text-center">
            <div class="card-body p-0 mb-1 h-100 d-flex flex-column">
                <div class="mb-auto">
                    <h5 class="card-title text-white h3"><?php echo $model->title ?></h5>
                </div>
                <div class="mt-1">
                    <p class="card-text mb-1 fw-bold">Autor:<small> <?php echo $model->user->name ?></small></p>
                    <p class="card-text mb-1 fw-bold">Categoria:<small> <?php echo $model->category->name ?></small></p>
                </div>
            </div>
        </div>
    </section>
    <section class="post-body-page container p-2 w-75">
        <div class="card mb-3 border-0 row">
            <div class="d-flex justify-content-center">
                <img src="<?php echo $model->image ?> " class="img-fluid rounded h-25 w-50" style="object-fit: cover;" alt="...">
            </div>
            <div class="card-body">
                <p class="card-text"><?php echo $model->body ?></p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Publicado em <?php echo (new DateTime($model->date))->format('d/m/Y G:i:s'); ?></small>
            </div>
        </div>
        <div class="post-comment row">
            <div class=" d-flex flex-column">
                <div class="d-flex">
                    <h2 class="text-center"><?php echo count($model->comments) ?> Comentários</h2>
                </div>
                <?php foreach ($model->comments as $comment) : ?>
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="bi bi-person-circle h3"></i>
                            <span class="fw-bold"><?php echo $comment->user->name ?></span>
                        </div>
                        <div class="card-body">
                            <p class="card-text"> <?php echo $comment->body ?></p>
                        </div>
                        <div class="card-footer text-muted">
                            Data do Comentário : <?php echo (new DateTime($comment->date))->format('d/m/Y G:i:s'); ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="card  d-flex flex-column">
                <div class="card-body ">
                    <div class="mb-auto">
                        <h5 class="card-title h4">Insira seu comentário:</h5>
                    </div>
                    <div class="mb-3">
                        <?php
                        $comment = new Comment();
                        // Crie o formulário
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'comment-form',
                            'enableClientValidation' => true,
                        ));

                        // Adicione o campo de texto textarea
                        echo $form->textarea($comment, 'body', ['rows' => 6, 'class' => 'form-control', 'placeholder' => 'Digite seu comentário aqui...']);

                        // Adicione o botão de envio
                        echo CHtml::submitButton('Enviar', ['class' => 'btn btn-primary w-100 mt-2']);

                        // Feche o formulário
                        $this->endWidget();
                        ?>

                    </div>
                </div>
            </div>

        </div>

    </section>

</section>