{include 'head.tpl'}
{include 'header.tpl'}

<section class="row">

{if isset($review)}
    <form class="col form-translucent" method="POST" action="edit-review/{$review->id}">
        <h3 class="texto-blanco">Editar reseña</h3>
        <div class="form-group">
            <label for="title" class="texto-blanco">Título</label>
            <input class="form-control" type="text" name="title" value="{$review->title}" required>
        </div>
        <div class="form-group">
            <label for="title" class="texto-blanco">Autor</label>
            <input class="form-control" type="text" name="author" value="{$review->author}" required>
        </div>
        <div class="form-group">
            <label for="categorySelect" class="texto-blanco">Categoría</label>
            <select class="form-control" id="categorySelect" name="category">
                {foreach from=$categories item=category}
                    {if ($category->id == $review->id_category)}
                        <option value="{$category->id}" selected>{$category->name}</option>
                    {else}
                        <option value="{$category->id}">{$category->name}</option>
                    {/if}
                {/foreach}}
            </select>
        </div>
        <div class="form-group">
            <label for="review" class="texto-blanco">Reseña</label>
            <textarea class="form-control" id="review" name="review" rows="3" required>{$review->review}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
{/if}

{if isset($categoria)}
    <form class="col align-self-center form-translucent" method="POST" action="edit-category/{$categoria->id}">
        <h3 class="texto-blanco">Editar categoría</h3>
        <div class="form-group">
            <label for="name" class="texto-blanco">Nombre</label>
            <input class="form-control" type="text" placeholder="Ej: Aventura" name="name" value="{$categoria->name}" required>
        </div>
        <div class="form-group">
            <label for="description" class="texto-blanco">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{$categoria->description}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
{/if}

</section>

{include 'footer.tpl'}