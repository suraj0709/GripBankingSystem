<?php 
$acc = $_GET['userID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Detail</title>
</head>
<body id="main">

    <div class="main">

        <img src="./logo.svg" alt="" id="logo">

        <div class="container">
            <div class="center">
                <div class="">
                    <?php
                    require './partial/sqlConnect.php';

                    $select_query = "SELECT * FROM CUSTOMER WHERE acc_no=$acc";
                    $query = mysqli_query($conn, $select_query);
                    $res = mysqli_fetch_array($query);

                    ?>
                    <h4>A/C Number - <?php echo $res['acc_no']; ?></h4>
                    <h4>Name - <?php echo $res['name']; ?></h4>
                    <h4>Balance - <?php echo $res['balance']; ?></h4>
                    <button class="CTA" onclick="location.href='./transfer.php?userID=<?php echo $res['acc_no']; ?>'">Transfer Money</button>
                </div>
            </div>
            <div class="center intro-img">
                <img src="./detail.svg" alt="">
            </div>
        </div>

    </div>
    
</body>
</html>