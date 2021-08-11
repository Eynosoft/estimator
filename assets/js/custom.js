//Active tab bars for the all modules 
$(document).ready(function() {
  //Default Action
  $(".tab_content").hide(); //Hide all content
  $("ul.nav-tabs li:first").addClass("active").show(); //Activate first tab
  $(".tab-pane:first").show(); //Show first tab content

  //On Click Event
    $("ul.nav-tabs li").click(function() {
      $("ul.nav-tabs li").removeClass("active"); //Remove any "active" class
      $(this).addClass("active"); //Add "active" class to selected tab
      $(this).attr('id').show(); //Hide all tab content
      var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
      $(activeTab).fadeIn(); //Fade in the active content
      return false;
  });

});

// Active tab bars for the all modules ends


// For Redirecting to the next tab after insertion of the data 

	$(document).ready(function() {

    var currentTab = $("#currentTab").val();
    window.location.hash = currentTab;
    var me = getUrlVars()["tab"];
    $(".nav-tabs li a[href='"+currentTab+"']").trigger('click');
    var type = window.location.hash.substr(1);
    console.log('me='+me);
    if(type == 'undefined')
    {
      window.location.hash = "";
      //this.hash.slice(1);
      // location.href.replace('#', " ");
      history.replaceState(null, null,' ');
    }
  
    if(type!='' && type=='cusNotifications') {
      $(".nav-tabs li a[href='#cusNotifications']").trigger('click');
    }
    
    if(me!='' && (me=='cusNotifications#' || me=='cusNotificationsuments')) {
      $(".nav-tabs li a[href='#cusNotifications']").trigger('click');
    }

    $(".nav-tabs li").on('click',function() {

     if($(this).find('a').attr('href') == '#') {
        showAlert('Please enter "Details" before proceeding',"Alert","error");
        return false;
      }

      $(".nav-tabs li").removeClass('active');
      $(this).addClass('active');
      console.log($(this).find('a').attr('href'));
      window.location.hash = $(this).find('a').attr('href');

      });

  });

// for redirectinn to the next tab after insertion of the data 
// Get var url 

function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
}
// get var url 






