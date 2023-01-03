function loginValidation() {

    var formElements = document.querySelectorAll('.form-control');

    var formData = new FormData();
    
    for(var count = 0; count < formElements.length; count++)
	{
		formData.append(formElements[count].name, formElements[count].value);
        console.log("Hello", formElements[count].value);
	}
    
    document.getElementById('login-submit').disabled = true;

    // Using Ajax to send and recieve the data and response from login.php
    var ajaxRequest =  new XMLHttpRequest();
    ajaxRequest.open('POST', '/justplay/login.php');

    for (const [key, value] of formData) {
        console.log(key, value);
    }
    
    ajaxRequest.send(formData);

    ajaxRequest.onreadystatechange = function() {
        if(ajaxRequest.readyState == 4 && ajaxRequest.status == 200){

            document.getElementById('login-submit').disabled = false;

            var response = JSON.parse(ajaxRequest.responseText);
            console.log(response);

            if(response.message == "Login Successful"){
                document.getElementById('sample_form').reset();  

                var messageDiv = document.getElementById('message');
                
                if(messageDiv.classList.contains('text-danger'))
                {
                    messageDiv.classList.remove("text-danger");
                    messageDiv.classList.add("text-success");
                }else
                {
                    messageDiv.classList.add("text-success");
                }

                messageDiv.innerHTML = response.message;
                
                setTimeout(
                    function() {
                        window.location.href = "/justplay";
                    }, 1000
                )
            }
            else{
                document.getElementById('sample_form').reset();                
                document.getElementById('message').innerHTML = response.message;
                document.getElementById('message').classList.add("text-danger");
            }
        }
    }
}

function logout() {
    var ajaxRequest = new XMLHttpRequest();
    ajaxRequest.open('GET', '/justplay/logout.php', true);
    ajaxRequest.send();

    ajaxRequest.onreadystatechange = function() {
        if(ajaxRequest.readyState == 4 && ajaxRequest.status == 200){
            window.location.href = "/justplay";
        }
    };
}

/* CRUD FUNCTIONALITY */


function createGame() {
    var formElements = document.querySelectorAll('.form-control');

    var formData = new FormData();
    
    for(var count = 0; count < formElements.length; count++)
    {
        formData.append(formElements[count].name, formElements[count].value);
        console.log("Hello", formElements[count].value);
    }
    
    document.getElementById('create-submit').disabled = true;

    // Using Ajax to send and recieve the data and response from login.php
    var ajaxRequest =  new XMLHttpRequest();
    ajaxRequest.open('POST', '/justplay/createGame.php');

    for (const [key, value] of formData) {
        console.log(key, value);
    }
    
    ajaxRequest.send(formData);

    ajaxRequest.onreadystatechange = function() {
        if(ajaxRequest.readyState == 4 && ajaxRequest.status == 200){

            document.getElementById('create-submit').disabled = false;

            var response = JSON.parse(ajaxRequest.responseText);
            console.log(response);

            if(response.message == "Game Created Successfully"){
                document.getElementById('sample_form').reset();  

                var messageDiv = document.getElementById('message');
                
                if(messageDiv.classList.contains('text-danger'))
                {
                    messageDiv.classList.remove("text-danger");
                    messageDiv.classList.add("text-success");
                }else
                {
                    messageDiv.classList.add("text-success");
                }

                messageDiv.innerHTML = response.message;
                
                setTimeout(
                    function() {
                        window.location.href = "/justplay";
                    }, 1000
                )
            }
            else{
                document.getElementById('sample_form').reset();                
                document.getElementById('message').innerHTML = response.message;
                document.getElementById('message').classList.add("text-danger");
            }
        }
    }
}

