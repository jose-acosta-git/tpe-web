"use strict"

const REVIEW = document.querySelector('#comments-card').dataset.id_review;
const SESSION_ID = document.querySelector('head').dataset.id_user;

const app = new Vue({
    el: "#app",
    data: {
        comments: [],
    },
    methods: {
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

async function getComments() {
    try {
        const response = await fetch(`api/comments/${REVIEW}`);
        const comments = await response.json();
        app.comments = comments;
    } catch (e) {
        console.log(e);
    }
}

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

        getComments();

    } catch(e) {
        console.log(e);
    }
}

