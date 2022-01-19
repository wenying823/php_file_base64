<?php
    $file = fopen("file.txt", "r");
    $user = array();
    $i = 0;
    while(! feof($file)){
        $user[$i]= fgets($file);
        $i++;
    }
    fclose($file);
    if(isset($_GET['edit']) && $_GET['edit'] != ''){
        //特定資料編輯
        $id= $_GET['edit'];
        $user_detail_array = explode(",",$user[$id]);

    }else{
        //資料刪除
        $id= $_GET['delete'];
        unset($user[$id]);
        $user = array_values($user);
        $fp = fopen('file.txt', 'w+');
        for($i=0; $i<count($user); $i++){
            $user_new = $user[$i];
            fwrite($fp, print_r($user_new, true));
        }
        $url = "train4-back.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>"; 
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>會員資料修改</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2>會員資料修改</h2>

            <form action="train4.php" method="post">
                <div class="form-group">
                    <label for="email">姓名:</label>
                    <input type="name" class="form-control" required="required" id="name" placeholder="請輸入姓名" name="name" value="<?php echo $user_detail_array[0]?>">
                </div>
                <div class="form-group">
                    <label for="pwd">身分證字號:</label>
                    <input type="id" class="form-control" required="required" id="id" placeholder="請輸入身分證字號" name="id" value="<?php echo $user_detail_array[1]?>">
                </div>
                <div class="form-group">
                    <label for="pwd">生日:</label>
                    <input type="date" class="form-control" required="required" id="birthday" placeholder="請輸入生日" name="birthday" value="<?php echo base64_decode($user_detail_array[2])?>">
                </div>
                <div class="form-group">
                    <label for="pwd">電話:</label>
                    <input type="phone" class="form-control" required="required" id="phone" placeholder="請輸入電話" name="phone" value="<?php echo base64_decode($user_detail_array[3])?>">
                </div>
                <div class="form-group">
                    <label for="pwd">郵遞區號:</label>
                    <input type="postcode" class="form-control" required="required" id="postcode" placeholder="請輸入郵遞區號" name="postcode" value="<?php echo $user_detail_array[4]?>">
                </div>
                <div class="form-group">
                    <label for="pwd">住址:</label>
                    <input type="address" class="form-control" required="required" id="address" placeholder="請輸入住址" name="address" value="<?php echo base64_decode($user_detail_array[5])?>">
                </div>
                <button type="submit" class="btn btn-success" value="<?php echo $id?>" name="update">修改</button>
            </form>
            
            <form action="train4-back.php" method="post">
                <button type="submit" class="btn btn-danger">後台管理</button>
            </form>
        </div>

    </body>
</html>