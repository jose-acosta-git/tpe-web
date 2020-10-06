<div class="card col" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{$review->titulo}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{$review->autor}</h6>
        {if !isset($categoria)}
        <p class="card-text">{$review->categoria}</p>
        {/if}
        <a href="#" class="card-link">Ver Reseña</a>
        <a href="#" class="card-link">Más reseñas de esta categoría</a>
    </div>
</div>