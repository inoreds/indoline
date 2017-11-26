$("#tambahDataMstBBM").on("click", function () {
    $('#status').val('tambah');
    $('#idSatuan').prop('selectedIndex',0);
    $('.modalInput').modal('show');
});

$("#simpanDataMstBBM").on("click", function () {
    if (($('#namaBahanBakar').val() == "") || ($('#hargaBahanBakar').val() == "") )
    {   
        $('#warningMstBBM').show(50);
    }   
    else
    {
        $.post('mstBBM/simpan', {
            namaBBM: $('#namaBBM').val(),
            idSatuan: $('#idSatuan').val(),
            quantityBBM: $('#quantityBBM').val(),
            keterangan: $('#keterangan').val(),
            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'mstBBM';
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

function editDataMstBBM(id)
{
    var json = getDataBahanBakar(id);
    $.map(json, function(item) {
        //alert(item.NamaBahanBakar);
        $("#namaBBM").val(item.NamaBBM); 
        $("#idSatuan").val(item.IdSatuan);
        $("#keterangan").val(item.Keterangan);
        $("#status").val(item.IdBBM); 
        $('.modalInput').modal('show');   
    })
}


function getDataBahanBakar(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstBBM/getDataById',
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

function deleteDataMstBBM(id)
{
	$.get('mstBBM/hapus', {
		id: id
    }, function(result){
    	window.location.href = 'mstBBM';
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

function kartuStok(idBBM, idVessel)
{
    $("#table-kartuStok td").remove(); 
    $.ajax(
    {
        type: "GET",
        url: 'stokBBM/getDataById',
        data: {'idBBM':idBBM, 'idVessel':idVessel},
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        cache: false,
        success: function (dataTable) {
        
        var trHTML;
        var debit=0;
        var kredit=0;
        var saldo = 0;
        $.each(dataTable, function (i) {
            debit = dataTable[i].Debit;
            kredit = dataTable[i].Kredit;
            saldo = saldo + (+debit - +kredit);
            trHTML += '<tr><td>' 
            + dataTable[i].TglTransaksi + '</td><td>' 
            + dataTable[i].Keterangan + '</td><td>' 
            + dataTable[i].Debit.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + ' Liter</td><td>' 
            + dataTable[i].Kredit.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + ' Liter</td><td>'
            + saldo.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + ' Liter</td></tr>';
        });
        
        $('#table-kartuStok').append(trHTML);
        $('.modalKartuStok').modal('show');   
        
        },
        
        error: function (msg) {
            
            alert(msg.responseText);
        }
    });
}

function format_angka(n) {
    return  n.replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}



