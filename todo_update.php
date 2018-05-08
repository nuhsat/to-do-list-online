<?php

  include 'db_connect.php';

    $postdata = file_get_contents("php://input");
    $id_todo = "";
    $judul = "";
    $deskripsi ="";
    $duedate = "";
    if (isset($postdata)) {
        $request = json_decode($postdata);
        $id_todo = $request->id_todo;
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;
        $duedate = $request->duedate;
        
        $query = mysqli_query($connect, "UPDATE todo_list SET judul='$judul', deskripsi='$deskripsi', duedate='$duedate' WHERE id_todo='$id_todo'");
         
       if($query){
           
            $data =array(
                'message' => "Update To do List Success!",
                'status' => "200"
            );
        }
        else {
            $data =array(
                'message' => "Update To do List Failed!",
                'status' => "404"
            ); 
        }

    
        echo json_encode($data);
    }
?>
