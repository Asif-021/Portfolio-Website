
let form = document.getElementById("blog-form");
let title = document.getElementById("title");
let content = document.getElementById("content");


function validateSubmit(e){
    if (title.value.trim() === "" || content.value.trim() === "") {
        e.preventDefault();
        alert("Please fill in the required fields: Title and Content");
        if (title.value.trim() === "") {
            title.classList.add("highlight");
        }
        if (content.value.trim() === "") {
            content.classList.add("highlight");
        }
        if (title.value.trim() === "" && content.value.trim() !== ""){
            content.classList.remove("highlight");
        }
        if (content.value.trim() === "" && title.value.trim() !== "") {
            title.classList.remove("highlight");
        }
        
    }
    else{
        form.submit();
    }
}

function confirmClear() {
    if (window.confirm("Are you sure you want to clear the form?")) {
       form.reset();
    }
}

