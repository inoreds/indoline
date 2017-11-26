$("#tambahDataJenisBBM").on("click", function () {
    $('#status').val('tambah');
    $('.modalInput').modal('show');
});

$("#simpanDataJenisBBM").on("click", function () {
    if (($('#jenisBBM').val() == "") || ($('#jumlahPBBKB').val() == "") || ($('#telpSupplier').val() == "") || ($('#emailSupplier').val() == "") )
    {   
        $('#warningDataJenisBBM').show(50);
    }   
    else
    {
        $.post('mstJenisBBM/simpan', {
            jenisBBM: $('#jenisBBM').val(),
            jumlahPBBKB: $('#jumlahPBBKB').val().replace(/,/g , ""),
            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'mstJenisBBM';
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

function editDataJenisBBM(id)
{
    var json = getDataJenisBBM(id);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#jenisBBM").val(item.JenisBBM); 
        $("#jumlahPBBKB").val(item.JumlahPBBKB.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        $("#status").val(item.IdDataJenisBBM); 
        $('.modalInput').modal('show');   
    })
}


function getDataJenisBBM(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstJenisBBM/getDataById',
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

function deleteDataJenisBBM(id)
{
	$.get('mstJenisBBM/hapus', {
		id: id
    }, function(result){
    	window.location.href = 'mstJenisBBM';
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




