<script>
    function convertTZ(date, tzString) {
        return new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", {timeZone: tzString}));
    }
    function countDown(el) {

    // Set the date we're counting down to
    var date = document.getElementById(el).getAttribute('data-countdown');
    var id = document.getElementById(el).getAttribute('data-id');
    var countDownDate = new Date(date).getTime();

    // Update the count down every 1 second
    var x = setInterval(function StartCount() {
        // Get today's date and time
        var time = new Date();
        var now = convertTZ(time, "Asia/Jakarta").getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="timer"
        document.getElementById(el).innerHTML = hours + "h "
        + minutes + "m " + seconds + "s";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById(el).innerHTML = "SELESAI";
            var url = "{{ route('user.soal.end', '') }}" + "/" + id;
            window.location.href = url;
        }
        return StartCount;
    }(), 1000);

    }

</script>
