let count_incorrects=count_signup=count_update=0;
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
            window.location.href="../Frontend/home.php?id="+res[0]+"&username="+res[1]+"&fullname="+res[2]+"&bio="+res[4]+"&profile_picture="+res[5];
        }
    }

    xhr.open("POST", "../Backend/add_user.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(`username=${username.value}&full_name=${full_name.value}&password=${password.value}&bio=${bio.value}&profile_picture=${profile_picture}`);
    
}
let setPaths=()=>{
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
        let profile_pic_path="../Backend/profile-pic/"+profile_picture;
        let fullname = queryString["fullname"];
        let home_path="../Frontend/home.php?id="+queryString["id"]+"&username="+username+"&fullname="+encodeURIComponent(fullname.trim())+"&bio="+encodeURIComponent(bio.trim())+"&profile_picture="+profile_picture;
        let profile_path="../Frontend/my_profile.php?id="+queryString["id"]+"&username="+username+"&fullname="+encodeURIComponent(fullname.trim())+"&bio="+encodeURIComponent(bio.trim())+"&profile_picture="+profile_picture;
        let edit_path="../Frontend/edit_profile.php?id="+queryString["id"]+"&profile_picture="+profile_picture;
        let post_path="../Frontend/create_post.php?id="+queryString["id"];
        document.getElementById("post_img").innerHTML="<a href="+post_path+">Create New Post</a>";
        document.getElementById("home_profile").innerHTML="<a href="+home_path+">Feed</a>";
        document.getElementById("my_profile").innerHTML="<a href="+profile_path+">My Profile</a>";
        document.getElementById("edit_profile").innerHTML="<a href="+edit_path+">Edit Profile</a>";
        document.getElementById("profile_pic").innerHTML = "<img src="+profile_pic_path+" alt='' style='border-radius: 50%; height:80px; width:80px;margin-left:120px;margin-top:20px;'>";
        document.getElementById("texts_infos").innerHTML="<h2 class='username'>"+username+"</h2><h3 class='username'>"+fullname+"</h3><p class='bio'>"+bio+"</p>";
        return queryString["id"];
}

let homeHandler = () => {
        setPaths();
        let posts=[];
        fetch('http://localhost/Instagram-like-website/Backend/list_posts.php', {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
         },
        }).then(response => response.text())
        .then(text => {
            posts=JSON.parse(text)["Posts"];
            for(let i=0;i<posts.length;i++){
                let post=posts[i];
                let user="";
                let likes=0;
                let comments=0;
                fetch(`http://localhost/Instagram-like-website/Backend/count_likes.php?post_id=${post["id"]}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                },
                }).then(response => response.text())
                .then(text => {
                    likes=JSON.parse(text)["Likes"];
                    fetch(`http://localhost/Instagram-like-website/Backend/count_comments.php?post_id=${post["id"]}`, {
                        method: 'GET',
                        headers: {
                            'Accept': 'application/json',
                        },
                        }).then(response => response.text())
                        .then(text => {
                            comments=JSON.parse(text)["Comments"];
                            fetch(`http://localhost/Instagram-like-website/Backend/get_user.php?posted_by=${post["posted_by"]}`, {
                                method: 'GET',
                                headers: {
                                    'Accept': 'application/json',
                                },
                                }).then(response => response.text())
                                .then(text => {
                                    user=JSON.parse(text)["Username"];
                                    let img=post["post_image"];
                                    let caption=post["caption"];
                                    let div = document.createElement('div');
                                                div.setAttribute('class', 'featured-body');
                                                div.innerHTML = `<div class="img-galery">
                                                <img src="../Backend/post-imgs/${img}" style="width:420px;height:570px;" />
                                                <div class="box">
                                                <div class="like-icon">
                                                <span id=like class="material-symbols-outlined">favorite</span>
                                                <h3>Liked by: ${likes} users</h3>
                                                </div>
                                                <div class="user-icon">
                                                <span class="material-symbols-outlined">person</span>
                                                <h3>Posted by: ${user}</h3>
                                                </div>
                                                <div class="caption-icon">
                                                <span class="material-symbols-outlined">chat</span>
                                                <h3>${caption}</h3>
                                                </div>
                                                <a href="../Frontend/view_comments.php" class="after">View all ${comments} comments...</a>
                                                <div class="comment-icon">
                                                <span class="material-symbols-outlined">group</span>
                                                
                                                </div>
                                                    </div>
                                                    </br>
                                            </div>
                                            
                                                `

                                                document.getElementById("posts").appendChild(div);})})})
                
            }
        })

}


