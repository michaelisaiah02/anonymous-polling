<div id="countdown"></div>

<script>
    // Get the end time for the countdown from the database
    var endTime = new Date("{{ $endTime }}").getTime();

    // Update the countdown every second
    var countdownInterval = setInterval(function() {
        // Get the current time
        var currentTime = new Date().getTime();

        // Calculate the remaining time
        var remainingTime = endTime - currentTime;

        // Check if the countdown has ended
        if (remainingTime <= 0) {
            clearInterval(countdownInterval);
            document.getElementById("countdown").innerHTML = "Poll has ended";
        } else {
            // Calculate the days, hours, minutes, and seconds
            var days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
            var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

            // Display the countdown
            document.getElementById("countdown").innerHTML = "Time remaining: " + days + "d " + hours + "h " +
                minutes + "m " + seconds + "s";
        }
    }, 1000);
</script>

<h2>Poll Statement</h2>
<p>Option 1</p>
<p>Option 2</p>
<p>Option 3</p>
