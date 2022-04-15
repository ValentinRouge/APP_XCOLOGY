var IMGS = [];
var images;
var img_names = ['M_babouin','M_girafe', 'M_guepard', 'M_leopard','M_lion','M_rhino','M_toucan','M_zebre','M_babouin','M_girafe', 'M_guepard', 'M_leopard','M_lion','M_rhino','M_toucan','M_zebre']; 

window.addEventListener("DOMContentLoaded", (event) => {
    images = new Object();

    var IMG11 = document.getElementById("IMG1-1");
    IMGS.push(IMG11);
    IMG11.onclick=function(){
        test();
    }
    //IMG11.onclick = test();
    var IMG12 = document.getElementById("IMG1-2");
    IMGS.push(IMG12);
    //IMG12.addEventListener("click", onCardClick(IMG12));
    var IMG13 = document.getElementById("IMG1-3");
    IMGS.push(IMG13);
    //IMG13.addEventListener("click", onCardClick(IMG13));
    var IMG14 = document.getElementById("IMG1-4");
    IMGS.push(IMG14);
    //IMG14.addEventListener("click", onCardClick(IMG14));

    var IMG21 = document.getElementById("IMG2-1");
    IMGS.push(IMG21);
    //IMG21.addEventListener("click", onCardClick(IMG21));
    var IMG22 = document.getElementById("IMG2-2");
    IMGS.push(IMG22);
    //IMG22.addEventListener("click", onCardClick(IMG22));
    var IMG23 = document.getElementById("IMG2-3");
    IMGS.push(IMG23);
    //IMG23.addEventListener("click", onCardClick(IMG23));
    var IMG24 = document.getElementById("IMG2-4");
    IMGS.push(IMG24);
    //IMG24.addEventListener("click", onCardClick(IMG24));

    var IMG31 = document.getElementById("IMG3-1");
    IMGS.push(IMG31);
    //IMG31.click = onCardClick(IMG31);
    var IMG32 = document.getElementById("IMG3-2");
    IMGS.push(IMG32);
    //IMG32.click = onCardClick(IMG32);
    var IMG33 = document.getElementById("IMG3-3");
    IMGS.push(IMG33);
    //IMG33.onclick = onCardClick(IMG33);
    var IMG34 = document.getElementById("IMG3-4");
    IMGS.push(IMG34);
    //IMG34.onclick = onCardClick(IMG34);

    var IMG41 = document.getElementById("IMG4-1");
    IMGS.push(IMG41);
    //IMG41.onclick = onCardClick(IMG41);
    var IMG42 = document.getElementById("IMG4-2");
    IMGS.push(IMG42);
    //IMG42.onclick = onCardClick(IMG42);
    var IMG43 = document.getElementById("IMG4-3");
    IMGS.push(IMG43);
    //IMG43.onclick = onCardClick(IMG43);
    var IMG44 = document.getElementById("IMG4-4");
    IMGS.push(IMG44);
    //IMG44.onclick = onCardClick(IMG44);

    // create the images list for each img
    IMGS.forEach(Element => {
        const randomNumber = Math.floor(Math.random() * img_names.length);
        images[Element.getAttribute("id")] = img_names[randomNumber];
        img_names.splice(randomNumber,1);
    })
    
    //add to each img return type
    IMGS.forEach(Element => {
        Element.setAttribute("src","../img/fondcarte.jpg"); 
    })

});

function onCardClick(Element){
    console.log(Element);
    console.log(images[Element.getAttribute("id")]);
    //Element.setAttribute("src","./img/"+images[Element.getAttribute("id")]+".jpg")
};

function test(){
    console.log("toto");
};