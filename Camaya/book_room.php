<?php include_once("inc/templates/header.php");?>
<?php include_once("inc/connection/connection.php");?>

<?php
if(isset($_POST["submit"])){

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    date_default_timezone_set('Asia/Manila');

    $inquire_id = "INQ" . (((int)$pdo->query('select count(*) from customer_inquiry')->fetchColumn()) + 1);
    $sql = "INSERT INTO customer_inquiry values (:inquire_id,:inquirer_name,:inquirer_email,:inquirer_phone,:dateNow)";
    $stmt = $pdo->prepare($sql);
    $inquirer_name = $_POST['inquirer_name'];
    $inquirer_email = $_POST['inquirer_email'];
    $inquirer_phone = $_POST['inquirer_phone'];
    $dateNow = date('m/d/Y h:i:s a', time());
    $stmt->bindParam(':inquire_id', $inquire_id);
    $stmt->bindParam(':inquirer_name', $inquirer_name);
    $stmt->bindParam(':inquirer_email', $inquirer_email);
    $stmt->bindParam(':inquirer_phone', $inquirer_phone);
    $stmt->bindParam(':dateNow', $dateNow);

    $stmt->execute();

    $sql = "INSERT INTO schedule_info values (:schedule_id,:schedule_type_id,:inquire_id,:adult,:child,:from,:to,:guest_list,:status )";
    $stmt = $pdo->prepare($sql);
    $schedule_id = "SCH" . (((int)$pdo->query('select count(*) from schedule_info')->fetchColumn()) + 1);
    $schedule_type_id = $_POST['schedule_type_id'];
    $adult = $_POST['adult'];
    $child = $_POST['child'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $guest_list = $_POST['guest_list'];
    $status = 0;
    $stmt->bindParam(':schedule_id', $schedule_id);
    $stmt->bindParam(':schedule_type_id', $schedule_type_id);
    $stmt->bindParam(':inquire_id', $inquire_id);
    $stmt->bindParam(':adult', $adult);
    $stmt->bindParam(':child', $child);
    $stmt->bindParam(':from', $from);
    $stmt->bindParam(':to', $to);
    $stmt->bindParam(':guest_list', $guest_list);
    $stmt->bindParam(':status', $status);
    $stmt->execute();

    if($_POST['amenity']){

        $array = $_POST['amenity'];

        foreach($array as $val){
            $sql = "INSERT INTO schedule_info_amenity values (:schedule_id,:amenity_id,'' )";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':schedule_id', $schedule_id);
            $stmt->bindParam(':amenity_id', $val);
            $stmt->execute();
        }
    }

    ?>
    <script>
        $(document).ready(function (){
            $.ajax({

                type: "POST",
                url: "send_email.php",
                data: "schedule_id="<?php echo $schedule_id?>+
                "$email=<?php echo $inquirer_email?>",
                success: function(html){
                    if(html == "true"){
                        alert("Successfully Added");
                    }
                }

            });
        });
    </script>
    <?php
}
?>
<!-- Navigation -->

<?php //include_once("inc/templates/header.php");?>

<!-- Page Content -->

