{include 'head.tpl'}
{include 'header.tpl'}

<h1 class="row justify-content-center">Categoria: {$categoria->name}</h1>

<div class="card my-5">
  <div class="card-body">
    {$categoria->description}
  </div>
</div>

{include 'printItems.tpl'}

{include 'footer.tpl'}