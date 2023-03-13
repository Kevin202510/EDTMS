<?php

    include_once('../../API/DBCRUDAPI.php');
    $DBCRUDAPI = new DBCRUDAPI();

    $attributes = ["documents.id","documents.document_name","documents.category_id","documents.user_id","documents.file_document_name","documents.isRestricted","documents.updated_at","documents.created_at","documents.id","documents.id","categories.category_name","users.user_fname","users.user_mname","users.user_lname","users.email"];

    if(isset($_GET['getData'])){
        $whereClause = "documents.user_id=".$_GET['user_id']."";
        $DBCRUDAPI->selectDocuments($attributes,$whereClause);
        $data = $DBCRUDAPI->sql;
        $res = array();
        // var_dump($data);
        while($datass = mysqli_fetch_assoc($data)){
            $res[] = $datass;
        }
        echo json_encode($res);
    }else if(isset($_GET['selectAll'])){
        // $whereClause = "documents.user_id=".$_GET['user_id']."";
        $DBCRUDAPI->select("documents","*");
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
            $email = $_POST["email"];
            $document_name = $_POST["document_name"];
            $file_document_name = $_FILES['file']['name'];
            $category_id = $_POST["category_id"];
            $isRestricted = $_POST["isRestricted"];

            if(isset($_FILES['file']['name'])){

                /* Getting file name */
                $filename = $_FILES['file']['name'];

                /* Location */
                $location = "../../assets/documents/".$email."";
                $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileType);

                /* Valid extensions */
                $valid_extensions = array("jpg","jpeg","png","pptx","docx","pdf","xlsx","txt");

                $response = 0;
                /* Check file extension */
                if(in_array(strtolower($imageFileType), $valid_extensions)) {
                    /* Upload file */
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
                        $response = $location;
                    }
                }
            }

            $DBCRUDAPI->insert('documents',['category_id'=>$category_id,'user_id'=>$user_id,'file_document_name'=>$file_document_name,'isRestricted'=>0]);

             if($DBCRUDAPI){
                echo json_encode(array("success"=>true));
            }else{
                echo json_encode(array("success"=>false));
            }
            
        }else if(isset($_POST['update'])){
            
            $id = $_POST["id"];
            $user_id = $_POST["user_id"];
            $email = $_POST["email"];
            $document_name = $_POST["document_name"];
            $file_document_name = $_FILES['file']['name'];
            $category_id = $_POST["category_id"];
            $isRestricted = $_POST["isRestricted"];

            if(isset($_FILES['file']['name'])){

                /* Getting file name */
                $filename = $_FILES['file']['name'];

                /* Location */
                $location = "../../assets/documents/".$email."/".$filename;
                $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileType);

                /* Valid extensions */
                $valid_extensions = array("jpg","jpeg","png","pptx","docx","pdf","xlsx","txt");

                $response = 0;
                /* Check file extension */
                if(in_array(strtolower($imageFileType), $valid_extensions)) {
                    /* Upload file */
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
                        $response = $location;
                    }
                }
            }

            $DBCRUDAPI->update('documents',['category_id'=>$category_id,'user_id'=>$user_id,'isRestricted'=>$isRestricted,'file_document_name'=>$file_document_name,"document_name"=>$document_name],"id='$id'");
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