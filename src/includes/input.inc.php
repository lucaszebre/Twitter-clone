<?php 

if($_SERVER["REQUEST_METHOD"] == "GET"){

$searchTerm=$_GET["term"];



include '../../config/dbh.classes.php';
include '../models/search.classes.php';
include '../controllers/search.contr.classes.php';
$search= new searchController();

$data = $search->search($searchTerm);

echo json_encode($data); 




}
?>