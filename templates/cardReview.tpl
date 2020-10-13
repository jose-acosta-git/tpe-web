<div class="card col" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{$review->title}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{$review->author}</h6>
        {if !isset($categoria)}
        <p class="card-text">{$review->name_category}</p>
        {/if}
        <a href="detallar/{$review->id}" class="card-link">Ver Reseña</a>
        <a href="eliminar/{$review->id}" class="card-link">Eliminar</a>
        <a href="editarReview/{$review->id}" class="card-link">Editar</a>
    </div>
</div>