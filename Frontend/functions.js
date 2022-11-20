let count_incorrects=0;
let loginHandler = () => {
    let username = document.getElementById("username_form");
    let password = document.getElementById("password_form");
    const xhr = new XMLHttpRequest();

    xhr.onload = function () {
        let response = JSON.parse(this.responseText);
        let res=response["User found"];
        if(!res){
            if(count_incorrects<1){
                document.getElementById("message").innerHTML="";
                let h1= document.createElement("h1");
                h1.textContent="Incorrect Username or Password";
                h1.className = 'login-card-header';
                count_incorrects++;
                message.appendChild(h1);
            }
            
        }else{
            console.log(res);
            window.location.href="../Frontend/home.php";
        }
    }

    xhr.open("POST", "../Backend/check_user.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(`username=${username.value}&password=${password.value}`);
    
}
