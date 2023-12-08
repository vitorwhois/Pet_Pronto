<?php
session_start();
session_destroy();
header('Location: loginvet.php');
exit();