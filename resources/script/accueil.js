let currentSlide = 0;
const slides = document.querySelectorAll('.match-slide');
const totalSlides = slides.length;

document.querySelector('.arrow.next').addEventListener('click', function() {
    slides[currentSlide].classList.remove('active');
    currentSlide = (currentSlide+1) % totalSlides; // Aller au prochain slide, retourner au début si on est à la fin
    slides[currentSlide].classList.add('active');
});

document.querySelector('.arrow.prev').addEventListener('click', function() {
    slides[currentSlide].classList.remove('active');
    currentSlide = (currentSlide-1+totalSlides) % totalSlides; // Aller au slide précédent, aller à la fin si on est au début
    slides[currentSlide].classList.add('active');
});