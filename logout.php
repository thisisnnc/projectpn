<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
header("Location:login.html");
session_destroy();