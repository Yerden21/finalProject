var url = "http://localhost/finalProject/news/news.json";
arrayOfNews = new Array();

fetch(url).then(onSuccess, onFail)

function onSuccess(response) {
  console.log(response.status);
  
  response.text().then(onStreamProceed).then(allFunction);
}
function onFail(error) {
  console.log("Error " + error);
}
function onStreamProceed(text) {
    console.log(text);
    arrayOfNews = JSON.parse(text);
    console.log(arrayOfNews);
    var each = document.querySelector (".side-bar");
    var selector = document.createElement("select");
    var simpleOption = document.createElement("option");
    simpleOption.text = "Choose janr";
    simpleOption.id = "-1";
    selector.add(simpleOption);
    janrs = Array();
    for (let i = 0; i < arrayOfNews.length; i++) {
        if (!janrs.includes(arrayOfNews[i].janr)) {
            var option = document.createElement("option");
            option.text = arrayOfNews[i].janr;
            selector.add(option);
            janrs.push(arrayOfNews[i].janr);
        }
    }
    each.appendChild(selector);

    arrayOfNews.forEach(element => {        
        var link = document.createElement("p");
        link.innerHTML = element.header;
        each.appendChild(link);
    });


}
function allFunction() {
    pArray = new Array();
    var listNews = document.querySelector(".side-bar");
    var showNews = document.querySelector(".main-info");

    pArray = listNews.querySelectorAll("p");
    for (let i = 0; i < pArray.length; i++) {
        const element = pArray[i];
        element.addEventListener("click", function(e) {
            console.log("clicked");
            showNews.innerHTML = "<h1>" + arrayOfNews[i].header + "</h1>"
                                + "<img src='images/" + arrayOfNews[i].image + "'>"
                                + "<p>" + arrayOfNews[i].content + "</p>"
                                + "<a href='details.html'> More... </a>";
        });
    }
    var selector = listNews.querySelector("select");
    var each = document.querySelector (".side-bar");

    selector.addEventListener("change", function(e) {
        pArray = listNews.querySelectorAll("p");
        each.innerHTML = "";
        each.appendChild(selector);
        var x = e.currentTarget.value;
        for (let i = 0; i < arrayOfNews.length; i++) {
            const element = arrayOfNews[i];
            if (element.janr === x) {
                var link = document.createElement("p");
                link.innerHTML = element.header;
                each.appendChild(link);
                link.addEventListener("click", function(e) {
                    console.log("clicked");
                    showNews.innerHTML = "<h1>" + arrayOfNews[i].header + "</h1>"
                                        + "<img src='images/" + arrayOfNews[i].image + "'>"
                                        + "<p>" + arrayOfNews[i].content + "</p>"
                                        + "<a href='details.html'> More... </a>";
                });
            }    
        }
    });
}