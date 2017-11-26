$("#tambahDataMstPBBKB").on("click", function () {
    $('#status').val('tambah');
    $('.modalInput').modal('show');
});

$("#simpanDataMstPBBKB").on("click", function () {
    if (($('#jenis').val() == "") || ($('#nilai').val() == "") )
    {   
        $('#warningMstBBM').show(50);
    }   
    else
    {
        $.post('mstPBBKB/simpan', {
            jenispbbkb: $('#jenispbbkb').val(),
            nilai: $('#nilai').val(),
			keterangan: $('#keterangan').val(),
            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'mstPBBKB';
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

function editDataMstPBBKB(id)
{
    var json = getDatPBBKB(id);
    $.map(json, function(item) {
        //alert(item.NamaBahanBakar);
        $("#jenispbbkb").val(item.jenisPbbkb); 
        $("#nilai").val(item.nilai);
		$("#keterangan").val(item.keterangan);
        $("#status").val(item.idPBBKB);
        $('.modalInput').modal('show');   
    })
}


function getDatPBBKB(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstPBBKB/getDataById',
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

function deleteDataMstPBBKB(id)
{
	$.get('mstPBBKB/hapus', {
		id: id
    }, function(result){
    	window.location.href = 'mstPBBKB';
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


