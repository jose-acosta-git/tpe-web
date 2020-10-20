{include 'head.tpl'}
{include 'header.tpl'}

<div class="jumbotron mt-4">
  <h1 class="display-4">{$review->title}</h1>
  <p class="lead">Autor: {$review->author}</p>
  <p class="lead">Categoría: {$review->name_category}</p>
  <hr class="my-4">
  <p>{$review->review}</p>
  <section>
    <a class="btn btn-primary btn-lg" href="filtrar/{$review->id_category}" role="button">Mas reseñas de esta categoria</a>
    {if isset($smarty.session.EMAIL_USER)}
      <a href="eliminar-review/{$review->id}" class="card-link btn btn-danger btn-lg mx-4">Eliminar</a>
      <a href="editar-review/{$review->id}" class="card-link btn btn-primary btn-lg mx-auto">Editar</a>
    {/if}
  </section>
</div>

{include 'footer.tpl'}