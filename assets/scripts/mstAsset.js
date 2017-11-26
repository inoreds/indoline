$("#tambahDataAsset").on("click", function () {
    $('#status').val('tambah');
    $('#id_account_category').val('');
    $('#name_acount_category').val('');
    $('.modalInput').modal('show');
});

$("#simpanDataAsset").on("click", function () {
    if (($('#namaSatuan').val() == ""))
    {   
        $('#warningDataAsset').show(50);
    }   
    else
    {
        $.post('mstAsset/simpan', {
            id_asset_category: $('#id_asset_category').val(),
            name_asset: $('#name_asset').val(),
            date_asset: $('#date_asset').val(),
            qty: $('#qty').val(),
            price: $('#price').val(),
            qty_years: $('#qty_years').val(),
            residual: $('#residual').val(),
            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'mstAsset';
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

function editDataAsset(id)
{
    var json = getDataAsset(id);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#id_asset_category").val(item.ID_ASSET_CATEGORY); 
        $("#name_asset").val(item.NAME_ASSET); 
        $("#date_asset").val(item.DATE_ASSET); 
        $("#qty").val(item.QTY); 
        $("#price").val(item.PRICE); 
        $("#qty_years").val(item.QTY_YEARS); 
        $("#residual").val(item.RESIDUAL); 
        $("#status").val(item.ID_ASSET); 
        $('.modalInput').modal('show');   
    })
}


function getDataAsset(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstAsset/getDataById',
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

function deleteDataAsset(id)
{
	$.get('mstAsset/hapus', {
		id: id
    }, function(result){
    	window.location.href = 'mstAsset';
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




