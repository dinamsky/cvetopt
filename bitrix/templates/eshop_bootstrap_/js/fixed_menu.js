var menu_height = 100;
$(function(){
  $(window).scroll(function(){
      var menu_top = $(this).scrollTop();
      var element = $('#menu');
      if (menu_top < menu_height) {
       element.css('top', (menu_height-menu_top));
      } else {
       element.css('top', 0);
      }
   });
});			 