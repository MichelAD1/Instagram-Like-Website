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
            window.location.href="../Frontend/home.php?id="+res[0]+"&username="+res[1]+"&fullname="+res[2]+"&bio="+res[4]+"&profile_picture="+res[5];
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
            window.location.href="../Frontend/home.php?id="+res[0];
        }
    }

    xhr.open("POST", "../Backend/add_user.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(`username=${username.value}&full_name=${full_name.value}&password=${password.value}&bio=${bio.value}&profile_picture=${profile_picture}`);
    
}

let homeHandler = () => {
    let queryString = new Array();
    if (queryString.length == 0) {
        if (window.location.search.split('?').length > 1) {
            let params = window.location.search.split('?')[1].split('&');
            for (let i = 0; i < params.length; i++) {
                let key = params[i].split('=')[0];
                let value = decodeURIComponent(params[i].split('=')[1]);
                queryString[key] = value;
            }
        }
    }
        let username = queryString["username"];
        let profile_picture = queryString["profile_picture"];
        let bio = queryString["bio"];
        let path="../Backend/profile-pic/"+profile_picture;
        let fullname = queryString["fullname"];
        document.getElementById("profile_pic").innerHTML = "<img src="+path+" alt='' style='border-radius: 50%; height:80px; width:80px;margin-left:120px;margin-top:20px;'>";
        document.getElementById("texts_infos").innerHTML="<h2 class='username'>"+username+"</h2><h3 class='username'>"+fullname+"</h3><p class='bio'>"+bio+"</p>";
}


