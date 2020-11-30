"use strict"

const PARAMS = window.location.pathname.split("/");
const REVIEW = PARAMS[PARAMS.length-1]

const app = new Vue({
    el: "#app",
    data: {
        comments: [],
    },
});

document.addEventListener('DOMContentLoaded', e => {
    getComments();

    document.querySelector('#comment-form').addEventListener('submit', e => {
        e.preventDefault();
        addComment();
    })
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

async function addComment() {

}