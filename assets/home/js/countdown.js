// Set the date we're counting down to
var countDownDate = new Date("Jan 01, 2021 00:00:00").getTime();

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

  if (seconds.toString().length == 1) {
	seconds = "0" + seconds;
  }
  if (minutes.toString().length == 1) {
	minutes = "0" + minutes;
  }
  if (hours.toString().length == 1) {
	hours = "0" + hours;
  }

  // Display the result in the element with id="demo"
  document.getElementById("timer").innerHTML = "New Year Eve <br>" + days + " : " + hours + " : "
  + minutes + " : " + seconds;

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
	document.getElementById("timer").innerHTML = "HAPPY NEW YEAR EVE!";
	document.getElementById("flid").className = "float blink-bg";
  }
}, 1000);