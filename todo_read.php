<?php

    include 'db_connect.php';

    $id_user = $_GET['id_user'];

    $query = mysqli_query($connect, "SELECT * FROM todo_list WHERE id_user='$id_user' ORDER BY duedate ASC");

    if(mysqli_num_rows($query)){        
        $result_set = array();
        while($result =mysqli_fetch_assoc($query)){
            $result_set[]=$result;
        }
        
        $data =array(
            'message' => "To Do List ada",
            'data' => $result_set,
            'status' => "200"
        );
    }
    else{
        $data =array(
            'message' => "To Do List gagal",
            'status' => "404"
        );

    }
      echo json_encode($data);
?>
