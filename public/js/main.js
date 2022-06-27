/*  ---------------------------------------------------
    Theme Name: Cake
    Description: Cake e-commerce tamplate
    Author: Colorib
    Author URI: https://www.colorib.com/
    Version: 1.0
    Created: Colorib
---------------------------------------------------------  */

'use strict';

(function($) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function() {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function() {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Search Switch
    $('.search-switch').on('click', function() {
        $('.search-model').fadeIn(400);
    });

    $('.search-close-switch').on('click', function() {
        $('.search-model').fadeOut(400, function() {
            $('#search-input').val('');
        });
    });

    //Canvas Menu
    $(".canvas__open").on('click', function() {
        $(".offcanvas-menu-wrapper").addClass("active");
        $(".offcanvas-menu-overlay").addClass("active");
    });

    $(".offcanvas-menu-overlay").on('click', function() {
        $(".offcanvas-menu-wrapper").removeClass("active");
        $(".offcanvas-menu-overlay").removeClass("active");
    });


    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*-----------------------
        Hero Slider
    ------------------------*/
    $(".hero__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        nav: true,
        navText: ["<i class='fa fa-angle-left'><i/>", "<i class='fa fa-angle-right'><i/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false
    });

    /*--------------------------
        Categories Slider
    ----------------------------*/
    $(".categories__slider").owlCarousel({
        loop: true,
        margin: 22,
        items: 5,
        dots: false,
        nav: true,
        navText: ["<span class='arrow_carrot-left'><span/>", "<span class='arrow_carrot-right'><span/>"],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false,
        responsive: {
            0: {
                items: 1,
                margin: 0
            },
            480: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    });

    /*-----------------------------
        Testimonial Slider
    -------------------------------*/
    $(".testimonial__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 2,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            }
        }
    });

    /*---------------------------------
        Related Products Slider
    ----------------------------------*/
    $(".related__products__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 4,
        dots: false,
        nav: true,
        navText: ["<span class='arrow_carrot-left'><span/>", "<span class='arrow_carrot-right'><span/>"],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            },
        }
    });

    /*--------------------------
        Select
    ----------------------------*/
    $("select:not(.jq-select2)").niceSelect();

    /*------------------
		Magnific
	--------------------*/
    $('.video-popup').magnificPopup({
        type: 'iframe'
    });

    /*------------------
        Barfiller
    --------------------*/
    $('#bar1').barfiller({
        barColor: '#111111',
        duration: 2000
    });
    $('#bar2').barfiller({
        barColor: '#111111',
        duration: 2000
    });
    $('#bar3').barfiller({
        barColor: '#111111',
        duration: 2000
    });


    /*------------------
		Single Product
	--------------------*/
    $('.product__details__thumb img').on('click', function() {
        $('.product__details__thumb .pt__item').removeClass('active');
        $(this).addClass('active');
        var imgurl = $(this).data('imgbigurl');
        var bigImg = $('.big_img').attr('src');
        if (imgurl != bigImg) {
            $('.big_img').attr({
                src: imgurl
            });
        }
    });

    /*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function() {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });



    $(".product__details__thumb").niceScroll({
        cursorborder: "",
        cursorcolor: "rgba(0, 0, 0, 0.5)",
        boxzoom: false
    });

    $('input[name=qty]').on('change keyup', function() {
        //console.log($('input[name=qty]').val());
        let productID = $(this).attr('data-id');
        let productQty = $(this).val();

        if (productQty < 0) {
            $(this).val(1);
            return false;
        }
        $.post('/cartQty', {
            id: productID,
            qty: productQty
        }, function(response) {
            $('#item_price_' + productID).text('$' + response.item_price).css("font-weight", "Bold");
            $('#total_price').text('$' + response.total_price).css({ "font-weight": "Bold", "color": "blue", "font-size": "25px" });
            $('.backet_total_price').text('$' + response.total_price).css({ "font-weight": "Bold", "font-size": "25px" });
            console.log($('#backet_total_price').text());


        }, 'json');
    });

    $('.deladdr').on('click', function() {
        console.log('hi');
        var action = $(this).attr('data-action');
        //var yesbutton = $('#removeRow');
        $('#removeForm').attr("action", action);



    });
    /*$('.heart__btn').on('click', function() {
        console.log('hi, Ani');
        if ($(this).css('color') != '#f08632') {
            $(this).css('color', 'red');
            console.log('f08632');
        } else {
            $(this).css('color', '#f08632');
            console.log('red');
        }
    });*/
    $(".jq-select2").select2({
        tags: true
    });
    $("#postcode").keyup(function() {
        var post = $(this).val();
        console.log(post);
        var url = "https://maps.googleapis.com/maps/api/geocode/json?address=" + post + ",Bulgaria&key=AIzaSyDDAsTkLR1pzqSWeEJq63GpiLXGxB7cs10";
        console.log(url);

        /* $.post(url,
             function(data, status) {
                 alert("Data: " + data + "\nStatus: " + status);
             });*/
        $.post(url, function(req, res, next) {
            xmlhttp.setRequestHeader("Access-Control-Allow-Origin", "*");
            xmlhttp.setRequestHeader("Access-Control-Allow-Credentials", "true");
            //xmlhttp.setRequestHeader("Access-Control-Allow-Methods", "GET");
            xmlhttp.setRequestHeader("Access-Control-Allow-Headers", "Content-Type");
            xmlhttp.send();
            return res.sendStatus(200);
            alert("Data: " + data + "\nStatus: " + status);
        });

    })


})(jQuery);