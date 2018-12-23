var url = "http://localhost/finalProject/news/news.json";
arrayOfNews = new Array();
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
    arrayOfNews = JSON.parse(text);
    console.log(arrayOfNews.length);
    
    var news = document.querySelector(".news");
    
    for (let i = 0; i < arrayOfNews.length; i++) {
        var n = document.createElement("div");
        var image = document.createElement("img");
        var right = document.createElement("div");
        var title = document.createElement("div");
        var attributes = document.createElement("div");
        var row1 = document.createElement("div");
        var row2 = document.createElement("div");
        var name = document.createElement("div");
        var delet = document.createElement("a");
        var dollar = document.createElement("div");
        var janr = document.createElement("div");
        var update = document.createElement("a");
       
        title.innerHTML = arrayOfNews[i].header;
        janr.innerHTML = arrayOfNews[i].janr;
        image.src = "../images/" + arrayOfNews[i].image;
        name.innerHTML = "Janr: ";
        dollar.innerHTML = arrayOfNews[i].janr;
        delet.innerHTML = "Delete";
        update.innerHTML = "Update";

        image.style = "width: 100px; height: 60px";
        right.classList.add("right");
        title.classList.add("title");
        n.classList.add("new");
        row1.classList.add("row");
        row2.classList.add("row");
        name.classList.add("name");
        delet.href = "retrieve.php?delete=" + i;
        update.href = "update.php?num=" + i;
        attributes.classList.add("attributes");
       
        row1.appendChild(name);
        row1.appendChild(dollar);
        row2.appendChild(delet);
        row2.appendChild(update);
        attributes.appendChild(row1);
        attributes.appendChild(row2);
        right.appendChild(title);
        right.appendChild(attributes);
        n.appendChild(image);
        n.appendChild(right);
        news.appendChild(n);
    }
}