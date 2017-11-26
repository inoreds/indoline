
function cetakKwitansi(id)
{
    window.location.href = 'daftarPiutang/kwitansi?id='+id;
}
/*
function daftarKanPiutang(idBBM,tgl,id,kurang)
{
   if (confirm('Daftarkan Piutang?')) {
        $.post('daftarPiutang/daftar', {
            idBBM: idBBM,
            tgl: tgl,
            id: id,
            kurang: kurang
        }, function(result){
            window.location.href = 'daftarPiutang';
            if (result >= 1)
            {
                localStorage.setItem("statusAction", "success");
                localStorage.setItem("statusMessage", "Daftar Hutang Success");
            }
            else if (result == 0)
            {
                localStorage.setItem("statusAction", "error");
                localStorage.setItem("statusMessage", "Daftar Hutang Failed");
            }
        });
    } else {
        // Do nothing!
    }
    
}
*/

$("#daftarKanPiutang").on("click", function () {
     $.post('daftarPiutang/daftar', {
            idBBM:  $('#idBBM').val(),
            tgl: $('#tgl').val(),
            id: $('#id').val(),
            kurang: $('#kurangDaftar').val().replace(/,/g , ""),
            totalHPP: $('#totalHPP').val().replace(/,/g , "")
        }, function(result){
            window.location.href = 'daftarPiutang';
            if (result >= 1)
            {
                localStorage.setItem("statusAction", "success");
                localStorage.setItem("statusMessage", "Daftar Hutang Success");
            }
            else if (result == 0)
            {
                localStorage.setItem("statusAction", "error");
                localStorage.setItem("statusMessage", "Daftar Hutang Failed");
            }
        });
    
});

