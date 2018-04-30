$(".order-btn").click(function () {
    $('html,body').animate({
            scrollTop: $(".product-thumbnail").offset().top
        },
        'slow');
});

$(function() {
    $('#contact-nummer').hover(function() {
        $('.fa-phone-navbar').css('color', '#7b7a7a');
    }, function() {
        // on mouseout, reset the background colour
        $('.fa-phone-navbar').css('color', '');
    });
});

// ********************** Popup modal **********************
$(function() {
    // when the modal is shown
    $('#myModal').on('show.bs.modal', function(e) {
        var $modal = $(this);

        // find the trigger button
        var $button = $(e.relatedTarget);

        // find the hidden div next to trigger button
        var $notifications = $button.siblings('span.hidden');

        // transfer content to modal body
        $modal.find('.modal-body').html($notifications.html());
    })
});
// ********************** popup modal **********************


// ********************** Audio **********************

var getaudio = $('#player')[0];
var mouseovertimer;
var audiostatus = 'on';


$( document ).ready(function() {
    if ($('.speaker').hasClass("speakerplay")) {
        getaudio.load();
        getaudio.play();
    }
});

$(document).on('mouseleave', '.speaker', function() {
    /* If the mouse stops hovering on the image (leaves the image) clear the timer, reset back to 0 */
    if (mouseovertimer) {
        window.clearTimeout(mouseovertimer);
        mouseovertimer = null;
    }
});

$(document).on('click touchend', '.speaker', function() {
    /* Touchend is necessary for mobile devices, click alone won't work */
    if ($('.speaker').hasClass("speakerplay")) {
        getaudio.pause();
        $('.speaker').removeClass('speakerplay');
        window.clearTimeout(mouseovertimer);
        audiostatus = 'on';
    }else if (!$('.speaker').hasClass("speakerplay")) {
        getaudio.play();
        $('.speaker').addClass('speakerplay');
    }
});

$('#player').on('ended', function() {
    $('.speaker').removeClass('speakerplay');
    /*When the audio has finished playing, remove the class speakerplay*/
    audiostatus = 'off';
    /*Set the status back to off*/
});

//********************** End Audio **********************

// Make sound if there is an order
var sound = $('#bestelling-mp3');

if ($(".order, tr").hasClass("order-red")){
        sound.trigger('play');
}
//end sound if order

//refresh bestelling page every xxx second time
if(window.location.href.indexOf("bestelingen") > -1) {
    $('.speakerplay').remove();

    setTimeout(function(){
        location.reload();
    }, 30000)
}
//end refresh

//Order button jumbotron
$(".order-btn").click(function () {
    $('html,body').animate({
            scrollTop: $(".album").offset().top
        },
        'slow');
});
//end order button
