{include 'head.tpl'}
{include 'header.tpl'}

<div class="jumbotron mt-4">
  <h1 class="display-4">{$review->title}</h1>
  <p class="lead">Autor: {$review->author}</p>
  <p class="lead">Categoría: {$review->name_category}</p>
  <hr class="my-4">
  <p>{$review->review}</p>
  <a class="btn btn-primary btn-lg" href="filtrar/{$review->id_category}" role="button">Mas reseñas de esta categoria</a>
</div>

{include 'footer.tpl'}