
          <p align="center"><b>- Login Server -<br></b>
            <?php
				$fp = @fsockopen("127.0.0.1", 23000, $errno, $errstr, 1);
if($fp >= 1){ 
echo '<img src=./files/online.png>';}
else{ echo '<img src=./files/offline.png>'; } 
			?>
            <br />
            <b><br>- Char Server - <br></b>
            <?php
				$fp = @fsockopen("127.0.0.1", 28000, $errno, $errstr, 1);
if($fp >= 1){ 
echo '<img src=./files/online.png>';}
else{ echo '<img src=./files/offline.png>'; } 
			?>
            <br />
            <b><br>- World Server -<br></b>
            <?php
				$fp = @fsockopen("127.0.0.1", 15400, $errno, $errstr, 1);
if($fp >= 1){ 
echo '<img src=./files/online.png>';}
else{ echo '<img src=./files/offline.png>'; }
?> <br>
            <b><br>- Database Server -<br></b>

            <?php
				$fp = @fsockopen("127.0.0.1", 3306, $errno, $errstr, 1);
if($fp >= 1){ 
echo '<img src=./files/online.png>';}
else{ echo '<img src=./files/offline.png>'; } 
			?>