"use strict"

const REVIEW = document.querySelector('#app').dataset.id_review;
const SESSION_ID = document.querySelector('head').dataset.id_user;

const app = new Vue({
    el: "#app",
    data: {
        comments: [],
        error: "",
    },
    methods: {
        //elimina un comentario de la db
        removeComment(id) { 
            fetch(`api/comments/${id}`, {
                method: 'DELETE',
            }).then(
                getComments()
            );
        }
    }
});

document.addEventListener('DOMContentLoaded', e => {
    getComments();
    if (SESSION_ID>0) {
        document.querySelector('#comment-form').addEventListener('submit', addComment);
    }
    
})

//Consume la API e imprime los comentarios que ésta devuelve
async function getComments() {
    try {
        const response = await fetch(`api/comments/${REVIEW}`);
        const comments = await response.json();
        app.comments = comments;
    } catch (e) {
        console.log(e);
    }
}

//Agrega un comentario a la db mediante la API
async function addComment(e) {
    e.preventDefault();
    const formData = new FormData(this);
    const comment = {
        comment: formData.get('input-comment'),
        score: formData.get('select-score'),
        id_review: REVIEW,
        id_user: SESSION_ID,
    }

    try {
        const response = await fetch('api/comments' , {
            method: 'POST',
            headers: {'Content-Type': 'application/json'}, 
            body: JSON.stringify(comment)
        });
        if (response.ok) {
            app.error = "";
            getComments();
        } else {
            app.error = "Por favor, ingrese una puntuación del 1 al 5";
        }

    } catch(e) {
        console.log(e);
    }
}

