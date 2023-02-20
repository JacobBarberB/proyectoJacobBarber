<?php

include "../config/session.php";
include "parameters.php";

session_destroy();
header("location:".base_url."login/login");
?>