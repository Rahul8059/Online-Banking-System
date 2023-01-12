<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Sorry, Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Completed');
                                     window.location='transactionhistory.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
   
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color :#616b99f2">
<div id="navs">
            <img class= "logo" src="image/bnk.jpg">
            <b class="head">ONLINE BANKING SYSTEM</b>
            <nav><strong>
            <a class="anchor" href="index.php">Home</a>
            <a class="anchor" href="transfermoney.php">View & Transfer</a>
            <a class="anchor" href="transactionhistory.php">Transfer History</a>
            <a class="anchor" class="bottom" href="#bottom">About us</a>
        </strong>
        </nav>
    </div>
 <hr>

	<div class="container4">
        <h2 class="transfer" style="color :#661236;padding:35px 0 0 0px; text-align: center!important;font: weight 500px;">Transaction From Account</h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div class="con">
            <table class="table1" border=3>
                <tr style="color :black ;">
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Total Balance</th>
                </tr>
                <tr style="color : black;">
                    <td class="py-2"><?php echo $rows['id'] ?></td>
                    <td class="py-2"><?php echo $rows['name'] ?></td>
                    <td class="py-2"><?php echo $rows['email'] ?></td>
                    <td class="py-2">Rs. <?php echo $rows['balance'] ?></td>
                </tr>
            </table>
            <hr>
        </div>
        <br>
        
        <div class="row">
        
            <div class="co">
            <h2 class="te" style="color :#661236;padding:15px 0 50px 650px;position:relative;
            bottom:30px;">Transaction To Account</h2>
        <label  class="lab" style="color :#661236;font-weight:bolder;font-size:1.3rem;padding:0 0 0 435px;position:relative;
            bottom:30px;">Transfer To:</label><select name="to" class="form" required style="width: 180px;height:30px;margin:0 0 20px 10px;position:relative;
            bottom:30px;">

            <option value="" disabled selected>Select Account</option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        </div>


        <div class="col-6">
            <label style="color :#661236;;font-weight:bold;font-size:1.3rem;position:relative;
            bottom:80px;left:820px;">Amount:</label>
            <input type="number" class="form-control" style="width: 180px;height:30px;margin:0 0 20px 10px;position:relative;
            bottom:80px;left:820px;" name="amount" required> 
        </div>
        
        </div>
              
            <br><br>
                <div class="button" >
            <button class="btn7" name="submit" type="submit" id="myBtn" >Transfer Amount</button>
            </div>
        </form>
    </div>
    <footer ">
    <div class="bottom" id="bottom">
        <h4 class="bot">FIND US ON SOCIAL MEDIA</h4>
        <a href="www.facebook.com"></a>
        <img class="img" src="image/ff.jpg">
        <a href="www.twitter.com"></a> <img class ="img" src="image/tw.png">
        <a href="www.instagram.com"></a><img class ="img" src="image/ins.jpg">
        <p class="ii"><strong>© 2023 Rahul Yadav.@ Online Banking System</strong></p>

    </div>
    </footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>