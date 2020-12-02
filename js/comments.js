"use strict"

const PARAMS = window.location.pathname.split("/");
const REVIEW = PARAMS[PARAMS.length-1];
var sessionId;

const app = new Vue({
    el: "#app",
    data: {
        comments: [],
    },
});

document.addEventListener('DOMContentLoaded', e => {
    getComments();

    if (sessionId>0) {
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
        id_user: sessionId,
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