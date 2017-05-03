
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
           /*  $(function () {
                $("#wizard").steps({
                    headerTag: "h2",
                    bodyTag: "section",
                    transitionEffect: "slideLeft"
                });
            }); */
            /*====================================
            //vertical wizrd  code section
            ======================================*/
           /*  $(function () {
                $("#wizardV").steps({
                    headerTag: "h2",
                    bodyTag: "section",
                    transitionEffect: "slideLeft",
                    stepsOrientation: "vertical"
                });
            }); */
        },
		datepicker: function () {
            $("#datepicker").datepicker();
		
			$('body').on('focus',".form-control.datepicker", function(){
				$(this).datepicker();
			});
			$('body').on('focus',".form-control.datepicker2", function(){
				$(this).datepicker({ dateFormat: 'dd/mm/yy' });
			});
		
        },
		print: function () {
			
            $(".btn.btn-info.print").click(function(){
				var details = $(this).data("details");
				var data = 	$("#ToPrint").html()
				var mywindow = window.open('', 'ToPrint','');
				mywindow.document.write('<html><head><title>'+details+' </title>');
				mywindow.document.write('<link href="assets/css/bootstrap.css" rel="stylesheet" />');
				mywindow.document.write('</head><body >');
				mywindow.document.write(data);
				mywindow.document.write('</body></html>');

				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10

				mywindow.print();
				mywindow.close();

				return true;
			});
		
			
        },
		    
		    
		/* tag_it: function () {
			var arr = {};
			 $.ajax({
					type: "POST",
					url: "assets/scripts_php/list_skills.php",
				   success: function(html){    
						arr = $.map(html, function(el) { return el });
					}
				  });
            $("#w_skill").tagit({
				availableTags:arr
			});
        }, */
       
        create_request: function (){
			//creates Request 
			$(".btn.btn-default.req").click(function(){
				if (confirm('Are you sure ?')) {
				  var scheduleID = $(this).data("schedule_ID");
					console.log(scheduleID);
				  $.ajax({
					type: "POST",
					url: "approve_request.php",
					data: "schedule_ID="+scheduleID,
				   success: function(html){    
					if(html=='true')    {
						$(".req_err").html("<div class='alert alert-success fade-in'>Successfully Application</div>");
						setTimeout(location.reload.bind(location), 5000);
						//window.location="dashboard.php";
					}
					else{
						$(".req_err").html("<div class='alert alert-danger fade-in'>Could not process request. Please try again</div>"+ html);
						}
				   },
				   beforeSend:function()
				   {
					$(".req_err").css('display', 'inline', 'important');
					$(".req_err").html("<div class='alert alert-info fade-in'>Updating Request</div>" )
				   }
				  });
				
				}
				
				return false;
			});
		}, 
		approve_request: function (){
			//creates Request 
			$(".btn.btn-default.app").click(function(){
				var serv_conf_id = $(this).data("serv_conf_id");
				alert(serv_conf_id);
				  $.ajax({
					type: "POST",
					url: "assets/scripts_php/approve_confirmation.php",
					data: "serv_conf_id="+serv_conf_id,
				   success: function(html){    
					if(html=='true')    {
						$(".req_err").html("<div class='alert alert-success fade-in'>Request confirmation for Customersentsent!</div>");
						setTimeout(location.reload.bind(location), 5000);
						//window.location="dashboard.php";
					}
					else{
						$(".req_err").html("<div class='alert alert-danger fade-in'>Could not process request. Please try again</div>"+ html);
						}
				   },
				   beforeSend:function()
				   {
					$(".req_err").css('display', 'inline', 'important');
					$(".req_err").html("<div class='alert alert-info fade-in'>Updating Request</div>" )
				   }
				  });
				return false;
			});
		},
		approve_request2: function (){
			//creates Request 
			$(".btn.btn-default.app2").click(function(){
				var serv_conf_id = $(this).data("serv_conf_id");
				var request_id = $(this).data("request_id");
				var worker_id = $("#worker_id2"+request_id).val();
				alert(serv_conf_id);
				  $.ajax({
					type: "POST",
					url: "assets/scripts_php/reassign_to_worker.php",
					data: "serv_conf_id="+serv_conf_id+"&worker_id="+worker_id,
				   success: function(html){    
					if(html=='true')    {
						$(".req_err").html("<div class='alert alert-success fade-in'>Request confirmation for worker sent!</div>");
						setTimeout(location.reload.bind(location), 5000);
						//window.location="dashboard.php";
					}
					else{
						$(".req_err").html("<div class='alert alert-danger fade-in'>Could not process request. Please try again</div>"+ html);
						}
				   },
				   beforeSend:function()
				   {
					$(".req_err").css('display', 'inline', 'important');
					$(".req_err").html("<div class='alert alert-info fade-in'>Updating Request</div>" )
				   }
				  });
				return false;
			});
		}, 
		cancel_request: function (){
			//creates Request 
			$(".btn.btn-danger.cancel").click(function(){
				var serv_conf_id = $(this).data("serv_conf_id");
				alert(serv_conf_id);
				  $.ajax({
					type: "POST",
					url: "assets/scripts_php/cancel_request.php",
					data: "serv_conf_id="+serv_conf_id,
				   success: function(html){    
					if(html=='true')    {
						$(".req_err").html("<div class='alert alert-success fade-in'>Cancelled Request</div>");
						setTimeout(location.reload.bind(location), 5000);
						//window.location="dashboard.php";
					}
					else{
						$(".req_err").html("<div class='alert alert-danger fade-in'>Could not process request. Please try again</div>"+ html);
						}
				   },
				   beforeSend:function()
				   {
					$(".req_err").css('display', 'inline', 'important');
					$(".req_err").html("<div class='alert alert-info fade-in'>Updating Request</div>" )
				   }
				  });
				return false;
			});
		}, 
		edit_category: function (){
			//EDITS CATEGORY
			$(".btn.btn-default.cat").click(function(){
				var schedule_type_id = $(this).data("schedule_type_id");
				var type_name = $("#type_name"+schedule_type_id).val();
				var type_description = $("#type_description"+schedule_type_id).val();
				var person_minimum = $("#person_minimum"+schedule_type_id).val();
				var person_maximum = $("#person_maximum"+schedule_type_id).val();
				var type_price = $("#type_price"+schedule_type_id).val();
				var schedule_sec_info = $("#schedule_sec_info"+schedule_type_id).val();
				$.ajax({
				type: "POST",
				url: "edit_type.php",
				data:   "schedule_type_id="+schedule_type_id+
						"&type_name="+type_name+
						"&type_description="+type_description+
						"&person_minimum="+person_minimum+
						"&person_maximum="+person_maximum+
						"&type_price="+type_price+
						"&schedule_sec_info="+schedule_sec_info

					,
				success: function(html){    
				if(html=='true')    {
					$(".serv_cat_err").html("<div class='alert alert-success fade-in'>Successfully Updated</div>");
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
			//deletes service category *TODO
			$(".btn.btn-danger.delcat").click(function(){
				var scheduleid = $(this).data("scheduleid");
				$.ajax({
				type: "POST",
				url: "delete_tour.php",
				data: "scheduleid="+scheduleid,
				success: function(html){    
				if(html=='true')    {
					$(".del_cat_err").html("<div class='alert alert-success fade-in'>Successfully Deleted</div>");
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
		edit_amenity: function (){
            //EDITS CATEGORY
            $(".btn.btn-default.ame").click(function(){
                var amenity_id = $(this).data("amenity_id");
                var amenity_name = $("#amenity_name"+amenity_id).val();
                var amenity_desc = $("#amenity_desc"+amenity_id).val();
                var amenity_price = $("#amenity_price"+amenity_id).val();
                $.ajax({
                    type: "POST",
                    url: "edit_amenity.php",
                    data:   "amenity_id="+amenity_id+
                    "&amenity_name="+amenity_name+
                    "&amenity_desc="+amenity_desc+
                    "&amenity_price="+amenity_price

                    ,
                    success: function(html){
                        if(html=='true')    {
                            $(".serv_cat_err").html("<div class='alert alert-success fade-in'>Successfully Updated</div>");
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
        delete_amenity: function (){
        //deletes service category *TODO
        $(".btn.btn-danger.ame").click(function(){
            var amenity_id = $(this).data("amenity_id");
            $.ajax({
                type: "POST",
                url: "delete_amenity.php",
                data: "amenity_id="+amenity_id,
                success: function(html){
                    if(html=='true')    {
                        $(".del_cat_err").html("<div class='alert alert-success fade-in'>Successfully Deleted</div>");
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
		add_training: function (){
			//passes data to plot_training.php. This data will be used as reference to plot schedule of training
			$(".btn.btn-info.addTrainingWorker").click(function(){
				var id = $(this).data("id");
				var workerID = $(".form-control.worker"+id+" option:selected").val();
				alert(id);
				window.location = "plot_training.php?worker="+workerID+"&service="+id;
				return false;
			});
		},
		get_attendance: function (){
			//sets function to passing data to worker_attendance containing ID of worker and serv_detail_id / skill in attendance.php
			$(".btn.btn-info.getAttendance").click(function(){
				var id = $(this).data("id");
				var workerID = $(".form-control.worker option:selected").val();
				window.location = "worker_attendance.php?worker="+workerID;
				return false;
			});
			$(".btn.btn-info.getWorkers").click(function(){
				var id = $(this).data("id");
				var workerID = $(".form-control.worker option:selected").val();
				window.location = "worker_per_skill_view.php?serv_detail_id="+workerID;
				return false;
			});
			$(".btn.btn-info.getProfit").click(function(){
				var fromstr = $("#from").val();
				var tostr = $("#to").val();
				window.location = "profit_reports_view.php?from="+fromstr+"&to="+tostr;
				return false;
			});
			$(".btn.btn-info.getProfitPerWorker").click(function(){
				var fromstr = $("#from").val();
				var tostr = $("#to").val();
				var workerID = $(".form-control.worker option:selected").val();
				window.location = "profit_per_worker_view.php?from="+fromstr+"&to="+tostr+"&worker_id="+workerID;
				return false;
			});
				$(".btn.btn-info.getRatingPerService").click(function(){
				var id = $(this).data("id");
				var workerID = $(".form-control.service option:selected").val();
				window.location = "comments_section_view_skill.php?service="+workerID;
				return false;
			});
			$(".btn.btn-info.getRatingPerWorker").click(function(){
				var id = $(this).data("id");
				var workerID = $(".form-control.worker option:selected").val();
				window.location = "comments_section_view_worker.php?worker="+workerID;
				return false;
			});
			$(".btn.btn-info.getRatingPerCustomer").click(function(){
				var id = $(this).data("id");
				var workerID = $(".form-control.customer option:selected").val();
				window.location = "comments_section_view_customer.php?customer="+workerID;
				return false;
			});
			$(".checkbox.date").change(function() {
				if(this.checked) {
					//{ dateFormat: 'dd/mm/yy' }
					var toCompare = new Date( $(this).next('label').text());
					var d = new Date();
					if(toCompare< d  || toCompare== d ){
						
					}else if(toCompare > d){
						alert("Date has not yet passed");
						this.checked = false;
					}
				}
			});
		},
		getProfitPerWorker: function (){
			$(".btn.btn-info.getProfitPerWorker").click(function(){
				var fromstr = $("#from").val();
				var tostr = $("#to").val();
				var workerID = $(".form-control.worker option:selected").val();
				window.location = "profit_per_worker_view.php?from="+fromstr+"&to="+tostr+"&worker_id="+workerID;
				return false;
			});
			
		},
		worker_add: function (){
			//sets function to passing data to worker_attendance containing ID of worker and serv_detail_id / skill in attendance.php
			$("#addWorker").click(function(){
				var w_fname = $("#w_fname").val();
				var w_middle = $("#w_middle").val();
				var w_lastname = $("#w_lastname").val();
				var w_address_lot = $("#w_address_lot").val();
				var w_address_street = $("#w_address_street").val();
				var w_address_brgy = $("#w_address_brgy").val();
				var w_address_city = $("#w_address_city").val();
				var w_contactno = $("#w_contactno").val();
				var w_email = $("#w_email").val();
				var w_username = $("#w_username").val();
				var w_password = $("#w_password").val();
				var rep_password = $("#rep_password").val();
				//alert(w_password);
				$.ajax({
					type: "POST",
					url: "assets/scripts_php/create_worker.php",
					data:	"w_fname="+w_fname+
							"&w_middle="+w_middle+
							"&w_lastname="+w_lastname+
							"&w_address_lot="+w_address_lot+
							"&w_address_street="+w_address_street+
							"&w_address_brgy="+w_address_brgy+
							"&w_address_city="+w_address_city+
							"&w_contactno="+w_contactno+
							"&w_email="+w_email+
							"&w_username="+w_username+
							"&w_password="+w_password+
							"&rep_password="+rep_password,
					success: function(html){    
						if(html == "true"){
							alert("Sucessfully Added Worker");
							setTimeout(location.reload.bind(location), 1000);
						}else if (html == "user"){
							alert("Username already Taken");
						}else{
							alert("Error with adding");
						}
					}
				
				});
			});
		},
		worker_update: function (){
			//sets function to passing data to worker_attendance containing ID of worker and serv_detail_id / skill in attendance.php
			$(".btn.btn-default.updateWorker").click(function(){
				var w_id =  $(this).data("id");
				var w_fname = $("#w_fname"+w_id ).val();
				var w_middle = $("#w_middle"+w_id).val();
				var w_lastname = $("#w_lastname"+w_id).val();
				var w_address_lot = $("#w_address_lot"+w_id).val();
				var w_address_street = $("#w_address_street"+w_id).val();
				var w_address_brgy = $("#w_address_brgy"+w_id).val();
				var w_address_city = $("#w_address_city"+w_id).val();
				var w_contactno = $("#w_contactno"+w_id).val();
				var w_email = $("#w_email"+w_id).val();
			
				alert(w_id);
				$.ajax({
					type: "POST",
					url: "assets/scripts_php/update_worker.php",
					data:	
							"w_id="+w_id+
							"&w_fname="+w_fname+
							"&w_middle="+w_middle+
							"&w_lastname="+w_lastname+
							"&w_address_lot="+w_address_lot+
							"&w_address_street="+w_address_street+
							"&w_address_brgy="+w_address_brgy+
							"&w_address_city="+w_address_city+
							"&w_contactno="+w_contactno+
							"&w_email="+w_email,
					success: function(html){    
						if(html == "true"){
							alert("Sucessfully Updated Worker");
							setTimeout(location.reload.bind(location), 1000);
						}else if (html == "user"){
							alert("Username already Taken");
						}else{
							alert("Error with adding"+html);
						}
					}
				
				});
			});
		},
		worker_disable: function (){
			//sets function to passing data to worker_attendance containing ID of worker and serv_detail_id / skill in attendance.php
			$(".btn.btn-danger.disableWorker").click(function(){
				var w_id =  $(this).data("id");
			
				alert(w_id);
				$.ajax({
					type: "POST",
					url: "assets/scripts_php/disable_worker.php",
					data: "w_id="+w_id,
					success: function(html){    
						if(html == "true"){
							alert("Sucessfully Disabled Worker");
							setTimeout(location.reload.bind(location), 1000);
						}else if (html == "user"){
							alert("Username already Taken");
						}else{
							alert("Error with adding"+html);
						}
					}
				
				});
			});
		},
		getWorkerAvailable: function (){
			//sets function to passing data to worker_attendance containing ID of worker and serv_detail_id / skill in attendance.php
			$(".btn.btn-default.findWorker").click(function(){
				var request_id = $(this).data("id");
				var serv_detail_id = $(this).data("serv_detail_id");
				var customer_id = $(this).data("customer_id");
				var lat = $(this).data("lat");
				var lng = $(this).data("lng");
				//alert(request_id);
				var zoom = 15;
				$.ajax({
				type: "POST",
				url: "test.php",
				data: "request_id="+request_id+"&serv_detail_id="+serv_detail_id+"&customer_id="+customer_id,
				dataType:'json',
				success: function(data){    
					if(data["dist"] > 10000 ){
						zoom = 11;
					}else if(data["dist"] > 8000 ){
						zoom = 12;
					}else if(data["dist"] > 6000 ){
						zoom = 13;
					}else if(data["dist"] > 5000 ){
						zoom = 14;
					}else{
						zoom = 15;
					}
					var mapString = "https://maps.googleapis.com/maps/api/staticmap?center="+lat+","+lng+"&zoom="+zoom+"&size=565x300&markers=color:red%7Clabel:C%7C"+lat+","+lng+"&markers=color:blue%7Clabel:W%7C"+data["lat"]+","+data["lng"]+"&key=AIzaSyDm70H2lSLLKffXQ8iFbepnbD6V6E6jD2E";
					$("#worker_id"+request_id).val(data["id"]);
					$("#worker_name"+request_id).val(data["name"]);
					$("#map"+request_id).attr("src",mapString);
						alert(mapString);
				}
				
				});
			
			});
		},
		reassign_worker: function (){
			//passes data to plot_training.php. This data will be used as reference to plot schedule of training
				$(".btn.btn-default.reassignWorker").click(function(){
					var request_id = $(this).data("request_id");
					var serv_detail_id = $(this).data("serv_detail_id");
					var customer_id = $(this).data("customer_id");
					var declined_worker = $(this).data("declined_worker");
					var lat = $(this).data("lat");
					var lng = $(this).data("lng");
					//alert(request_id);
					var zoom = 15;
					$.ajax({
					type: "POST",
					url: "assets/scripts_php/reassign_worker.php",
					data: "request_id="+request_id+"&serv_detail_id="+serv_detail_id+"&declined_worker="+declined_worker,
					dataType:'json',
					success: function(data){    
							alert(request_id);
							if(data["dist"] > 10000 ){
								zoom = 11;
							}else if(data["dist"] > 8000 ){
								zoom = 12;
							}else if(data["dist"] > 6000 ){
								zoom = 13;
							}else if(data["dist"] > 5000 ){
								zoom = 14;
							}else{
								zoom = 15;
							}
							alert(data["dist"] );
							var mapString = "https://maps.googleapis.com/maps/api/staticmap?center="+lat+","+lng+"&zoom="+zoom+"&size=565x300&markers=color:red%7Clabel:C%7C"+data["lat"]+","+data["lng"]+"&markers=color:blue%7Clabel:W%7C"+data["lat"]+","+data["lng"]+"&key=AIzaSyDm70H2lSLLKffXQ8iFbepnbD6V6E6jD2E";
							$("#worker_id2"+request_id).val(data["id"]);
							$("#worker_name2"+request_id).val(data["name"]);
							$("#map"+request_id).attr("src",mapString);
							//alert(mapString);
						}
					});
				});
		},
		approve_training: function (){
			//Sets function to approval button of completed Trainings in attendance.php
			$(".btn.btn-primary.approve").click(function(){
				var id = $(this).data("id");
				var serv_detail_id = $(this).data("serv_detail_id");
				var training_id = $(this).data("training_id");
				alert(training_id);
				$.ajax({
				type: "POST",
				url: "assets/scripts_php/add_skill.php",
				data: "id="+id+"&serv_detail_id="+serv_detail_id+"&training_id="+training_id,
				success: function(html){    
				if(html=='true')    {
					$(".skill_err").html("<div class='alert alert-success fade-in'>Successfully Application</div>");
					setTimeout(location.reload.bind(location), 5000);
					//window.location="dashboard.php";
				}
				else{
					$(".skill_err").html("<div class='alert alert-danger fade-in'>Could not process request. Please try again</div>" + html);
				}
				},
					beforeSend:function()
				{
					$(".skill_err").css('display', 'inline', 'important');
					$(".skill_err").html("<div class='alert alert-info fade-in'>Updating Request</div>")
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
		//mainApp.tag_it();
		mainApp.add_training();
		mainApp.get_attendance();
		mainApp.approve_training();
		mainApp.getWorkerAvailable();
		mainApp.approve_request();
		mainApp.approve_request2();
		mainApp.cancel_request();
		mainApp.worker_add();
		mainApp.print();
		mainApp.worker_update();
		mainApp.worker_disable();
		mainApp.reassign_worker();
		mainApp.getProfitPerWorker();
		mainApp.edit_amenity();
		mainApp.delete_amenity();
    });
}(jQuery));