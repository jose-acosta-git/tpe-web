{assign var=i value="0"}
{assign var=skip value=false}

<h1 class="row justify-content-center">{$titulo}</h1>

<section class="container">

    {foreach from=$items item=item}

        {if $i % 2 == 0 && !$skip}
            {if $i != 0 && !$skip}
                </div>
            {/if}
            <div class="mt-5 row d-flex justify-content-around">
        {/if}
        {if ($itemType == 'reviews')}
            {include 'cardReview.tpl'}
        {else}
            {if ($smarty.session.EMAIL_USER != $item->email)}
                {include 'cardUser.tpl'}
            {else}
                {$skip = true}
            {/if}
        {/if}
        {assign var=i value=$i+1}

    {/foreach}

</section>