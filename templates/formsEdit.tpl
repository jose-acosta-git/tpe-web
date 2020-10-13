{include 'head.tpl'}
{include 'header.tpl'}

<section class="row">

{if isset($review)}
    <form class="col" method="POST" action="editReview/{$review->id}">
        <h3>Editar reseña</h3>
        <div class="form-group">
            <label for="title">Título</label>
            <input class="form-control" type="text" name="title" value="{$review->title}">
        </div>
        <div class="form-group">
            <label for="title">Autor</label>
            <input class="form-control" type="text" name="author" value="{$review->author}">
        </div>
        <div class="form-group">
            <label for="categorySelect">Categoría</label>
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
            <label for="review">Reseña</label>
            <textarea class="form-control" id="review" name="review" rows="3">{$review->review}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
{/if}

{if isset($categoria)}
    <form class="col align-self-center" method="POST" action="insertarCat">
        <h3>Agregar categoría</h3>
        <div class="form-group">
            <label for="name">Nombre</label>
            <input class="form-control" type="text" placeholder="Ej: Aventura" name="name">
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
{/if}

</section>

{include 'footer.tpl'}