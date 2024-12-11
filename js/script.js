jQuery(document).ready(function ($) {
  new WOW().init();


  $(window).on('load', function () {
    $('.loader_area_main').hide();
    //     setTimeout(function () {
    //       $('.loader_area_main').hide();
    //     }, 500); // Match the timeout duration with the CSS transition duration
  });

  // Select li elements that have ul as children
  $('.nav-ul li:has(ul)').each(function () {
    // Append a div to their child a tags
    $(this).children('a').append('<span class="dropdown-arrow"><i class="fa-solid fa-chevron-down"></i></span>');
  });



  if ($(window).width() <= 1920) {
    $(".nav-ul li a:has(.dropdown-arrow)").on("click", function (e) {
      e.preventDefault();
      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
        $(this)
          .siblings(".sub-menu")
          .slideUp(200);
      } else {
        $(".nav-ul .dropdown-arrow").removeClass("active");
        $(this).addClass("active");
        $(".sub-menu").slideUp(200);
        $(this)
          .siblings(".sub-menu")
          .slideDown(200);
      }
    });
  }


  $(".menu_bar").on('click', function () {
    $(".header_area .nav-area").addClass("mobi-nav-active");
    $(".black_overlay_for_mobile_responsive").fadeIn();
    $("body").addClass("scroll_disable");
  });
  $(".cross").on('click', function () {
    $(".header_area .nav-area").removeClass("mobi-nav-active");
    $(".black_overlay_for_mobile_responsive").fadeOut(1000);
    $("body").removeClass("scroll_disable");
  });
  $(".black_overlay_for_mobile_responsive").on('click', function () {
    $(".header_area .nav-area").removeClass("mobi-nav-active");
    $(this).fadeOut(1000);
    $("body").removeClass("scroll_disable");
  });

  // Show the first tab and hide the rest
  $('#tabs-nav li:first-child').addClass('active');
  $('.tab-content').hide();
  $('.tab-content:first').show();


  // Click function
  $('#tabs-nav li').click(function () {
    $('#tabs-nav li').removeClass('active');
    $(this).addClass('active');
    $('.tab-content').hide();

    let activeTab = $(this).find('a').attr('href');
    $(activeTab).fadeIn();
    return false;
  });

  $(".faqs-area .set > a").on("click", function (e) {
    e.preventDefault();
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this)
        .siblings(".faqs-area .content")
        .slideUp(200);
      $(".faqs-area .set > a i")
        .removeClass("fa-minus")
        .addClass("fa-plus");
    } else {
      $(".faqs-area .set > a i")
        .removeClass("fa-minus")
        .addClass("fa-plus");
      $(this)
        .find("i")
        .removeClass("fa-plus")
        .addClass("fa-minus");
      $(".faqs-area .set > a").removeClass("active");
      $(this).addClass("active");
      $(".faqs-area .content").slideUp(400);
      $(this)
        .siblings(".faqs-area .content")
        .slideDown(400);
    }

  });
  const $tableArea = $('.table_area_main');

  if ($tableArea.length > 0) {
    function checkScroll() {
      if ($tableArea[0].scrollHeight > $tableArea.height()) {
        $('.scroll_down_arrow').show();
      } else {
        $('.scroll_down_arrow').hide();
      }
    }

    // Check scroll on page load
    checkScroll();

    // Hide or show arrow on scroll
    $tableArea.on('scroll', function () {
      if ($(this).scrollTop() > 0) {
        $('.scroll_down_arrow').fadeOut();
      } else {
        $('.scroll_down_arrow').fadeIn();
      }
    });

    // Scroll to bottom on arrow click
    $('.scroll_down_arrow').on('click', function () {
      $tableArea.animate({ scrollTop: $tableArea[0].scrollHeight }, 'slow');
    });

    // Optionally, check scroll on window resize or content change
    $(window).on('resize', checkScroll);
    // If your content dynamically changes, you might need to call checkScroll() after content changes
  }

  $('[id^=tab]').each(function () {
    var tabId = $(this).attr('id');
    $('#' + tabId + ' .scroll_down_arrow').on('click', function () {
      var tableArea = $('#' + tabId + ' .table_area_main');
      if (tableArea.length === 0) {
        console.error('No .table_area_main element found in the tab with ID:', tabId);
        return;
      }
      console.log('Scrolling tab:', tabId);
      tableArea.animate({ scrollTop: tableArea[0].scrollHeight }, 'slow');
    });
  });


  $('select.custom-select').each(function () {
    $(this).find('option:first-child').attr('disabled', 'disabled');
  });

  // AUTOMATIC LEFT SWIFT 
  if ($(window).width() <= 767) {
    $('#tabs-nav li').click(function (event) {
      event.preventDefault(); // Prevent the default anchor behavior

      // Remove the active class from all tabs
      $('#tabs-nav li').removeClass('active');

      // Add the active class to the clicked tab
      $(this).addClass('active');

      // Scroll the tab container to the left position of the clicked tab
      var $tabContainer = $('.tab_top_area');
      var $tab = $(this);
      var tabContainerWidth = $tabContainer.width();
      var tabWidth = $tab.outerWidth(true);

      $tabContainer.animate({
        scrollLeft: $tab.position().left + $tabContainer.scrollLeft() - (tabContainerWidth - tabWidth) / 2
      }, 300); // Adjust the scroll duration as needed
    });
  }



  // Function to get query parameters from the URL
  function getQueryParams(url) {
    let params = {};
    let parser = new URL(url);
    let query = parser.search.slice(1);
    let vars = query.split('&');
    vars.forEach(function (v) {
      let pair = v.split('=');
      params[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
    });
    return params;
  }

  let currentUrl = window.location.href;

  let queryParams = getQueryParams(currentUrl);

  if ('invitee_email' in queryParams) {
    let inviteeEmail = queryParams['invitee_email'];

    $('input[name="client_email"]').val(inviteeEmail);
    $('input[name="business_client_email"]').val(inviteeEmail);

    console.log('Email:', inviteeEmail);
  }
  if ('invitee_full_name' in queryParams) {
    let inviteeEmail = queryParams['invitee_full_name'];

    $('input[name="client_name"]').val(inviteeEmail);
    $('input[name="business_client_name"]').val(inviteeEmail);

    console.log('Email:', inviteeEmail);
  }

  $(".modal_cut_redirect").on("click", function () {
    window.location.href = '/'; // Redirects to the homepage
  });
  $(".bd_left_head").on("click", function () {
    $(this).toggleClass('bd_left_head_on');
    $(this).toggleClass('bd_left_body_on');
    $(".bd_left_body").slideToggle()
  });
  $('.bd_left_body li a').on('click', function (event) {
    event.preventDefault();
    let target = this.hash;
    let $target = $(target);
    $('html, body').animate({
      scrollTop: $target.offset().top - 40
    }, 500)
  });


});
document.addEventListener('DOMContentLoaded', function () {
  const firstSet = document.querySelector('.faqs-area .set');

  // Check if it exists before making changes
  if (firstSet) {
    // Replace the class of the 'i' element from 'fa-plus' to 'fa-minus'
    const icon = firstSet.querySelector('i.fa');
    icon.classList.remove('fa-plus');
    icon.classList.add('fa-minus');

    // Add the 'active' class to its child 'a' element
    const firstLink = firstSet.querySelector('a');
    const firstContent = firstSet.querySelector('.content');
    firstLink.classList.add('active');
    firstContent.style.display = 'block';
  }
});




document.addEventListener('DOMContentLoaded', function () {

  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
});