<?php 
    if(isset($_FILES['file'])){
        $errors= array();
        $file_name = $_FILES['file']['name'];
        $file_size =$_FILES['file']['size'];
        $file_tmp =$_FILES['file']['tmp_name'];
        $file_type=$_FILES['file']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"./uploads/".$file_name);
           echo "Success";
        }else{
           print_r($errors);
        }

        $file_name_with_full_path = "./uploads/".$file_name;
        $target_url = "https://ogramcloud.com/api/upload";
        
        if (function_exists('curl_file_create')) { // php 5.5+
            $cFile = curl_file_create($file_name_with_full_path);
        } else { // 
            $cFile = '@' . realpath($file_name_with_full_path);
        }
        $post = array('chat_id' => '267092256','file'=> $cFile);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$target_url);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $result=curl_exec($ch);
        curl_close($ch);

        echo $result;
     }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP upload to OgramCloud</title>
    </head>
    <body>
        <h1>OgramCloud PHP-Client</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="chat_id"><br/>
            <input type="file" name="file" >
            <input type="submit" name="submit" value="Envoyer">
        </form>
    </body>
</html>