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
                <th>Sender A/C No.</th>
                <th>Sender Name</th>
                <th>Receiver A/C No.</th>
                <th>Receiver Name</th>
                <th>Amount</th>
            </tr>

            <?php

            require './partial/sqlConnect.php';

            $select_query = "SELECT * FROM transfer";

            $query = mysqli_query($conn, $select_query);

            while ($res = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $res['Sender A/C No']; ?></td>
                    <td><?php echo $res['Sender Name']; ?></td>
                    <td><?php echo $res['Receiver A/C No']; ?></td>
                    <td><?php echo $res['Receiver Name']; ?></td>
                    <td><?php echo $res['Amount']; ?></td>
                </tr> 

            <?php
            }

            ?>      
        </table>
    </div>

    <img src="./logo.svg" alt="" class="logo-end">

</body>
</html>