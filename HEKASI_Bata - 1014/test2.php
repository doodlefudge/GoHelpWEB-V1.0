 <?php
session_start();
 
include_once './config.php';


 $sql = " SELECT `user_id`,`unit_id` FROM game_obj_tbl";

                $result_u = mysqli_query($link, $sql);
               
                while ($r_u = mysqli_fetch_assoc($result_u)) {
                    echo '<h4>' . $r_u['unit_id'] . '</h4>';
                    echo '<h4>' . $r_u['user_id'] . '</h4>';
                }

?>