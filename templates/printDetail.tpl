{include 'head.tpl'}
{include 'header.tpl'}

<div class="jumbotron mt-4">
  <h1 class="display-4">{$review->titulo}</h1>
  <p class="lead">Autor: {$review->autor}</p>
  <p class="lead">Categoría: {$review->categoria}</p>
  <hr class="my-4">
  <p>{$review->review}</p>
  <a class="btn btn-primary btn-lg" href="filtrar/{$review->id_categoria}" role="button">Mas reseñas de esta categoria</a>
</div>

{include 'footer.tpl'}