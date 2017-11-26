$("#importDataCustomer").on("click", function () {
    $('#status').val('tambah');
    $('.modalImportCustomer').modal('show');
});

$("#tambahDataMstCustomer").on("click", function () {
    $('#status').val('tambah');
    $('.modalInput').modal('show');
});

$("#simpanMstCustomer").on("click", function () {
    if (($('#namaCustomer').val() == "") || ($('#alamatCustomer').val() == "") || ($('#telpCustomer').val() == "") || ($('#emailCustomer').val() == "") )
    {   
        $('#warningMstCustomer').show(50);
    }   
    else
    {
        $.post('mstCustomer/simpan', {
            namaCustomer: $('#namaCustomer').val(),
            namaPerusahaan: $('#namaPerusahaan').val(),
            alamatCustomer: $('#alamatCustomer').val(),
            emailCustomer: $('#emailCustomer').val(),
            jenisKelamin : $('#jenisKelamin').val(),
            kabupatenKota : $('#kabupatenKota').val(),
            NPWP : $('#NPWP').val(),
            provinsi : $('#provinsi').val(),
            kodePos : $('#kodePos').val(),
            telpCustomer1 : $('#telpCustomer1').val(),
            telpCustomer2 : $('#telpCustomer2').val(),
            emailCustomer : $('#emailCustomer').val(),
            faxCustomer : $('#faxCustomer').val(),
            jumlahBatasKredit: $('#jumlahBatasKredit').val().replace(/,/g , ""),

            namaPenanggungJawab : $('#namaPenanggungJawab').val(),
            telpPenanggungJawab : $('#telpPenanggungJawab').val(),
            namaBagianKeuangan : $('#namaBagianKeuangan').val(),
            telpBagianKeuangan : $('#telpBagianKeuangan').val(),

            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'mstCustomer';
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

function editMstCustomer(id)
{
    var json = getDataCustomer(id);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#namaCustomer").val(item.NamaCustomer); 
        $("#alamatCustomer").val(item.AlamatCustomer);
        $("#jenisKelamin").val(item.JenisKelamin);
        $("#kabupatenKota").val(item.KabupatenKota);
        $("#provinsi").val(item.Provinsi); 
        $("#emailCustomer").val(item.EmailCustomer);
        $("#telpCustomer1").val(item.TelpCustomer1); 
        $("#telpCustomer2").val(item.TelpCustomer2);
        $("#emailCustomer").val(item.EmailCustomer);
        $("#faxCustomer").val(item.FaxCustomer);
        $("#kodePos").val(item.KodePos); 
        $("#NPWP").val(item.NPWP);
        $("#namaPerusahaan").val(item.NamaPerusahaan); 
        $("#namaPenanggungJawab").val(item.NamaPenanggungJawab); 
        $("#telpPenanggungJawab").val(item.TelpPenanggungJawab);
        $("#namaBagianKeuangan").val(item.NamaBagianKeuangan);
        $("#telpBagianKeuangan").val(item.TelpBagianKeuangan);
        $("#jumlahBatasKredit").val(item.JumlahBatasKredit.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        $("#status").val(item.IdCustomer); 
        $('.modalInput').modal('show');   
    })
}


function getDataCustomer(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstCustomer/getDataById',
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

function deleteMstCustomer(id)
{
    $.get('mstCustomer/hapus', {
        id: id
    }, function(result){
        window.location.href = 'mstCustomer';
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

$("#importMstCustomer").on("click", function () {
    //alert('test');
    var result;
    var file_data = $('#dataCustomer').prop('files')[0];   
    var file_extension = $('#dataCustomer').val().split('.').pop();
    var document = new FormData();                  
    document.append('file', file_data);
    document.append('file_ext', file_extension);
    //alert(document);                             
    $.ajax({
                url: 'mstCustomer/importExcel_customer', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: document,    
                type: 'post',
                success: function(data){
                    result = data;
                },
                async: false // <- this turns it into synchronous
    });
    window.location.href = 'mstCustomer';
    if (result == 1)
    {  
        localStorage.setItem("statusAction", "success");
        localStorage.setItem("statusMessage", "Import Data Success");
    }
    else if (result == 0)
    {
        localStorage.setItem("statusAction", "error");
        localStorage.setItem("statusMessage", "Import Data Failed");
    }
});




