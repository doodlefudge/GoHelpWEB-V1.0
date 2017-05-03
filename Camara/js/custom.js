/**
 * Created by bitc administrator on 12/22/2016.
 */


$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
     and store it in a variable */
    var url = $("#cartoonVideo").attr('src');

    /* Assign empty url value to the iframe src attribute when
     modal hide, which stop the video playing */
    $("#myModal").on('hide.bs.modal', function(){
        $("#cartoonVideo").attr('src', '');
    });

    /* Assign the initially stored url back to the iframe src
     attribute when modal is displayed again */
    $("#myModal").on('show.bs.modal', function(){
        $("#cartoonVideo").attr('src', url);
    });

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

    $(window).load(function(){
        $('#myModal').modal('show');
    });		$('.panorama-view').panorama360({		sliding_controls: true	});var trigger = $('.hamburger'),      overlay = $('.overlay'),     isClosed = false;    trigger.click(function () {      hamburger_cross();          });    function hamburger_cross() {      if (isClosed == true) {                  overlay.hide();        trigger.removeClass('is-open');        trigger.addClass('is-closed');        isClosed = false;      } else {           overlay.show();        trigger.removeClass('is-closed');        trigger.addClass('is-open');        isClosed = true;      }  }    $('[data-toggle="offcanvas"]').click(function () {        $('#wrapper').toggleClass('toggled');  });  
});