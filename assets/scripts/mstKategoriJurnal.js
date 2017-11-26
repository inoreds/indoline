$("#tambahDataJurnalKategori").on("click", function () {
    $('#status').val('tambah');
    $('#name_category').val('');
    $('.modalInput').modal('show');
});

$("#simpanDataJurnalKategori").on("click", function () {
    if (($('#namaSatuan').val() == ""))
    {   
        $('#warningDataJurnalKategori').show(50);
    }   
    else
    {
        $.post('mstKategoriJurnal/simpan', {
            name_category: $('#name_category').val(),
            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'mstKategoriJurnal';
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

function editDataJurnalKategori(id)
{
    var json = getDataJurnalKategori(id);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#name_category").val(item.NAME_CATEGORY); 
        $("#status").val(item.ID_CATEGORY_JOURNALS); 
        $('.modalInput').modal('show');   
    })
}


function getDataJurnalKategori(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstKategoriJurnal/getDataById',
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

function deleteDataJurnalKategori(id)
{
	$.get('mstKategoriJurnal/hapus', {
		id: id
    }, function(result){
    	window.location.href = 'mstKategoriJurnal';
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




