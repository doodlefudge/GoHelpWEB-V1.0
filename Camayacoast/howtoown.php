<?php include_once("inc/templates/header.php");?>
<!-- Navigation -->
<?php //include_once("inc/templates/navbar.php");?>
<style>
    body {
        padding-top: 70px; /* Required padding for .navbar-fixed-top. Change if height of navigation changes. */
        background: url('assets/bg.jpg') no-repeat center center fixed;
        background-color: #37AAE0;
    }
    #loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 1;
        width: 150px;
        height: 150px;
        margin: -75px 0 0 -75px;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Add animation to "page content" */
    .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 1s;
        animation-name: animatebottom;
        animation-duration: 1s
    }

    @-webkit-keyframes animatebottom {
        from { bottom:-100px; opacity:0 }
        to { bottom:0px; opacity:1 }
    }

    @keyframes animatebottom {
        from{ bottom:-100px; opacity:0 }
        to{ bottom:0; opacity:1 }
    }

    #myDiv {
        display: none;
        text-align: center;
    }
</style>
<div id="loader"></div>
<!-- Page Content -->
<div id = "myDiv" style="display:none;" class="animate-bottom">

    <div class="container animate-bottom">
        <div class="row">


        </div>

    </div>

</div>

<?php include_once("inc/templates/footer.php");?>

<!-- Footer -->

<!-- /.container -->

<!-- jQuery -->
<script>
    var myVar;

    function myFunction() {
        myVar = setTimeout(showPage, 3000);
    }

    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
    }
</script>
<?php include_once("inc/scripts.php");?>

<!--footer-->
