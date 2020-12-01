{literal}
<div class="jumbotron mt-4">
    <h1 class="display-4">Comentarios</h1>
    <hr class="my-4">
    <section>
        <form id="comment-form" class="">
            <h3>Comentar</h3>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Puntuación</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Comentario</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar comentario</button>
        </form>
    </section>
      
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