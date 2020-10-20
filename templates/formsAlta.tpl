{include 'head.tpl'}
{include 'header.tpl'}

<section class="row">

  <form class="col form-translucent" method="POST" action="insertar-review">
    <h3>Agregar reseña</h3>
    <div class="form-group">
      <label for="title">Título</label>
      <input class="form-control" type="text" placeholder="Ej: One Piece" name="title" required>
    </div>
    <div class="form-group">
      <label for="title">Autor</label>
      <input class="form-control" type="text" placeholder="Ej: Eiichirō Oda" name="author" required>
    </div>
    <div class="form-group">
      <label for="categorySelect">Categoría</label>
      <select class="form-control" id="categorySelect" name="category">
        {foreach from=$categories item=category}
            <option value="{$category->id}">{$category->name}</option>
        {/foreach}}
      </select>
    </div>
    <div class="form-group">
      <label for="review">Reseña</label>
      <textarea class="form-control" id="review" name="review" rows="3" required></textarea>
    </div>
     <button type="submit" class="btn btn-primary">Agregar</button>
  </form>

  <form class="col align-self-center form-translucent" method="POST" action="insertar-categoria">
    <h3>Agregar categoría</h3>
    <div class="form-group">
      <label for="name">Nombre</label>
      <input class="form-control" type="text" placeholder="Ej: Aventura" name="name" required>
    </div>
    <div>
      <label for="description">Descripción</label>
      <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
  </form>

</section>

{include 'footer.tpl'}