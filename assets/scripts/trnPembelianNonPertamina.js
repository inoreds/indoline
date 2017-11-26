$("#tambahPOPembelianNonPertamina").on("click", function () {
    $('#status').val('tambah');
    $('.modalInput').modal('show');
});

$("#simpanPOPembelianNonPertamina").on("click", function () {
    if (($('#idCustomer').val() == "") || ($('#idVessel').val() == "") )
    {   
        $('#warningPOPembelianNonPertamina').show(50);
    }   
    else
    {
        $.post('trnPembelianNonPertamina/simpan', {
            idCustomer: $('#idCustomer').val(),
            idVessel: $('#idVessel').val(),
            idSupplier: $('#idSupplier').val(),
            SyaratPembayaran: $('#SyaratPembayaran').val(),
            portSource: $('#portSource').val(),
            hargaBeli: $('#hargaBeli').val().replace(/,/g , ""),
            hargaPenjualan: $('#hargaPenjualan').val().replace(/,/g , ""),
            tglPengajuan: $('#tglPengajuan').val(),
            tglPengisian:$('#tglPengisian').val(),
            tglPembayaran: $('#tglPembayaran').val(),
            jenispbbkb: $('#jenispbbkb').val(),
            jenisppn: $('#jenisppn').val(),
            contactperson: $('#contactperson').val(),
            phonenumber: $('#phonenumber').val(),
            WilayahSupply: $('#idKotaPO').val(),
            PBBKBWilayah: $('#pbbkb').val(),
            //jenisPembayaran: $('#jenisPembayaran').val(),
            idBBM: $('#idBBM').val(),
            jumlahPermintaan: $('#jumlahPermintaan').val().replace(/,/g , ""),
            st: $('#status').val()
        }, function(result){
            //$('.modalInput').modal('hide');
            window.location.href = 'trnPembelianNonPertamina';
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


$("#idKotaPO").change(function(){
    if ($('#idKotaPO').val() != 4)
    {
        $('#pbbkb').val('0.05');
    }    
    else
    {
        $('#pbbkb').val('0.075');
    }
    //alert('test');
});

function editPOPembelian_non(id)
{
    var json = getPOPembelian_non(id);
    $.map(json, function(item) {
        $("#namaPengaju").val(item.NamaPengaju); 
        $("#idVessel").val(item.IdVessel);
        $("#idSupplier").val(item.IdSupplier);
        $("#portSource").val(item.PortSource);
        $("#hargaBeli").val(item.HargaBeli);
        $("#hargaPenjualan").val(item.HargaPenjualan);
        $("#tglPengajuan").val(item.TglPengajuan);
        $("#tglPengisian").val(item.TglPengisian);
        $("#tglPembayaran").val(item.TglPembayaran);
        $("#idBBM").val(item.IdBBM);
        $("#jumlahPermintaan").val(item.JumlahPermintaan);
        $("#status").val(item.POPembelian_non); 
        $('.modalInput').modal('show');   
    })
}


function getPOPembelian_non(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'trnPembelianNonPertamina/getDataById',
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

function deletePOPembelian_non(id)
{
    if (confirm('Apakah anda ingin menghapusnya?')) {
        $.get('trnPembelianNonPertamina/hapus', {
            id: id
        }, function(result){
            window.location.href = 'trnPembelianNonPertamina';
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
    } else {
        // Do nothing!
    }

}

function prosesPOPembelian_non(poPembelian, idBBM, idVessel, total)
{
    if (confirm('Proses penerimaan barang sudah selesai?')) {
        $.post('trnPembelianNonPertamina/prosesPOPembelian_non', {
            poPembelian:poPembelian, 
            idBBM: idBBM, 
            idVessel:idVessel, 
            total:total
        }, function(result){
            window.location.href = 'trnPembelianNonPertamina';
            if (result == 1)
            {  
                localStorage.setItem("statusAction", "success");
                localStorage.setItem("statusMessage", "Process Data Success");
            }
            else if (result == 0)
            {
                localStorage.setItem("statusAction", "error");
                localStorage.setItem("statusMessage", "Process Data Failed");
            }
        });
    } else {
        // Do nothing!
    }

}

function cetakPOPembelian_non(noPO)
{
    window.location.href = 'trnPembelianNonPertamina/getPO?noPO='+noPO;
}