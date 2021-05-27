$("#sidebar").mCustomScrollbar({
    theme: "minimal"
});

  $('#dismiss, .overlay ,.side_nav_dismiss').on('click', function () {
    $('#sidebar').removeClass('active');
    $('.overlay').removeClass('active');
  });

  $('#sidebarCollapse,.sidebarCollapse').on('click', function () {
    $('#sidebar').addClass('active');
    $('.overlay').addClass('active');
    $('.collapse.in').toggleClass('in');
    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
});

