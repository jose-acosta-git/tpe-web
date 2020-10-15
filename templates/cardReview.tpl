<div class="card col text-white bg-dark" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{$review->title}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{$review->author}</h6>
        {if !isset($categoria)}
        <p class="card-text">{$review->name_category}</p>
        {/if}
        <a href="detallar/{$review->id}" class="card-link btn btn-secondary btn-sm">Ver Reseña</a>
        {if isset($smarty.session.EMAIL_USER)}
            <a href="eliminar/{$review->id}" class="card-link btn btn-secondary btn-sm">Eliminar</a>
            <a href="editarReview/{$review->id}" class="card-link btn btn-secondary btn-sm">Editar</a>
        {/if}
    </div>
</div>