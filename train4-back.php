<?php
    //後臺資料view
    $file = fopen("file.txt", "r");
    $user = array();
    $i = 0;
    while(! feof($file)){
        $user[$i]= fgets($file);
        $i++;
    }
    fclose($file);
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
    <title>會員資料</title>
</head>
<body>
    <div class="container">
        <h2>會員資料</h2>          
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>姓名</th>
                    <th>身份証號</th>
                    <th>生日</th>
                    <th>電話</th>
                    <th>郵遞區號</th>
                    <th>住址</th>
                    <th>功能</th>
                </tr>
            </thead>
            <tbody>
                <form action='train4-edit.php' method='get'>
                <?php
                    $user_count = count($user);
                    for($i=0; $i<$user_count; $i++){
                        if($user[$i]!=""){
                            echo "<tr>";
                            $user_detail_array = explode(",",$user[$i]);
                            for($j=0; $j<count($user_detail_array); $j++){
                                if($j==2 || $j==3 || $j==5){
                                    echo "<td>";
                                    echo base64_decode($user_detail_array[$j]);
                                    echo "</td>";
                                }else{
                                    echo "<td>";
                                    echo $user_detail_array[$j];
                                    echo "</td>";

                                }
                            }
                            echo "<td>";
                                // echo "<a type='submit' class='btn btn-warning btn-xs' href='/code/train4/train4-edit.php?id={$i}'>編輯</a>";
                                echo "<button type='submit' class='btn btn-warning btn-xs' name='edit' value='$i'>編輯</button>";
                                echo "&nbsp";
                                echo "<button type='submit' class='btn btn-danger btn-xs' name='delete' value='$i'>刪除</button>";
                            echo "</td>";
                            echo "</tr>";

                        }
                    }
                    

                ?>
                </form>
            </tbody>
        </table>
        <a href="/code/train4/train4-input.html" class="btn btn-info" >首頁</a>
    </div>
</body>
</html>