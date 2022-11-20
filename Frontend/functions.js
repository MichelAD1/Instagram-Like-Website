let count_incorrects,count_signup=0;
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
            window.location.href="../Frontend/home.php?id="+res;
        }
    }

    xhr.open("POST", "../Backend/check_user.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(`username=${username.value}&password=${password.value}`);
    
}

let signupHandler = () => {
    let username = document.getElementById("username_form");
    let full_name = document.getElementById("fullname_form");
    let bio = document.getElementById("bio_form");
    let profile_picture = document.getElementById("profile_form").files[0].name;
    let password = document.getElementById("password_form");
    const xhr = new XMLHttpRequest();

    xhr.onload = function () {
        let response = JSON.parse(this.responseText);
        let res=response["User inserted"];
        if(!res){
            if(count_signup<1){
                document.getElementById("message").innerHTML="";
                let h1= document.createElement("h1");
                h1.textContent="Username already exist";
                h1.className = 'login-card-header';
                count_signup++;
                message.appendChild(h1);
            }
        }else{
            console.log(res);
            window.location.href="../Frontend/home.php?id="+res;
        }
    }

    xhr.open("POST", "../Backend/add_user.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(`username=${username.value}&full_name=${full_name.value}&password=${password.value}&bio=${bio.value}&profile_picture=${profile_picture}`);
    
}