function displayModal(gameid) {
    var ajaxRequest = new XMLHttpRequest();
    ajaxRequest.open('GET', '/justplay/getModalContent.php?id=' + gameid, true);
    ajaxRequest.send();

    ajaxRequest.onreadystatechange = function() {
        if(ajaxRequest.readyState == 4 && ajaxRequest.status == 200){
            var response = JSON.parse(ajaxRequest.responseText);

            var modalInfo = document.getElementById('modal-information');
            modalInfo.innerHTML = '';

            // Create Form and Append it to model-information
            var form = document.createElement('form');
            form.setAttribute('method', 'post');
            form.setAttribute('action', '/justplay/updateGame.php');

            // Create Game Id Input
            var gameId = document.createElement('input');
            gameId.setAttribute('type', 'hidden');
            gameId.setAttribute('class', 'form-update-controller')
            gameId.setAttribute('name', 'gameId');
            gameId.setAttribute('value', response.id);
            

            // Create Div with Game Name
            var gameNameDiv = document.createElement('div');
            gameNameDiv.setAttribute('class', 'mb-3');

            // Create Label for Game Name
            var gameNameLabel = document.createElement('label');
            gameNameLabel.setAttribute('for', 'gameName');
            gameNameLabel.setAttribute('class', 'form-label');
            gameNameLabel.innerHTML = 'Game Name';

            // Create Game Name
            var gameName = document.createElement('input');
            gameName.setAttribute('type', 'text');
            gameName.setAttribute('name', 'gameName');
            gameName.setAttribute('value', response.name);
            gameName.setAttribute('class', 'form-control form-update-controller');

            // Append Game Name to Game Name Div
            gameNameDiv.appendChild(gameNameLabel);
            gameNameDiv.appendChild(gameName);
            
            // Create Div for Game Image Path 
            var gameImagePathDiv = document.createElement('div');
            gameImagePathDiv.setAttribute('class', 'mb-3');

            // Create Label for Game Image Path
            var gameImagePathLabel = document.createElement('label');
            gameImagePathLabel.setAttribute('for', 'gameImagePath');
            gameImagePathLabel.setAttribute('class', 'form-label');
            gameImagePathLabel.innerHTML = 'Game Image Path';
            
            // Create Game Image Path
            var gameImagePath = document.createElement('input');
            gameImagePath.setAttribute('type', 'text');
            gameImagePath.setAttribute('name', 'gameImagePath');
            gameImagePath.setAttribute('value', response.icon);
            gameImagePath.setAttribute('class', 'form-control  form-update-controller');
            
            // Append Game Image Path to Game Image Path Div
            gameImagePathDiv.appendChild(gameImagePathLabel);
            gameImagePathDiv.appendChild(gameImagePath);

            // Create Div for Game Cateogry
            var gameCategoryDiv = document.createElement('div');
            gameCategoryDiv.setAttribute('class', 'mb-3');

            // Create Label for Game Category
            var gameCategoryLabel = document.createElement('label');
            gameCategoryLabel.setAttribute('for', 'gameCategory');
            gameCategoryLabel.setAttribute('class', 'form-label');
            gameCategoryLabel.innerHTML = 'Game Category';

            // Create Game Category
            var gameCategory = document.createElement('input');
            gameCategory.setAttribute('type', 'number');
            gameCategory.setAttribute('name', 'gameCategory');
            gameCategory.setAttribute('value', response.cat);
            gameCategory.setAttribute('class', 'form-control form-update-controller');

            // Append Game Category to Game Category Div
            gameCategoryDiv.appendChild(gameCategoryLabel);
            gameCategoryDiv.appendChild(gameCategory);


            // Create Div for Button
            var buttonDiv = document.createElement('div');
            buttonDiv.setAttribute('class', 'd-grid');

            // Create Button with function updateGame()
            var updateGameButton = document.createElement('button');
            updateGameButton.setAttribute('id', 'update-submit');
            updateGameButton.setAttribute('type', 'button');
            updateGameButton.setAttribute('class', 'btn btn-primary');
            updateGameButton.setAttribute('onclick', 'updateGame(' + gameid + ')');
            updateGameButton.innerHTML = 'Update Game';
            
            // Append Button to Button Div
            buttonDiv.appendChild(updateGameButton);

            // Create Error Message Div
            var messageDiv = document.createElement('div');
            messageDiv.setAttribute('id', 'update-game-message');
            messageDiv.setAttribute('class', 'd-grid mt-3');


            // Append Divs to Form
            form.appendChild(gameNameDiv);
            form.appendChild(gameImagePathDiv);
            form.appendChild(gameCategoryDiv);
            form.appendChild(buttonDiv);
            form.appendChild(gameId);
            form.appendChild(messageDiv);

            modalInfo.appendChild(form);
        }
    }
}

function updateGame(gameid) {
    var formElements = document.querySelectorAll('.form-update-controller');

    var formData = new FormData();
    
    for(var count = 0; count < formElements.length; count++)
	{
		formData.append(formElements[count].name, formElements[count].value);
        console.log(formElements[count].value);
	}
    
    document.getElementById('update-submit').disabled = true;

    // Using Ajax to send and recieve the data and response from login.php
    var ajaxRequest =  new XMLHttpRequest();
    ajaxRequest.open('POST', '/justplay/updateGame.php');

    for (const [key, value] of formData) {
        console.log(key, value);
    }
    
    ajaxRequest.send(formData);

    ajaxRequest.onreadystatechange = function() {
        if(ajaxRequest.readyState == 4 && ajaxRequest.status == 200){

            document.getElementById('update-submit').disabled = false;

            var response = JSON.parse(ajaxRequest.responseText);
            console.log(response);
        
            if(response.message == "Game updated successfully."){

                var messageDiv = document.getElementById('update-game-message');
                
                if(messageDiv.classList.contains('text-danger'))
                {
                    messageDiv.classList.remove("text-danger");
                    messageDiv.classList.add("text-success");
                } else
                {
                    messageDiv.classList.add("text-success");
                }

                messageDiv.innerHTML = response.message;
                
                setTimeout(
                    function() {
                        window.location.href = "/justplay";
                    }, 1000
                )
            }
            else{             
                document.getElementById('update-game-message').innerHTML = response.message;
                document.getElementById('update-game-message').classList.add("text-danger");
            }
        }
    }
}


function deleteGame(gameid) {
    var ajaxRequest = new XMLHttpRequest();
    ajaxRequest.open('POST', '/justplay/deleteGame.php', true);
    ajaxRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajaxRequest.send('gameId=' + encodeURIComponent(gameid));

    ajaxRequest.onreadystatechange = function() {

        if(ajaxRequest.readyState == 4 && ajaxRequest.status == 200){

            var response = JSON.parse(ajaxRequest.responseText);
            alert(response);

            setTimeout(
                function() {
                    window.location.href = "/justplay";
                }, 1000
            )
        }
    };
}

/* CREATE INACTIVITY FUNCTION */

let timeout;

function resetTimeout() {
    clearTimeout(timeout);
    timeout = setTimeout(logout, 3000000);
}

document.addEventListener("mousemove", resetTimeout);
document.addEventListener("keypress", resetTimeout);

