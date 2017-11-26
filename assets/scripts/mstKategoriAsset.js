$("#tambahDataAssetKategori").on("click", function () {
    $('#status').val('tambah');
    $('#id_account_category').val('');
    $('#name_acount_category').val('');
    $('.modalInput').modal('show');
});

$("#simpanDataAssetKategori").on("click", function () {
    if (($('#namaSatuan').val() == ""))
    {   
        $('#warningDataAssetKategori').show(50);
    }   
    else
    {
        $.post('mstKategoriAsset/simpan', {
            name_asset_category: $('#name_asset_category').val(),
            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'mstKategoriAsset';
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

function editDataAssetKategori(id)
{
    var json = getDataAssetKategori(id);
    $.map(json, function(item) {
        //alert(item.NamaKapal);
        $("#name_asset_category").val(item.NAME_ASSET_CATEGORY); 
        $("#status").val(item.ID_ASSET_CATEGORY); 
        $('.modalInput').modal('show');   
    })
}


function getDataAssetKategori(id)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstKategoriAsset/getDataById',
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

function deleteDataAssetKategori(id)
{
	$.get('mstKategoriAsset/hapus', {
		id: id
    }, function(result){
    	window.location.href = 'mstKategoriAsset';
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




