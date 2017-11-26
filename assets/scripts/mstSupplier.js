$("#importDataSupplier").on("click", function () {
    $('#status').val('tambah');
    $('.modalImportSupplier').modal('show');
});

$("#tambahDataMstSupplier").on("click", function () {
    $('#status').val('tambah');
    $('.modalInput').modal('show');
});

$("#simpanMstSupplier").on("click", function () {
    if (($('#namaSupplier').val() == "") || ($('#alamatSupplier').val() == "") || ($('#telpSupplier').val() == "") || ($('#emailSupplier').val() == "") )
    {   
        $('#warningMstSupplier').show(50);
    }   
    else
    {
        $.post('mstSupplier/simpan', {
            namaSupplier: $('#namaSupplier').val(),
            alamatSupplier: $('#alamatSupplier').val(),
            telpSupplier: $('#telpSupplier').val(),
            emailSupplier: $('#emailSupplier').val(),
            faxSupplier: $('#faxSupplier').val(),
            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'mstSupplier';
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

function editMstSupplier(id)
{
    var json = getDataSupplier(id);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#namaSupplier").val(item.NamaSupplier); 
        $("#alamatSupplier").val(item.AlamatSupplier); 
        $("#telpSupplier").val(item.TelpSupplier); 
        $("#emailSupplier").val(item.EmailSupplier); 
        $("#faxSupplier").val(item.FaxSupplier);
        $("#status").val(item.IdSupplier); 
        $('.modalInput').modal('show');   
    })
}


function getDataSupplier(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstSupplier/getDataById',
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

function deleteMstSupplier(id)
{
	$.get('mstSupplier/hapus', {
		id: id
    }, function(result){
    	window.location.href = 'mstSupplier';
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

$("#importMstSupplier").on("click", function () {
    //alert('test');
    var result;
    var file_data = $('#dataSupplier').prop('files')[0];   
    var file_extension = $('#dataSupplier').val().split('.').pop();
    var document = new FormData();                  
    document.append('file', file_data);
    document.append('file_ext', file_extension);
    //alert(document);                             
    $.ajax({
                url: 'mstSupplier/importExcel_supplier', // point to server-side PHP script 
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
    window.location.href = 'mstSupplier';
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



