const searchbar = document.querySelector('#search-options');
const tags = document.querySelector('#options');
const options = document.querySelector("#options-list");

const scrpit_adress = "get_options.php";

var sel = "a-b-c"

function get_options(search, selected){

    $.ajax({
        url: scrpit_adress,
        method: "post",
        data: {
            selected: selected,
            search: search
        }
    })
    .done(function(data){
        if(data == "EMPTY"){
            options.innerHTML = "";
            return;
        }

        options.innerHTML = data;
    })

}

searchbar.addEventListener("input", function(){

    get_options(this.value, sel);
    console.log(this.value)

})

document.addEventListener("DOMContentLoaded", function(){
    get_options("", sel);

})