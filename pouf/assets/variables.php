<?php
/*
@ Mise en place des tableau pour le user et la recette
@ Conservation des variables
*/


$users = [
    [
        'firstName' => 'Happy ',
        'name' => 'Azanmassou',
        'email' => 'azanmassouhappylouis@gmail.com',
        'password' => 'Happy66',
        'age' => 34,
    ],
    [
        'firstName' => 'Israel ',
        'name' => 'Dossou',
        'email' => 'dossouisrael@gmail.com',
        'password' => 'Israel66',
        'age' => 35,
        
    ],
    [
        'firstName' => 'Gracias',
        'name' => 'Padonou',
        'email' => 'padonougracias@gmail.com',
        'password' => 'Israel66',
        'age' => 36,
    ],
];



$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => 'Recettes du Benin',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => 'Recettes du Togo',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => 'Recettes du Benin',
        'author' => 'mathieu.nebra@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Salade Romaine',
        'recipe' => 'Recettes du Ghana',
        'author' => 'laurene.castor@exemple.com',
        'is_enabled' => false,
    ],
];

