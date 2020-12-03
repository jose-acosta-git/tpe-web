<div class="card text-white bg-dark align-self-center" style="width: 25rem; height: 50%;">
    <img
    {if ($item->image == "")}
        src="images/book-preset.png"
    {else}
        src="{$item->image}"
    {/if}
    class="card-img-top sm" alt="user">
    <div class="card-body">
        <h5 class="card-title">{$item->title}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{$item->author}</h6>
        {if !isset($categoria)}
        <p class="card-text">{$item->name_category}</p>
        {/if}
        <a href="detallar/{$item->id}" class="card-link btn btn-secondary btn-sm">Ver Reseña</a>
        {if (isset($smarty.session.EMAIL_USER) && ($smarty.session.ADMIN))}
            <a href="eliminar-review/{$item->id}" class="card-link btn btn-danger btn-sm">Eliminar</a>
            <a href="editar-review/{$item->id}" class="card-link btn btn-primary btn-sm">Editar</a>
        {/if}
    </div>
</div>