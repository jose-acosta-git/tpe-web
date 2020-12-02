{literal}
<div class="jumbotron mt-4">
    <h1 class="display-4">Comentarios</h1>
    <hr class="my-4">
{/literal}

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
            <button type="submit" class="btn btn-primary">Enviar comentario</button>
        </form>
    </section>
    <hr class="my-4">
{/literal}
{/if}
{literal}
    <section id="app">
        <div v-for="comment in comments" class="card text-white bg-danger mb-3">
            <div class="card-header"> {{comment.user_email}} </div>
            <div class="card-body">
            <h5 class="card-title">Puntuacion: {{comment.score}} </h5>
            <p class="card-text"> {{comment.comment}} </p>
            </div>
        </div>
    </section>
</div>
{/literal}