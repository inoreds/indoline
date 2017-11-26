$("#tambahPersewaanKapal").on("click", function () {
    $('#status').val('tambah');
    $('.modalInput').modal('show');
});

$("#SimpanPersewaanKapal").on("click", function () {
        $.post('PersewaanKapal/simpan', {
            date: $('#date').val(),
            dari: $('#dari').val(),
            untukpembayaran: $('#untukpembayaran').val(),
            jumlah: $('#jumlah').val().replace(/,/g , ""),

            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'PersewaanKapal';
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
        'url': 'mstPengguna/getDataById',
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

function cetakKwitansisewa(po)
{
    window.location.href = 'PersewaanKapal/kwitansi?po='+po;
}

