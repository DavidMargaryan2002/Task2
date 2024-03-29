<?php

session_start();
include 'Control.php';

$control = new Control();
$_SESSION['post'] = $control->getAll();

