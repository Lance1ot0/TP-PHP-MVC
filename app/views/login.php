
    <h1>TOUS LES USERS</h1>

<?php

/** @var App\Entity\User[] $users */
foreach ($users as $user) {
    
    echo $user->getEmail(), $user->getFirstName();
}


