<?php

function logout()
{
    if ($_SERVER['REQUEST_METHOD'] === "POST"){
        if (isset($_POST["logout"]) && $_POST["logout"] === 1){
            session_destroy();
            echo "Logout successfully.";
        }
    }
}