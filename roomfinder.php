<?php
    if(isset($_GET['serial'])){
        //dosomething
        $serialno=$_GET['serial'];
        $query="SELECT * FROM places WHERE `serial no` LIKE '%$serialno%'";
    }else if(isset($_GET['name'])){
        //dosomethingelse
        $name=$_GET['name'];
        $query="SELECT * FROM places WHERE name LIKE '%$name%'";
    }else{
        exit();
    }
    require_once('connect.php');
    $mycon= new places();
    $result = $mycon->query($query);
    while($row = $result->fetchArray()){
        $assoc[]=$row; 
    }
    //print_r($assoc);
    echo json_encode($assoc);
?>
