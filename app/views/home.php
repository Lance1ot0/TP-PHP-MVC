
    <h1>TOUS LES POSTS</h1>

    

    <?php if (!$_SESSION): ?>
        <a href="signUp">Sign Up</a>
        <br>
        <a href="login">Login</a>
        <br><br><br>
    <?php else: ?>
        <h1>Bienvenue <?php echo $_SESSION['username'] ; ?></h1>
        <a href="logout">Logout</a>
        <br><br><br>

        <form action="/" style="border:1px solid #ccc" method="POST">
        <div class="container">
            <h1>Create Post</h1>

            <textarea name="content" placeholder="New post..."></textarea>
            <div class="clearfix">
  
                <button type="submit" class="signupbtn">Publish</button>
            </div>
        </div>

    </form>
    <?php endif; ?>

<?php
/** @var App\Entity\Post[] $posts */
foreach ($posts as $post) {        ?>

        <div style="margin:10px; padding:10px 20px; border-radius:4px; width:fit-content; height:fit-content; background-color:lightblue; background: #FFFFFF;
box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.25);font-family:sans-serif;">   
            <h2><?= $post->getAuthor() ?></h2>
            <h5><?= $post->getContent() ?></h5>
            <p style="color:grey"><?= $post->getCreatedAt() ?></p>

        </div>
    
    <?php
}