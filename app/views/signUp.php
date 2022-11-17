
    <h1>Sign Up</h1>
    <a href="/">Home</a>

<?php

/** @var App\Entity\User[] $users */
foreach ($users as $user) {
    
    echo $user->getEmail(), $user->getFirstName();
}

