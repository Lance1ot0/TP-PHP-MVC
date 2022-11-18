
    <h1>TOUS LES POSTS</h1>

    

    <?php if (!$_SESSION): ?>
        <a href="signUp">Sign Up</a>
        <br>
        <a href="login">Login</a>
        <br><br><br>
    <?php else: ?>
        <a href="logout">Logout</a>
        <br><br><br>
    <?php endif; ?>

<?php
/** @var App\Entity\Post[] $posts */
foreach ($posts as $post) {
    
    echo $post->getContent(), $post->getAuthor(). "<br>";
}