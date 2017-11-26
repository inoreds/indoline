jQuery(document).ready(function() {  
	if ( localStorage.getItem("statusAction") !== null) 
	{
		statusMessage(localStorage.getItem("statusMessage"), localStorage.getItem("statusAction"));	
		localStorage.clear();
	}
	var handleDataTableButtons = function() {
	  if ($("#datatable-buttons").length) {
	    $("#datatable-buttons").DataTable({
	      dom: "Bfrtip",
	      buttons: [
	        {
	          extend: "copy",
	          className: "btn-sm"
	        },
	        {
	          extend: "csv",
	          className: "btn-sm"
	        },
	        {
	          extend: "excel",
	          className: "btn-sm"
	        },
	        {
	          extend: "pdfHtml5",
	          className: "btn-sm"
	        },
	        {
	          extend: "print",
	          className: "btn-sm"
	        },
	      ],
	      responsive: true
	    });
	  }
	};

	TableManageButtons = function() {
	  "use strict";
	  return {
	    init: function() {
	      handleDataTableButtons();
	    }
	  };
	}();

	$('#datatable').dataTable();
	$('#datatable-keytable').DataTable({
	  keys: true
	});

	$('#datatable-responsive').DataTable();

	$('#datatable-scroller').DataTable({
	  ajax: "js/datatables/json/scroller-demo.json",
	  deferRender: true,
	  scrollY: 380,
	  scrollCollapse: true,
	  scroller: true
	});

	var table = $('#datatable-fixed-header').DataTable({
	  fixedHeader: true
	});

	TableManageButtons.init();
});

function statusMessage(message, type) 
{
	var stack_bottomleft = {"dir1": "up", "dir2": "left", "firstpos1": 25, "firstpos2": 25};
	new PNotify({
	    title: type,
	    text: message,
	    type:type,
	    addclass: 'stack-bottomright',
        stack: stack_bottomleft
	})
}

var format = function(num){
	var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
	if(str.indexOf(".") > 0) {
		parts = str.split(".");
		str = parts[0];
	}
	str = str.split("").reverse();
	for(var j = 0, len = str.length; j < len; j++) {
		if(str[j] != ",") {
			output.push(str[j]);
			if(i%3 == 0 && j < (len - 1)) {
				output.push(",");
			}
			i++;
		}
	}
	formatted = output.reverse().join("");
	return(formatted + ((parts) ? "." + parts[1].substr(0, 4) : ""));
};
$(function(){
    $(".amount").keyup(function(e){
        $(this).val(format($(this).val()));
    });
});

$(".select2_single").select2({});
$(".select2_group").select2({});
$(".select2_multiple").select2({
  maximumSelectionLength: 4,
  placeholder: "With Max Selection limit 4",
  allowClear: true
});


$(".numeric").numeric();
$(".positive").numeric({ negative: false }, function() { alert("No negative values"); this.value = ""; this.focus(); });
$(".positive-integer").numeric({ decimal: false, negative: false }, function() { alert("Positive integers only"); this.value = ""; this.focus(); });
$(".decimal-2-places").numeric({ decimalPlaces: 3 });

var d = new Date();
var year = d.getFullYear();
var month = d.getMonth()+1;

for (i=2010; i<=year; i++)
{
	$("#periodeTahun").append(  $('<option>').val(i).text(i) ); 
	$("#periodeTahunBukuBesar").append(  $('<option>').val(i).text(i) );  
	$("#periodeTahunKeluar").append(  $('<option>').val(i).text(i) );  
}	
$("#periodeTahun").val(year);
$("#periodeBulan").val(month);
$("#periodeBulanKeluar").val(month);


$("#periodeTahunBukuBesar").val(year);
$("#periodeBulanBukuBesar").val(month);
$("#periodeTahunKeluar").val(year);
