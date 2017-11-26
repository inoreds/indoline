$("#tambahPOPembelianPertamina").on("click", function () {
    $('#status').val('tambah');
    $('.modalInput').modal('show');
});

$("#simpanPOPembelianPertamina").on("click", function () {
    if (($('#namaPengaju').val() == "") || ($('#idVessel').val() == "") )
    {   
        $('#warningPOPembelianPertamina').show(50);
    }   
    else
    {
        $.post('trnPembelianPertamina/simpan', {
            namaPengaju: $('#namaPengaju').val(),
            idVessel: $('#idVessel').val(),
            hargaBeli: $('#hargaBeli').val().replace(/,/g , ""),
            //hargaPenjualan: $('#hargaPenjualan').val().replace(/,/g , ""),
            suplier: $('#idSupplier2').val(),
            tglPengajuan: $('#tglPengajuan').val(),
            tglPembayaran: $('#tglPembayaran').val(),
            //jenisPembayaran: $('#jenisPembayaran').val(),
            idBBM: $('#idBBM').val(),
            jumlahPermintaan: $('#jumlahPermintaan').val().replace(/,/g , ""),
            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'trnPembelianPertamina';
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

$("#tambahPONonPertamina").on("click", function () {
    $('#status').val('tambah');
    $('.modalPONonPertamina').modal('show');
});
$("#simpanPONonPertamina").on("click", function () {
    if (($('#NmPengaju').val() == "") || ($('#idVessel').val() == "") )
    {   
        $('#warningPOPembelianNonPertamina').show(50);
    }   
    else
    {
        $.post('trnPembelianPertamina/simpanNonPertamina', {
            NmPengaju: $('#NmPengaju').val(),
            idVessel: $('#idVessel').val(),
            idSupplier: $('#idSupplier').val(),
            SyaratPembayaran: $('#SyaratPembayaran').val(),
            portSource: $('#portSource').val(),
            hargaBeliN: $('#hargaBeliN').val().replace(/,/g , ""),
            hargaJual: $('#hargaJual').val().replace(/,/g , ""),
            tglPengajuanN: $('#tglPengajuanN').val(),
            tglPengisianN:$('#tglPengisianN').val(),
            tglPembayaranN: $('#tglPembayaranN').val(),
            idPBBKB: $('#idPBBKB').val(),
            jenisppn: $('#jenisppn').val(),
            contactperson: $('#contactperson').val(),
            phonenumber: $('#phonenumber').val(),
            biayakirim: $('#biayakirim').val(),
            //WilayahSupply: $('#idKotaPO').val(),
            //PBBKBWilayah: $('#pbbkb').val(),
            //jenisPembayaran: $('#jenisPembayaran').val(),
            idBBM2: $('.idBBM').val(),
            jumlahPermintaanN: $('#jumlahPermintaanN').val().replace(/,/g , ""),
            st: $('#status').val()
        }, function(result){
            //$('.modalInput').modal('hide');
            window.location.href = 'trnPembelianPertamina';
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

function editPOPembelianPertamina(id)
{
    var json = getPOPembelianPertamina(id);
    $.map(json, function(item) {
        $("#namaPengaju").val(item.NamaPengaju); 
        $("#idVessel").val(item.IdVessel);
        $("#hargaBeli").val(item.HargaBeli);
        $("#hargaPenjualan").val(item.HargaPenjualan);
        $("#tglPengajuan").val(item.TglPengajuan);
        $("#tglPembayaran").val(item.TglPembayaran);
        $("#idBBM").val(item.IdBBM);
        $("#jumlahPermintaan").val(item.JumlahPermintaan);
        $("#status").val(item.POPembelian); 
        $('.modalInput').modal('show');
           
    })
}

function editPONonPertamina(id)
{
    var json = getPONonPertamina(id);
    $.map(json, function(item) {
        $("#namaPengaju").val(item.idCustomer);
        $("#idSupplier").val(item.idSupplier); 
        $("#idVessel").val(item.IdVessel);
        $("#hargaBeliN").val(item.HargaBeli);
        $("#hargaJual").val(item.HargaPenjualan);
        $("#tglPengajuanN").val(item.TglPengajuan);
        $("#tglPembayaran").val(item.TglPembayaran);
        $(".idBBM").val(item.IdBBM);
        $("#jumlahPermintaanN").val(item.JumlahPermintaan);
        $("#status").val(item.POPembelian); 
        //$('.modalInput').modal('show');
        $('.modalPONonPertamina').modal('show');   
    })
}


function getPOPembelianPertamina(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'trnPembelianPertamina/getDataById',
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

function getPONonPertamina(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'trnPembelianPertamina/getDataById',
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

function deletePOPembelianPertamina(id)
{
	
    if (confirm('Apakah anda ingin menghapusnya?')) {
        $.get('trnPembelianPertamina/hapus', {
            id: id
        }, function(result){
            window.location.href = 'trnPembelianPertamina';
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

//----------------------------------------------------------------------------------------------------------------

function inputInvoice(id)
{
    $('#poPembelian').val(id);
    $('.modalInvoice').modal('show');
}

$("#simpanInvoice").on("click", function () {
   
    var stringItem = readTableContent("#table-transaksi", 0);
    var stringDesc = readTableContent("#table-transaksi", 1);
    var stringQty = readTableContent("#table-transaksi", 2);
    var stringUom = readTableContent("#table-transaksi", 3);
    var stringUnitPrice = readTableContent("#table-transaksi", 4);
    var stringTotal = readTableContent("#table-transaksi", 5);

    $.post('trnPembelianPertamina/simpanInvoice', {
        poPembelian : $('#poPembelian').val(),
        noSO: $('#noSO').val(),
        billTo: $('#billTo').val(),
        billToAlamat: $('#billToAlamat').val(),
        shipTo: $('#shipTo').val(),
        shipToAlamat: $('#shipToAlamat').val(),
        tglInvoice: $('#tglInvoice').val(),
        salesPerson: $('#salesPerson').val(),
        poNumber: $('#poNumber').val(),
        discount: $('#discount').val(),
        shipmentDate: $('#shipmentDate').val(),
        shipVIA: $('#shipVIA').val(),
        FOB: $('#FOB').val(),
        terms: $('#terms').val(),
        PPh22: $('#PPh22').val(),
        Rabat: $('#Rabat').val(),
        Pembulatan: $('#Pembulatan').val(),
        itemInvoice: stringItem,
        descInvoice: stringDesc,
        qtyInvoice: stringQty,
        uomInvoice: stringUom,
        priceInvoice: stringUnitPrice,
        totalInvoice: stringTotal,
        st: $('#status').val()
    }, function(result){
        $('.modalInput').modal('hide');
        window.location.href = 'trnPembelianPertamina';
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
//-----------------------------------------------------------------------------

function inputRecieptBunker(id)
{
    //alert("zzzzz");
    $('#poPembelian').val(id);
    $('.modalRecieptBunker').modal('show');
}

$("#SimpanRecieptBunker").on("click", function () {
   
    var stringItem = readTableContent("#table-transaksi", 0);
    var stringDesc = readTableContent("#table-transaksi", 1);
    var stringQty = readTableContent("#table-transaksi", 2);
    var stringUnitPrice = readTableContent("#table-transaksi", 4);
    var stringTotal = readTableContent("#table-transaksi", 5);

    $.post('trnPembelianPertamina/simpanRecieptBunker', {
        poPembelian : $('#poPembelian').val(),
        nomorresi: $('#nomorresi').val(),
        pengaju: $('#pengaju').val(),
        idVessel: $('#idVessel').val(),
        tglPengisian: $('#tglPengisian').val(),
        idBBM: $('#idBBM').val(),
        //jumlahPermintaan: $('#jumlahPermintaan').val(),
        jumlahPermintaanB: $('#jumlahPermintaanB').val().replace(/,/g , ""),
        st: $('#status').val()
    }, function(result){
        $('.modalRecieptBunker').modal('hide');
        window.location.href = 'trnPembelianPertamina';
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



function readTableContent(tableId, n) 
{
    var table = $(tableId);
    var values = [];
    table.find('tr').each(function(i) {
      var $tds = $(this).find('td'),
        string = $tds.eq(n).text();
      
      if (string !== "")
      {
        values.push(string.replace(/,/g , ""));    
      } 
    });

    var myString = values.join(';');

    return myString;
};

//------------------------------------------------------------------------------------------------------------------------
function inputDOLO(poPembelian,noInvoice,detilNo)
{
    //$('#poPembelian').val(id);
    //alert(poPembelian);
    var json 
    json = getDataPO(poPembelian);
    $.map(json, function(item) {
        //alert(item.NamaBahanBakar);
        $("#noKendaraan").val(item.VesselName); 
        $("#vesselName_DO_LO").val(item.VesselName); 
        $("#idVessel_DO_LO").val(item.IdVessel);  
        $("#namaProduk_DO_LO").val(item.NamaBBM);
        $("#idBBM_DO_LO").val(item.IdBBM);          
    });

    json = getDataInvoice(poPembelian, noInvoice, detilNo);
    $.map(json, function(item) {
        //alert(item.NamaBahanBakar);
        $("#jumlah").val(item.Quantity);
        $("#itemNumber").val(item.Item);
        $("#materialDescription").val(item.Description);
        $("#quantity").val(item.Quantity);   
    });

    $('#poPembelianDO_LO').val(poPembelian);
    $('#noInvoice').val(noInvoice);
    $('#detilNo').val(detilNo);
    
    $('.modal_do_lo').modal('show');
}


$("#simpanDOLO").on("click", function () {
    //alert($('#idBBM_DO_LO').val());

        $.post('trnPembelianPertamina/simpanDO_LO', {
            poPembelian: $('#poPembelianDO_LO').val(),
            noInvoice: $('#noInvoice').val(),
            detilNo: $('#detilNo').val(),
            idVessel: $('#idVessel_DO_LO').val(),
            idBBM: $('#idBBM_DO_LO').val(),

            doPertamina: $('#doPertamina').val(),
            tglDO: $('#tglDO').val(),
            tglSpp: $('#tglSpp').val(),
            tglBerlaku: $('#tglBerlaku').val(),
            jamBerangkat: $('#jamBerangkat').val(),
            jamTiba: $('#jamTiba').val(),
            jamMulaiPembongkaran: $('#jamMulaiPembongkaran').val(),
            jamSelesaiPembongkaran: $('#jamSelesaiPembongkaran').val(),
            jamTibaDepo: $('#jamTibaDepo').val(),
            dsitribusi: $('#dsitribusi').val(),
            mengetahui: $('#mengetahui').val(),
            penerima: $('#penerima').val(),
            pengemudi: $('#pengemudi').val(),
            kernet: $('#kernet').val(),
            jumlah: $('#jumlah').val().replace(/,/g , ""),
            dikirimDengan: $('#dikirimDengan').val(),
            noKendaraan: $('#noKendaraan').val(),
            kmAwal: $('#kmAwal').val(),
            segelAtas: $('#segelAtas').val(),
            kmAkhir: $('#kmAkhir').val(),
            segelBawah: $('#segelBawah').val(),
            sgMeter: $('#sgMeter').val(),
            temperatur: $('#temperatur').val(),
            distribusi: $('#distribusi').val(),

           
            loPertamina: $('#loPertamina').val(),
            deliveryNoteNumber: $('#deliveryNoteNumber').val(),
            orderNumberDate: $('#orderNumberDate').val(),
            customerPoNumber: $('#customerPoNumber').val(),
            poDate: $('#poDate').val(),
            orderNumber: $('#orderNumber').val(),
            orderDate: $('#orderDate').val(),
            customerNumber: $('#customerNumber').val(),
            shipping: $('#shipping').val(),
            driverNumber: $('#driverNumber').val(),
            vehicleNumber: $('#vehicleNumber').val(),
            delivery: $('#delivery').val(),
            deliveryNumber: $('#deliveryNumber').val(),
            shipForm: $('#shipForm').val(),
            fillingPoint: $('#fillingPoint').val(),
            sealNumber: $('#sealNumber').val(),
            itemCapacity: $('#itemCapacity').val(),
            itemNumber: $('#itemNumber').val(),
            materialDescription: $('#materialDescription').val(),
            quantity: $('#quantity').val().replace(/,/g , ""),


            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'trnPembelianPertamina';
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

function getDataPO(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'trnPembelianPertamina/getDataById',
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

function getDataInvoice(poPembelian, noInvoice, detilNo)
{
    var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'trnPembelianPertamina/getAllDataInvoicePertamina_detilById',
        'data': {'poPembelian': poPembelian, 'noInvoice': noInvoice, 'detilNo':detilNo},
        'dataType': "json",
        'success': function (data) {
            json = data;
        }
    });
    return json;
    })();  
      return json;
}

function prosesPOPembelianN(poPembelian, idBBM, idVessel, total)
{
    if (confirm('Proses penerimaan barang sudah selesai?')) {
        $.post('trnPembelianPertamina/prosesPOPembelianN', {
            poPembelian:poPembelian, 
            idBBM: idBBM, 
            idVessel:idVessel, 
            total:total
        }, function(result){
            window.location.href = 'trnPembelianPertamina';
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

function cetakPOPembelian(noPO)
{
    window.location.href = 'trnPembelianPertamina/getPO?noPO='+noPO;
}