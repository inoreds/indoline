$("#tambahDataJurnal").on("click", function () {
    $('#status').val('tambah');
    $('#name_category').val('');
    $('.modalInput').modal('show');
});

$("#simpanDataJurnal").on("click", function () {
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
            $.post('jurnal/simpan', {
                note: $('#noteJurnal').val(),
                date_transaction: $('#tglTransaksiJurnal').val(),
                dataSubAkunJurnal: arraySubAkunJurnal,
                dataDebitJurnal: arrayDebitJurnal,
                dataKreditJurnal: arrayKreditJurnal,
                st: $('#status').val()
            }, function(result){
                $('.modalInput').modal('hide');
                window.location.href = 'jurnal';
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

function editDataJurnal(id)
{
    var json = getDataJurnal(id);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#name_category").val(item.NAME_CATEGORY); 
        $("#status").val(item.ID_CATEGORY_JOURNALS); 
        $('.modalInput').modal('show');   
    })
}


function getDataJurnal(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'jurnal/getDataById',
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

function deleteDataJurnal(id)
{
	$.get('jurnal/hapus', {
		id: id
    }, function(result){
    	window.location.href = 'jurnal';
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

$('#tambahRowAkun').click(function(){
   

    var table = $("#table-postingJurnalAkun tr:last");

    $('#table-postingJurnalAkun tbody').append(table.clone(true, true));
    $('#table-postingJurnalAkun tbody tr:last td:last').html('<button type="button" class="btn btn-primary btn-xs deleteRowAkun"><i class="fa fa-minus"></i></button>');
    
    appendComboBoxAccount();
    $('#table-postingJurnalAkun tbody tr:last td:first').html('<select class="form-control id_account select2_single" name="subAkunJurnal[]" style="width:100%"></select>');
    $(".select2_single").select2({});
});

$("#table-postingJurnalAkun").on('click','.deleteRowAkun',function(){
    //alert('test');
    $(this).parent().parent().remove();
});


