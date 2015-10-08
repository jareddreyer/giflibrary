<?php
include_once "gifs-config.php";
include "gifs.class.php";

//check if url parameter is actually a number 

if (isset($_GET['showpage']) && is_numeric($_GET['showpage']))
{
    $gifs = new imagePaginator($json, $directory);    
    echo $gifs->buildPagination();
    echo $gifs->buildResult();
    echo $gifs->buildPagination();
    echo $gifs->currentPage;
    
} else {
    echo '<p> The request you made, was not possible, please go back <a href="index.php">home</a></p>';
}



?>