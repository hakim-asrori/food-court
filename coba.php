<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <!-- countdown timer jagoankode.blogspot.com  -->
  <p id="carasingkat"></p>
  <script>
    // var countDownDate = new Date().getTime();
    // var apa = new Date("May 23, 2021 15:37:25").getTime();
    // var x = setInterval(function() {
    //   var now = new Date().getTime();
    //   var distance = apa - now;
    //   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    //   var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    //   document.getElementById("carasingkat").innerHTML = days + "d " + hours + "h "
    //   + minutes + "m " + seconds + "s ";
    //   if (distance < 0) {
    //     clearInterval(x);
    //     document.getElementById("carasingkat").innerHTML = "EXPIRED";
    //   }
    // }, 1000);

    document.getElementById('carasingkat').innerHTML =
    1 + ":" + 00;
    startTimer();
    function startTimer() {
      var presentTime = document.getElementById('carasingkat').innerHTML;
      var timeArray = presentTime.split(/[:]+/);
      var m = timeArray[0];
      var s = checkSecond((timeArray[1] - 1));
      if(s==59){
        m=m-1
      }
      if (s == 0) {
        document.getElementById('carasingkat').innerHTML = "Selesai";
      } else {
        document.getElementById('carasingkat').innerHTML = m + ":" + s;
        setTimeout(startTimer, 1000);
      }
    }

    function checkSecond(sec) {
      if (sec < 0) {
        sec = "59"
      };
      return sec;
    }
  </script>
</body>
</html>