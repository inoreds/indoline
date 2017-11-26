$(function () 
{
	appendComboBoxSatuan();
    appendComboBoxPbbkb();
    appendComboBoxSupplier();
    appendComboBoxSupplier_class();     
    appendComboBoxSupplier2(); 
    appendComboBoxVessel(); 
    appendComboBoxVessel2();  //contoh
    appendComboBoxBBM();
    appendComboBoxBBM2();
    appendComboBoxCustomer();
    appendComboBoxKota();
    appendComboBoxCurrency();
    appendComboBoxAccountCategory();
    appendComboBoxAccount();
    appendComboBoxAssetCategory();
    appendComboBoxAccount_bank();
    appendComboBoxAccount_kas();
    appendComboBoxAccount_bankKas();
    //appendComboBoxAccount_akunBankMasuk();
    //appendComboBoxAccount_akunKasMasuk();
    appendComboBoxMasterCustomer();
});

function appendComboBoxPbbkb()
{
    $('#idPBBKB').find('option').remove().end(); 
    $.getJSON("mstPBBKB/getDataAll",  function(result) 
    {
        $.map(result, function(item) 
        {
            $("#idPBBKB").append(  $('<option>').val(item.idPBBKB).text(item.jenisPbbkb) );   
        })
    });
}
function appendComboBoxVessel()
{
    $('#idVessel').find('option').remove().end(); 
    $.getJSON("mstKapal/getDataAll",  function(result) 
    {
        $.map(result, function(item) 
        {
            $("#idVessel").append(  $('<option>').val(item.IdVessel).text(item.VesselName) );   
        })
    });
}

function appendComboBoxVessel2() //contoh
{
    $('.idVessel').find('option').remove().end(); 
    $.getJSON("mstKapal/getDataAll",  function(result) 
    {
        $.map(result, function(item) 
        {
            $(".idVessel").append(  $('<option>').val(item.IdVessel).text(item.VesselName) );   
        })
    });
}

function appendComboBoxBBM()
{
    $('#idBBM').find('option').remove().end(); 
    $.getJSON("mstBBM/getDataAll",  function(result) 
    {
        $.map(result, function(item) 
        {
            $("#idBBM").append(  $('<option>').val(item.IdBBM).text(item.NamaBBM) );   
        })
    });
}

function appendComboBoxBBM2()
{
    $('.idBBM').find('option').remove().end(); 
    $(".idBBM").append(  $('<option>').val("").text("") ); 
    $.getJSON("mstBBM/getDataAll",  function(result) 
    {
        $.map(result, function(item) 
        {
            $(".idBBM").append(  $('<option>').val(item.IdBBM).text(item.NamaBBM) );   
        })
    });
}


function appendComboBoxSatuan()
{
    $('#idSatuan').find('option').remove().end(); 
    $.getJSON("mstSatuan/getDataAll",  function(result) 
    {
        $.map(result, function(item) 
        {
            $("#idSatuan").append(  $('<option>').val(item.IdSatuan).text(item.NamaSatuan) );   
        })
    });
}

function appendComboBoxCustomer()
{
    $('#idCustomer').find('option').remove().end(); 
    $.getJSON("mstCustomer/getDataAll",  function(result) 
    {
        $.map(result, function(item) 
        {
            $("#idCustomer").append(  $('<option>').val(item.IdCustomer).text(item.NamaCustomer) );   
        })
    });
}

function appendComboBoxMasterCustomer()
{
    $('.id_customer').find('option').remove().end(); 
    $.getJSON("mstCustomer/getDataAll",  function(result) 
    {
        $.map(result, function(item) 
        {
            $(".id_customer").append(  $('<option>').val(item.IdCustomer).text(item.NamaCustomer) );   
        })
    });
}

function appendComboBoxKota()
{
    $('#idKotaPO').find('option').remove().end(); 
    $.getJSON("mstCustomer/getDataAllKota",  function(result) 
    {
        $.map(result, function(item) 
        {
            $("#idKotaPO").append(  $('<option>').val(item.wilayah).text(item.kota) );   
        })
    });
}


function appendComboBoxSupplier()
{
    $('#idSupplier').find('option').remove().end(); 
     $("#idSupplier").append(  $('<option>').val("").text("") ); 
    $.getJSON("mstSupplier/getDataAll",  function(result) 
    {
        $.map(result, function(item) 
        {
            $("#idSupplier").append(  $('<option>').val(item.IdSupplier).text(item.NamaSupplier) );   
        })
    });
}

