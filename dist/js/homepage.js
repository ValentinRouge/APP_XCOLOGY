// Variables globales
let compteur = 0; // connaître l'image sur laquelle on se trouve
let timer, images, slides, slideWidth, speed, transition;

window.onload = () => {
    // diaporama
    const diaporama = document.querySelector(".diaporama");
    // data-speed
    speed = diaporama.dataset.speed;
    transition = diaporama.dataset.transition;

    images = document.querySelector(".images");

    // copie 1ère image
    let firstImage = images.firstElementChild.cloneNode(true);

    //ajoute la copie à la fin
    images.appendChild(firstImage);

    slides = Array.from(images.children);

    // largeur des slides
    slideWidth = diaporama.getBoundingClientRect().width;

    // les flèches des directions
    let next = document.querySelector("#droite");
    let prev = document.querySelector("#gauche");

    // cliquer
    next.addEventListener("click", slideRight);
    prev.addEventListener("click", slideLeft);

    // défilement auto
    timer = setInterval(slideRight, speed);

    // stop/start
    diaporama.addEventListener("mouseover", stopTime);
    diaporama.addEventListener("mouseout", startTime);
}

/**
 * Défilement auto
 * 
 * 1
 */
function slideRight(){
    //incrémentation
    compteur++;
    images.style.transition = transition+"ms linear";

    let decal = -slideWidth * compteur;
    images.style.transform = `translateX(${decal}px)`;

    // à la fin de la transition, rembobine de façon cachée le défilement.
    setTimeout(function(){
        if(compteur >= slides.length - 1){
            compteur = 0;
            images.style.transition = "unset";
            images.style.transform = "translateX(0)";
        }
    }, transition);
}

/**
 * 2
 */
function slideLeft(){
    // décrémentation
    compteur--;
    images.style.transition = transition+"ms linear";

    if(compteur < 0){
        compteur = slides.length - 1;
        let decal = -slideWidth * compteur;
        images.style.transition = "unset";
        images.style.transform = `translateX(${decal}px)`;
        setTimeout(slideLeft, 1);
    }

    let decal = -slideWidth * compteur;
    images.style.transform = `translateX(${decal}px)`;
    
}

function stopTime(){
    clearInterval(timer);
}

function startTime(){
    timer = setInterval(slideRight, speed);
}