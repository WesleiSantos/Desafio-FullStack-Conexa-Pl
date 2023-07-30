<?php require_once 'header.php'; ?>

<div class="container-fluid px-0" id="page">

	<div id="header" class="bg-primary d-flex justify-content-between ps-4 pe-2 py-2">
		<div id="logo">
			<a href="<?php echo Yii::app()->request->baseUrl . '/' ?>">
				<img src="https://storage.googleapis.com/site-upload-storage/sites/conexa.png" alt="Logo">
			</a>
		</div>

		<ul class="nav">
			<li class="nav-item my-auto">
				<a class="nav-link active" aria-current="page" href="<?= Yii::app()->request->baseUrl . '/' ?>">Home</a>
			</li>
			<li class="nav-item my-auto">
				<a class="nav-link" href="#">Sobre</a>
			</li>
			<li class="nav-item my-auto">
				<a class="nav-link" href="https://conexa.app/">Site oficial</a>
			</li>
		</ul>
		<?php if (Yii::app()->user->getIsGuest()) : ?>
			<!-- Se o usuário está deslogado, exiba o link de login -->
			<div class="buttons-group my-auto">
				<a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl . '/site/login' ?>">Login</a>
				<a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl . '/site/register' ?>">Cadastre-se</a>
			</div>
		<?php else : ?>
			<div class="dropdown d-flex my-auto">
				<span class="name text-white align-middle h5 my-auto px-2"><?php echo Yii::app()->user->name; ?></span>
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<i class="bi bi-person-circle h3"></i>
				</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
					<li><a class="dropdown-item" href="<?php echo Yii::app()->createUrl('site/logout'); ?>">Sair</a></li>
				</ul>
			</div>
		<?php endif; ?>

	</div><!-- header -->

	<div id="mainmenu">
		<main class="h-100">
			<?php echo $content; ?>
		</main>
	</div><!-- mainmenu -->
	<?php require_once 'footer.php'; ?>