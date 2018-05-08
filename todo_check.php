<?php

  include 'db_connect.php';

    $postdata = file_get_contents("php://input");
    $id_todo = "";
    if (isset($postdata)) {
        $request = json_decode($postdata);
        $id_todo = $request->id_todo;
        
        $query = mysqli_query($connect, "UPDATE todo_list SET status='1' WHERE id_todo='$id_todo'");
         
       if($query){
           
            $data =array(
                'message' => "Check To do List Success!",
                'status' => "200"
            );
        }
        else {
            $data =array(
                'message' => "Check To do List Failed!",
                'status' => "404"
            ); 
        }

    
        echo json_encode($data);
    }
?>
