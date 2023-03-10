<?php

    include_once('../../API/DBCRUDAPI.php');
    $DBCRUDAPI = new DBCRUDAPI();

    $attributes = ["documents.id","documents.category_id","documents.user_id","documents.file_document_name","documents.isRestricted","documents.updated_at","documents.created_at","documents.id","documents.id","categories.category_name","users.user_fname","users.user_mname","users.user_lname"];

    if(isset($_GET['getData'])){
        $DBCRUDAPI->selectDocuments($attributes);
        $data = $DBCRUDAPI->sql;
        $res = array();
        // var_dump($data);
        while($datass = mysqli_fetch_assoc($data)){
            $res[] = $datass;
        }
        echo json_encode($res);
    }
    else{
        if(isset($_POST['addNew'])){
            $user_id = $_POST["user_id"];
            $file_document_name = $_POST["file_document_name"];
            $category_id = $_POST["category_id"];
            $isRestricted = $_POST["isRestricted"];

            $DBCRUDAPI->insert('documents',['category_id'=>$category_id,'user_id'=>$user_id,'file_document_name'=>$file_document_name,'isRestricted'=>0]);

             if($DBCRUDAPI){
                echo json_encode(array("success"=>true));
            }else{
                echo json_encode(array("success"=>false));
            }
            
        }else if(isset($_POST['update'])){
            
            $id = $_POST["id"];
            $user_id = $_POST["user_id"];
            $file_document_name = $_POST["file_document_name"];
            $category_id = $_POST["category_id"];
            $isRestricted = $_POST["isRestricted"];

            $DBCRUDAPI->update('documents',['category_id'=>$category_id,'user_id'=>$user_id,'isRestricted'=>$isRestricted,'file_document_name'=>$file_document_name],"id='$id'");
             if($DBCRUDAPI){
                echo json_encode(array("success"=>true));
            }else{
                echo json_encode(array("success"=>false));
            }
        }else if(isset($_POST['delete'])){
            
            $id = $_POST["id"];

            $DBCRUDAPI->delete('documents',"id='$id'");
             if($DBCRUDAPI){
                echo json_encode(array("success"=>true));
            }else{
                echo json_encode(array("success"=>false));
            }

        }
    }


?>