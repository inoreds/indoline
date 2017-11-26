$("#tambahDataCurrency").on("click", function () {
    $('#status').val('tambah');
    $('#id_account_category').val('');
    $('#name_acount_category').val('');
    $('.modalInput').modal('show');
});

$("#simpanDataCurrency").on("click", function () {
    if (($('#namaSatuan').val() == ""))
    {   
        $('#warningDataCurrency').show(50);
    }   
    else
    {
        $.post('mstCurrency/simpan', {
            id_currency: $('#id_currency').val(),
            name_currency: $('#name_currency').val(),
            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'mstCurrency';
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

function editDataCurrency(id)
{
    var json = getDataCurrency(id);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#id_currency").val(item.ID_CURRENCY); 
        $("#name_currency").val(item.NAME_CURRENCY); 
        $("#status").val(item.ID_CURR); 
        $('.modalInput').modal('show');   
    })
}


function getDataCurrency(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstCurrency/getDataById',
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

function deleteDataCurrency(id)
{
	$.get('mstCurrency/hapus', {
		id: id
    }, function(result){
    	window.location.href = 'mstCurrency';
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




