
/*=============================================================
    Authour URI: www.binarytheme.com
    License: Commons Attribution 3.0

    http://creativecommons.org/licenses/by/3.0/

    100% To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US
   
    ========================================================  */


(function ($) {
    "use strict";
    var mainApp = {

        metisMenu: function () {

            /*====================================
            METIS MENU 
            ======================================*/

            $('#main-menu').metisMenu();

        },


        loadMenu: function () {

            /*====================================
            LOAD APPROPRIATE MENU BAR
         ======================================*/

            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });
        },
        slide_show: function () {

            /*====================================
           SLIDESHOW SCRIPTS
        ======================================*/

            $('#carousel-example').carousel({
                interval: 3000 // THIS TIME IS IN MILLI SECONDS
            })
        },
        reviews_fun: function () {
            /*====================================
         REWIEW SLIDE SCRIPTS
      ======================================*/
            $('#reviews').carousel({
                interval: 2000 //TIME IN MILLI SECONDS
            })
        },
        wizard_fun: function () {
            /*====================================
            //horizontal wizrd code section
             ======================================*/
            $(function () {
                $("#wizard").steps({
                    headerTag: "h2",
                    bodyTag: "section",
                    transitionEffect: "slideLeft"
                });
            });
            /*====================================
            //vertical wizrd  code section
            ======================================*/
            $(function () {
                $("#wizardV").steps({
                    headerTag: "h2",
                    bodyTag: "section",
                    transitionEffect: "slideLeft",
                    stepsOrientation: "vertical"
                });
            });
        },
       datepicker: function () {
            $("#datepicker").datepicker();
        },
       
        create_request: function (){
			$("#create_request").click(function(){
				  request_id=$("#request_id").val();
				  serv_quote = $("#serv_quote").val();
				  serv_summary = $("#serv_summary").val();
				  $.ajax({
					type: "POST",
					url: "assets/scripts_php/create_request.php",
					data: "request_id="+request_id+"&serv_quote="+serv_quote+"&serv_summary="+serv_summary,
				   success: function(html){    
					if(html=='true')    {
						$("#req_err").html("<div class='alert alert-success fade-in'>Successfully Application</div>");
						setTimeout(location.reload.bind(location), 5000);
						//window.location="dashboard.php";
					}
					else{
						$("#req_err").html("<div class='alert alert-danger fade-in'>Could not process request. Please try again</div>");
						}
				   },
				   beforeSend:function()
				   {
					$("#req_err").css('display', 'inline', 'important');
					$("#req_err").html("<div class='alert alert-info fade-in'>Updating Request</div>")
				   }
				  });
				return false;
			});
		}, 
		edit_category: function (){
			$(".btn.btn-default.cat").click(function(){
				var serv_cat_id1 = $(this).data("serv_cat_id");
				var serv_cat_name = $("#serv_cat_name"+serv_cat_id1).val();
				var serv_cat_detail = $("#serv_cat_detail"+serv_cat_id1).val();
				$.ajax({
				type: "POST",
				url: "assets/scripts_php/edit_service_category.php",
				data: "serv_cat_id="+serv_cat_id1+"&category_name="+serv_cat_name+"&category_details="+serv_cat_detail,
				success: function(html){    
				if(html=='true')    {
					$(".serv_cat_err").html("<div class='alert alert-success fade-in'>Successfully Application</div>");
					setTimeout(location.reload.bind(location), 5000);
				//window.location="dashboard.php";
				}
				else{
					$(".serv_cat_err").html("<div class='alert alert-danger fade-in'>Could not process request. Please try again</div>" + html);
				}
				},
					beforeSend:function()
				{
					$(".serv_cat_err").css('display', 'inline', 'important');
					$(".serv_cat_err").html("<div class='alert alert-info fade-in'>Updating Request</div>")
				}
				});
				return false;
			});
		},
		delete_category: function (){
			$(".btn.btn-danger.delcat").click(function(){
				var serv_cat_id1 = $(this).data("serv_cat_id");
				$.ajax({
				type: "POST",
				url: "assets/scripts_php/delete_service_category.php",
				data: "serv_cat_id="+serv_cat_id1,
				success: function(html){    
				if(html=='true')    {
					$(".del_cat_err").html("<div class='alert alert-success fade-in'>Successfully Application</div>");
					setTimeout(location.reload.bind(location), 5000);
				//window.location="dashboard.php";
				}
				else{
					$(".del_cat_err").html("<div class='alert alert-danger fade-in'>Could not process request. Please try again</div>" + html);
				}
				},
					beforeSend:function()
				{
					$(".del").css('display', 'inline', 'important');
					$(".del_cat_err").html("<div class='alert alert-info fade-in'>Updating Request</div>")
				}
				});
				return false;
			});
		},
    };
	
    $(document).ready(function () {
        mainApp.metisMenu();
        mainApp.loadMenu();
        mainApp.slide_show();
        mainApp.reviews_fun();
        mainApp.wizard_fun();
		mainApp.datepicker();
		mainApp.create_request();
		mainApp.edit_category();
		mainApp.delete_category();
    });
}(jQuery));