<?php 
$acc = $_GET['userID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <title>Transfer</title>
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

                        $beni_query = "SELECT * FROM CUSTOMER";
                        $qry = mysqli_query($conn, $beni_query);

                        $res = mysqli_fetch_array($query);


                    ?>
                    <h4 class="info-1">A/C Number - <span class="info"><?php echo $res['acc_no']; ?></span> </h4>
                    <h4 class="info-1">Name - <span class="info"><?php echo $res['name']; ?></span> </h4>
                    <h4 class="info-1">Balance - <span class="info"><?php echo $res['balance']; ?></span></h4>
                    
                    
                    <?php
                            $bal =  $res['balance'];
                    ?>

                    <form action="./transfer_call.php" method="get">
                        <input type="hidden" name="userID" value="<?php echo $res['acc_no']; ?>">
                        <input type="hidden" name="bal" value="<?php echo $bal ?>">
                        <input type="hidden" name="name" value="<?php echo $res['name'] ?>">
                        <h4 class="info-1">Transfer to - 
                            <select name="beni">
                                <option disabled="disabled" selected="selected">Select an Account</option>
                                <?php 
                                while($beni_res = mysqli_fetch_array($qry)){
                                ?>

                                <option value=<?php echo $beni_res["acc_no"] ?>><?php echo $beni_res["acc_no"] ?> | <?php echo $beni_res["name"] ?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </h4>
                        <h4 class="info-1">Amount - RS<input type="text" name="amount" id="amount" onchange="changed()" onkeypress="isInputNumber(event)" maxlength="16"></h4>
                        <input class="CTA" type="submit" name="transfer" value="Transfer Money">
                    </form>
                </div>
            </div>
            <div class="center intro-img">
                <img src="./transfer.svg" alt="">
            </div>
        </div>

    </div>




    <script type="text/javascript">

        function changed() {
            var curr_bal = parseInt("<?php echo $bal ?>");
            var amt = parseInt($("#amount").val());
            
            if(amt==""){
                alert("Please Enter an amount to transfer");
            }else{
                if (amt>curr_bal) {
                alert("You don't have enough money");
                }
            }
        }

        function transfer() {
            var curr_bal = "<?php echo $bal ?>";
            var amt = $("#amount").val();
            if(amt <= curr_bal){
                alert("true");
            }else{
                alert("false");
            }
            // alert(ab+"ab"+curr_bal);
            // aaaa();
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./transfer.js?v=<?php echo time(); ?>"></script>
</body>
</html>