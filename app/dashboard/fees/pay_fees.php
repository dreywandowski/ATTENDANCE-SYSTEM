<!doctype html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Pay Bills </title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="../../css/dashboard-payment.css">
	<script>
        function menuFunction() {
        var x = document.getElementById("myLinks");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
        }
    </script>
</head>

<?php
session_start();
require_once "../../config/connect.php";

if (!isset($_SESSION['username']) 
&& !isset($_SESSION['password'])){
header("Location:error.php");
}

if ($_SESSION['role'] != 'student'){
    header("Location:error.php");
}

?>

<body>
    
<p style='color:white'> <u>Make your payments here.<br></u></p>
<p style='color:red'> <u>Please note that your appointments will not be honoured if you haven't made a payment.</u></p><br><br>

<span id="ajax"></span><br><br>
<div class="mainContainer">
        <div class="mainContain">
        <div class="headerContent">
            <div class="profile-picture-1">
                <img src="../images/male-profile-picture.jpg">
            </div>
            <header>
                <div class="home"><a href="../index.php"><i class="fas fa-home" title="Dashboard home"></i></a></div>
                <div class="h2"><h2 class="top">School Fees Payment</h2></div>
                <a href="javascript:void(0);" class="menu-icon" onclick="menuFunction()"><i class="fas fa-bars"></i></a>
                <div class="logout"><a href="student.php">Student Dashboard</a></div>
            </header>
        </div>

         <div class="pay">
<form class="payment" id="lol">
	<label>Email Address</label><br>
		<input type="text" name="email" id="email" class="inputText" required><br><br>

		<label>Amount</label><br>
		<input type="number" name="amount" id="amount" class="inputText" required><br><br>

		<label>Phone number</label><br>
		<input type="text" name="phone" id="phone" class="inputText" required><br><br>
    
    <button type="button" id="pay">Pay Now</button><br><br>
    <a href="../student.php">Back</a>&nbsp
</form>


   </div>

        <div class="footerContent">
            <p>Copyright &COPY; Dreywandowski College, 2020.</p>
        </div>
    </div>
    </div>

<script type="text/javascript" src="jquery-3.2.1.js"></script>
<script type="text/javascript" src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
<script type="text/javascript">


const API_publicKey = "FLWPUBK-902adba8d930e1d4748fd2554dec604b-X";

var pay = document.getElementById("pay");
pay.addEventListener("click", payWithRave, false);


    function payWithRave() {
    	 var email = document.getElementById("email").value;
    var amount = document.getElementById("amount").value;
    var number = document.getElementById("phone").value;

    function getRandomString(length) {
    var randomChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var result = '';
    for ( var i = 0; i < length; i++ ) {
        result += randomChars.charAt(Math.floor(Math.random() * randomChars.length));
    }
    return result;
}

var ref = getRandomString(13);

        var x = getpaidSetup({
            PBFPubKey: API_publicKey,
            customer_email: email,
            amount:amount,
            customer_phone: number,
            currency: "NGN",
            txref: getRandomString(13),
            meta: [{
                metaname: "flightID",
                metavalue: "AP1234"
            }],
            onclose: function() {},
            callback: function(response) {
                var txref = response.tx.txRef;
                var code = response.tx.chargeResponseCode; 
                var msg = response.data.respmsg;
                var amtt = response.tx.charged_amount;
                var status = response.tx.status;
                // collect txRef returned and pass to a                    server page to complete status check.
                console.log("This is the response returned after a charge", response);
                if ((code = "00") && (amtt == amount)){
                   // window.location = "handle_bills.php";
                console.log("Input amount " + amount +  "Proccessed amount" + amtt + txref);
               alert("Thanks for your payment. Check your email for confirmation");

				$.post("handle_bills.php", {
                    
                       email : email,
                       amount : amount,
                       ref : ref,
                       phone : number

				},  function(data,status){
					$("#ajax").html(data);
                });

                } 
                else {
                    // redirect to a failure page.
                }

                x.close(); // use this to close the modal immediately after payment.
            }
        });
    }

</script>
	</body>
	</html>