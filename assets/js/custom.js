$(document).ready(function() {
  $(".owl-carousel").owlCarousel({
    items: 1,
    loop: false,
    margin: 10,
    nav: false,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout: 2300,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 3
      }
    }
  });
});

$(document).ready(function() {
  $(".comment-list").owlCarousel({
    items: 2,
    loop: false,
    margin: 10,
    nav: false,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout: 2300,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 2
      }
    }
  });
});

$(document).ready(function() {
  $(".itemlink").click(function(e) {
    e.preventDefault();
    $(".itemlink").removeClass("active");
    $(this).addClass("active");
  });
});

$(document).ready(function() {
  $("#a1").click(function(e) {
    e.preventDefault();
    $("#a2").removeClass("active");
    $("#a1").addClass("active");
  });
  $("#a2").click(function(e) {
    e.preventDefault();
    $("#a1").removeClass("active");
    $("#a2").addClass("active");
  });
  $("#a3").click(function(e) {
    e.preventDefault();
    $("#a4").removeClass("active");
    $("#a3").addClass("active");
  });
  $("#a4").click(function(e) {
    e.preventDefault();
    $("#a3").removeClass("active");
    $("#a4").addClass("active");
  });
});

mediumZoom(".zoom", {
  margin: 50,
  scrollOffset: 1000
});
mediumZoom(".zoom-dark", {
  background: "#000"
});
