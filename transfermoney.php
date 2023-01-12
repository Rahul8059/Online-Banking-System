<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Transfer Money</title>
    <link rel="stylesheet" href="style.css">

    

</head>
           
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
<body style="background-color :#616b99f2;">
<?php
    include 'config.php';
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
?>




<div class="container2">
        <h2 class="text" style="color : #661236;padding:20px 0  10px 230px;">Transfer Money</h2>
        <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table" style="border-color:black;" border=1>
                        <thead class="red">
                            <tr>
                            <th scope="col" class="text-center py-2">SR.NO</th>
                            <th scope="col" class="text-center py-2">Name</th>
                            <th scope="col" class="text-center py-2">E-Mail</th>
                            <th scope="col" class="text-center py-2">Balance</th>
                            <th scope="col" class="text-center py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    $cnt=1;
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr style="color : black;">
                        <td class="py-2"><?php echo $cnt;; ?></td>
                        <td class="py-2"><?php echo $rows['name']?></td>
                        <td class="py-2"><?php echo $rows['email']?></td>
                        <td class="py-2">Rs. <?php echo $rows['balance']?> /-</td>
                        <td><a href="selecteduserdetail.php?id= <?php echo $rows['id'] ;?>">
                         <button type="button" class="btn6" style="background-color : yellow;" style="border-radius:0%;">Proceed</button></a></td> 
                    </tr>
                <?php
                $cnt=$cnt+1;
                    }
                ?>
            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
         </div>
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