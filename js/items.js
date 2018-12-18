var url = "http://localhost/finalProject/news/news.json";

fetch(url, {mode : "cors"}).then(onSuccess, onFail)

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
    arrayOfNews = JSON.parse("[" + text + "]")[0];
    console.log(arrayOfNews);
    
    arrayOfNews.forEach(element => {
        var news = document.createElement("div");
        var link = document.createElement("a");
        news.innerHTML = link;
        link.innerHTML = element.header
    });
}