<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home_style.css"/>
    <link rel="icon" href="logos/instagram.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Instagram</title>
</head>
<body>
<div class="container">
  <div class="all flex-row">
    <div class="menu flex-column">
      <div class="flex-row label-wrapper">
        <img src="logos/instagram.png" />
        <h3 class="insta-writing">Instagram</h3>
      </div>
      <div class="profil-img"></div>
      <div class="profil-info">
        <h2 class="username">Username</h2>
        <h3 class="username">Full Name</h3>
        <p class="bio">Bio</p>
        <div class="numbers">
          <div class="post">
            <p>Posts</p>
            <div class="post-num">Post num</div>
          </div>
        </div>
        <div class="menu-elements">
          <div class="icons">
          <span class="material-symbols-outlined">home</span>
            <div class="feed-writing"> 
            <a href="../Frontend/home.php" class="feed-writing">Feed</a>
            </div>
          </div>
          <div class="icons">
          <span class="material-symbols-outlined">settings</span>
            <a href="../Frontend/edit_profile.php" class="feed-writing">Edit Profile</a>
          </div>
          <div class="icons">
          <span class="material-symbols-outlined">manage_accounts</span>
            <a href="../Frontend/my_profile.php" class="feed-writing">My Profile</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="right-page">
    <div class="top-bar">
      <div class="cover-post">
        <button class="button post-new"> <a href="../Frontend/create_post.php">Create New Post</a> </button>
      </div>
    </div>
    <hr class="hr-new">
    <div class="right-of-page">
      <div class="right-middle">
     <div class="featured">
        <div class="featured-header">
        <h2 class="featured-stories"> My Posts</h2>
         <div class="icon-two">
        <div class="icon3"></div>
        </div>
        </div>
        <div class="featured-body">
                <div class="img-galery">
                    <img src="https://images.unsplash.com/photo-1426543881949-cbd9a76740a4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60" />
                    <div class="box">
                    <div class="like-icon">
                    <span id=like class="material-symbols-outlined">favorite</span>
                    <h3>Liked by: 200 users</h3>
                    </div>
                    <a href="../Frontend/view_comments.php" class="after">View all 180 comments...</a>
                    <div class="comment-icon">
                    <span class="material-symbols-outlined">chat</span>
                    <br/>
                    <a href="../Backend/delete_post.php" class="afterafter">Delete Post</a>
                    </div>
                    <div class="delete-icon">
                    <span class="material-symbols-outlined">delete</span>
                    
                    </div>
                        </div>
                </div>
        </div>
    </div>
  </div>
</div>
</body>
</html>
