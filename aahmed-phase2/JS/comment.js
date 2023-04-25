let form = document.getElementById("comment-form");
let comment = document.getElementById("comment");

form.addEventListener('submit', validateSubmit);

function validateSubmit(e){
    if (comment.value.trim() === "") {
        e.preventDefault();
        alert("You cannot post an empty comment.");
    }
    else{
        form.submit();
    }
}
