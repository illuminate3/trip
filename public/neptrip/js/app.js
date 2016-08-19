$(document).foundation();


$(window).load(function() {
    

// for nav responsive

    $('.nav-toggle').on('click', function() {
        $('.main-nav').toggleClass('show-it');
    });

// nav ends
});



$(document).ready(function() {


        

    $('.page-loader').fadeOut('400');

    $(function () {
     
      $(".rateYo").rateYo({
        rating: 1.5,
        halfStar: true,
        starWidth: "20px",
        starHeight: "20px"
      }).on("rateyo.set", function (e, data) { 
          alert("The rating is set to " + data.rating + "!");
      });
    });

// for search bar 

    $('.search-btn').on('click', function() {
        $('.search-bar').addClass('show-it');
    });

    $('.close-btn').on('click', function() {
        $('.search-bar').removeClass('show-it');
    });

// for search bar 

// for search-box height

    var sHeight = $('.search-box .wrap').height();

    $('.search-box').height(sHeight);

// for search-box height


// lightbox
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                return item.el.attr('title') + '<small>'+item.el.attr('description')+'</small>';
            }
        }
    });
// lightbox

// gallery slider 
     $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      dots: true,
      centerMode: true,
      focusOnSelect: true
    });

    $('.slider-nav a').on('click', function(e) {
        e.preventDefault();
    });
        
// gallery slider 



// for slider

    var fourSldier = $('.four-col-slider'),
        threeSlider = $('.three-col-slider')
        prevSlider = $('li.prev'),
        nextSlider = $('li.next');


    fourSldier.owlCarousel({
        items: 4,
        itemsTablet: [1024,3],
        itemsMobile: [480, 1],
        pagination: false
    });

    threeSlider.owlCarousel({
        items: 3,
        itemsTablet: [1024,3],
        itemsMobile: [480, 1],
        pagination: false
    });

    prevSlider.on('click', function(event) {
        fourSldier.trigger('owl.prev');
        console.log('clicked');
    });
    nextSlider.on('click', function(event) {
        fourSldier.trigger('owl.next');
        console.log('clicked');
    });
    $('.prev-3').on('click', function(event) {
        threeSlider.trigger('owl.prev');
        console.log('clicked');
    });
    $('.next-3').on('click', function(event) {
        threeSlider.trigger('owl.next');
        console.log('clicked');
    });


// slider ends

});
