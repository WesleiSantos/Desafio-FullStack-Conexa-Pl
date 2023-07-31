<?php
/* @var $this PostController */
$this->pageTitle = Yii::app()->name;
?>

<section class="top-page d-flex justify-content-center align-content-center bg-primary flex-wrap d-inline-block p-3">
	<div class="card w-50 bg-primary border-0 text-center">
		<div class="card-body p-0 mb-3">
			<h5 class="card-title text-white h3">Blog Conexa</h5>
			<p class="card-text text-wrap text-white fw-bold">Somos especialistas em empresas de serviços recorrentes e queremos compartilhar tudo que estamos aprendendo. Vamos Juntos?</p>
		</div>
		<div class="input-group">
			<form class="w-100" id="searchForm" action="<?= Yii::app()->createUrl('/') ?>" method="get">
				<div class="input-group">
					<input class="form-control form-control-lg" id="searchInput" type="text" name="search" placeholder="Buscar" aria-label=".form-control-lg" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
					<button class="btn btn-outline-white bg-white border-0" type="submit">
						<i class="bi bi-search"></i>
					</button>
					<button type="button" class="btn btn-outline-white bg-white dropdown dropdown-toggle-split  rounded-end  border-0" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-filter"></i>
					</button>
					<ul class="dropdown-menu dropdown-menu-end">
						<li><a class="dropdown-item" href="<?php echo Yii::app()->createUrl('/'); ?>">Todos</a></li>
						<?php foreach ($categories as $category) : ?>
							<li><a class="dropdown-item" href="?categoryId=<?php echo $category->id ?>"><?php echo $category->name; ?></a></li>
						<?php endforeach; ?>
					</ul>
			</form>
		</div>
	</div>
</section>
<?php
// Verificar se existe a mensagem flash de error na sessão
if (Yii::app()->user->hasFlash('unauthenticated')) {
	// Exibir o modal com a mensagem de error
	echo '<div class="alert alert-danger  d-flex justify-content-between" role="alert">'
		. '<div>'
		. Yii::app()->user->getFlash('unauthenticated')
		. '</div>'
		. '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
		. '</div>';
}
?>

<section class="posts-page p-2">
	<?php  if(Yii::app()->user->getIsGuest()): ?>
	<div class="alert alert-danger" role="alert">
		<h4 class="alert-heading">Ação de Login necessária.</h4>
		<p>Para ter acesso completo ao nosso conteúdo é necessário realizar login em nosso site.</p>
		<hr>
		<a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl . '/site/login' ?>">Login</a>
	</div>
	<?php endif; ?>
	<div class="m-3">
		<h2 class="text-center">Últimos posts</h2>
	</div>
	<div class="row row-cols-1 row-cols-md-2 g-4">
		<?php foreach ($posts as $post) : ?>
			<div class="col">
				<div class="card h-100">
					<div class="row g-0 h-100">
						<div class="col-md-4">
							<img src="<?php echo $post->image ?> " class="img-fluid rounded-start h-100 w-100" style="object-fit: cover;" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body h-100 d-flex flex-column">
								<div class="mb-auto">
									<h5 class="card-title"><?php echo $post->title ?></h5>
									<p class="card-text line-clamp-2"> <?php echo $post->body ?></p>
								</div>
								<div class="mt-1">
									<p class="card-text mb-1 fw-bold">Autor:<small class="text-muted"> <?php echo $post->user->name ?></small></p>
									<p class="card-text mb-1 fw-bold">Categoria:<small class="text-muted"> <?php echo $post->category->name ?></small></p>
								</div>
							</div>
						</div>

					</div>
					<div class="card-footer d-flex align-items-center justify-content-between">
						<small class="text-muted">Publicado em <?php echo (new DateTime($post->date))->format('d/m/Y G:i:s'); ?></small>
						<span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Necessário realizar login.">
							<a class="btn btn-outline-primary float-end <?php echo Yii::app()->user->getIsGuest() ? ' disabled' : ''; ?>" href="<?php echo Yii::app()->createUrl('post/view', array('postId' => $post->id)); ?>">Ler mais</a>
						</span>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="row mt-3">
		<nav aria-label="..." class="d-flex justify-content-center">
			<ul class="pagination pagination-lg">
				<?php for ($index = 1; $index <= $quantPages; $index++) : ?>
					<li class="page-item <?php echo $index == intval($page)  ? 'active' : '' ?>" aria-current="page">
						<a class="page-link" href="?page=<?php echo $index ?>"><?php echo $index ?> </a>
					</li>
				<?php endfor ?>
			</ul>
		</nav>
	</div>
</section>

<script>
	$(document).ready(function() {
		$('#searchForm').on('submit', function(event) {
			var searchValue = $('#searchInput').val();

			if (searchValue === '') {
				event.preventDefault();
				var urlWithoutSearch = window.location.href.split('?')[0];
				window.location.href = urlWithoutSearch;
			}
		});
	});
</script>