<html>
    <head>
        <script type="text/javascript">
            // Just testing out some stuff for the timer; seeing how it works with js compared to php
            
            function gettime(e) {
                e.innerHTML = e.innerHTML + Math.floor(Date.now() / 1000);
            }
        </script>
    </head>
    <body onload="gettime(document.getElementById('js'));">
        <p id="js">JS: </p>
        <?php
            echo '<p id="php">PHP: '.time().'</p>'
        ?>
    </body>
</html>