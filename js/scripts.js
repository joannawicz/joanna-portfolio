
(function(){

  $(window).scroll(function() {
      
      if($(this).scrollTop() > 50) { 
          $('.fixed-navigation').addClass('opaque'); 
      } else {
          $('.fixed-navigation').removeClass('opaque'); 
      }
  });

  smoothScroll.init({
  	offset: 100
  });
})();