{include 'head.tpl'}
{include 'header.tpl'}

<h1 class="row justify-content-center">Categoria: {$categoria->nombre}</h1>

<div class="card my-5">
  <div class="card-body">
    {$categoria->descripcion}
  </div>
</div>

{include 'printReviews.tpl'}

{include 'footer.tpl'}