let updateHandler = () => {
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
    let profile_picture=queryString["profile_picture"];
    let username = document.getElementById("username_form");
    let full_name = document.getElementById("fullname_form");
    let bio = document.getElementById("bio_form");
    if(document.getElementById("profile_form").files[0]){
        profile_picture = document.getElementById("profile_form").files[0].name;
    }
    let password = document.getElementById("password_form");
    const xhr = new XMLHttpRequest();

    xhr.onload = function () {
        let response = JSON.parse(this.responseText);
        let res=response["User updated"];
        if(!res){
            if(count_update<1){
                document.getElementById("message").innerHTML="";
                let h1= document.createElement("h1");
                h1.textContent="Username already exist";
                h1.className = 'login-card-header';
                count_update++;
                message.appendChild(h1);
            }
        }else{
            window.location.href="../Frontend/home.php?id="+res[0]+"&username="+res[1]+"&fullname="+res[2]+"&bio="+res[4]+"&profile_picture="+res[5];
        }
    }

    xhr.open("POST", "../Backend/edit_user.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(`id=${queryString["id"]}&username=${username.value}&full_name=${full_name.value}&password=${password.value}&bio=${bio.value}&profile_picture=${profile_picture}`);
    
}
let profileHandler = () => {
    let queryString = new Array();
    if (queryString.length == 0) {
        if (window.location.search.split('?').length > 1) {
            let params = window.location.search.split('?')[1].split('&');
            let key = params[0].split('=')[0];
            let value = decodeURIComponent(params[0].split('=')[1]);
            queryString[key] = value;
        }
    }
    setPaths();
    let posts=[];
        fetch(`http://localhost/Instagram-like-website/Backend/list_myposts.php?id=${queryString["id"]}`, {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
         },
        }).then(response => response.text())
        .then(text => {
            posts=JSON.parse(text)["Posts"];
            for(let i=0;i<posts.length;i++){
                let post=posts[i];
                let user="";
                let likes=0;
                let comments=0;
                fetch(`http://localhost/Instagram-like-website/Backend/count_likes.php?post_id=${post["id"]}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                },
                }).then(response => response.text())
                .then(text => {
                    likes=JSON.parse(text)["Likes"];
                    fetch(`http://localhost/Instagram-like-website/Backend/count_comments.php?post_id=${post["id"]}`, {
                        method: 'GET',
                        headers: {
                            'Accept': 'application/json',
                        },
                        }).then(response => response.text())
                        .then(text => {
                            comments=JSON.parse(text)["Comments"];
                            fetch(`http://localhost/Instagram-like-website/Backend/get_user.php?posted_by=${post["posted_by"]}`, {
                                method: 'GET',
                                headers: {
                                    'Accept': 'application/json',
                                },
                                }).then(response => response.text())
                                .then(text => {
                                    user=JSON.parse(text)["Username"];
                                    let img=post["post_image"];
                                    let caption=post["caption"];
                                    let div = document.createElement('div');
                                                div.setAttribute('class', 'featured-body');
                                                div.innerHTML = `<div class="img-galery">
                                                <img src="../Backend/post-imgs/${img}" style="width:420px;height:570px;" />
                                                <div class="box">
                                                <div class="like-icon">
                                                <span id=like class="material-symbols-outlined">favorite</span>
                                                <h3>Liked by: ${likes} users</h3>
                                                </div>
                                                <div class="user-icon">
                                                <span class="material-symbols-outlined">person</span>
                                                <h3>Posted by: ${user}</h3>
                                                </div>
                                                <div class="caption-icon">
                                                <span class="material-symbols-outlined">chat</span>
                                                <h3>${caption}</h3>
                                                </div>
                                                <a href="../Frontend/view_comments.php" class="after">View all ${comments} comments...</a>
                                                <div class="comment-icon">
                                                <span class="material-symbols-outlined">group</span>
                                                </br>
                                                <a href="../Backend/delete_post.php" class="afterafter">Delete Post</a>
                                                </div>
                                                <div class="delete-icon">
                                                <span class="material-symbols-outlined">delete</span>
                                                </div>
                                                    </div>
                                                    </br>
                                            </div>
                                                `

                                                document.getElementById("posts").appendChild(div);})})})
                
            }
        })
}

let getCurrentDate=()=>{
    let currentDate = new Date();
    let currentYear = currentDate.getFullYear();
    let currentMonth = currentDate.getMonth();
    let currentDay = currentDate.getDate();
    let currentHours = currentDate.getHours();
    let currentMinutes = currentDate.getMinutes();
    let currentSeconds = currentDate.getSeconds();
    let date=currentYear + "-" + currentMonth + "-" + currentDay + " " + currentHours + ":" + currentMinutes + ":" + currentSeconds;
    return date;
}

let createPostHandler=()=>{
    let post_image = document.getElementById("post_image_form").files[0].name;
    let caption = document.getElementById("caption_form");
    let queryString = new Array();
    if (queryString.length == 0) {
        if (window.location.search.split('?').length > 1) {
            let params = window.location.search.split('?')[1].split('&');
            let key = params[0].split('=')[0];
            let value = decodeURIComponent(params[0].split('=')[1]);
            queryString[key] = value;
        }
    }
    const xhr = new XMLHttpRequest();

    xhr.onload = function () {
        let response = JSON.parse(this.responseText);
        let res=response["Post inserted"];
        window.location.href="../Frontend/my_profile.php?id="+res[0]+"&username="+res[1]+"&fullname="+res[2]+"&bio="+res[4]+"&profile_picture="+res[5];
    }

    xhr.open("POST", "../Backend/add_post.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(`post_image=${post_image}&caption=${caption.value}&posted_by=${queryString["id"]}&date_and_time=${getCurrentDate()}`);
}
