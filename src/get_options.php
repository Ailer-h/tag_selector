<?php

    $server = "127.0.0.1";
    $user = "root";
    $password = "";
    $database = "test";

    $connection = mysqli_connect($server,$user,$password,$database) or die ("Couldn't connect to the database!");

    $search = $_POST['search'];
    $selected = explode("-", $_POST['selected']);
    
    $query = mysqli_query($connection, "select id_opt, name_opt from options where name_opt like '%$search%' order by name_opt");

    if($query){
        
        while($out = mysqli_fetch_array($query)){
            echo"<div class='opt'>";
            echo"<input type='checkbox' name='opt$out[0]' id='opt$out[0]' value='$out[0]'>";
            echo"<label for='opt$out[0]'>$out[1]</label>";
            echo"</div>";
        }

    }else{
        echo "EMPTY";
    }

    mysqli_close($connection);

?>