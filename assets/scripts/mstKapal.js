$("#tambahDataMstKapal").on("click", function () {
    $('#status').val('tambah');
    $('.modalInput').modal('show');
});

$("#simpanMstKapal").on("click", function () {
    if (($('#vesselName').val() == "") || ($('#LOA1').val() == ""))
    {   
        $('#warningMstKapal').show(50);
    }   
    else
    {
        var documantPath = uploadGambarKapal();  
        //alert(documantPath);
        if (documantPath != "Failed")
        {
            simpanDataKapal(documantPath);
        }
    } 
	
});

function simpanDataKapal(documantPath)
{
    $.post('mstKapal/simpan', {
        vesselName : $('#vesselName').val(),
        callSign : $('#callSign').val(),
        typeShip : $('#typeShip').val(),
        flag : $('#flag').val(),
        build : $('#build').val(),
        buildYear : $('#buildYear').val(),
        classification : $('#classification').val(),
        netTonnage : $('#netTonnage').val(),
        grossTonnage : $('#grossTonnage').val(),
        LOA1 : $('#LOA1').val(),
        LOA2 : $('#LOA2').val(),
        lengthBetweenPerpediculart : $('#lengthBetweenPerpediculart').val(),
        breadthMoulded : $('#breadthMoulded').val(),
        deptMoulded : $('#deptMoulded').val(),
        designDraft : $('#designDraft').val(),
        numberOfTank : $('#numberOfTank').val(),
        cargoTankMaterial : $('#cargoTankMaterial').val(),
        cargoTankCapacity : $('#cargoTankCapacity').val(),
        mainEngine : $('#mainEngine').val(),
        auxilaryEngine : $('#auxilaryEngine').val(),
        mesinGenerator : $('#mesinGenerator').val(),
        gambarKapal : documantPath,

        st: $('#status').val()
    }, function(result){
        $('.modalInput').modal('hide');
        window.location.href = 'mstKapal';
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

function uploadGambarKapal()
{
    var status;
    var file_data = $('#gambarKapal').prop('files')[0];   
    var file_extension = $('#gambarKapal').val().split('.').pop();
    var document = new FormData();                  
    document.append('file', file_data);
    document.append('name', $('#vesselName').val().replace(/\./g,''));
    document.append('file_ext', file_extension);
    //alert(document);                             
    $.ajax({
                url: 'mstKapal/uploadGambarKapal', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: document,    
                type: 'post',
                success: function(data){
                    status = data;
                },
                async: false // <- this turns it into synchronous
    });
    return status;
}


function editMstDataKapal(id)
{
    var json = getDataKapal(id);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#vesselName").val(item.VesselName);
        $("#callSign").val(item.CallSign);
        $("#typeShip").val(item.TypeShip);
        $("#flag").val(item.Flag);
        $("#build").val(item.Build);
        $("#buildYear").val(item.BuildYear);
        $("#classification").val(item.Classification);
        $("#grossTonnage").val(item.GrossTonnage); 
        $("#netTonnage").val(item.NetTonnage);
        $("#deadWeightGrossTonnage").val(item.DeadWeightGrossTonnage);
        $("#LOA1").val(item.LOA1);
        $("#LOA2").val(item.LOA2);
        $("#lengthBetweenPerpediculart").val(item.LengthBetweenPerpediculart);
        $("#breadthMoulded").val(item.BreadthMoulded);
        $("#deptMoulded").val(item.DeptMoulded);
        $("#designDraft").val(item.DesignDraft);
        $("#numberOfTank").val(item.NumberOfTank);
        $("#cargoTankCapacity").val(item.CargoTankCapacity);
        $("#cargoTankMaterial").val(item.CargoTankMaterial);
        //$("#freshWaterCapactiy").val(item.FreshWaterCapacity);
        $("#mainEngine").val(item.MainEngine);
        $("#auxilaryEngine").val(item.AuxilaryEngine);
        $("#mesinGenerator").val(item.MesinGenerator);
        $("#status").val(item.IdVessel); 
        $('.modalInput').modal('show');   
    })
}


function getDataKapal(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstKapal/getDataById',
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

function deleteMstKapal(id)
{
	$.get('mstKapal/hapus', {
		id: id
    }, function(result){
    	window.location.href = 'mstKapal';
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

//--------------------------------------------------------------------------------------


//--------------------------------------------------------------------------------------
// Handle Javascript Sertifikat Kapal
//--------------------------------------------------------------------------------------

$("#tambahDataSertifikatKapal").on("click", function () {
    $('#status').val('tambah');
    $('.modalInput').modal('show');
});

$("#simpanDataSertifikatKapal").on("click", function () {
    if (($('#namaSertifikat').val() == ""))
    {   
        $('#warningSertfikatKapal').show(50);
    }   
    else
    {
        var documantPath = uploadDataSertifikatKapal();  
        //alert(documantPath);
        if (documantPath != "Failed")
        {
            simpanDataSertifikatKapal(documantPath);
        }
    } 
    
});

function simpanDataSertifikatKapal(documantPath)
{
    $.post('mstKapal/simpanSertifikatKapal', {
        idVessel : $('#idParrent').val(),
        namaSertifikat : $('#namaSertifikat').val(),
        jenisSertifikat : $('#jenisSertifikat').val(),
        tglTerbitSertifikat : $('#tglTerbitSertifikat').val(),
        tglHabisSertifikat : $('#tglHabisSertifikat').val(),
        namaInstansi : $('#namaInstansi').val(),
        documentPath : documantPath,
        st: $('#status').val()
    }, function(result){
        $('.modalInput').modal('hide');
        window.location.reload();
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

function uploadDataSertifikatKapal()
{
    var status;
    var file_data = $('#sertifikatKapal').prop('files')[0];   
    var file_extension = $('#sertifikatKapal').val().split('.').pop();
    var document = new FormData();                  
    document.append('file', file_data);
    document.append('name', $('#namaSertifikat').val().replace(/\./g,''));
    document.append('file_ext', file_extension);
    //alert(document);                             
    $.ajax({
                url: 'mstKapal/uploadDataSertifikatKapal', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: document,    
                type: 'post',
                success: function(data){
                    status = data;
                },
                async: false // <- this turns it into synchronous
    });
    return status;
}

function deleteDataSertifikatKapal(idVessel, idSertifikatKapal)
{
    $.get('mstKapal/hapusSertifikatKapal', {
        idVessel : idVessel, idSertifikatKapal: idSertifikatKapal
    }, function(result){
        window.location.reload();
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

function editDataSertifikatKapal(idVessel,idSertifikatKapal)
{
    var json = getDataSertifikatKapal(idVessel,idSertifikatKapal);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#namaSertifikat").val(item.NamaSertifikat); 
        $("#jenisSertifikat").val(item.JenisSertifikat); 
        $("#tglTerbitSertifikat").val(item.TglTerbitSertifikat); 
        $("#tglHabisSertifikat").val(item.TglHabisSertifikat); 
        $("#namaInstansi").val(item.NamaInstansi);  
        $("#status").val(item.IdSertifikatKapal); 
        $("#idParrent").val(item.IdVessel);        
        $('.modalInput').modal('show');   
    })
}


function getDataSertifikatKapal(idVessel, idSertifikatKapal)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstKapal/getDataByIdSertifikatKapal',
        'data': {'idVessel': idVessel, 'idSertifikatKapal':idSertifikatKapal},
        'dataType': "json",
        'success': function (data) {
            json = data;
        }
    });
    return json;
})();  
  return json;
}

//-------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------
// Handle javascript ABK Kapal
//-------------------------------------------------------------------------------------------

$("#tambahDataABKKapal").on("click", function () {
    $('#status').val('tambah');
    $('.modalInput').modal('show');
});

function tambahDataSertifikatABK(idVessel,idABK)
{
    $('#status').val('tambah');
    $('#idParrentABK').val(idABK);
    $('.modalInputSertifikatABK').modal('show');
}

$("#simpanDataABKKapal").on("click", function () {
    if (($('#namaSertifikat').val() == ""))
    {   
        $('#warningSertfikatKapal').show(50);
    }   
    else
    {
        $.post('mstKapal/simpanDataABKKapal', {
            idVessel : $('#idParrent').val(),
            namaLengkap : $('#namaLengkap').val(),
            tempatLahir : $('#tempatLahir').val(),
            tglLahir : $('#tglLahir').val(),
            alamat : $('#alamat').val(),
            email : $('#email').val(),
            agama : $('#agama').val(),
            status : $('#statusABK').val(),
            wargaNegara : $('#wargaNegara').val(),
            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.reload();
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

function editDataABKKapal(idVessel,idABK)
{
    var json = getDataABKKapal(idVessel,idABK);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#namaLengkap").val(item.NamaLengkap); 
        $("#tempatLahir").val(item.TempatLahir); 
        $("#tglLahir").val(item.TglLahir); 
        $("#alamat").val(item.Alamat); 
        $("#email").val(item.Email); 
        $("#agama").val(item.Agama); 
        $("#statusABK").val(item.Status); 
        $("#wargaNegara").val(item.WargaNegara); 
        $("#status").val(item.IdABK); 
        $("#idParrent").val(item.IdVessel);        
        $('.modalInput').modal('show');   
    })
}


function getDataABKKapal(idVessel,idABK)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstKapal/getDataByidABK',
        'data': {'idVessel': idVessel, 'idABK': idABK},
        'dataType': "json",
        'success': function (data) {
            json = data;
        }
    });
    return json;
    })();  
  return json;
}

function deleteDataABKKapal(idVessel, idABK)
{
    $.get('mstKapal/hapusDataABKKapal', {
        idVessel : idVessel, idABK: idABK
    }, function(result){
        window.location.reload();
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



$("#simpanDataSertifikatABK").on("click", function () {
    if (($('#namaSertifikat').val() == ""))
    {   
        $('#warningSertfikatKapal').show(50);
    }   
    else
    {
        var documantPath = uploadDataSertifikatABK();  
        //alert(documantPath);
        if (documantPath != "Failed")
        {
            simpanDataSertifikatABK(documantPath);
        }
    } 
    
});

function simpanDataSertifikatABK(documantPath)
{
    $.post('mstKapal/simpanDataSertifikatABK', {
        idVessel : $('#idParrent').val(),
        idABK    : $('#idParrentABK').val(),
        namaSertifikatABK : $('#namaSertifikatABK').val(),
        noSertifikatABK : $('#noSertifikatABK').val(),
        tempatSertifikat : $('#tempatSertifikat').val(),
        tglTerbitSertifikatABK : $('#tglTerbitSertifikatABK').val(),
        tglHabisSertifikatABK : $('#tglHabisSertifikatABK').val(),
        documentPath : documantPath,
        st: $('#status').val()
    }, function(result){
        $('.modalInput').modal('hide');
        window.location.reload();
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

function uploadDataSertifikatABK()
{
    var status;
    var file_data = $('#sertifikatABK').prop('files')[0];   
    var file_extension = $('#sertifikatABK').val().split('.').pop();
    var document = new FormData();                  
    document.append('file', file_data);
    document.append('name', $('#namaSertifikatABK').val().replace(/\./g,''));
    document.append('file_ext', file_extension);
    //alert(document);                             
    $.ajax({
                url: 'mstKapal/uploadDataSertifikatABK', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: document,    
                type: 'post',
                success: function(data){
                    status = data;
                },
                async: false // <- this turns it into synchronous
    });
    return status;
}

function deleteDataSertifikatABK(idVessel, idSertifikatKapal)
{
    $.get('mstKapal/hapusSertifikatKapal', {
        idVessel : idVessel, idSertifikatKapal: idSertifikatKapal
    }, function(result){
        window.location.reload();
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

function viewSertifikatABK(idVessel,idABK)
{
    $.ajax(
    {
        type: "GET",
        url: 'mstKapal/getDataSertifikatABK',
        data: {'idVessel':idVessel, 'idABK': idABK},
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        cache: false,
        success: function (dataTable) {
            
        var trHTML =''    
        $.each(dataTable, function (i, item) {
            trHTML += '<tr><td>' + dataTable[i].NamaSertifikatABK + '</td><td>' 
                    + dataTable[i].NoSertifikatABK + '</td><td>' 
                    + dataTable[i].TempatSertifikat + '</td><td>' 
                    + dataTable[i].TglTerbitSertifikatABK + '</td><td>'
                    + dataTable[i].TglHabisSertifikatABK + '</td><td>'
                    + '<a type="button" class="btn btn-primary btn-xs" download="" href="'+dataTable[i].DocumentPath+'"><i class="fa fa-download"></i></a>'+'</td></tr>';
        });
        
        $('.table-viewSertifikatABK').append(trHTML);
        
        },
        
        error: function (msg) {
            
            alert(msg.responseText);
        }
    });
    $('.modalViewSertifikatABK').modal('show');
}


function getDataSertifikatABK(idVessel,idABK)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstKapal/getDataByidABK',
        'data': {'idVessel': idVessel, 'idABK': idABK},
        'dataType': "json",
        'success': function (data) {
            json = data;
        }
    });
    return json;
    })();  
  return json;
}


//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------
// Handle Data Inventaris Kapal
//-----------------------------------------------------------------------------------

$("#tambahInventarisKapal").on("click", function () {
    $('#status').val('tambah');
    $('.modalInput').modal('show');
});

$("#simpanInventarisKapal").on("click", function () {
    if (($('#namaBarang').val() == ""))
    {   
        $('#warningInventarisKapal').show(50);
    }   
    else
    {
        $.post('mstKapal/simpanInventarisKapal', {
            idVessel : $('#idParrent').val(),
            namaBarang : $('#namaBarang').val(),
            jumlah : $('#jumlah').val(),
            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.reload();
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

function editInventarisKapal(idVessel,noInventaris)
{
    var json = getInventarisKapal(idVessel,noInventaris);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#namaBarang").val(item.NamaBarang); 
        $("#jumlah").val(item.Jumlah); 
        $("#status").val(item.NoInventaris); 
        $("#idParrent").val(item.IdVessel);        
        $('.modalInput').modal('show');   
    })
}


function getInventarisKapal(idVessel,noInventaris)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstKapal/getDataBynoInventaris',
        'data': {'idVessel': idVessel, 'noInventaris': noInventaris},
        'dataType': "json",
        'success': function (data) {
            json = data;
        }
    });
    return json;
    })();  
  return json;
}

function deleteInventarisKapal(idVessel, noInventaris)
{
    $.get('mstKapal/hapusInventarisKapal', {
        idVessel : idVessel, noInventaris: noInventaris
    }, function(result){
        window.location.reload();
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

//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------
// Handle History perbaikan kapal
//-----------------------------------------------------------------------------------

$("#tambahJenisPerbaikan").on("click", function () {
    $('#statusPerbaikan').val('tambah');
    $('.modalInputJenisPerbaikan').modal('show');
});

$("#tambahHistoryPerbaikan").on("click", function () {
    appendComboBoxBarangInternal();
    appendComboBoxJenisPerbaikan();
    $('#status').val('tambah');
    $('.modalInput').modal('show');
});

$("#simpanHistoryPerbaikan").on("click", function () {
    if (($('#namaTeknisi').val() == ""))
    {   
        $('#warningHistoryPerbaikan').show(50);
    }   
    else
    {
        $.post('mstKapal/simpanHistoryPerbaikan', {
            idVessel : $('#idParrent').val(),
            tanggalPerbaikan : $('#tanggalPerbaikan').val(),
            namaTeknisi : $('#namaTeknisi').val(),
            idJenisPerbaikan : $('#idJenisPerbaikan').val(),
            idBarangInternal : $('#idBarangInternal').val(),
            jumlah : $('#jumlah').val(),
            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.reload();
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

$("#simpanJenisPerbaikan").on("click", function () {
    if (($('#namaJenisPerbaikan').val() == ""))
    {   
        $('#warningJenisPerbaikan').show(50);
    }   
    else
    {
        $.post('mstKapal/simpanJenisPerbaikan', {
            namaJenisPerbaikan : $('#namaJenisPerbaikan').val(),
            st: $('#statusPerbaikan').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.reload();
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

/*
function editHistoryPerbaikan(idVessel,noInventaris)
{
    var json = getHistoryPerbaikan(idVessel,noInventaris);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#namaBarang").val(item.NamaBarang); 
        $("#jumlah").val(item.Jumlah); 
        $("#status").val(item.NoInventaris); 
        $("#idParrent").val(item.IdVessel);        
        $('.modalInput').modal('show');   
    })
}
*/

function getHistoryPerbaikan(idVessel,idPerbaikan)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstKapal/getDataByidPerbaikan',
        'data': {'idVessel': idVessel, 'idPerbaikan': idPerbaikan},
        'dataType': "json",
        'success': function (data) {
            json = data;
        }
    });
    return json;
    })();  
  return json;
}

function deleteHistoryPerbaikan(idVessel, idHistoryPerbaikan)
{
    $.get('mstKapal/hapusHistoryPerbaikan', {
        idVessel : idVessel, idHistoryPerbaikan: idHistoryPerbaikan
    }, function(result){
        window.location.reload();
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

function appendComboBoxBarangInternal()
{
    $.getJSON("mstKapal/getAllDataBarangInternal",  function(result) 
    {
        $.map(result, function(item) 
        {
            $("#idBarangInternal").append(  $('<option>').val(item.IdBarangInternal).text(item.NamaBarangInternal) );   
        })
    });
}

function appendComboBoxJenisPerbaikan()
{
    $.getJSON("mstKapal/getAllJenisPerbaikan",  function(result) 
    {
        $.map(result, function(item) 
        {
            $("#idJenisPerbaikan").append(  $('<option>').val(item.IdJenisPerbaikan).text(item.NamaJenisPerbaikan) );   
        })
    });
}