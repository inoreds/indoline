$("#tambahDataKurs").on("click", function () {
    $('#status').val('tambah');
    $('#id_account_category').val('');
    $('#name_acount_category').val('');
    $('.modalInput').modal('show');
});

$("#simpanDataKurs").on("click", function () {
    if (($('#namaSatuan').val() == ""))
    {   
        $('#warningDataKurs').show(50);
    }   
    else
    {
        $.post('mstKurs/simpan', {
            id_kurs: $('#id_kurs').val(),
            id_curr: $('#id_curr').val(),
            name_kurs: $('#name_kurs').val(),
            value_kurs: $('#value_kurs').val(),
            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'mstKurs';
            if (result == 1)
            {
                localStorage.setItem("statusAction", "success");
                localStorage.setItem("statusMessage", "Manage Data Success");
            }
            else if (result == 0)
            {
                localStorage.setItem("statusAction", "error");
                localStorage.setItem("statusMessage", "Manage Data Failed");
            }
        });
    } 
	
});

function editDataKurs(id)
{
    var json = getDataKurs(id);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#id_curr").val(item.ID_CURR); 
        $("#name_kurs").val(item.NAME_KURS);
        $("#VALUE_KURS").val(item.VALUE_KURS); 
        $("#status").val(item.ID_CURR); 
        $('.modalInput').modal('show');   
    })
}


function getDataKurs(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstKurs/getDataById',
        'data': {'id': id},
        'dataType': "json",
        'success': function (data) {
            json = data;
        }
    });
    return json;
})();  
  return json;
}

function deleteDataKurs(id)
{
	$.get('mstKurs/hapus', {
		id: id
    }, function(result){
    	window.location.href = 'mstKurs';
        if (result == 1)
    	{  
            localStorage.setItem("statusAction", "success");
	        localStorage.setItem("statusMessage", "Delete Data Success");
    	}
        else if (result == 0)
        {
         	localStorage.setItem("statusAction", "error");
	        localStorage.setItem("statusMessage", "Delete Data Failed");
        }
    });
}




