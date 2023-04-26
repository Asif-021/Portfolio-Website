let postform = document.getElementById("deletePost");

postform.addEventListener('submit', validateDelete);

function validateDelete(e){

    e.preventDefault();

    if (window.confirm("Are you sure you want to permanently delete the post?")) {
        postform.submit();
     }

}