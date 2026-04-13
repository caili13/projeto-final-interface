<?php
$query = $_SERVER['QUERY_STRING'];
header('Location: frontend/login.php' . ($query ? '?' . $query : ''));
exit;
