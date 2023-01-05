
/* AUTO COMPLETE SEARCH */

var input = document.querySelector("#user");
var gameList = document.querySelector("#gameList");
console.log(input);

    input.addEventListener("keyup", function () {
      var query = this.value;
      
      if (query != "") {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            gameList.style.display = "block";
            gameList.style.position = "absolute";
            gameList.style.backgroundColor = "white";
            gameList.style.borderRadius = "8px";
            gameList.style.zIndex = "999";
            gameList.classList.add('col-md-5');
            gameList.classList.add('mt-2');
            gameList.classList.add('p-3');


            gameList.innerHTML = xhr.responseText;
          }
        };
        xhr.open("POST", "/justplay/autosearch.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("query=" + query);
      }
    });
    
    document.addEventListener("click", function (event) {
      if (event.target.tagName != "A") {
        gameList.style.display = "none";
      }
    });
  