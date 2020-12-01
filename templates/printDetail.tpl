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
    {if (isset($smarty.session.EMAIL_USER) && ($smarty.session.ADMIN))}
      <a href="eliminar-review/{$review->id}" class="card-link btn btn-danger btn-lg mx-4">Eliminar</a>
      <a href="editar-review/{$review->id}" class="card-link btn btn-primary btn-lg mx-auto">Editar</a>
    {/if}
  </section>
</div>

{include 'vue/comments.vue'}

{if isset($smarty.session.ID_USER)}
  <script>var sessionId = {$smarty.session.ID_USER};</script>
{/if}

<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

<!-- incluyo JS para CSR de comentarios -->
<script src="js/comments.js"></script>

{include 'footer.tpl'}