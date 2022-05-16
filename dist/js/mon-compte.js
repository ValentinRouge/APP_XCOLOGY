var editBTN = document.getElementById("editBTN");
var closeBTN = document.getElementById("closeBTN"); 
var editBlock = document.getElementById("modify-account"); 
var seeBlock = document.getElementById("view-account");

editBTN.addEventListener("click", function(){
    editBlock.classList.remove("hidden");
    seeBlock.classList.add("hidden");
})

closeBTN.addEventListener("click", function(){
    editBlock.classList.add("hidden");
    seeBlock.classList.remove("hidden");
})