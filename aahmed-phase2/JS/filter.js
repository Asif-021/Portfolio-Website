
let filterform = document.getElementById("filter-form");
let filtermonth = document.getElementById("month");
let filteryear = document.getElementById("year");

filterform.addEventListener('submit', validateFilter);



function validateFilter(e){

    if(filtermonth.value === "" || filteryear.value === ""){
        e.preventDefault();
        window.alert("Please choose a month and year");
    }
    else{
        filterform.submit();
    }


}