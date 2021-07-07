$(document).ready(function(){ 
    
	var currentTab = $("#currentTab").val();
	console.log('currentTab');
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
	   history.replaceState(null, null, ' ');
	}

	if(type!='' && type=='Documents') {
		$(".nav-tabs li a[href='#Documents']").trigger('click');
	}
	if(me!='' && (me=='Documents#' || me=='Documents')) {
		$(".nav-tabs li a[href='#Documents']").trigger('click');
	}

	   $(".nav-tabs li").on('click',function(){
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

jsonObj = [];
$("#uploadAllFiles").on('click',function(e){
	e.preventDefault();
	$("#fileJson").html('');
	var html;
	var obj = new Object();
	var jsonString;
	$('.file-preview-image').each(function(){
		item = {}
        item ["title"] = $(this).attr('title');
        item ["src"] = $(this).attr('src');
        jsonObj.push(item);
  //	jsonString = JSON.stringify(obj);	
	});
	
	jsonString = JSON.stringify(jsonObj);
	var txtFile = "test.txt";
  var file = new File([""],txtFile);
  var str = jsonString;

file.open("w"); // open file with write access
file.write(str);
file.close();
	//$("#fileJson").val(jsonString);
	setTimeout(function(){ 
		//alert("Hello");
		$("#customerdoc").submit();
	 }, 3000);
   
})

$('#file-5').on('fileclear', function(event) {
    $("#fileJson").html('');
	console.log('fileclear')
});

});

