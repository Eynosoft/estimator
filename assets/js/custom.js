$(document).ready(function () {
  var currentTab = $("#currentTab").val();
  console.log('current Tab=' + currentTab);
  window.location.hash = currentTab;
  var me = getUrlVars()["tab"];
  $(".nav li a[href='" + currentTab + "']").trigger('click');
  var type = window.location.hash.substr(1);
  console.log('me=' + me);
  if (type == 'undefined') {
    window.location.hash = "";
    //this.hash.slice(1);
    // location.href.replace('#', " ");
    history.replaceState(null, null, ' ');
  }
  if (type != '' && type == '#cusNotifications') {
    $(".nav-tabs li a[href='#cusNotifications']").trigger('click');
  }

  if (me != '' && (me == '#cusNotifications' || me == 'cusNotificationsuments')) {
    $(".nav-tabs li a[href='#cusNotifications']").trigger('click');
  }

  if (type != '' && type == '#cusSettings') {
    $(".nav-tabs li a[href='#cusSettings']").trigger('click');
  }

  if (type != '' && (me == '#cusSettings' || me == '#cusSettings')) {
    $(".nav-tabs li a[href='#cusSettings']").trigger('click');
  }

  $(".nav-tabs li").on('click', function () {

    if ($(this).find('a').attr('href') == '#') {
      showAlert('Please enter "Details" before proceeding', "Alert", "error");
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

function getUrlVars() {
  var vars = [],
    hash;
  var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
  for (var i = 0; i < hashes.length; i++) {
    hash = hashes[i].split('=');
    vars.push(hash[0]);
    vars[hash[0]] = hash[1];
  }
  return vars;
}
// get var url 

// Summer Note Starts

$(document).ready(function () {
  $('#sysnotes_description').summernote({
    //placeholder: 'Hello Bootstrap 4',
    tabsize: 2,
    height: 100
  });
});


// Summner Notes Ends

$(document).ready(function () {
  $('.part_note').summernote({
    tabsize: 2,
    height: 100
  });
});

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

function getHtml(items) {
  var optionspersontypeHtml = '<option value="">Select Options</option><option value="Owner">Owner</option><option value="Driver">Driver</option><option value="Passenger">Passenger</option>';

  var htmls = "<tr><td><select name='person_type[]' class='form-control'>" + optionspersontypeHtml + "</select></td><td><input type='text' class='form-control' name='person_name[]'></td><td><input type='text' name='person_number[]' class='form-control'></td><td><button type='button' onclick='deleteRow(this)' class='btn btn-danger';><i class='fa fa-trash'></i></button></td></tr>";
  return htmls;
}


$(document).ready(function () {
  $('#status_inprogress').click(function () {
    $('#about_requests').hide();
    $('#assign_jobs').show();
  });

  $('#about').click(function () {
    $('#about_requests').show();
    $('#assign_jobs').hide();
  });

});



$(document).ready(function () {

  $('#persons').click(function () {
    $('#person').show();
    $('#about_requests').hide();
    $('#document').hide();
    $('#assign').hide();
  });

  $('#about').click(function () {
    $('#about_requests').show();
    $('#person').hide();
    $('#document').hide();
    $('#assign').hide();
  });

  $('#docs').click(function () {
    $('#document').show();
    $('#about_requests').hide();
    $('#person').hide();
    $('#assign').hide();
  });

  $('#assignjobestimation').click(function () {
    $('#assign').show();
    $('#document').hide();
    $('#about_requests').hide();
    $('#person').hide();
  });

});


$(document).ready(function () {
  $('#person_data').DataTable();
});

$(document).ready(function () {
  $('#request_documents').DataTable();
});

$(document).ready(function () {
  $('#requestors_jobs').DataTable();
});


// Show Notes Section into the toggel class into the assign notes section

$(document).ready(function () {
  $('#notes').on('click', function () {
    $('#icon').toggleClass('fa fa fa-plus');
    $('#assign_notes').toggle();
  }, function () {
    $('#icon').addClass('fa fa-plus');
    $('#icon').toggleClass('fa fa fa-minus');
    $('#assign_notes').toggle();
  });
});

// Show and hide the notes section into the toggle notes section into the assign job areas..!!!

// Show the date into the input box
$(function () {
  $("#datepicker").datepicker();
});
// Show the date into the input box

$(function () {
  $("#datepicker1").datepicker();
});


$(function () {
  $('.datetimepicker').datetimepicker({
    format: 'd/m/Y h:m:s a',
  });
});

// Add Parts Value Dynamically Starts

$("#addRow").click(function () {
  var html = '<div id="inputFormRow"><button style="float:right;" id="removeRow" type="button" class="btn btn-danger">Remove</button><br><br><div class="form-row"><div class="form-group col-md-12"><label class="label-control">Part Name</label><input type="text" name="part_name[]" class="form-control" placeholder="Enter Part Name" autocomplete="off"></div></div><div class="form-row"><div class="form-group col-md-12"><label class="label-control">Part Note</label><textarea name="part_note[]" id="sysnotes_descriptions" rows="3" cols="3" class="part_note form-control"></textarea></div></div><div class="input-group-append"></div></div>';
  $('#newRow').append(html);
});


// remove row
$(document).on('click', '#removeRow', function () {
  $(this).closest('#inputFormRow').remove();
});

// Add parts Value Dynamically Ends

$("#addPartsActionRow").click(function () {
  var html = '<div id="inputFormActionRow"><button style="float:right;" id="removepartsactionRow" type="button" class="btn btn-danger">Remove</button><br><br><div class="form-row"><div class="form-group col-md-12"><label class="label-control">Part Action</label><input type="text" name="part_action_name[]" class="form-control" placeholder="Enter Parts Action Name" autocomplete="off"></div></div><div class="input-group-append"></div></div>';
  $('#newPartActionRow').append(html);
});

// remove row
$(document).on('click', '#removepartsactionRow', function () {
  $(this).closest('#inputFormActionRow').remove();
});



// Add Parts Action Dynamically Starts


// Add Parts action Dynamically Ends 

// Add labours Dynamically 

var count = $('#count_labours').val();

$('#addRowlabour').click(function () {

  var optionspersontypeHtml = '<option value="">Select Options</option><option value="air conditioning">Air Conditioning</option><option value="Chassis repair">Chassis repair</option><option value="Electrical">Electrical</option><option value="Exhaust repair">Exhaust repair</option><option value="Gearbox Rebuild">Gearbox Rebuild</option><option value="Geometry">Geometry</option><option value="Glazing Work">Glazing Work</option><option value="Mechanical">Mechanical</option><option value="Panel beating & Fitting">Panel beating & Fitting </option><option value="Plastics repair">Plastics repair</option><option value="Reprogramming">Reprogramming</option><option value="Respray">Respray</option><option value="Stickers Application">Stickers Application</option><option value="Trimming work">Trimming work</option><option value="Valeting">Valeting</option><option value="Wheel rim Repair">Wheel rim Repair</option>';

  var html = "<div class='row' id='removelabour'><div class='col-md-3'><label class='label-control'>Labour</label><select name='labour[]' class='form-control'>" + optionspersontypeHtml + "</select></div><div class='col-md-3'><label class='label-control'>Description</label><input type='text' class='form-control' name='description[]' value='' id='description'></div><div class='col-md-2' id='costt" + count + "'><label class='label-control'>Cost</label><input type='text' class='form-control cost' data-id = '" + count + "' name='cost[]' id='cost" + count + "' autocomplete='off'></div><div class='col-md-2' id='total_cost" + count + "'><label class='label-control'>With Vat</label><input type='text' class='form-control total_cost_vat' name='total_cost[]' data-id='" + count + "' id='vat_cost" + count + "'></div><div class='form-group col-md-1'>Vat:<input type='checkbox' checked data-toggle='toggle' data-on='Add' data-off='Remove' data-onstyle='success' data-offstyle='danger' value='' class='add_vat' data-id='" + count + "' name='vat[]'><input type='hidden' name='cost_total[]' id='cost_total" + count + "' value=''></div><div class='col-md-1'><button style='float:right;' id='removeRow' type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button></div></div><br>"

  $('#newLabour').append(html);

  count++;

});


$(document).on('click', '.add_vat', function () {
  var dataId = $(this).attr("data-id");
  if ($(this).is(":checked")) {
    $("#costt" + dataId).addClass('col-md-2');
    $("#costt" + dataId).removeClass('col-md-4');
    $("#total_cost" + dataId).show();
  } else {
    $("#costt" + dataId).addClass('col-md-4');
    $("#costt" + dataId).removeClass('col-md-2');
    $("#total_cost" + dataId).hide();
  }
});


$(document).on('keyup', ".cost", function () {

  var total_amount = 0;
  var index = $(this).attr('data-id');
  if ($(this).val() != '') {
    cost_amount = $(this).val();
  }

  total_amount = parseFloat(cost_amount * 0.19) + parseFloat(cost_amount);
  var cost_amount = $("#cost" + index).val();
  if (cost_amount <= 0) {
    $('#vat_cost' + index).val(0);
  } else {
    $('#vat_cost' + index).val(total_amount);
  }

  // calculate agreegate cost 

  var agreegate = 0;
  $(".cost").each(function () {
    agreegate += +$(this).val();
  });

  $('#cost_total' + index).val(agreegate);
  $('#agreegate_amount').html('<p><b>Total Cost : </b></p>' + agreegate.toFixed(2));

  $(document).on('click', '#removeRow', function () {
    $(this).closest('#removelabour').remove();
    var agreegate = 0;
    $(".cost").each(function () {
      agreegate += +$(this).val();
    });
    if (agreegate > 0) {
      $('#cost_total' + index).val(agreegate);
      $('#agreegate_amount').html('<p><b>Total Cost : </b></p>&nbsp&nbsp' + agreegate.toFixed(2));
    } else {
      $('#agreegate_amount').remove();
    }
  });
  // Calculate agreegate cost value
});


// Js starts for the parts div

$(document).on('click', '#removeparts', function () {

  var index = $(this).attr("data-id");
  $(this).closest('#removeparts' + index).remove();

  //After removing the data will calculating again

  var total_parts_amount = 0;
  var part_final_amount = 0;
  var part_amount = 0;
  var part_discount_amount = 0;
  
  $(".part_cost").each(function () {
    var index = $(this).attr('data-id');
    if ($(this).val() != '') {
      var part_cost = $(this).val();
    }
    else {
      var part_cost = 0;
    }

    if ($('#part_discount' + index).val() != '') {
      var part_discount = $('#part_discount' + index).val();
    }
    else{
      var part_discount = 0;
    }
    if($('#quantity' + index).val() != '') {
      var part_qty = $('#quantity' + index).val();
    }
    else{
      var part_qty = 0;
    }
    part_amount = parseFloat(part_qty * part_cost);
    part_discount_amount = parseFloat(part_qty * part_cost) * parseFloat(part_discount / 100);
    part_final_amount = parseFloat(part_amount) - parseFloat(part_discount_amount);
    total_parts_amount += parseFloat(part_final_amount);
    });

    if(total_parts_amount > 0) {
      $('#parts_agreegate_amount' + index).val(total_parts_amount);
      $('#part_amount_total').html('<p><b>Total Cost : </b></p>&nbsp&nbsp' + total_parts_amount.toFixed(2));
    } else {
      $('#parts_agreegate_amount' + index).val(total_parts_amount);
      $('#part_amount_total').html('<p><b>Total Cost : </b></p>&nbsp&nbsp'+0);
    }
  // AFter removing the data will be calculating again 

});

$(document).on('click', '.vat_parts', function () {
  var dataId = $(this).attr("data-id");
  if ($(this).is(":checked")) {
    $("#part_cost_vat" + dataId).show();
    $('#part_cost_class'+ dataId).removeClass('col-md-2');
    $('#part_cost_class'+ dataId).addClass('col-md-1');
  } else {
    $("#part_cost_vat" + dataId).hide();
    $('#part_cost_class'+ dataId).removeClass('col-md-1');
    $('#part_cost_class'+ dataId).addClass('col-md-2');
  }
});

//calculate the cotal amount with the vat amount 
// $(document).on('keyup', ".part_cost", function () {
//   var part_total_amount = 0;
//   var index = $(this).attr('data-id');
//   if ($(this).val() != '') {
//     part_cost_amount = $(this).val();
//   }
//   part_total_amount = parseFloat(part_cost_amount * 0.19) + parseFloat(part_cost_amount);
//   var part_cost_amount = $("#part_cost" + index).val();
//   if (part_cost_amount <= 0) {
//     $('#part_cost_val' + index).val(0);
//   } else {
//     $('#part_cost_val' + index).val(part_total_amount);
//   }
// });
// calculate the total amount with the vat amount
// loop when cost is changing 

$(document).on('keyup', '.part_cost', function () {
  var total_parts_amount = 0;
  var part_final_amount = 0;
  var part_amount = 0;
  var part_discount_amount = 0;

  // part vat amount calculating
  var part_total_amount = 0;
  var index = $(this).attr('data-id');
  if ($(this).val() != '') {
    part_cost_amount = $(this).val();
  }
  part_total_amount = parseFloat(part_cost_amount * 0.19) + parseFloat(part_cost_amount);
  var part_cost_amount = $("#part_cost" + index).val();
  if (part_cost_amount <= 0) {
    $('#part_cost_val' + index).val(0);
  } else {
    $('#part_cost_val' + index).val(part_total_amount);
  }
  // part vat amount calculating

  $(".part_cost").each(function () {
    var index = $(this).attr('data-id');
    if ($(this).val() != '') {
      var part_cost = $(this).val();
    }
    else {
      var part_cost = 0;
    }

    if ($('#part_discount' + index).val() != '') {
      var part_discount = $('#part_discount' + index).val();
    }
    else{
      var part_discount = 0;
    }
    if($('#quantity' + index).val() != '') {
      var part_qty = $('#quantity' + index).val();
    }
    else{
      var part_qty = 0;
    }
    part_amount = parseFloat(part_qty * part_cost);
    part_discount_amount = parseFloat(part_qty * part_cost) * parseFloat(part_discount / 100);
    part_final_amount = parseFloat(part_amount) - parseFloat(part_discount_amount);
    total_parts_amount += parseFloat(part_final_amount);
  });
  if(total_parts_amount > 0) {
    $('#parts_agreegate_amount' + index).val(total_parts_amount);
    $('#part_amount_total').html('<p><b>Total Cost : </b></p>&nbsp&nbsp' + total_parts_amount.toFixed(2));
  } else {
    $('#parts_agreegate_amount' + index).val(total_parts_amount);
    $('#part_amount_total').html('<p><b>Total Cost : </b></p>&nbsp&nbsp'+0);
  }
});

// loop when cost is changing 

// loop amount when the discount is changing 

$(document).on('keyup', '.discount', function () {
  var total_parts_amount = 0;
  var part_final_amount = 0;
  var part_amount = 0;
  var part_discount_amount = 0;
  var index = $(this).attr('data-id');
  $(".discount").each(function () {
    var index = $(this).attr('data-id');
    if($(this).val() != '') {
      var part_discount = $(this).val();
    }
    else{
      var part_discount = 0;
    }
    if($('#part_cost' + index).val() != '') {
      var part_cost = $('#part_cost' + index).val();
    }
    else{
      var part_cost = 0;
    }
    if($('#quantity' + index).val() != ''){
      var part_qty = $('#quantity' + index).val();
    }
    else{
      var part_qty = 0;
    }
    part_amount = parseFloat(part_qty * part_cost);
    part_discount_amount = parseFloat(part_qty * part_cost) * parseFloat(part_discount / 100);
    part_final_amount = parseFloat(part_amount) - parseFloat(part_discount_amount);
    total_parts_amount += parseFloat(part_final_amount);
  });
  if (total_parts_amount > 0) {
    $('#parts_agreegate_amount' + index).val(total_parts_amount);
    $('#part_amount_total').html('<p><b>Total Cost : </b></p>&nbsp&nbsp' + total_parts_amount.toFixed(2));
  } else {
    $('#parts_agreegate_amount' + index).val(total_parts_amount);
    $('#part_amount_total').html('<p><b>Total Cost : </b></p>&nbsp&nbsp'+0);
  }
});

// loop amount when the discount is changing

// loop for when the quantity is chnaging 

$(document).on('keyup', '.part_qty', function () {
  var total_parts_amount = 0;
  var index = $(this).attr('data-id');
  var part_final_amount = 0;
  var part_amount = 0;
  var part_discount_amount = 0;
  $(".part_qty").each(function () {
    var index = $(this).attr('data-id');
    if ($(this).val() != '') {
      var part_qty = $(this).val();
    }
    else {
     var part_qty = 0 ;
    }
    if ($('#part_discount' + index).val() != '') {
      var part_discount = $('#part_discount' + index).val();
    }
    else{
      var part_discount = 0;
    }

    if($('#part_cost' + index).val() != ''){
      var part_cost = $('#part_cost' + index).val();
    }
    else{
     var part_cost = 0;
    }
    part_amount = parseFloat(part_qty * part_cost);
    part_discount_amount = parseFloat(part_qty * part_cost) * parseFloat(part_discount / 100);
    part_final_amount = parseFloat(part_amount) - parseFloat(part_discount_amount);
    total_parts_amount += parseFloat(part_final_amount);
  });
  if (total_parts_amount > 0) {
    $('#parts_agreegate_amount' + index).val(total_parts_amount);
    $('#part_amount_total').html('<p><b>Total Cost : </b></p>&nbsp&nbsp' + total_parts_amount.toFixed(2));
  } else {
    $('#parts_agreegate_amount' + index).val(total_parts_amount);
    $('#part_amount_total').html('<p><b>Total Cost : </b></p>&nbsp&nbsp'+0);
  }
});

// loop for when the quantity is changing ends 

// Js ends for the parts div