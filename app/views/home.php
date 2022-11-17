
    <h1>TOUS LES POSTS</h1>

    <a href="signUp">Sign Up</a>
    <br>
    <a href="login">Login</a>
    <br><br><br>

<?php
/** @var App\Entity\Post[] $posts */
foreach ($posts as $post) {
    
    echo $post->getContent(), $post->getAuthor(). "<br>";
}

