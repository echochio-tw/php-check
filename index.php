<!DOCTYPE html>
    <head>
        <title>Echochio MD5 Cracker</title>
    </head>
    <body>
        <h1>MD5 cracker</h1>
        <p>This application takes an MD5 hash of a four digits string and attempts to hash all combinations to determine the original PIN.</p>

        <pre>
Debug Output:
<?php
                $goodtext = "Not found";
                // If there is no parameter, this code is all skipped
                if ( isset($_GET['md5']) ) {
                    $time_pre = microtime(true);
                    $md5 = $_GET['md5'];

                    // This is our alphabet
                    $show = 15;

                    // Outer loop go go through the alphabet for the
                    // first position in our "possible" pre-hash text
                   set_time_limit(60);
                   for($i=0; $i<100; $i++ ) {
                      if ($i < 10){$try= "000".(string)$i;}
                      elseif ($i < 100){$try= "00".(string)$i;}
                      elseif ($i < 1000){$try= "0".(string)$i;}
                        $check = hash('md5', $try);
                        if ( $check == $md5 ) {
                                $goodtext = $try;
                               // break;   // Exit the inner loop
                        }
                        // Debug output until $show hits 0
                        if ( $show > 0 ) {
                                print "$check $try\n";
                                $show = $show - 1;
                        }
                  }
                    // Compute ellapsed time
                    $time_post = microtime(true);
                    print "Ellapsed time: ";
                    print $time_post-$time_pre;
                    print "\n";
                }
            ?>
        </pre>

        <!-- Use the very short syntax and call htmlentities() -->
        <p>PIN: <?= htmlentities($goodtext); ?></p>

        <form>
            <input type="text" name="md5" size="60" />
            <input type="submit" value="Crack MD5"/>
        </form>

        <ul>
        <li><a href="index.php">Reset this page</a></li>
        <li><a href="makecode.php">Make an MD5 PIN</a></li>
        <li><a href="md5.php">MD5 Encoder</a></li>
        <li><a href="https://www.wa4e.com/assn/crack/" target="_blank">Specification or this assignment</li>
        <li><a href="https://github.com/echochio-tw/php-check/tree/master" target="_blank">Source code for this application</a></li>
        </ul>
    </body>
</html>
