$("#tambahDataSubAkun").on("click", function () {
    $('#status').val('tambah');
    $('.modalInput').modal('show');
});

$("#simpanDataSubAkun").on("click", function () {
    if (($('#namaSatuan').val() == ""))
    {   
        $('#warningDataSubAkun').show(50);
    }   
    else
    {
        $.post('mstSubAkun/simpan', {
            id_curr: $('#id_curr').val(),
            id_account_category: $('#id_account_category').val(),
            id_sub_account: $('#id_sub_account').val(),
            id_sub2_account: $('#id_sub2_account').val(),
            id_sub3_account: $('#id_sub3_account').val(),
            id_sub4_account: $('#id_sub4_account').val(),
            name_sub_account: $('#name_sub_account').val(),
            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'mstSubAkun';
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

$("#updateDataSubAkun").on("click", function () {
    if (($('#namaSatuan').val() == ""))
    {   
        $('#warningDataSubAkun').show(50);
    }   
    else
    {
        $.post('mstSubAkun/update', {
            name_sub_account: $('#name_sub_accountEdit').val(),
            st: $('#statusUpdate').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'mstSubAkun';
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

function editDataSubAkun(id, number_parent)
{
    var json = getDataSubAkun(id, number_parent);
    $.map(json, function(item) {
        //alert(item.ID_ACT);
        $("#id_account_category").val(item.ID_ACCOUNT_CATEGORY); 
        $("#name_sub_account").val(item.NAME_SUB_ACCOUNT); 
        $("#id_sub_account").val(item.ID_SUB_ACCOUNT); 
        $("#id_sub2_account").val(item.ID_SUB2_ACCOUNT); 
        $("#id_sub3_account").val(item.ID_SUB3_ACCOUNT); 
        $("#id_sub4_account").val(item.ID_SUB4_ACCOUNT);
        $("#status").val(item.ID_ACT); 
        $('.modalInput').modal('show');   
    })
}


function getDataSubAkun(id, number_parent)
{
  var json = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'mstSubAkun/getDataById',
        'data': {'id': id, 'number_parent':number_parent },
        'dataType': "json",
        'success': function (data) {
            json = data;
        }
    });
    return json;
})();  
  return json;
}

function deleteDataSubAkun1(id)
{
	$.get('mstSubAkun/hapus', {
		id: id
    }, function(result){
    	window.location.href = 'mstSubAkun';
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

function deleteDataSubAkun2(id)
{
    $.get('mstSubAkun/hapus2', {
        id: id
    }, function(result){
        window.location.href = 'mstSubAkun';
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


function deleteDataSubAkun3(id)
{
    $.get('mstSubAkun/hapus3', {
        id: id
    }, function(result){
        window.location.href = 'mstSubAkun';
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

function deleteDataSubAkun4(id)
{
    $.get('mstSubAkun/hapus4', {
        id: id
    }, function(result){
        window.location.href = 'mstSubAkun';
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





