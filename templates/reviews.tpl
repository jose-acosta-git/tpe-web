{include 'head.tpl'}
{include 'header.tpl'}

{assign var=i value="0"}

<h1 class="row justify-content-center">Reviews mas destacadas</h1>

{foreach from=$reviews item=review}

    {if $i % 2 == 0}
        {if $i != 0}
            </div>
        {/if}
        <div class="mt-5 row">
        {if ($i+1) == $cantidad}
            <div class="col" style="width: 18rem;"></div>
        {/if}
    {else}
        <div class="col" style="width: 18rem;"></div>
    {/if}
    <div class="card col" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{$review->titulo}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{$review->autor}</h6>
            <p class="card-text">{$review->id_categoria}</p>
            <a href="#" class="card-link">Ver Reseña</a>
            <a href="#" class="card-link">Más reseñas de esta categoría</a>
        </div>
    </div>
    {if (($i+1) == $cantidad) && ($cantidad % 2 != 0)}
        <div class="col" style="width: 18rem;"></div>
    {/if}
    {assign var=i value=$i+1}

{/foreach}

{include 'footer.tpl'}