<?php

    include 'db_connect.php';

    $id_user = $_GET['id_user'];

    $query1 = mysqli_query($connect, "SELECT COUNT(judul) as total FROM todo_list WHERE id_user='$id_user'");

    //todo done
    $query2 = mysqli_query($connect, "SELECT COUNT(judul) as done FROM todo_list WHERE id_user='$id_user' AND status='1'");

        $result1 =mysqli_fetch_assoc($query1);
        $result2 =mysqli_fetch_assoc($query2);
        
        
        $data =array(
            'message' => "Total dan total yang udah",
            'data1' => $result1,
            'data2' => $result2,
            'status' => "200"
        );
   
      echo json_encode($data);
?>
