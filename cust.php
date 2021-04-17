<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <title>Customer</title>
</head>
<body>
    <img src="./logo.svg" alt="" class="logo">

    <h2 class="bg-1">All Customer</h2>
    
    <div class="center">
        <table class="cust">
            <tr>
                <th>Account Number</th>
                <th>Name</th>
                <th>Balance</th>
                <th>Detail</th>
            </tr>

            <?php

            require './partial/sqlConnect.php';

            $select_query = "SELECT * FROM CUSTOMER";

            $query = mysqli_query($conn, $select_query);

            while ($res = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $res['acc_no']; ?></td>
                    <td><?php echo $res['name']; ?></td>
                    <td><?php echo $res['balance']; ?></td>
                    <td><button onclick="location.href='./detail.php?userID=<?php echo $res['acc_no']; ?>'">View Detail</button></td>
                </tr> 

            <?php
            }

            ?>      
        </table>
    </div>

    <img src="./logo.svg" alt="" class="logo-end">

</body>
</html>