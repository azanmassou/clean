<?php


if (isset($_SESSION['psuedo']) AND !empty(isset($_SESSION['psuedo']))){

    require "app/administrateur/template-tableau-de-bord.php";

}else{

    require "app/administrateur/template.php";
    
}

