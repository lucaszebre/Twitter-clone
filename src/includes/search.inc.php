<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "GET"){


include '../../config/dbh.classes.php';
include '../models/search.classes.php';
include '../controllers/search.contr.classes.php';
include '../views/search.view.classes.php';
$search= new SearchView();


$search->showSearchResult($_GET['val'],$_GET['hash']);




}