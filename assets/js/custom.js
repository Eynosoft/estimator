//Active tab bars for the all modules 
// $(document).ready(function() {

//   //Default Action
//   $(".tab_content").hide(); //Hide all content
//   $("ul.nav-tabs li:first").addClass("active").show(); //Activate first tab
//   $(".tab-pane:first").show(); //Show first tab content

//   // On Click Event
//     $("ul.nav-tabs li").click(function() {
//       $("ul.nav-tabs li").removeClass("active"); //Remove any "active" class
//       $(this).addClass("active"); //Add "active" class to selected tab
//       $(this).attr('id').show(); //Hide all tab content
//       var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
//       $(activeTab).fadeIn(); //Fade in the active content
//       return false;
//   });
// });
// Active tab bars for the all modules ends
// For Redirecting to the next tab after insertion of the data 

	$(document).ready(function() {
    var currentTab = $("#currentTab").val();
    console.log('current Tab='+ currentTab);
    window.location.hash = currentTab;
    var me = getUrlVars()["tab"];
    $(".nav li a[href='"+currentTab+"']").trigger('click');
    var type = window.location.hash.substr(1);
    console.log('me='+me);
    if(type == 'undefined')
    {
      window.location.hash = "";
      //this.hash.slice(1);
      // location.href.replace('#', " ");
      history.replaceState(null, null,' ');
    }
    if(type!='' && type=='#cusNotifications') {
      $(".nav-tabs li a[href='#cusNotifications']").trigger('click');
    }
    
    if(me!='' && (me=='#cusNotifications' || me=='cusNotificationsuments')) {
      $(".nav-tabs li a[href='#cusNotifications']").trigger('click');
    }

    if(type!= '' && type== '#cusSettings'){
      $(".nav-tabs li a[href='#cusSettings']").trigger('click');
    }

    if(type!= '' && (me == '#cusSettings' || me == '#cusSettings')){
      $(".nav-tabs li a[href='#cusSettings']").trigger('click');
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

// Summer Note Starts

$(document).ready(function() {
  $('#sysnotes_description').summernote({
    //placeholder: 'Hello Bootstrap 4',
    tabsize: 2,
    height: 100
    });
  });


// Summner Notes Ends

// Add Intems into the data base dynamiclly 
var items = 0;
function addItem() {
    items++;
    var html = getHtml(items);
    var row = document.getElementById("tbody").insertRow();
    row.innerHTML = html;
}

function deleteRow(button) {
button.parentElement.parentElement.remove();
// first parentElement will be td and second will be tr.
}
// Add Items into the Database Dynamically 
function getHtml(items){
  var optionspersontypeHtml = '<option value="">Select Options</option><option value="Owner">Owner</option><option value="Driver">Driver</option><option value="Passenger">Passenger</option>';

  var htmls = "<tr><td><select name='person_type[]' class='form-control'>"+optionspersontypeHtml+"</select></td><td><input type='text' class='form-control' name='person_name[]'></td><td><input type='text' name='person_number[]' class='form-control'></td><td><button type='button' onclick='deleteRow(this)' class='btn btn-danger';><i class='fa fa-trash'></i></button></td></tr>";
  return htmls;
}

$(document).ready(function() {

  $('#persons').click(function(){
   $('#person').show();
   $('#about_requests').hide();
   $('#document').hide();
   $('#assign').hide();
    });

    $('#about').click(function(){
      $('#about_requests').show();
      $('#person').hide();
      $('#document').hide();
      $('#assign').hide();
     });

     $('#docs').click(function(){
      $('#document').show();
      $('#about_requests').hide();
      $('#person').hide();
      $('#assign').hide();
     });

     $('#assignjobestimation').click(function(){
      $('#assign').show();
      $('#document').hide();
      $('#about_requests').hide();
      $('#person').hide();
      });

  });
  

$(document).ready(function() {
    $('#person_data').DataTable();
});

$(document).ready(function(){
  $('#request_documents').DataTable();
});


// Show Notes Section into the toggel class into the assign notes section

$(document).ready(function(){
$('#notes').on('click',function() {
   $('#icon').toggleClass('fa fa fa-plus');
   $('#assign_notes').toggle();
  }, function() {
    $('#icon').addClass('fa fa-plus');
    $('#icon').toggleClass('fa fa fa-minus');
    $('#assign_notes').toggle();
});
});

// Show and hide the notes section into the toggle notes section into the assign job areas..!!!

// Show the date into the input box
$( function() {
  $("#datepicker").datepicker();
});
// Show the date into the input box

$(function() {
  $("#datepicker1").datepicker();
});