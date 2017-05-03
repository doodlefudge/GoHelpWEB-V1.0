<?php include_once("inc/connection/connection.php");
error_reporting(-1);
ini_set('display_errors', 1);
if(!isset($_REQUEST['schedule_id'])){
    echo "You may have been directed to a wrong page. Please click <a href = 'http://www.camayacoast.ph'>here</a> to get back to the main page";
    exit;
}
$sql= "SELECT * from schedule_info si
        INNER JOIN customer_inquiry ci
        ON si.inquire_id = ci.inquire_id
        INNER JOIN schedule_type st 
        ON si.schedule_type_id = st.schedule_type_id
 WHERE schedule_id = :schedule_id";
$stmt = $pdo->prepare($sql);
$scheduleID = $_REQUEST['schedule_id'];

$stmt->bindParam(":schedule_id",$scheduleID);
$stmt->execute();
$obj = $stmt->fetchAll();
$date1 = new DateTime($obj[0]['scheduled_date']);
$date2 = new DateTime($obj[0]['schedule_end']);
$final_price = $obj[0]['type_price'];

$diff = $date2->diff($date1);

$days = $diff->d;
$final_price =  $obj[0]['type_price'] * $days;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

    <title><?php if ($obj[0]['schedule_type']== 'tour') echo "Tour"; else echo "Room"?> Reservation</title>

    <link rel='stylesheet' type='text/css' href='css/style.css' />
    <link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
    <script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
    <style>
        ul{
            text-align: left;
        }
        h5,h6{
            text-align: center;

        }

        #contact_name{
            padding-top:20px;
            padding-right:20px;
            text-align:right !important;
        }
    </style>
</head>

<body>

