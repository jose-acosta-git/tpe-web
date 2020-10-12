<section class="row">

  <form class="col">
    <h3>Agregar reseña</h3>
    <div class="form-group">
      <label for="title">Título</label>
      <input class="form-control" type="text" placeholder="Ej: {$reviews[0]->title}" name="title">
    </div>
    <div class="form-group">
      <label for="title">Autor</label>
      <input class="form-control" type="text" placeholder="Ej: {$reviews[0]->author}" name="author">
    </div>
    <div class="form-group">
      <label for="categorySelect">Categoría</label>
      <select class="form-control" id="categorySelect" name="categorySelect">
        {foreach from=$categories item=category}
            <option>{$category->name}</option>
        {/foreach}}
      </select>
    </div>
    <div class="form-group">
      <label for="review">Reseña</label>
      <textarea class="form-control" id="review" name="review" rows="3"></textarea>
    </div>
     <button type="submit" class="btn btn-primary">Agregar</button>
  </form>

  <form class="col align-self-center">
    <h3>Agregar categoría</h3>
    <div class="form-group">
      <label for="name">Nombre</label>
      <input class="form-control" type="text" placeholder="Ej: {$categories[0]->name}" name="name">
    </div>
    <div class="form-group">
      <label for="description">Descripción</label>
      <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
  </form>

</section>