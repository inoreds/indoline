$("#tambahDataKategoriAkun").on("click", function () {
    $('#status').val('tambah');
    $('#id_account_category').val('');
    $('#name_acount_category').val('');
    $('.modalInput').modal('show');
});

$("#simpanDataKategoriAkun").on("click", function () {
    if (($('#namaSatuan').val() == ""))
    {   
        $('#warningDataKategoriAkun').show(50);
    }   
    else
    {
        $.post('mstKategoriAkun/simpan', {
            id_account_category: $('#id_account_category').val(),
            name_account_category: $('#name_account_category').val(),
            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'mstKategoriAkun';
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

function editDataKategoriAkun(id)
{
    var json = getDataKategoriAkun(id);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#id_account_category").val(item.ID_ACCOUNT_CATEGORY); 
        $("#name_account_category").val(item.NAME_ACCOUNT_CATEGORY); 
        $("#status").val(item.ID_ACCOUNT_CATEGORY); 
        $('.modalInput').modal('show');   
    })
}


function getDataKategoriAkun(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstKategoriAkun/getDataById',
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

function deleteDataKategoriAkun(id)
{
	$.get('mstKategoriAkun/hapus', {
		id: id
    }, function(result){
    	window.location.href = 'mstKategoriAkun';
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




