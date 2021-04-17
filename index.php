<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <title>ABC Bank</title>
</head>
<body id="main">

    <div class="main">

        <img src="./logo.svg" alt="" id="logo">

        <div class="container">
            <div class="center">
                <div class="intro">
                    <h3>Welcome to ABC Bank</h3>
                    <button class="CTA" onclick="location.href='./cust.php'">View All Customers</button>
                    <button class="CTA" onclick="location.href='./transaction.php'">View All Transaction</button>
                </div>
            </div>
            <div class="center intro-img">
                <img src="./homepage.svg" alt="">
            </div>
        </div>

    </div>
    
</body>
</html>