window.addEventListener("DOMContentLoaded", (event) => {
    var IMGS = [];
    var img_names = ['M_babouin','M_girafe', 'M_guepard', 'M_leopard','M_lion','M_rhino','M_toucan','M_zebre','M_babouin','M_girafe', 'M_guepard', 'M_leopard','M_lion','M_rhino','M_toucan','M_zebre']; 

    var IMG11 = document.getElementById("IMG1-1");
    IMGS.push(IMG11);
    var IMG12 = document.getElementById("IMG1-2");
    IMGS.push(IMG12);
    var IMG13 = document.getElementById("IMG1-3");
    IMGS.push(IMG13);
    var IMG14 = document.getElementById("IMG1-4");
    IMGS.push(IMG14);

    var IMG21 = document.getElementById("IMG2-1");
    IMGS.push(IMG21);
    var IMG22 = document.getElementById("IMG2-2");
    IMGS.push(IMG22);
    var IMG23 = document.getElementById("IMG2-3");
    IMGS.push(IMG23);
    var IMG24 = document.getElementById("IMG2-4");
    IMGS.push(IMG24);

    var IMG31 = document.getElementById("IMG3-1");
    IMGS.push(IMG31);
    var IMG32 = document.getElementById("IMG3-2");
    IMGS.push(IMG32);
    var IMG33 = document.getElementById("IMG3-3");
    IMGS.push(IMG33);
    var IMG34 = document.getElementById("IMG3-4");
    IMGS.push(IMG34);

    var IMG41 = document.getElementById("IMG4-1");
    IMGS.push(IMG41);
    var IMG42 = document.getElementById("IMG4-2");
    IMGS.push(IMG42);
    var IMG43 = document.getElementById("IMG4-3");
    IMGS.push(IMG43);
    var IMG44 = document.getElementById("IMG4-4");
    IMGS.push(IMG44);

    IMGS.forEach(Element => {
        const randomNumber = Math.floor(Math.random() * img_names.length);
        console.log(img_names.length);
        console.log(img_names);
        Element.setAttribute("src","/img/"+img_names[randomNumber]+".jpg"); 
        img_names.splice(randomNumber,1);
    })



});