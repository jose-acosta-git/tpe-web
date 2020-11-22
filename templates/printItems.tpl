{assign var=i value="0"}

<h1 class="row justify-content-center">{$titulo}</h1>

<section class="container">

    {foreach from=$items item=item}

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
        {if ($itemType == 'reviews')}
            {include 'cardReview.tpl'}
        {else}
            {include 'cardUser.tpl'}
        {/if}
        {if (($i+1) == $cantidad) && ($cantidad % 2 != 0)}
            <div class="col" style="width: 18rem;"></div>
        {/if}
        {assign var=i value=$i+1}

    {/foreach}

</section>