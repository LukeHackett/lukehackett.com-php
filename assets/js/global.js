
// Creates a "sticky" sidebar
setTimeout(function () {
  var $sideBar = $('.sidebar')

  $sideBar.affix({
    offset: {
      top: function () {
        var offsetTop      = $sideBar.offset().top
        var sideBarMargin  = parseInt($sideBar.children(0).css('margin-top'), 10)
        var navOuterHeight = $('.nav .sidenav').height()

        return (this.top = offsetTop - navOuterHeight - sideBarMargin)
      }
    }
  })


  // Create a fancy sidebar
  $('body').scrollspy({ target: '#sidebar' });

  }, 100)
