var images = ["top4.png", "topp2.jpg", "topp4.jpg", "top.webp" ]; 
var currentIndex = 0;
var slideshowImg = document.querySelector('.slideshow-img');
var slideshowButtons = document.querySelectorAll('.dot'); 

function startSlideshow() {
  setInterval(function() {
    currentIndex = (currentIndex + 1) % images.length;
    slideshowImg.src = images[currentIndex];
    updateActiveDot(); 
  }, 3000); 
}

function updateActiveDot() {
  slideshowButtons.forEach(function(dot) {
    dot.classList.remove('active');
  });
  slideshowButtons[currentIndex].classList.add('active');
}

startSlideshow(); 


slideshowButtons.forEach(function(dot, index) {
  dot.addEventListener('click', function() {
    currentIndex = index;
    slideshowImg.src = images[currentIndex];
    updateActiveDot(); 
  });
});

var popup = document.getElementById("sign_in_overlay");
        
popup.addEventListener("click", function(e){
    
    if (e.target !== this)
    {
        return;
    }
    popup.style.display = "none";
    console.log("withdrawn");   
});

function draw(){
    popup.style.display = "block";   
    console.log("drawn");         
}
