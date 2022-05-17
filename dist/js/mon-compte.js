var editBTN = document.getElementById("editBTN");
var closeBTN = document.getElementById("closeBTN"); 
var editBlock = document.getElementById("modify-account"); 
var seeBlock = document.getElementById("view-account");
var changePassword = document.getElementById("changePassword");
var changePasswordBTN = document.getElementById("changePasswordBTN");
var pass = document.getElementById("pass");
var pass2 = document.getElementById("pass2");
var erreurSTRING = document.getElementById("erreurSTRING");
var savePassBTN = document.getElementById("savePassBTN");

editBTN.addEventListener("click", function(){
    editBlock.classList.remove("hidden");
    seeBlock.classList.add("hidden");
})

closeBTN.addEventListener("click", function(){
    editBlock.classList.add("hidden");
    seeBlock.classList.remove("hidden");
})

changePasswordBTN.addEventListener("click", function(){
    changePassword.classList.remove("hidden");
    changePasswordBTN.classList.add("hidden");  
})

pass.addEventListener("input", checkIfPasswordIdentical);
pass2.addEventListener("input", checkIfPasswordIdentical);


function checkIfPasswordIdentical(){
    if (pass.value == pass2.value){
        erreurSTRING.classList.add("hidden");
        savePassBTN.disabled = false;
        savePassBTN.classList.add("opacity-100");
        savePassBTN.classList.remove("opacity-50");
        savePassBTN.classList.remove("cursor-not-allowed");
        savePassBTN.classList.add("cursor-pointer");
    } else {
        erreurSTRING.classList.remove("hidden");
        savePassBTN.disabled = true;
        savePassBTN.classList.remove("opacity-100");
        savePassBTN.classList.add("opacity-50");
        savePassBTN.classList.add("cursor-not-allowed");
        savePassBTN.classList.remove("cursor-pointer");
    }

}