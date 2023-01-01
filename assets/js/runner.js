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

function createGame() {

}

function updateGame() {

}

function deleteGame() {
    var ajaxRequest = new XMLHttpRequest();
    ajaxRequest.open('GET', 'logout.php', true);
    ajaxRequest.send();

    ajaxRequest.onreadystatechange = function() {
        if(ajaxRequest.readyState == 4 && ajaxRequest.status == 200){
            window.location.href = "index.php?logout=success";
        }
    };
}

/* CREATE INACTIVITY FUNCTION */

let timeout;

function resetTimeout() {
    clearTimeout(timeout);
    timeout = setTimeout(logout, 10000);
}

document.addEventListener("mousemove", resetTimeout);
document.addEventListener("keypress", resetTimeout);

