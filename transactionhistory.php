<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     -->
    </style>
</style>
</head>

<body style="background-color : #616b99f2;">


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
	<div class="container2">
        <h2 class="text-" style="color :#661236;padding:20px 0  10px 230px;">Transaction History</h2>
        
       <br>
       <div class="table-responsive-sm">
    <table class="table"style="border-color:black;" border=1>
        <thead style="color : white;">
            <tr>
                <th class="text-center">S.No.</th>
                <th class="text-center">Sender</th>
                <th class="text-center">Receiver</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Date & Time</th>
            </tr>
        </thead>
        <tbody>
        <?php

            include 'config.php';

            $sql ="SELECT * FROM transaction";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr style="color : white;">
            <td class="py-2"><?php echo $rows['sno']; ?></td>
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['receiver']; ?></td>
            <td class="py-2">Rs. <?php echo $rows['balance']; ?> /-</td>
            <td class="py-2"><?php echo $rows['datetime']; ?> </td>
                
        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</div>
<footer class="text mt-5 py-2">
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