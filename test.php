<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
            margin: 0;
        }

        .bgimg {
            background-image: url('./public/img/coming-soon/bgindex.jpg');
            height: 100%;
            background-position: center;
            display: flex;
            justify-content: center;
            background-size: cover;
            position: relative;
            background-color: rgba(152, 66, 211, 0.63);
            color: white;
            font-family: "Courier New", Courier, monospace;
            font-size: 25px;
            line-height: 1.5;

        }

        .bgimg::before {

            color: white;
            font-family: "Courier New", Courier, monospace;
            font-size: 25px;
            line-height: 1.5;
            content: "";
            position: absolute;
            top: 0px;
            right: 0px;
            bottom: 0px;
            left: 0px;
            background-color: rgba(0, 0, 0, 0.25);
            background-color: rgba(169, 169, 169, 0.63);

        }

        .topleft {
            position: absolute;
            top: 0;
            text-align: center;
        }

        .bottomleft {
            position: absolute;
            bottom: 0;
            left: 16px;
        }

        .middle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }


        hr {
            margin: auto;
            width: 40%;
        }
    </style>
</head>

<body>

    <div class="bgimg overflow-auto">
        <div class="topleft">
            <p class="mt-3">Auto redirect in <span id="">10</span>s to <br>
                <?php

                $jabatann = ["Manager", "Supervisor", "Cashier", "Sales Executive", "acounting"];
                $jab = count($jabatann);
                echo $jab; ?>
                <a href="http://peserta32.sib3.nurulfikri.com/siinka/index.php?page=pages/home">peserta32.sib3.nurulfikri.com/siinka</a>
            </p>
            <!-- <h1>Anda akan diarahkan ke halaman sebenarnya dalam waktu detik</h1> -->
        </div>
        <div class=" middle">
            <h1>COMING SOON</h1>
            <hr>
            <p id="demo"></p>
        </div>

    </div>
    <!-- Display the countdown timer in an element -->

    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("Dec 5, 2022 15:37:25").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
                minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script>
        $(document).ready(function() {
            window.setInterval(function() {
                var sisawaktu = $("#waktu").html();
                sisawaktu = eval(sisawaktu);
                if (sisawaktu == 0) {
                    location.href = "http://peserta32.sib3.nurulfikri.com/siinka/index.php?page=pages/home";
                } else {
                    $("#waktu").html(sisawaktu - 1);
                }
            }, 1000);
        });
    </script>
</body>

</html>