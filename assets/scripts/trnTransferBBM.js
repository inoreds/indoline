$("#tambahTransferBBM").on("click", function () {
    $('#status').val('tambah');
    $('.modalInput').modal('show');
});

$("#SimpanTransferBBM").on("click", function () {
        $.post('trnTransferBBM/simpan', {
            idVessel: $('#idVessel').val(),
            date: $('#date').val(),
            port: $('#port').val(),
            ssmv: $('.idVessel').val(),
            literOBS: $('#literOBS').val().replace(/,/g , ""),
            gradeOfOil: $('#idBBM').val(),
            temperatur_F: $('#temperatur_F').val(),
            temperatur_C: $('#temperatur_C').val(),
            specificGravity: $('#specificGravity').val(),
            specificGravity_F: $('#specificGravity_F').val(),
            specificGravity_C: $('#specificGravity_C').val(),
            specificGravity60_C: $('#specificGravity60_C').val(),
            flashPoint: $('#flashPoint').val(),
            flashPoint_C: $('#flashPoint_C').val(),
            water: $('#water').val(),
            aproximate: $('#aproximate').val(),
            //lighter: $('#lighter').val(),
            namaPengawas: $('#namaPengawas').val(),
            chiefEnginer: $('#chiefEnginer').val(),

            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'trnTransferBBM';
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
	
});

function deleteMstPengguna(id)
{
	$.get('mstPengguna/hapus', {
		id: id
    }, function(result){
    	window.location.href = 'mstPengguna';
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

function editMstPengguna(id)
{
    var json = getMstPengguna(id);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#namaPengguna").val(item.NamaPengguna); 
        $("#jabatanPengguna").val(item.JabatanPengguna);
        $("#username").val(item.Username); 
        $("#status").val(item.IdPengguna); 
        $('.modalInput').modal('show');   
    })
}


function getMstPengguna(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'trnTransferBBM/getDataById',
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



