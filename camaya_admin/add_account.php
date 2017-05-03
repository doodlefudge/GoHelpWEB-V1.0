<?php
try{
    $error = '';
    include_once(dirname(__FILE__).'/assets/connection/connection.php');
    if(isset($_POST['submit'])){
        if($_POST['pass'] == $_POST['rep_pass']){
            $sql= "SELECT count(*) as count from schedule_type where type_name = :type_name";
            $stmt = $pdo->prepare($sql);
            $type_name = $_POST['type_name'];
            $stmt->bindParam(':type_name', $type_name );
            $stmt->execute();
            $obj = $stmt->fetchObject();
            if(((int)$obj->count<1)){
                $sql= "SELECT count(*) as count from schedule_type";
                $stmt = $pdo->prepare($sql);

                $stmt->execute();
                $obj = $stmt->fetchObject();
                $id = "USER-" . (((int)$pdo->query('select count(*) from login')->fetchColumn()) + 1);

                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql= "INSERT INTO login VALUES(NULL,
                                            :user,
                                            :pass,
                                            0)";
                $stmt = $pdo->prepare($sql);
                //$service_cat_id = (((int)$obj->count) + 1);
                $user =  $_POST['user'];
                $pass =  $_POST['pass'];

                $stmt->bindParam(':user', $user);
                $stmt->bindParam(':pass', $pass);

                $stmt->execute();
                ?>
                <script>
                    alert('Succesfully added!');
                </script>

                <?php
            }else{
                ?>
                <script>
                    alert('Password not match!');
                </script>

                <?php
            }
        }else{
            $error = 'Category Name Already Taken';
        }



    }
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}

?>



<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<?php include(dirname(__FILE__).'/assets/navbar/include.php');?>
<body >
<div id="wrapper">
    <?php include(dirname(__FILE__).'/assets/navbar/header.php');?>
    <!-- /. NAV TOP  -->
    <?php include(dirname(__FILE__).'/assets/navbar/navbar.php');?><!-- /. NAV SIDE  -->

    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Add user account</h1>

                    <h1 class="page-subhead-line">Add user account to access admin page</h1>
                </div>
            </div><!-- /. ROW  -->

            <div class="row">
                <div class="col-lg-12 col-sm-6 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Add user account
                            <br>
                            <?php echo $error?>
                        </div>

                        <div class="panel-body">
                            <form role="form" action = "" method = "post">
                                <div class="form-group">
                                    <label>Admin Username</label>
                                    <input class="form-control" name = "user" type="text" />
                                    <p class="help-block">Name or type of service</p>
                                </div>
                                <div class="form-group">
                                    <label>Admin Password</label>
                                    <input class="form-control" name = "pass" type="password" />
                                    <p class="help-block"></p>
                                </div>
                                <div class="form-group">
                                    <label>Repeat Password</label>
                                    <input class="form-control" name = "rep_pass" type="password" />
                                    <p class="help-block">Minimum Number of people</p>
                                </div>
                                <button type="submit" class="btn btn-info" name = "submit">Create</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div><!--/.ROW-->


        </div><!-- /. PAGE INNER  -->
    </div><!-- /. PAGE WRAPPER  -->
</div><!-- /. WRAPPER  -->

<?php include(dirname(__FILE__).'/assets/navbar/footer.php');?>
<!-- /. FOOTER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<?php include(dirname(__FILE__).'/assets/navbar/scripts.php');?>
</body>
</html>
