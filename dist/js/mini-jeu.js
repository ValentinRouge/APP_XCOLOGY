var IMGS = [];
var images;
var img_names = ['M_babouin','M_girafe', 'M_guepard', 'M_leopard','M_lion','M_rhino','M_toucan','M_zebre','M_babouin','M_girafe', 'M_guepard', 'M_leopard','M_lion','M_rhino','M_toucan','M_zebre']; 
var past1;
var past2;
var state = 0;
var founded = [];

window.addEventListener("DOMContentLoaded", (event) => {
    images = new Object();

    var IMG11 = document.getElementById("IMG1-1");
    IMGS.push(IMG11);
    IMG11.onclick = function(){
        onCardClick(IMG11)
    };
    var IMG12 = document.getElementById("IMG1-2");
    IMGS.push(IMG12);
    IMG12.onclick = function(){
        onCardClick(IMG12)
    };    var IMG13 = document.getElementById("IMG1-3");
    IMGS.push(IMG13);
    IMG13.onclick = function(){
        onCardClick(IMG13)
    };
    var IMG14 = document.getElementById("IMG1-4");
    IMGS.push(IMG14);
    IMG14.onclick = function(){
        onCardClick(IMG14)
    };

    var IMG21 = document.getElementById("IMG2-1");
    IMGS.push(IMG21);
    IMG21.onclick = function(){
        onCardClick(IMG21)
    };
    var IMG22 = document.getElementById("IMG2-2");
    IMGS.push(IMG22);
    IMG22.onclick = function(){
        onCardClick(IMG22)
    };
    var IMG23 = document.getElementById("IMG2-3");
    IMGS.push(IMG23);
    IMG23.onclick = function(){
        onCardClick(IMG23)
    };
    var IMG24 = document.getElementById("IMG2-4");
    IMGS.push(IMG24);
    IMG24.onclick = function(){
        onCardClick(IMG24)
    };

    var IMG31 = document.getElementById("IMG3-1");
    IMGS.push(IMG31);
    IMG31.onclick = function(){
        onCardClick(IMG31)
    };
    var IMG32 = document.getElementById("IMG3-2");
    IMGS.push(IMG32);
    IMG32.onclick = function(){
        onCardClick(IMG32)
    };
    var IMG33 = document.getElementById("IMG3-3");
    IMGS.push(IMG33);
    IMG33.onclick = function(){
        onCardClick(IMG33)
    };
    var IMG34 = document.getElementById("IMG3-4");
    IMGS.push(IMG34);
    IMG34.onclick = function(){
        onCardClick(IMG34)
    };

    var IMG41 = document.getElementById("IMG4-1");
    IMGS.push(IMG41);
    IMG41.onclick = function(){
        onCardClick(IMG41)
    };
    var IMG42 = document.getElementById("IMG4-2");
    IMGS.push(IMG42);
    IMG42.onclick = function(){
        onCardClick(IMG42)
    };
    var IMG43 = document.getElementById("IMG4-3");
    IMGS.push(IMG43);
    IMG43.onclick = function(){
        onCardClick(IMG43)
    };
    var IMG44 = document.getElementById("IMG4-4");
    IMGS.push(IMG44);
    IMG44.onclick = function(){
        onCardClick(IMG44)
    };

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
    var actual = Element.getAttribute("id");
    if (!(founded.includes(actual))){
        Element.setAttribute("src","../img/"+images[actual]+".jpg")
        console.log(founded);
        switch(state){
            case 0:
                past1 = Element;
                state = 2;
                break;
            case 1: 
                past1.setAttribute("src","../img/fondcarte.jpg");
                past2.setAttribute("src","../img/fondcarte.jpg"); 
                past1 = Element
                state = 2; 
                break;
            case 2: 
                past2 = Element;
                if (images[past1.getAttribute("id")]==images[past2.getAttribute("id")]){
                    founded.push(past1.getAttribute("id"));
                    founded.push(past2.getAttribute("id"));
                    state = 0;
                    if (founded.length == 16){
                        alert("Vous avez gagné !")
                    }
                } else {
                    state = 1;
                }
                break;
        }
    }
    
};