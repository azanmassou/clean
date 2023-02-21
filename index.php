<?php

session_start();

require_once "app/commun/function.php";

if (isset($_GET["profile"]) && !empty($_GET["profile"])) {

    switch ($_GET["profile"]) {

        case "client":
            require "app/client/index.php";
            break;

        case "agent-service-commerciale":
            require "app/agent-service-commerciale/index.php";
            break;

        case "chef-service-production":
            require "app/chef-service-production/index.php";
            break;

        case "chef-service-commerciale":
            require "app/chef-service-commerciale/index.php";
            break;

        case "administrateur":
            require "app/administrateur/index.php";
            break;

        default:
            require "app/client/index.php";
            break;
    }
    
} else {

    require "app/administrateur/index.php";

}
