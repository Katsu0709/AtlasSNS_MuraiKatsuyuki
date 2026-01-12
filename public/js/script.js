$(function () {
  $('#menu-title').click(function () {
    $('#menu-container').toggleClass('active');
    $(this).next('ul').slideToggle();
  });
});
