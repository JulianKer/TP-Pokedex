<?php
session_start();

session_unset();

session_destroy();

header("location:/TP-Pokedex/index.php");
exit();
