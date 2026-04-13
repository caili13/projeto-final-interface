<?php
$query = $_SERVER['QUERY_STRING'];
header('Location: frontend/register.php' . ($query ? '?' . $query : ''));
exit;