<div class="container">
    <div class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li class="active"><a href="#step-1">
                        <h4 class="list-group-item-heading">Step 1</h4>
                        <p class="list-group-item-text">Customer Details</p>
                    </a>
                </li>
                <li class="disabled"><a href="#step-2">
                        <h4 class="list-group-item-heading">Step 2</h4>
                        <p class="list-group-item-text">Room Selection</p>
                    </a>
                </li>
                <li class="disabled"><a href="#step-3">
                        <h4 class="list-group-item-heading">Step 3</h4>
                        <p class="list-group-item-text">Schedule Confirmation</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <form role="form" action = "" method = "post" id ="myForm">
        <div class="row setup-content" id="step-1">
            <div class="col-xs-12">
                <div class="col-md-12 well text-center">
                    <h1> STEP 1</h1>
                    <div class="form-group">
                        <label for="name" class="col-xl-3 cols-sm-2 control-label">Your Name</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="inquirer_name" id="inquirer_name"  placeholder="Enter your Name"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-xl-3 cols-sm-2 control-label">Your Email</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="inquirer_email" id="inquirer_email"  placeholder="Enter your Email"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-xl-3 cols-sm-2 control-label">Your Contact Number</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="inquirer_phone" id="inquirer_phone"  placeholder="Enter your Phone Number"/>
                            </div>
                        </div>
                    </div>
                    <button type ="button" id="activate-step-2" class="btn btn-primary btn-lg">Next</button>
                </div>
            </div>
        </div>

        <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12 well text-center">
                    <h1> STEP 2</h1>
                    <div class="row">
                        <div class="col-lg-12 col-sm-6 col-xs-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Add Tour Package
                                    <br>
                                </div>

                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Select Room Package</label>
                                        <select class="form-control" name ="schedule_type_id" id = "schedule_type_id">
                                            <?php
                                            $sql= "SELECT * from schedule_type where `schedule_type` = 'room'";
                                            $stmt = $pdo->prepare($sql);
                                            $stmt->execute();
                                            $obj = $stmt->fetchAll();
                                            $nRows = $pdo->query('select count(*) from  schedule_type where `schedule_type` = \'room\'')->fetchColumn();
                                            for($i = 0 ; $i < $nRows; $i++){
                                                ?>
                                                <option value= "<?php echo $obj[$i]["schedule_type_id"]; ?>" data-price = "<?php echo $obj[$i]['type_price']?>"><?php echo $obj[$i]["type_name"] . " - Price :" . $obj[$i]["type_price"];?></option>
                                                <?php
                                            }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Guests - Adults</label>
                                        <select class="form-control" name ="adult" id = "adult">
                                            <option value = "1">1 Guest</option>
                                            <option value = "2">2 Guests</option>
                                            <option value = "3">3 Guests</option>
                                            <option value = "4">4 Guests</option>
                                            <option value = "5">5 Guests</option>
                                            <option value = "6">6 Guests</option>
                                            <option value = "7">7 Guests</option>
                                            <option value = "8">8 Guests</option>
                                            <option value = "9">9 Guests</option>
                                            <option value = "10">10 Guests</option>
                                        </select>
                                        <p class="help-block"> 3 years old and above</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Guests - Child</label>
                                        <select class="form-control" name ="child" id = "child">
                                            <option value = "1">1 child</option>
                                            <option value = "2">2 children</option>
                                            <option value = "3">3 children</option>
                                        </select>
                                        <p class="help-block"> 3 years old and above</p>
                                    </div>

                                    <div class="form-group">
                                        <label>From</label>
                                        <input class="datepick" name = "from" id = "from" />
                                        <label>To</label>
                                        <input class="datepick" name = "to" id = "to"/>
                                        <p class="help-block">Reckuring date of the package</p>
                                    </div>
                                    <div class="form-group">
                                        <div class="control-group">
                                            <p>Additional amenities</p>
                                            <div class="controls span2">
                                                <?php
                                                $sql= "SELECT * from amenities";
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $obj = $stmt->fetchAll();
                                                $nRows = $pdo->query('select count(*) from  amenities')->fetchColumn();
                                                for($i = 0 ; $i < $nRows; $i++){
                                                    ?>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name = "amenity[]" value="<?php echo $obj[$i]['amenity_id']?>" id="inlineCheckbox1"> <?php echo $obj[$i]['amenity_name'] . " - Price : " . $obj[$i]['amenity_price']?>
                                                    </label>
                                                    <?php
                                                }?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Name of Guests</label>
                                        <textarea class="form-control" name = "guest_list"></textarea>
                                        <p class="help-block">Follow this format</p>
                                        <p class="help-block">1.)Name, age, Nationality</p>
                                        <p class="help-block">2.)Name, age, Nationality</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div><!--/.ROW-->

                    <button type = "button" id="activate-step-3" class="btn btn-primary btn-lg">Next</button>
                </div>
            </div>
        </div>

        <div class="row setup-content" id="step-3">
            <div class="col-xs-12">
                <div class="col-md-12 well text-center">
                    <h1> STEP 3</h1>
                    <div class="form-group">
                        <label for="name" class="col-xl-3 cols-sm-2 control-label">Your Name</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" disabled = "true" name="inquirer_name1" id="inquirer_name1"  placeholder="Enter your Name"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-xl-3 cols-sm-2 control-label">Your Email</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" disabled = "true"  name="inquirer_email1" id="inquirer_email1"  placeholder="Enter your Email"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-xl-3 cols-sm-2 control-label">Your Contact Number</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" disabled = "true"  name="inquirer_phone1" id="inquirer_phone1"  placeholder="Enter your Phone Number"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Select Room Package</label>
                        <select class="form-control" disabled = "true" name ="schedule_type1" id = "schedule_type1">
                            <?php
                            $sql= "SELECT * from schedule_type where `schedule_type` = 'tour'";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            $obj = $stmt->fetchAll();
                            $nRows = $pdo->query('select count(*) from  schedule_type where `schedule_type` = \'tour\'')->fetchColumn();
                            for($i = 0 ; $i < $nRows; $i++){
                                ?>
                                <option value= "<?php echo $obj[$i]["schedule_type_id"]; ?>" data-price = "<?php echo $obj[$i]['type_price']?>"><?php echo $obj[$i]["type_name"] . " - Price :" . $obj[$i]["type_price"];?></option>
                                <?php
                            }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Guests - Adults</label>
                        <select class="form-control" disabled = "true"name ="adult1" id = "adult1">
                            <option value = "1">1 Guest</option>
                            <option value = "2">2 Guests</option>
                            <option value = "3">3 Guests</option>
                            <option value = "4">4 Guests</option>
                            <option value = "5">5 Guests</option>
                            <option value = "6">6 Guests</option>
                            <option value = "7">7 Guests</option>
                            <option value = "8">8 Guests</option>
                            <option value = "9">9 Guests</option>
                            <option value = "10">10 Guests</option>
                        </select>
                        <p class="help-block"> 3 years old and above</p>
                    </div>
                    <div class="form-group">
                        <label>Guests - Adults</label>
                        <select class="form-control" disabled = "true" name ="child1" id = "child1">
                            <option value = "1">1 child</option>
                            <option value = "2">2 children</option>
                            <option value = "3">3 children</option>
                        </select>
                        <p class="help-block"> 3 years old and above</p>
                    </div>

                    <div class="form-group">
                        <label>From</label>
                        <input class="" name = "from1" id = "from1" disabled="true"/>
                        <label>To</label>
                        <input class="" name = "to1" id="to1" disabled="true" />
                        <p class="help-block">Recurring date of the package</p>
                    </div>
                    <div class="form-group">
                        <div class="control-group">
                            <p >Additional amenities</p>
                            <div class="controls span2" disabled = "true">
                                <?php
                                $sql= "SELECT * from amenities";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute();
                                $obj = $stmt->fetchAll();
                                $nRows = $pdo->query('select count(*) from  amenities')->fetchColumn();
                                for($i = 0 ; $i < $nRows; $i++){
                                    ?>
                                    <label class="checkbox">
                                        <input type="checkbox" value="<?php echo $obj[$i]['amenity_id']?>"  name = "amenity[]" id="amenity1"> <?php echo $obj[$i]['amenity_name'] . " - Price : " . $obj[$i]['amenity_price']?>
                                    </label>
                                    <?php
                                }?>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Name of Guests</label>
                        <textarea class="form-control" disabled = "true" name = "guest_list" id = "guest_list1"></textarea>

                    </div>
                    <input type = "submit" id="submit" name = "submit" class="btn btn-primary btn-lg" value = "Confirm Schedule">

                </div>
            </div>
        </div>
    </form>

</div>



<!-- jQuery -->

<?php include_once("inc/scripts.php");?>


<script>
    $(document).ready(function() {

        $('.datepick').each(function(){
            $(this).datepicker();
        });

        $('#activate-step-3').click(function(){
            $("#inquirer_name1").val($("#inquirer_name").val());
            $("#inquirer_email1").val($("#inquirer_email").val());
            $("#inquirer_phone1").val($("#inquirer_phone").val());
            $("#schedule_type_id1").val($("#schedule_type_id").val());
            $("#adult1").val($("#adult").val());
            $("#child1").val($("#child").val());
            $("#from1").val($("#from").val());
            $("#to1").val($("#to").val());
        });
    });
</script>
<!--footer-->

<?php include_once("inc/templates/footer.php");?>

