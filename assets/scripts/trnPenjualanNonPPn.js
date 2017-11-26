
function cetakInvoice_NOn(id)
{
    window.location.href = 'trnPenjualanNonPPn/invoice?id='+id;
}


$("#tambahPOCustomerNonPPN").on("click", function () {
    $('#status').val('tambah');
    $('.modalInputNonPPN').modal('show');
});

$("#simpanPOPenjualanNonPpn").on("click", function () {
    if (($('#tglPO').val() == ""))
    {   
        $('#warningPOPenjualanBBM').show(50);
    }   
    else
    {


        var stringTglSupply = readTableContentPenjualan("#table-transaksi_penjualan", 0);
        var stringTglSupplyAkhir = readTableContentPenjualan("#table-transaksi_penjualan", 1);
        var stringlokasi = readTableContentPenjualan("#table-transaksi_penjualan", 2);
        var stringIdBBM = readTableContentPenjualan("#table-transaksi_penjualan", 3);
        var stringQty = readTableContentPenjualan("#table-transaksi_penjualan", 4);
        var stringHarga = readTableContentPenjualan("#table-transaksi_penjualan", 5);
        var stringSubTotal = readTableContentPenjualan("#table-transaksi_penjualan", 6);      
        //alert(stringIdBBM);
        $.post('trnPenjualanNonPPn/simpanPO', {
            tglPO: $('#tglPO').val(),
            noPO: $('#noPO').val(), 
            noInvoice: $('#noInvoice').val(), 
            idCustomer: $('#idCustomer').val(),
            //wilayah: $('#idKotaPO').val(),
            ppn : $('#ppn').val(),
            //idPBBKB : $('#idPBBKB').val(),
            //lokasiPengiriman : $('#lokasiPengiriman').val(),
            jatuhTempo: $('#jatuhTempo').val(),
            bank : $('#bank').val(),
            namaKapal : $('#namaKapal').val(),
            idBBM: stringIdBBM,
            tglSupply: stringTglSupply,
            tglSupplyAkhir: stringTglSupplyAkhir,
            quantity: stringQty,
            harga: stringHarga,
            subTotal: stringSubTotal,
            st: $('#status').val(),
            Persyaratan: $('#Persyaratan').val(),
            MBAOAT: $('#MBAOAT').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'trnPenjualanNonPPn';
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

$("#hargaPenjualanBBM").keyup(function(){
    var harga = $('#hargaPenjualanBBM').val().replace(/,/g , "");
    var quantity = $('#quantityPenjualanBBM').val().replace(/,/g , "");
    var total = Math.round(harga * quantity);
    $('#totalHargaPenjualanBBM').val(total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
});

$("#quantityPenjualanBBM").keyup(function(){
    var harga = $('#hargaPenjualanBBM').val().replace(/,/g , "");
    var quantity = $('#quantityPenjualanBBM').val().replace(/,/g , "");
    var total = Math.round(harga * quantity);
    $('#totalHargaPenjualanBBM').val(total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
});

function inputMBA_MBT_Non(noPOCustomer, detilNumber)
{
    //alert(jumlah);
    $('.noPOCustomer_penjualan').val(noPOCustomer);
    $('.detilNumber_penjualan').val(detilNumber);
    $('.modal_MBA_MBT').modal('show');
}

function inputMBA_Non(noPOCustomer, detilNumber, jumlah, idBBM)
{
    //alert("test");
    $('#noPOCustomer_MBA_Non').val(noPOCustomer);
    $('#detilNumber_MBA_Non').val(detilNumber);
    $('#detilNumber_jumlah_Non').val(jumlah);
    $('#detilNumber_idBBM_Non').val(idBBM);
    $('#status_MBA').val('tambah');
    $('.modal_MBA').modal('show');
}

function inputMBT_Non(noPOCustomer, detilNumber)
{
    $('#noPOCustomer_MBT').val(noPOCustomer);
    $('#detilNumber_MBT').val(detilNumber);
    $('#status_MBT').val('tambah');
    $('.modal_MBT').modal('show');
}

function readTableContentPenjualan(tableId, n) 
{
    var table = $(tableId);
    var values = [];
    table.find('tr').each(function(i) {
      var $tds = $(this).find('td'),
        string = $tds.eq(n).text();
    if (i > 1)
    {
      if (string !== "")
      {
        values.push(string.replace(/,/g , ""));    
      }   
    }
      
    });

    var myString = values.join(';');

    return myString;
};

$("#simpanMBA_MBT_Non").on("click", function () {

        $.post('trnPenjualanNonPPn/simpanMBA_MBT', {
            noPOCustomer: $('#noPOCustomer_penjualan').val(),
            detilNumber: $('#detilNumber_penjualan').val(),
           
            ssmv: $('#ssmv').val(),
            dateMBA: $('#dateMBA').val(),
            portMBA: $('#portMBA').val(),
            literOBS: $('#literOBS').val(),
            gradeOfOil_MBA: $('#gradeOfOil_MBA').val().replace(/,/g , ""),
            temperatur_F_MBA: $('#temperatur_F_MBA').val(),
            temperatur_C_MBA: $('#temperatur_C_MBA').val(),
            specificGravity_MBA: $('#specificGravity_MBA').val(),
            specificGravity_F_MBA: $('#specificGravity_F_MBA').val(),
            specificGravity_C_MBA: $('#specificGravity_C_MBA').val(),
            specificGravity60_C_MBA: $('#specificGravity60_C_MBA').val(),
            flashPoint_MBA: $('#flashPoint_MBA').val(),
            flashPoint_C_MBA: $('#flashPoint_C_MBA').val(),
            water_MBA: $('#water_MBA').val(),
            aproximate_MBA: $('#aproximate_MBA').val(),
            namaPengawas_MBA: $('#namaPengawas_MBA').val(),
            chiefEnginer_MBA: $('#chiefEnginer_MBA').val(),
           
           
            noPNBP: $('#noPNBP').val(),
            tglPNBP: $('#tglPNBP').val(),
            noBA: $('#noBA').val(),
            tglBA: $('#tglBA').val(),
            noRFP: $('#noRFP').val(),
            idVessel: $('#idVessel').val(),
            dateMBT: $('#dateMBT').val(),
            portMBT: $('#portMBT').val(),
            englishTonsQuantity: $('#englishTonsQuantity').val(),
            metricTonsQuantity: $('#metricTonsQuantity').val(),
            litresQuantity: $('#litresQuantity').val(),
            barrelsUSQuantity: $('#barrelsUSQuantity').val(),
            gradeOfOil_MBT: $('#gradeOfOil_MBT').val(),
            temperatur_F_MBT: $('#temperatur_F_MBT').val(),
            temperatur_C_MBT: $('#temperatur_C_MBT').val(),
            specificGravity_MBT: $('#specificGravity_MBT').val(),
            specificGravity_F_MBT: $('#specificGravity_F_MBT').val(),
            specificGravity_C_MBT: $('#specificGravity_C_MBT').val(),
            specificGravity60_C_MBT: $('#specificGravity60_C_MBT').val(),
            flashPoint_MBT: $('#flashPoint_MBT').val(),
            flashPoint_C_MBT: $('#flashPoint_C_MBT').val(),
            water_MBT: $('#water_MBT').val(),
            aproximate_MBT: $('#aproximate_MBT').val(),
            namaPengawas_MBT: $('#namaPengawas_MBT').val(),
            chiefEnginer_MBT: $('#chiefEnginer_MBT').val(),
            namaMaster: $('#namaMaster').val(),
            mengetahui: $('#mengetahui').val(),


            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'trnPenjualanNonPPn';
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

$("#simpanMBA_Non").on("click", function () {

        $.post('trnPenjualanNonPPn/simpanMBA', {
            noPOCustomer: $('#noPOCustomer_MBA_Non').val(),
            detilNumber: $('#detilNumber_MBA_Non').val(),
            qty: $('#detilNumber_jumlah_Non').val(),
            idBBM: $('#detilNumber_idBBM_Non').val(),
           
            ssmv: $('#ssmv').val(),
            idVessel: $('#idVessel').val(),
            dateMBA: $('#dateMBA').val(),
            portMBA: $('#portMBA').val(),
            literOBS: $('#literOBS').val(),
            gradeOfOil_MBA: $('#gradeOfOil_MBA').val(),
            temperatur_F_MBA: $('#temperatur_F_MBA').val(),
            temperatur_C_MBA: $('#temperatur_C_MBA').val(),
            specificGravity_MBA: $('#specificGravity_MBA').val(),
            specificGravity_F_MBA: $('#specificGravity_F_MBA').val(),
            specificGravity_C_MBA: $('#specificGravity_C_MBA').val(),
            specificGravity60_C_MBA: $('#specificGravity60_C_MBA').val(),
            flashPoint_MBA: $('#flashPoint_MBA').val(),
            flashPoint_C_MBA: $('#flashPoint_C_MBA').val(),
            water_MBA: $('#water_MBA').val(),
            aproximate_MBA: $('#aproximate_MBA').val(),
            namaPengawas_MBA: $('#namaPengawas_MBA').val(),
            chiefEnginer_MBA: $('#chiefEnginer_MBA').val(),
            st: $('#status_MBA').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'trnPenjualanNonPPn';
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

$("#simpanMBT_Non").on("click", function () {

        $.post('trnPenjualanNonPPn/simpanMBT', {
            noPOCustomer: $('#noPOCustomer_MBT').val(),
            detilNumber: $('#detilNumber_MBT').val(),
           
            noPNBP: $('#noPNBP').val(),
            tglPNBP: $('#tglPNBP').val(),
            noBA: $('#noBA').val(),
            tglBA: $('#tglBA').val(),
            noRFP: $('#noRFP').val(),
            idVessel: $('#idVessel').val(),
            dateMBT: $('#dateMBT').val(),
            portMBT: $('#portMBT').val(),
            englishTonsQuantity: $('#englishTonsQuantity').val().replace(/,/g , ""),
            metricTonsQuantity: $('#metricTonsQuantity').val().replace(/,/g , ""),
            litresQuantity: $('#litresQuantity').val().replace(/,/g , ""),
            barrelsUSQuantity: $('#barrelsUSQuantity').val().replace(/,/g , ""),
            gradeOfOil_MBT: $('#gradeOfOil_MBT').val(),
            temperatur_F_MBT: $('#temperatur_F_MBT').val(),
            temperatur_C_MBT: $('#temperatur_C_MBT').val(),
            specificGravity_MBT: $('#specificGravity_MBT').val(),
            specificGravity_F_MBT: $('#specificGravity_F_MBT').val(),
            specificGravity_C_MBT: $('#specificGravity_C_MBT').val(),
            specificGravity60_C_MBT: $('#specificGravity60_C_MBT').val(),
            flashPoint_MBT: $('#flashPoint_MBT').val(),
            flashPoint_C_MBT: $('#flashPoint_C_MBT').val(),
            water_MBT: $('#water_MBT').val(),
            aproximate_MBT: $('#aproximate_MBT').val(),
            namaPengawas_MBT: $('#namaPengawas_MBT').val(),
            chiefEnginer_MBT: $('#chiefEnginer_MBT').val(),
            namaMaster: $('#namaMaster').val(),
            mengetahui: $('#mengetahui').val(),

            st: $('#status_MBT').val()
        }, function(result){
            $('odalInput').modal('hide');
            window.location.href = 'trnPenjualanNonPPn';
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


function editMBA_Non(noPOCustomer, detilNumber)
{
    var json = getDataMBA(noPOCustomer,detilNumber);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#dateMBA").val(item.DateMBA);
        $("#portMBA").val(item.PortMBA);
        $("#ssmv").val(item.SSMV);
        $("#idVessel").val(item.IdVessel);
        $("#literOBS").val(item.LiterOBS);
        $("#gradeOfOil_MBA").val(item.GradeOfOil);
        $("#temperatur_F_MBA").val(item.Temperatur_F);
        $("#temperatur_C_MBA").val(item.Temperatur_C);
        $("#specificGravity_MBA").val(item.SpecificGravity); 
        $("#specificGravity_F_MBA").val(item.SpecificGravity_F);
        $("#specificGravity_C_MBA").val(item.SpecificGravity_C);
        $("#specificGravity60_C_MBA").val(item.SpecificGravity60_C);
        $("#flashPoint_MBA").val(item.FlashPoint);
        $("#flashPoint_C_MBA").val(item.FlashPoint_C);
        $("#water_MBA").val(item.Water);
        $("#aproximate_MBA").val(item.Aproximate);
        $("#namaPengawas_MBA").val(item.NamaPengawas);
        $("#chiefEnginer_MBA").val(item.ChiefEnginer);      
        $("#noPOCustomer_MBA_Non").val(item.NoPOCustomer); 
        $("#detilNumber_MBA_Non").val(item.DetilNumber); 
        $("#status_MBA").val(item.NoMBA);
        $('.modal_MBA').modal('show');   
    })
}


function getDataMBA(noPOCustomer, detilNumber)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'trnPenjualanNonPPn/getDataMBAById',
        'data': {'noPOCustomer': noPOCustomer, 'detilNumber': detilNumber},
        'dataType': "json",
        'success': function (data) {
            json = data;
        }
    });
    return json;
})();  
  return json;
}

function deleteMBA_Non(noPOCustomer, detilNumber, noMBA)
{
    if (confirm('Apakah anda ingin menghapusnya?')) {
        $.get('trnPenjualanNonPPn/hapusMBA', {
            noPOCustomer: noPOCustomer, detilNumber: detilNumber, noMBA:noMBA
        }, function(result){
            window.location.href = 'trnPenjualanNonPPn';
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


function printMBA_Non(noPOCustomer, detilNumber, noMBA)
{
     window.location.href = 'trnPenjualanNonPPn/printOut_MBA?noPOCustomer='+noPOCustomer+'&detilNumber='+detilNumber+'&noMBA='+noMBA;

}

function editMBT_Non(noPOCustomer, detilNumber)
{
    var json = getDataMBT(noPOCustomer,detilNumber);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#noPNBP").val(item.NoPNBP);
        $("#tglPNBP").val(item.TglPNBP);
        $("#noBA").val(item.NoBA);
        $("#tglBA").val(item.TglBA);
        $("#idVessel").val(item.IdVessel);
        $("#noRFP").val(item.NoRFP);
        $("#dateMBT").val(item.DateMBT);
        $("#portMBT").val(item.PortMBT); 
        $("#englishTonsQuantity").val(item.EnglishTonsQuantity);
        $("#metricTonsQuantity").val(item.MetricTonsQuantity);
        $("#litresQuantity").val(item.LitresQuantity);
        $("#barrelsUSQuantity").val(item.BarrelsUSQuantity);
        $("#gradeOfOil_MBT").val(item.GradeOfOil);
        $("#temperatur_F_MBT").val(item.Temperatur);
        $("#temperatur_C_MBT").val(item.Temperatur_C);
        $("#specificGravity_F_MBT").val(item.SpecificGravity_F);
        $("#specificGravity_C_MBT").val(item.SpecificGravity_C);  
        $("#flashPoint_MBT").val(item.FlashPoint);  
        $("#flashPoint_C").val(item.FlashPoint_C);  
        $("#water_MBT").val(item.Water);  
        $("#aproximate_MBT").val(item.Aproximate);      
        $("#namaPengawas_MBT").val(item.NamaPengawas);      
        $("#chiefEnginer_MBT").val(item.ChiefEnginer);      
        $("#namaMaster").val(item.NamaMaster);      
        $("#mengetahui").val(item.Mengetahui);      
     
        $("#noPOCustomer_MBT").val(item.NoPOCustomer); 
        $("#detilNumber_MBT").val(item.DetilNumber); 
        $("#status_MBT").val(item.NoMBT);
        $('.modal_MBT').modal('show');   
    })
}


function getDataMBT(noPOCustomer, detilNumber)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'trnPenjualanNonPPn/getDataMBTById',
        'data': {'noPOCustomer': noPOCustomer, 'detilNumber': detilNumber},
        'dataType': "json",
        'success': function (data) {
            json = data;
        }
    });
    return json;
})();  
  return json;
}


function printMBT_Non(noPOCustomer, detilNumber, noMBT)
{
     window.location.href = 'trnPenjualanNonPPn/printOut_MBT?noPOCustomer='+noPOCustomer+'&detilNumber='+detilNumber+'&noMBT='+noMBT;

}

function cetakKwitansiNONppn(po, detil)
{
    window.location.href = 'trnPenjualanNonPPn/kwitansi?po='+po+'&detil='+detil;
}
