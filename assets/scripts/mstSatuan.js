$("#tambahDataMstSatuan").on("click", function () {
    $('#status').val('tambah');
    $('#namaSatuan').val('');
    $('.modalInput').modal('show');
});

$("#simpanDataMstSatuan").on("click", function () {
    if (($('#namaSatuan').val() == ""))
    {   
        $('#warningDataMstSatuan').show(50);
    }   
    else
    {
        $.post('mstSatuan/simpan', {
            namaSatuan: $('#namaSatuan').val(),
            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'mstSatuan';
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

function editDataMstSatuan(id)
{
    var json = getDataMstSatuan(id);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#namaSatuan").val(item.NamaSatuan); 
        $("#status").val(item.IdSatuan); 
        $('.modalInput').modal('show');   
    })
}


function getDataMstSatuan(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstSatuan/getDataById',
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

function deleteDataMstSatuan(id)
{
	$.get('mstSatuan/hapus', {
		id: id
    }, function(result){
    	window.location.href = 'mstSatuan';
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




