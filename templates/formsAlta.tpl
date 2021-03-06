{include 'head.tpl'}
{include 'header.tpl'}

<section>

  <form class="col form-translucent" method="POST" action="insertar-review" enctype="multipart/form-data">
    <h3 class="texto-blanco">Agregar reseña</h3>
    <div class="form-group">
      <label for="title" class="texto-blanco">Título</label>
      <input class="form-control" type="text" placeholder="Ej: One Piece" name="title" required>
    </div>
    <div class="form-group">    
        <label class="text-white">Imagen</label>
        <input type="file" name="image" id="imageToUpload" class="text-white">
    </div>
    <div class="form-group">
      <label for="title" class="texto-blanco">Autor</label>
      <input class="form-control" type="text" placeholder="Ej: Eiichirō Oda" name="author" required>
    </div>
    <div class="form-group">
      <label for="categorySelect" class="texto-blanco">Categoría</label>
      <select class="form-control" id="categorySelect" name="category">
        {foreach from=$categories item=category}
            <option value="{$category->id}">{$category->name}</option>
        {/foreach}}
      </select>
    </div>
    <div class="form-group">
      <label for="review" class="texto-blanco">Reseña</label>
      <textarea class="form-control" id="review" name="review" rows="3" required></textarea>
    </div>
     <button type="submit" class="btn btn-primary">Agregar</button>
  </form>

  <form class="col align-self-center form-translucent mt-4" method="POST" action="insertar-categoria">
    <h3 class="texto-blanco">Agregar categoría</h3>
    <div class="form-group">
      <label for="name" class="texto-blanco">Nombre</label>
      <input class="form-control" type="text" placeholder="Ej: Aventura" name="name" required>
    </div>
    <div>
      <label for="description" class="texto-blanco">Descripción</label>
      <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Agregar</button>
  </form>

</section>

{include 'footer.tpl'}