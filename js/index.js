var url = "http://localhost/finalProject/news/news.json";

fetch(url).then(onSuccess, onFail)

function onSuccess(response) {
  console.log(response.status);
  
  response.text().then(onStreamProceed);
}
function onFail(error) {
  console.log("Error " + error);
}
function onStreamProceed(text) {
    console.log(text);
    arrayOfNews = new Array();
    arrayOfNews = JSON.parse(text);
    console.log(arrayOfNews);

    news = Array();
    news = document.querySelectorAll(".item");
    
    var x = 0;
    for (let i = 0; i < 5; i++) {
        x++;
        const element = news[i];
        console.log(element);
        var image = element.querySelector("img");
        var info = element.querySelector(".info");
        
        var p = info.querySelectorAll('a')[1];
        var h3 = info.querySelectorAll("a")[0].querySelector("h3");
        image.src = "images/" + arrayOfNews[i].image;
        h3.innerHTML = arrayOfNews[i].header;
        p.innerHTML = arrayOfNews[i].janr;
        info.querySelectorAll("a")[0].href = "details.php?null=" + i;
    }
    news = document.querySelectorAll(".flex-list-item");
    console.log(news);
    for (let i = 0; i < news.length; i++) {
        x++;
        var element = news[i];
        console.log(element);
        
        var image = element.querySelector("img");
        var head = element.querySelector("h1");
        var p = element.querySelector("p");

        image.src = "images/" + arrayOfNews[x].image;
        head.innerHTML = arrayOfNews[x].header;
        p.innerHTML = arrayOfNews[x].janr;

    }
}