<div id="page-wrap">

    <textarea id="header">INVOICE</textarea>

    <div id="identity">

        <label id="address"><?php echo $obj[0]['inquirer_email']?>
            <?php echo $obj[0]['inquirer_phone']?>
        </label>

        <div id="logo">


            <img id="image" style = "width: 150px;"src="images/logo.gif" alt="logo" />
        </div>

    </div>

    <div style="clear:both"></div>

    <div id="customer">

        <label id="customer-title"> <?php echo $obj[0]['inquirer_name']?></label>

        <table id="meta">
            <tr>
                <td class="meta-head">Invoice #</td>
                <td><label><?php echo $scheduleID?></label></td>
            </tr>
            <tr>

                <td class="meta-head">Date</td>
                <td><label id="date">            <?php echo $obj[0]['inquiry_date']?>
                    </label></td>
            </tr>


        </table>

    </div>

    <table id="items">

        <tr>
            <th>Package/Amenity Name</th>
            <th>Description</th>
            <th>Type</th>
            <th>Unit Cost</th>
            <th>Days</th>
            <th>Tot. Price</th>
        </tr>

        <tr class="item-row">
            <td class="item-name"><div class="delete-wpr"><label> <?php echo $obj[0]['type_name']?></label></div></td>
            <td class="description"><label> <?php if (isset($obj[0]['type_desc'])) echo $obj[0]['type_desc']; else echo "NO DESCRIPTION"?></label></td>
            <td ><label class="cost"><?php if ($obj[0]['schedule_type']== 'tour') echo "Tour"; else echo "Room"?></label></td>
            <td><span class="price">Php<?php echo $obj[0]['type_price']?></span></td>
            <td><span class="days"><?php echo $days?></span></td>
            <td><span class="tt">Php<?php echo $final_price?></span></td>
        </tr>
        <?php
        $qry = "SELECT * 
                FROM 
                  schedule_info_amenity sia
                INNER JOIN
                   schedule_info si
                ON 
                  sia.schedule_ID = si.schedule_ID
                INNER JOIN
                  amenities am
                ON 
                  sia.amenity_id = am.amenity_ID
                WHERE
                  sia.schedule_ID = :schedule_id";
        $scheduleID = $_REQUEST['schedule_id'];

        $stmt = $pdo->prepare($qry);
        $stmt->bindParam(":schedule_id",$scheduleID);
        $stmt->execute();
        $obj1 = $stmt->fetchAll();
        $query = "select count(*)  FROM 
                  schedule_info_amenity sia
                INNER JOIN
                   schedule_info si
                ON 
                  sia.schedule_ID = si.schedule_ID
                INNER JOIN
                  amenities am
                ON 
                  sia.amenity_id = am.amenity_ID
                WHERE
                  sia.schedule_ID = '$scheduleID'";
        $nRows1 = $pdo->query($query)->fetchColumn();
        $sum_price = 0;

        for($i = 0 ; $i < $nRows1; $i++){
            ?>
            <tr class="item-row">
                <td class="item-name"><div class="delete-wpr"><label><?php echo $obj1[$i]['amenity_name']?></label></div></td>
                <td class="description"><label><?php echo $obj1[$i]['amenity_desc']?></label></td>
                <td><label class="cost">Addon</label></td>
                <td><span class="price">Php<?php echo $obj1[$i]['amenity_price']?></span></td>
                <td><span class="price">NA</span></td>
                <td><span class="price">Php<?php echo $obj1[$i]['amenity_price']?></span></td>
            </tr>
            <?php
            $sum_price += $obj1[$i]['amenity_price'];
        }?>
        <tr id="hiderow">
        </tr>

        <tr>
            <td colspan="2" class="blank"> </td>
            <td colspan="2" class="total-line">Package Total</td>
            <td colspan="2" class="total-value"><div id="subtotal">Php<?php echo $final_price?></div></td>
        </tr>
        <tr>

            <td colspan="2" class="blank"> </td>
            <td colspan="2" class="total-line">Amenity Total</td>
            <td colspan="2"class="total-value"><div id="total">Php<?php echo $sum_price?></div></td>
        </tr>

        <tr>
            <td colspan="2" class="blank"> </td>
            <td colspan="2" class="total-line balance">Balance Due</td>
            <td colspan="2"class="total-value balance"><div class="due">Php<?php echo $sum_price + $final_price?></div></td>
        </tr>

    </table>

    <div id = "contact_name" align ="">Booked By: Jose Marie De Jesus</div>
    <div id="terms">
        <h5>Terms</h5>
            <?php if ($obj[0]['schedule_type']!= 'tour'){
            ?>
                <section class="disclaimer" >
                    <h6>INCLUSIONS</h6>
                    <ul style="list-style: disc !important;">
                        <li style="list-style: disc !important;">Access to Hotel Pool, infinity pool and beach</li>
                        <li style="list-style: disc !important;">Free use of beach huts, bench and rattan lounges</li>
                        <li style="list-style: disc !important;">Free use of Gym</li>
                    </ul>

                    <h5 style="text-decoration: underlined;">TRANSPORTATION</h5>
                    <h6>VIA FERRY</h6>
                    <ul style="list-style: disc !important;">
                        <li style="list-style: disc !important;">Pregnant individuals are not allowed to ride the Ferry.</li>
                        <li style="list-style: disc !important;">Guest must be at the ferry terminal an hour before departure for the boarding process.</li>
                        <li style="list-style: disc !important;">Boarding gate closes 30 minutes before departure.</li>
                        <li style="list-style: disc !important;">Late comers automatically forfeits the booking.</li>
                    </ul>

                    <h6>VIA LAND TRIP</h6>
                    <ul style="list-style: disc !important;">
                        <li style="list-style: disc !important;">It is advisable to bring your own vehicle as Camaya Coast is not accessible by public transportation from It is advisable to bring your own vehicle as Camaya Coast is not accessible by public transportation from the town proper of Mariveles, Bataan.</li>
                    </ul>

                    <h5>PAYMENT OPTIONS</h5>
                    <ul style="list-style: disc !important;">
                        <li style="list-style: disc !important;">Bank Deposit</li>
                        <li style="list-style: disc !important;">Paypal / Credit Card / Debit Card (Mastercard Visa)</li>
                    </ul>

                    <h5>TERMS AND CONDITIONS</h5>
                    <ul style="list-style: disc !important;">
                        <li style="list-style: disc !important;">Check in: 2PM, Check out: 11AM.</li>
                        <li style="list-style: disc !important;">Early check in is subject to room availability. Late check out is allowable until 2PM depending on hotel occupancy.</li>
                        <li style="list-style: disc !important;">Extension from 2PM to 7PM, 50% of best available rate is applicable.</li>
                        <li style="list-style: disc !important;">Three (3) years old and above are charged the same as adult rate</li>
                        <li style="list-style: disc !important;">Pets are not allowed inside the hotel and resort premises</li>
                        <li style="list-style: disc !important;">Cooking and bringing of food/drinks/liquor are not allowed.</li>
                        <li style="list-style: disc !important;">Proper swimming attire is required</li>
                        <li style="list-style: disc !important;">Pregnant individuals are not allowed to ride the Ferry. (For guests arriving via ferry).</li>
                        <li style="list-style: disc !important;">To efficiently manage the number of rooms/ferry seats, full prepayment is required. Payment must be done within 3 days from the date of transaction. Otherwise, the reservation will be cancelled and the slot will be open for other guests.</li>
                        <li style="list-style: disc !important;">If reservation was done within 3 days before the visit date. Guest must settle invoice within the day.</li>
                        <li style="list-style: disc !important;">Any reservations made and settled within 5 days before the day of visit can no longer be rebooked and cancelled and is subject to forfeiture and may not be refunded.</li>
                        <li style="list-style: disc !important;">Rebooked visits are no longer valid for refund.</li>
                        <li style="list-style: disc !important;">Refund requests are subject to approval.</li>
                        <li style="list-style: disc !important;">Camaya Coast may require supporting documents prior processing of refunds.</li>
                        <li style="list-style: disc !important;">There are no refunds for early check outs and “no shows”. If the number of guests on your reservation is reduced once the reservation is paid no refunds will be applied.</li>
                        <li style="list-style: disc !important;">If the room you are booking is labeled as non-refundable, non-cancellable or similar, all cancellations will incur a 100% charge, regardless of the date in which the cancellation is requested.</li>
                        <li style="list-style: disc !important;">Discounts may not be extended to non Senior Citizen / PWD companions.</li>
                        <li style="list-style: disc !important;">Discounts granted by the government (e.g. Senior Citizens’ Discounts) or those granted by the hotel through offers, promotions and/or other privileges shall not be used in conjunction with other discounts, offers, promotions and/or other privileges.</li>
                        <li style="list-style: disc !important;">In cases where the senior citizen is also a person with disability (PWD), the senior citizen can only use either his/her senior citizen ID or PWD ID to avail of a 20% discount.</li>
                        <li style="list-style: disc !important;">Camaya Coast will not be held responsible for any inconvenience or loss caused by the erroneous encoding of contact information and booking details.</li>
                        <li style="list-style: disc !important;">Camaya Coast may cancel a confirmed reservation if Management has reason to believe that a trip has been purchased through fraudulent means. </li>
                        <li style="list-style: disc !important;">Camaya Coast Management reserves the right to cancel a visit if the safety of the guests are at risk.</li>
                    </ul>

                    <p>For further assistance, please do not hesitate to contact us. We look forward to welcoming you soon at Camaya Coast.</p>

                    <p>Call: (63) 917 6CAMAYA or (63) 917 5CAMAYA <br>
                        Email: <a href="mailto:roomsreservation@camayacoast.com">roomsreservation@camayacoast.com</a></p>
                </section>
                <?php
            }  else {
                ?>
                <section class="disclaimer">
                    <h5>INCLUSIONS</h5>
                    <ul style="list-style: disc !important;">
                        <li style="list-style: disc !important;">Access to infinity pool and beach</li>
                        <li style="list-style: disc !important;">Free use of beach huts, bench and rattan lounges</li>
                    </ul>

                    <h5 style="text-decoration: underlined;">TRANSPORTATION</h5>
                    <h6>VIA FERRY</h6>
                    <ul style="list-style: disc !important;">
                        <li style="list-style: disc !important;">Pregnant individuals are not allowed to ride the Ferry.</li>
                        <li style="list-style: disc !important;">Guest must be at the ferry terminal an hour before departure for the boarding process.</li>
                        <li style="list-style: disc !important;">Boarding gate closes 30 minutes before departure.</li>
                        <li style="list-style: disc !important;">Late comers automatically forfeits the booking.</li>
                    </ul>

                    <h6>VIA LAND TRIP</h6>
                    <ul style="list-style: disc !important;">
                        <li style="list-style: disc !important;">It is advisable to bring your own vehicle as Camaya Coast is not accessible by public transportation from It is advisable to bring your own vehicle as Camaya Coast is not accessible by public transportation from the town proper of Mariveles, Bataan.</li>
                    </ul>

                    <h5>PAYMENT OPTIONS</h5>
                    <ul style="list-style: disc !important;">
                        <li style="list-style: disc !important;">Bank Deposit</li>
                        <li style="list-style: disc !important;">Paypal / Credit Card / Debit Card (Mastercard Visa)</li>
                    </ul>

                    <h5>TERMS AND CONDITIONS</h5>
                    <ul style="list-style: disc !important;">
                        <li style="list-style: disc !important;">Three (3) years old and above are charged the same as adult rate</li>
                        <li style="list-style: disc !important;">Pets are not allowed inside the hotel and resort premises</li>
                        <li style="list-style: disc !important;">Cooking and bringing of food/drinks/liquor are not allowed.</li>
                        <li style="list-style: disc !important;">Hotel accommodation is not included</li>
                        <li style="list-style: disc !important;">Proper swimming attire is required</li>
                        <li style="list-style: disc !important;">Pregnant individuals are not allowed to ride the Ferry. (For guests arriving via ferry).</li>
                        <li style="list-style: disc !important;">To efficiently manage the number of rooms/ferry seats, full prepayment is required. Payment must be done within 3 days from the date of transaction. Otherwise, the reservation will be cancelled and the slot will be open for other guests.</li>
                        <li style="list-style: disc !important;">If reservation was done within 3 days before the visit date. Guest must settle invoice within the day.</li>
                        <li style="list-style: disc !important;">Any reservations made and settled within 5 days before the day of visit can no longer be rebooked and cancelled and is subject to forfeiture and may not be refunded.</li>
                        <li style="list-style: disc !important;">Rebooked visits are no longer valid for refund.</li>
                        <li style="list-style: disc !important;">Refund requests are subject to approval.</li>
                        <li style="list-style: disc !important;">Camaya Coast may require supporting documents prior processing of refunds.</li>
                        <li style="list-style: disc !important;">There are no refunds for early check outs and “no shows”. If the number of guests on your reservation is reduced once the reservation is paid no refunds will be applied.</li>
                        <li style="list-style: disc !important;">Discounts may not be extended to non Senior Citizen / PWD companions.</li>
                        <li style="list-style: disc !important;">Discounts granted by the government (e.g. Senior Citizens’ Discounts) or those granted by the hotel through offers, promotions and/or other privileges shall not be used in conjunction with other discounts, offers, promotions and/or other privileges.</li>
                        <li style="list-style: disc !important;">In cases where the senior citizen is also a person with disability (PWD), the senior citizen can only use either his/her senior citizen ID or PWD ID to avail of a 20% discount.</li>
                        <li style="list-style: disc !important;">Camaya Coast will not be held responsible for any inconvenience or loss caused by the erroneous encoding of contact information and booking details.</li>
                        <li style="list-style: disc !important;">Camaya Coast may cancel a confirmed reservation if Management has reason to believe that a trip has been purchased through fraudulent means. </li>
                        <li style="list-style: disc !important;">Camaya Coast Management reserves the right to cancel a visit if the safety of the guests are at risk.</li>
                    </ul>

                    <p>For further assistance, please do not hesitate to contact us. We look forward to welcoming you soon at Camaya Coast.</p>

                    <p>Call: (63) 917 6CAMAYA or (63) 917 5CAMAYA <br>
                        Email: <a href="mailto:daytourreservations@camayacoast.com">daytourreservations@camayacoast.com</a></p>
                </section>
                <?php
            }?>


    </div>

</div>

</body>

</html>
<script>
    window.print();
</script>

