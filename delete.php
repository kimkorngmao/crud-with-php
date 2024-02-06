<?php
    include("helpers/server.php");
    if(isset($_GET["id"])){
        $id =   $_GET['id'];
        $query = "DELETE FROM blog WHERE id=$id";
        $isSuccess = $connection->query($query);
        if($isSuccess){
            header ("Location: index.php");
            exit();
        }
    }