
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">School Fees Payment</h4>
                    <p class="card-description"><u>Make your payments here.</u></p>
                    <form class="forms-sample">
                     <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" class="form-control" id="amount" placeholder="amount">
                      </div>
                       <div class="form-group">
                        <label for="exampleInputPassword4">Phone</label>
                        <input type="password" name="phone" class="form-control" id="exampleInputPassword4" placeholder="Password">
                      </div>
                      
                     <!-- <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                      </div>-->
                      <button type="submit" id="pay" class="btn btn-gradient-primary mr-2">Pay Now</button>
                      <!--  <a href="student.php">Back</a>&nbsp-->
                    </form>
                  </div>
                </div>
              </div>
            
         

<script type="text/javascript" src="assets/js/jquery-3.2.1.js"></script>
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


