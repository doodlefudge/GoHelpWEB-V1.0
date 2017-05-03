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

    /***   START Step wizard form**/
    $(window).load(function(){
        $('#myModal').modal('show');
    });
    //Start step wizard form
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');

        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });

    $('ul.setup-panel li.active a').trigger('click');

    // DEMO ONLY //
    $('#activate-step-2').on('click', function(e) {
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');

        //$(this).remove();
    })

    $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');

        //$(this).remove();
    })
   // $('.panorama-view').panorama360({		sliding_controls: true	});var trigger = $('.hamburger'),      overlay = $('.overlay'),     isClosed = false;    trigger.click(function () {      hamburger_cross();          });    function hamburger_cross() {      if (isClosed == true) {                  overlay.hide();        trigger.removeClass('is-open');        trigger.addClass('is-closed');        isClosed = false;      } else {           overlay.show();        trigger.removeClass('is-closed');        trigger.addClass('is-open');        isClosed = true;      }  }    $('[data-toggle="offcanvas"]').click(function () {        $('#wrapper').toggleClass('toggled');  });

    /***   END Step wizard form**/

});
