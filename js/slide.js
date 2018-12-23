let imgArr = new Array();
let carouselId = document.querySelector("#carousel");
for (var i = 0; i < 5; i++) {
    imgArr[i] = carouselId.querySelectorAll("img")[i];
}
var bigImage = document.querySelector("#bigImage");
for (var i = 0; i < 5; i++) {
    imgArr[i].addEventListener("click",function(e){
        console.log(e.currentTarget.src);
        bigImage.querySelectorAll("img")[0].src = e.currentTarget.src;
    })
}

var img = document.querySelector(".slider");
var left = img.querySelectorAll("img")[0];
var right = img.querySelectorAll("img")[1];
var current = 1;
left.addEventListener("click", function(e) {
    if (current - 1 > 1)
        current--;
    else 
        current = 10;
    img.style = "background-image: url('http://localhost/finalProject/images/" + current + ".jpg')"
})
right.addEventListener("click", function(e) {
    if (current + 1 < 10)
        current++;
    else 
        current = 1;
    img.style = "background-image: url('http://localhost/finalProject/images/" + current + ".jpg')"
})
