<?php
include 'url_shortner/include/connection/init.php';
include 'url_shortner/include/function/user_function.php';
logout();
header('Location:signup_form.php');