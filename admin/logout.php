<?php
require_once "../inc/config.php";

// Inicialize a sessão
session_start();
session_unset();
session_destroy();
header("Location: ".$config->urlLocal."/admin");
exit;
    