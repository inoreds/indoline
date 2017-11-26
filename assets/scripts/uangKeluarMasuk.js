
$("#tambahUangKeluarMasuk").on("click", function () {
    $('#status').val('tambah');
    $('.modalInput-uangKeluarMasuk').modal('show');
});


/*
$("#simpanDataUangKeluarMasuk").on("click", function () {
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
            $.post('uangKeluarMasuk/simpan', {
                //note: $('#noteJurnal').val(),
                //id_transaction: $('#idTransaksi').val(),
                date_transaction: $('#tglTransaksiJurnal').val(),
                dataSubAkunJurnal: arraySubAkunJurnal,
                dataDebitJurnal: arrayDebitJurnal,
                dataKreditJurnal: arrayKreditJurnal,
                st: $('#status').val()
            }, function(result){
                $('.modalInput').modal('hide');
                window.location.href = 'uangKeluarMasuk';
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
            alert(totalDebit + " " + totalKredit);
            alert('Jumlah Tidak Balance!!!');
        }
        
           
    } 
	
});
*/

$("#simpanDataUangKeluarMasuk").on("click", function () {
    if (($('#namaSatuan').val() == ""))
    {   
        $('#warningDataJurnal').show(50);
    }   
    else
    {
        $.post('uangKeluarMasuk/simpan', {
                tglTransaksi: $('#tglTransaksi').val(),
                tipeKas: $('#tipeKas').val(),
                namaKasBank: $('#namaKasBank').val(),
                keteranganKas: $('#keteranganKas').val(),
                jumlah: $('#jumlah').val().replace(/,/g , ""), 
                uraian: $('#uraian').val(),
                untukDari: $('#untukDari').val(),
                jenisPembayaran: $('#jenisPembayaran').val(),
                noCekBG: $('#noCekBG').val(),
                tglJatuhTempo: $('#tglJatuhTempo').val(),
                konfirmasi: $('#konfirmasi').val(),
                kontrol: $('#kontrol').val(),
                catat: $('#catat').val(),
                st: $('#status').val()
            }, function(result){
                $('.modalInput').modal('hide');
                window.location.href = 'uangKeluarMasuk';
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
    
});
