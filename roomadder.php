<?php
    if(isset($_POST['name']) && isset($_POST['serial'])){
        require_once("connect.php");
        $mycon= new places();
        $name = $_POST['name'];
        $serial = $_POST['serial'];
        $query="INSERT INTO places VALUES (NULL,'$serial','$name')";
        $result = $mycon->query($query);
        var_dump($result);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <script src='jquery-3.1.1.min.js'></script> 
        <script>
$(document).ready(function (){
    $('#serial').keyup(function(){
        $.get("roomfinder.php",{serial: $("#serial").val()},function(data){
            $('#serialops').html('');
            $('#nameops').html('');
            decdata = JSON.parse(data);
            var currentelem=decdata.pop();
            while(currentelem){
                $('#serialops').append("<option value='"+currentelem['serial no']+"'>"+currentelem['serial no']+"</option>"); 
                $('#nameops').append("<option value='"+currentelem['name']+"'>"+currentelem['name']+"</option>");
                currentelem = decdata.pop();
            }
        });
    });
    /*
    $('#name').keyup(function(){
        $.get("roomfinder.php",{name: $("#name").val()},function(data){
            $('#nameops').html('');
            $('#serialops').html('');
            decdata = JSON.parse(data);
            var currentelem = decdata.pop(); 
            while(currentelem){
                $('#serialops').append("<option value='"+currentelem['serial no']+"'>"+currentelem['serial no']+"</option>");
                $('#nameops').append("<option value='"+currentelem['name']+"'>"+currentelem['name']+"</option>");
                currentelem = decdata.pop();
            }
        }); 
    }); */ 
    $('#add').click(function(){
        $.post(windows.location,{name: $('#name').val(), serial: $("#serial").val()},function(data){alert(data);});
    });
}); 
        </script>
    </head>
    <body>
        <input type='text' name='serial' id='serial' placeholder='serial no'>
        <input type='text' name='name' id='name' placeholder='name'><br>
        <select name='serialops' id='serialops' multiple></select>
        <select name='nameops' id='nameops' multiple></select>
        <button name='add' id='add'>Add</button>
    </body>
</html>
