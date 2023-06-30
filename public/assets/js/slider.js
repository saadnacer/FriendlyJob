let precedent = document.querySelector("#precedent");
let suivant = document.querySelector("#suivant");
const slide = ["/assets/img/slider/hearyou.jpg", "/assets/img/slider/maçon.jpg", "/assets/img/slider/femme.jpg"];
let numero = 0;

function ChangeSlide(sens) {
    numero = numero + sens;
    if (numero < 0)
        numero = slide.length - 1;
    if (numero > slide.length - 1)
        numero = 0;
    document.getElementById("slide").src = slide[numero];
}
setInterval("ChangeSlide(1)", 5000);