$("#hppLiter").keyup(function(){
    
    var liter = $('#liter').val().replace(/,/g , "");
    var hppLiter = $('#hppLiter').val().replace(/,/g , "");
    var totalHPP = Math.round(liter * hppLiter);
    $('#totalHPP').val(totalHPP.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
    
});

function daftarKanPiutang(idBBM,tgl,id,kurang, liter)
{
    $('#liter').val(liter.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
    $('#idBBM').val(idBBM);
    $('#tgl').val(tgl);
    $('#id').val(id);
    $('#kurangDaftar').val(kurang);
    $('.modalInput-daftarPiutang').modal('show');
}

function lunasiPiutang(tgl,id, status, kurang)
{
    $('#status').val(status);
    $('#name_category').val('');
    $('#tglTransaksiJurnal').val(tgl);
    $('#idTransaksi').val(id);
    $('#noteJurnal').val('Pelunasan Piutang');
    $('#kurang').val(kurang);
    $('.modalInput-piutang').modal('show');
}

$("#simpanDataPiutang").on("click", function () {
    if (($('#namaSatuan').val() == ""))
    {   
        $('#warningDataJurnal').show(50);
    }   
    else
    {
        var pembayaran =0;
        var kurang=0
        pembayaran = $('#jumlahPembayaran').val().replace(/,/g , "");
        kurang = $('#kurang').val(); 
        if ( +pembayaran <= +kurang)
        {
            $.post('daftarPiutang/lunasiPiutang', {
                note: $('#noteJurnal').val(),
                id_transaction: $('#idTransaksi').val(),
                date_transaction: $('#tglTransaksiJurnal').val(),
                jumlahPembayaran: $('#jumlahPembayaran').val().replace(/,/g , ""),
                akunBank: $('#akunBank').val(),
               // penjual: $('#penjual').val(),
                st: $('#status').val()
            }, function(result){
                $('.modalInput').modal('hide');
                window.location.href = 'daftarPiutang';
                if (result >= 1)
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
        else
        {
            alert('Nominal Terlalu Besar');
        }
        
           
    } 
    
});

/*
$("#simpanDataPiutang").on("click", function () {
    if (($('#namaSatuan').val() == ""))
    {   
        $('#warningDataJurnal').show(50);
    }   
    else
    {
        var totalDebit = 0;
        var totalKredit = 0;
        elementSubAkunJurnal = document.querySelectorAll("[name='subAkunJurnal[]']");
        elementDebitJurnal = document.querySelectorAll("input[name='debitJurnal[]']");
        elementKreditJurnal = document.querySelectorAll("input[name='kreditJurnal[]']");
        arraySubAkunJurnal=[];
        arrayDebitJurnal=[];
        arrayKreditJurnal=[];
        for(var i = 0; i < elementSubAkunJurnal.length; i++)
        {
            
            if (elementDebitJurnal[i].value != "" || elementDebitJurnal[i].value != 0)
            {
                arrayDebitJurnal.push(elementDebitJurnal[i].value.replace(/,/g , "")); 
            }
            else
            {
                arrayDebitJurnal.push(0); 
            }
              
            if (elementKreditJurnal[i].value != "" || elementKreditJurnal[i].value != 0)
            {
                arrayKreditJurnal.push(elementKreditJurnal[i].value.replace(/,/g , "")); 
            }
            else
            {
                
                arrayKreditJurnal.push(0); 
            }
            
            arraySubAkunJurnal.push(elementSubAkunJurnal[i].value);  

            debit =  elementDebitJurnal[i].value.replace(/,/g , "");
            kredit = elementKreditJurnal[i].value.replace(/,/g , "");
            totalDebit += +debit;
            totalKredit += +kredit;   

        }
        //alert(arraySubAkunJurnal);
        if (totalDebit == totalKredit)
        {
            if ($('#kurang').val() >= totalDebit)
            {
                $.post('daftarPiutang/simpan', {
                    note: $('#noteJurnal').val(),
                    id_transaction: $('#idTransaksi').val(),
                    date_transaction: $('#tglTransaksiJurnal').val(),
                    dataSubAkunJurnal: arraySubAkunJurnal,
                    dataDebitJurnal: arrayDebitJurnal,
                    dataKreditJurnal: arrayKreditJurnal,
                    st: $('#status').val()
                }, function(result){
                    $('.modalInput').modal('hide');
                    window.location.href = 'daftarPiutang';
                    if (result >= 1)
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
            else
            {
                alert('Nominal Terlalu Besar');
            }  
            
        } 
        else
        {
            alert(totalDebit + " " + totalKredit);
            alert('Jumlah Tidak Balance!!!');
        }
        
           
    } 
	
});
*/
function kartuPiutang(id)
{
    $("#table-kartuPiutang td").remove(); 
    $.ajax(
    {
        type: "GET",
        url: 'kartuPiutang/getDataById',
        data: {'id':id},
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        cache: false,
        success: function (dataTable) {
        
        var trHTML;
        var debit=0;
        var total=0;
        var noPO=0;
        var saldo=0;
        $.each(dataTable, function (i) {
            debit = dataTable[i].DEBIT;
            if (i > 0)
            {
                if (dataTable[i].NoPoCustomer == noPO)
                {
                    noPO = dataTable[i].NoPoCustomer;
                    total = "";
                    saldo = saldo - debit;

                }
                else
                {
                    noPO = dataTable[i].NoPoCustomer;
                    total = dataTable[i].Total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                    saldo = dataTable[i].Total;
                    saldo = saldo - debit;
                    trHTML += '<tr><td></td><td></td><td>&nbsp;</td><td></td><td></td></tr>';
                }    
            } 
            else
            {
                noPO = dataTable[i].NoPoCustomer;
                total = dataTable[i].Total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                saldo = dataTable[i].Total;
                saldo = saldo - debit;
            }

            if (saldo != 0)
            {
                saldo = saldo;
            }
            else
            {
                saldo = "Lunas"; 
            }

            trHTML += '<tr><td>' 
            + dataTable[i].DATE_TRANSACTION + '</td><td>' 
            + dataTable[i].NOTE + '</td><td>' 
            + total + '</td><td>' 
            + debit.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</td><td>' 
            + saldo.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"); + '</td></tr>';
        });
        
        $('#table-kartuPiutang').append(trHTML);
        $('.modalKartuPiutang').modal('show');   
        
        },
        
        error: function (msg) {
            
            alert(msg.responseText);
        }
    });
}
