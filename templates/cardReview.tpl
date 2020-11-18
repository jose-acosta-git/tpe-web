<div class="card col text-white bg-dark align-self-center" style="width: 18rem; height: 50%;">
    <div class="card-body">
        <h5 class="card-title">{$review->title}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{$review->author}</h6>
        {if !isset($categoria)}
        <p class="card-text">{$review->name_category}</p>
        {/if}
        <a href="detallar/{$review->id}" class="card-link btn btn-secondary btn-sm">Ver Reseña</a>
        {if isset($smarty.session.EMAIL_USER)}
            <a href="eliminar-review/{$review->id}" class="card-link btn btn-secondary btn-sm">Eliminar</a>
            <a href="editar-review/{$review->id}" class="card-link btn btn-secondary btn-sm">Editar</a>
        {/if}
    </div>
</div>