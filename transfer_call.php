<?php
    $acc = $_GET['userID'];
    $bal = $_GET['bal'];
    $beni = $_GET['beni'];
    $amt = $_GET['amount'];
    $name = $_GET['name'];

    if(isset($_GET['transfer'])){

        if ($amt < 1) {
            header("Location: ./cust.php");
            exit();
        } else {
            require './partial/sqlConnect.php';

            $beni_bal = "SELECT balance, name FROM CUSTOMER WHERE acc_no = $beni";
            $query = mysqli_query($conn, $beni_bal);
            $res = mysqli_fetch_array($query);
            
            $beniBal = $res['balance']+$amt;
            $beniName = $res['name'];

            
            $sql = "UPDATE CUSTOMER SET balance = $bal - $amt WHERE acc_no = $acc;
                    UPDATE CUSTOMER SET balance = $beniBal WHERE acc_no = $beni;
                    INSERT INTO `transfer` (`Sender A/C No`, `Sender Name`, `Receiver A/C No`, `Receiver Name`, `Amount`) 
                    VALUES ('$acc', '$name', '$beni', '$beniName', '$amt')";

            if(mysqli_multi_query($conn, $sql)){
                header("Location: ./transaction.php");
                exit();
            }else{
                echo mysqli_error($conn);
            }

            
            
        }
        


        
    }
    else {
        header("Location: ./cust.php");
        exit();
    }
?>