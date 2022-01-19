<?php
    if(isset($_POST['update']) && $_POST['update'] != ''){
        //資料更新
        $file = fopen("file.txt", "r");
        $user = array();
        $i = 0;
        while(! feof($file)){
            $user[$i]= fgets($file);
            $i++;
        }
        fclose($file);
        $update_id = $_POST['update'];
        $name = $_POST["name"];
        $id = $_POST["id"];
        $birthday = $_POST["birthday"];
        $birthday =  base64_encode($birthday);
        $phone = $_POST["phone"];
        $phone =  base64_encode($phone);
        $postcode = $_POST["postcode"];
        $address = $_POST["address"];
        $address =  base64_encode($address);
        $user[$update_id] = $name.",".$id.",".$birthday.",".$phone.",".$postcode.",".$address."\n";
        $fp = fopen('file.txt', 'w+');
        for($i=0; $i<count($user); $i++){
            $user_new = $user[$i];
            fwrite($fp, print_r($user_new, true));
        }
        // echo "123";
        // //資料修改
        // $users = '';
        // $file = "./file.txt";
        // $fh = fopen($file,'r+');

        // while(!feof($fh)) {
        //     $file_arr = file("file.txt",FILE_SKIP_EMPTY_LINES|FILE_IGNORE_NEW_LINES);
        //     file_put_contents("file.txt",implode("\n",$file_arr));

        //     $user = explode(',',fgets($fh));
        //     $name = trim($user[0]);
        //     $id = trim($user[1]);
        //     $birthday = trim($user[2]);
        //     $phone = trim($user[3]);
        //     $postcode = trim($user[4]);
        //     $address = trim($user[5]);
        //     if (!empty($name) AND !empty($id) AND !empty($birthday) AND !empty($phone) AND !empty($postcode) AND !empty($address)) {
        //         if ($id == '777') {
        //             $name = '1234';
        //         }

        //         $users .= $name.','.$id.','.$birthday.','.$phone.','.$postcode.','.$address."\n";
        //     }
        // }
        // file_put_contents('./file.txt', $users);
        // fclose($fh);
    }
    else{
        //資料新增(含驗證)
        if($_POST["name"]=="" && $_POST["id"]=="" && $_POST["birthday"]=="" && $_POST["phone"]=="" && $_POST["postcode"]=="" && $_POST["address"]==""){
            $url = "train4-input.html";
            echo "<script type='text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>"; 
        }else{
            $name = $_POST["name"];
            $id = $_POST["id"];
            $birthday = $_POST["birthday"];
            $birthday =  base64_encode($birthday);
            // echo $str;
            // echo base64_decode($str);
            $phone = $_POST["phone"];
            $phone =  base64_encode($phone);
            $postcode = $_POST["postcode"];
            $address = $_POST["address"];
            $address =  base64_encode($address);
            $fp = fopen('file.txt', 'a+');
            $size = filesize("file.txt");
            $user = $name.",".$id.",".$birthday.",".$phone.",".$postcode.",".$address."\n";
            fwrite($fp, print_r($user, true));

        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>資料提交完成</h1>
        <a href="/code/train4/train4-input.html" class="btn btn-info" >首頁</a>
        <form action="train4-back.php" method="post">
            <button type="submit" class="btn btn-danger">後台管理</button>
        </form>
    </div>
</body>
</html>
