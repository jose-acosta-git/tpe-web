<div id="app" data-id_review="{$review->id}" class="jumbotron mt-4">
    <h1 class="display-4">Comentarios</h1>
    <hr class="my-4">

{if isset($smarty.session.ID_USER)}
{literal}
    <section class="mb-3">
        <form id="comment-form" class="">
            <h3>Comentar</h3>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Puntuación</label>
                <select class="form-control" name="select-score">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Comentario</label>
                <textarea class="form-control" rows="3" name="input-comment"></textarea>
            </div>
            <div v-if="error" class="alert alert-danger"> {{error}} </div>
            <button type="submit" class="btn btn-primary">Enviar comentario</button>
        </form>
    </section>
    <hr class="my-4">
{/literal}
{/if}
{literal}
    <section>
        <div v-for="comment in comments" class="card text-white bg-secondary mb-3">
            <div class="card-header d-flex justify-content-between align-middle"> 
                <div class="py-2">{{comment.user_email}}</div> 
                {/literal}
                {if (isset($smarty.session.EMAIL_USER) && ($smarty.session.ADMIN))}
                    <button @click="removeComment(comment.id)" type="button" class="btn-remove btn btn-danger">Borrar</button>
                {/if}
                {literal}
            </div> 
            <div class="card-body">
            <h5 class="card-title">Puntuacion: {{comment.score}} </h5>
            <p class="card-text"> {{comment.comment}} </p>
            </div>
        </div>
    </section>
</div>
{/literal}