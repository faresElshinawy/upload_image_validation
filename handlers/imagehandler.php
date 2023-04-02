<?php
    session_start();
    $errors = [];
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_FILES['image'])){
        if(!empty($_FILES['image']['name'])){
            $file = $_FILES['image'];
            $image_name = $file['name'];
            $image_type = $file['type'];
            $image_tmp_name = $file['tmp_name'];
            $image_error = $file['error'];
            $image_size = $file['size'];
            $img_approve = getimagesize($image_tmp_name);
            $allowed_ext = [
                'image/jpeg' => 'jpeg',
                'image/png' => 'png',
                'image/gif' => 'gif'
            ];
            if($image_error == '0'){
            if($img_approve){
                if(array_key_exists($img_approve['mime'],$allowed_ext)){
                    $img_ext = pathinfo($image_name,PATHINFO_EXTENSION);
                    $img_new_name = uniqid("",true) . '.' .$img_ext;
                }else{
                    $errors[] = 'file extension is not allowed';
                }
            }else{
                $errors[] = "file must be of type image";
            }
        }else{
            $errors[] = 'errors with uploaded file please choose anthoer one';
        }
        }else{
            $errors[] = 'image is require';
        }
    }else{
        $errors[] = 'image is require';
    }
    if(empty($errors)){
        move_uploaded_file($image_tmp_name,'../uploaded/' . $img_new_name);
        $_SESSION['success'] = 'file uploaded successfully';
        header("location: ../index.php");
    }else{
        $_SESSION['errors'] = $errors;
        header("location: ../index.php");
    }

}else{
    $_SESSION['errors'] = ['wrong request method'];
    header("location: ../index.php");
}