function appendComboBoxSupplier2()
{
    $('#idSupplier2').find('option').remove().end(); 
    $.getJSON("mstSupplier/getDataAll",  function(result) 
    {
        $.map(result, function(item) 
        {
            $("#idSupplier2").append(  $('<option>').val(item.IdSupplier).text(item.NamaSupplier) );   
        })
    });
}

function appendComboBoxSupplier_class()
{
    $('.id_supplier').find('option').remove().end(); 
    $.getJSON("mstSupplier/getDataAll",  function(result) 
    {
        $.map(result, function(item) 
        {
            $(".id_supplier").append(  $('<option>').val(item.IdSupplier).text(item.NamaSupplier) );   
        })
    });
}

function appendComboBoxCurrency()
{
    $('#id_curr').find('option').remove().end(); 
    $.getJSON("mstCurrency/getDataAll",  function(result) 
    {
        $.map(result, function(item) 
        {
            $("#id_curr").append(  $('<option>').val(item.ID_CURR).text(item.NAME_CURRENCY) );   
        })
    });
}

function appendComboBoxAccountCategory()
{
    $('#id_account_category').find('option').remove().end(); 
    $.getJSON("mstKategoriAkun/getDataAll",  function(result) 
    {
        $.map(result, function(item) 
        {
            $("#id_account_category").append(  $('<option>').val(item.ID_ACCOUNT_CATEGORY).text(item.NAME_ACCOUNT_CATEGORY) );   
        })
    });
}

function appendComboBoxAccount()
{
    $('.id_account').find('option').remove().end(); 
    $(".id_account").append(  $('<option>').val("").text(""));   
    $.getJSON("mstSubAkun/getDataAll",  function(result) 
    {
        $.map(result, function(item) 
        {
            $(".id_account").append(  $('<option>').val(item.ID_ACT).text(item.NAME_SUB_ACCOUNT));   
        })
    });
}

function appendComboBoxAccount_bank()
{
    $('.id_account_bank').find('option').remove().end(); 
    //$(".id_account_bank").append(  $('<option>').val("").text(""));   
    $.getJSON("mstSubAkun/getDataAll_bank",  function(result) 
    {
        $.map(result, function(item) 
        {
            $(".id_account_bank").append(  $('<option>').val(item.ID_ACT).text(item.NAME_SUB_ACCOUNT));   
        })
    });
}

function appendComboBoxAccount_kas()
{
    $('.id_account_kas').find('option').remove().end(); 
    //$(".id_account_kas").append(  $('<option>').val("").text(""));   
    $.getJSON("mstSubAkun/getDataAll_kas",  function(result) 
    {
        $.map(result, function(item) 
        {
            $(".id_account_kas").append(  $('<option>').val(item.ID_ACT).text(item.NAME_SUB_ACCOUNT));   
        })
    });
}

function appendComboBoxAccount_bankKas()
{
    $('.id_account_bank_kas').find('option').remove().end(); 
    $(".id_account_bank_kas").append(  $('<option>').val("").text(""));   
    $.getJSON("mstSubAkun/getDataAll_bankKas",  function(result) 
    {
        $.map(result, function(item) 
        {
            $(".id_account_bank_kas").append(  $('<option>').val(item.ID_ACT).text(item.NAME_SUB_ACCOUNT));   
        })
    });
}

function appendComboBoxAssetCategory()
{
    $('#id_asset_category').find('option').remove().end(); 
    $.getJSON("mstKategoriAsset/getDataAll",  function(result) 
    {
        $.map(result, function(item) 
        {
            $("#id_asset_category").append(  $('<option>').val(item.ID_ASSET_CATEGORY).text(item.NAME_ASSET_CATEGORY));   
        })
    });
}

function appendComboBoxAccount_akunBankMasuk()
{
    $('.id_account_bukti_bank').find('option').remove().end(); 
    $(".id_account_bukti_bank").append(  $('<option>').val("").text(""));   
    $.getJSON("mstSubAkun/getDataAll_akunBankMasuk",  function(result) 
    {
        $.map(result, function(item) 
        {
            $(".id_account_bukti_bank").append(  $('<option>').val(item.ID_ACT).text(item.NAME_SUB_ACCOUNT));   
        })
    });
}

function appendComboBoxAccount_akunKasMasuk()
{
    $('.id_account_bukti_kas').find('option').remove().end(); 
    $(".id_account_bukti_kas").append(  $('<option>').val("").text(""));   
    $.getJSON("mstSubAkun/getDataAll_akunKasMasuk",  function(result) 
    {
        $.map(result, function(item) 
        {
            $(".id_account_bukti_kas").append(  $('<option>').val(item.ID_ACT).text(item.NAME_SUB_ACCOUNT));   
        })
    });
}