function modal_bank_lainnya()
{
	//alert('test');
	$('.modal-bank_lainnya').modal('show');   
}

function modal_bank_piutang()
{
	//alert('test');
	$('.modal-bank_piutang').modal('show');   
}

function modal_bank_hutang()
{
	//alert('test');
	$('.modal-bank_hutang').modal('show');   
}

function modal_kas_lainnya()
{
  //alert('test');
  $('.modal-kas_lainnya').modal('show');   
}

$('#btn_historyBank').on('click', function(){
    //alert('test');
    var tgl_awal    = $('#tanggalAwalBank').val();
    var tgl_akhir   = $('#tanggalAkhirBank').val();
    var jenis_bank  = $('#jenisBank').val();
    initHistoryBank(tgl_awal, tgl_akhir, jenis_bank);
});

$('#btn_historyKas').on('click', function(){
    //alert('test');
    var tgl_awal    = $('#tanggalAwalKas').val();
    var tgl_akhir   = $('#tanggalAkhirKas').val();
    var jenis_kas  = $('#jenisKas').val();
    initHistoryKas(tgl_awal, tgl_akhir, jenis_kas);
});

$('#bank_masuk_keluar').change(function() {
    var akun_except = $('#akunBank').val();
    if ($('#bank_masuk_keluar').val() == 'Bank Masuk') {
    	//alert('test');
    	bankMasuk(akun_except);
    } else if ($('#bank_masuk_keluar').val() == 'Bank Keluar'){
    	bankKeluar(akun_except);
    		//alert('test2');
    }
    //  $("#bank_masuk_keluar").prop("disabled", true);
}); 

$('#akunBank').change(function(){
    var akun_except = $('#akunBank').val();
    if ($('#bank_masuk_keluar').val() == 'Bank Masuk') {
    	//alert('test');
    	bankMasuk(akun_except);
    } else if ($('#bank_masuk_keluar').val() == 'Bank Keluar'){
    	bankKeluar(akun_except);
    		//alert('test2');
    }
});

$('#id_customer_piutang').change(function() {
    var id_customer = $('#id_customer_piutang').val();
    appendNoPiutangCustomer(id_customer);

   
}); 

$('#no_piutang_customer').change(function() {
    if ($('#no_piutang_customer').val() !== 'DaftarPiutang') {
        var id_transaction = $('#no_piutang_customer').val();
        $.getJSON("formKasir/getNominalPiutang", {id_transaction : id_transaction},  function(result) 
        {
            $.map(result, function(item) 
            {
                $("#nominalPiutang").val(item.SubTotal.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,') + ' (' + item.Kurang.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,') + ')');   
                $("#kekuaranganPiutang").val(item.Kurang);   
            })
        });
    }

}); 

$('#jumlahPembayaranPiutang').keyup(function(){
   var nominal =  parseInt($("#jumlahPembayaranPiutang").val());
   var kurang =  parseInt($("#kekuaranganPiutang").val());

   if (nominal > kurang) {
       alert('Jumlah tidak boleh lebih besar dari kekurangan');
   }
});

$('#kas_masuk_keluar').change(function() {
    var akun_except = $('#akunKas').val();
    if ($('#kas_masuk_keluar').val() == 'Kas Masuk') {
      kasMasuk(akun_except);
    } else if ($('#kas_masuk_keluar').val() == 'Kas Keluar'){
      kasKeluar(akun_except);
    }
}); 

$('#akunKas').change(function(){
    var akun_except = $('#akunKas').val();
    if ($('#kas_masuk_keluar').val() == 'Kas Masuk') {
      kasMasuk(akun_except);
    } else if ($('#kas_masuk_keluar').val() == 'Kas Keluar'){
      kasKeluar(akun_except);
    }
});


function bankMasuk(akun_except)
{
    //alert(akun_except);
	$('.id_account_bukti_bank').html("");

    $('.id_account_bukti_bank').find('option').remove().end(); 
    //$(".id_account_bukti_bank").append(  $('<option>').val("").text(""));   
    $.getJSON("mstSubAkun/getDataAll_akunBankMasuk", {akun_except: akun_except}, function(result) 
    {
        $.map(result, function(item) 
        {
            $(".id_account_bukti_bank").append(  $('<option>').val(item.ID_ACT).text(item.NAME_SUB_ACCOUNT));   
        })
    });
}

function bankKeluar(akun_except)
{
	$('.id_account_bukti_bank').html("");

    $('.id_account_bukti_bank').find('option').remove().end(); 
    //$(".id_account_bukti_bank").append(  $('<option>').val("").text(""));   
    $.getJSON("mstSubAkun/getDataAll_akunBankKeluar", {akun_except: akun_except}, function(result) 
    {
        $.map(result, function(item) 
        {
            $(".id_account_bukti_bank").append(  $('<option>').val(item.ID_ACT).text(item.NAME_SUB_ACCOUNT));   
        })
    });
}

function kasMasuk(akun_except)
{
  $('.id_account_bukti_kas').html("");

    $('.id_account_bukti_kas').find('option').remove().end(); 
    //$(".id_account_bukti_kas").append(  $('<option>').val("").text(""));   
    $.getJSON("mstSubAkun/getDataAll_akunKasMasuk", {akun_except: akun_except},  function(result) 
    {
        $.map(result, function(item) 
        {
            $(".id_account_bukti_kas").append(  $('<option>').val(item.ID_ACT).text(item.NAME_SUB_ACCOUNT));   
        })
    });
}

function kasKeluar(akun_except)
{
  $('.id_account_bukti_kas').html("");

    $('.id_account_bukti_kas').find('option').remove().end(); 
    //$(".id_account_bukti_kas").append(  $('<option>').val("").text(""));   
    $.getJSON("mstSubAkun/getDataAll_akunKasKeluar", {akun_except: akun_except},  function(result) 
    {
        $.map(result, function(item) 
        {
            $(".id_account_bukti_kas").append(  $('<option>').val(item.ID_ACT).text(item.NAME_SUB_ACCOUNT));   
        })
    });
}

function appendNoPiutangCustomer(id_customer)
{
	$('#no_piutang_customer').html("");

    $('#no_piutang_customer').find('option').remove().end(); 
    $("#no_piutang_customer").append(  $('<option>').val("DaftarPiutang").text("===Daftar Piutang===")); 
    $.getJSON("formKasir/getDataPiutangCustomer", {id_customer : id_customer},  function(result) 
    {
        $.map(result, function(item) 
        {
            $("#no_piutang_customer").append(  $('<option>').val(item.NoPoCustomer+item.DetilNumber).text(item.NoPO + ',' + item.DetilNumber));   
        })
    });
}

$("#simpanBankKeluarMasuk").on("click", function () {
    if (($('#tglPO').val() == ""))
    {   
        //$('#warningPOPenjualanBBM').show(50);
    }   
    else
    {
        var stringSubAkun = readTableContentBankKeluarMasuk("#table-transaksi_bank", 0);
        var stringNominal = readTableContentBankKeluarMasuk("#table-transaksi_bank", 2);
        var stringKeterangan = readTableContentBankKeluarMasuk("#table-transaksi_bank", 3);

        //alert(stringSubAkun);
        $.post('formKasir/simpanBank', {
            tipeBank: $('#bank_masuk_keluar').val(),
            tglTransaksiBank: $('#tglTransaksiBank').val(),
            akunBank: $('#akunBank').val(),
            keteranganBank: $('#keteranganBank').val(),
            arrSubAkun : stringSubAkun,
            arrNominal : stringNominal,
            arrKeterangan: stringKeterangan
           
        }, function(result){
            $('.modal-bank_lainnya').modal('hide');
            window.location.href = 'formKasir';
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

$("#simpanBankPiutang").on("click", function () {
    if (($('#tglPO').val() == ""))
    {   
        //$('#warningPOPenjualanBBM').show(50);
    }   
    else
    {

        $.post('formKasir/simpanBankPiutang', {
            tglTransaksiBank: $('#tglTransaksiBankPiutang').val(),
            akunBank: $('#akunBankPiutang').val(),
            idTransaction: $('#no_piutang_customer').val(),
            keteranganBank: $('#keteranganBankPiutang').val(),
            jumlahPembayaran : $('#jumlahPembayaranPiutang').val().replace(/,/g , ""),
           
        }, function(result){
            $('.modal-bank_piutang').modal('hide');
            window.location.href = 'formKasir';
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

$("#simpanKasKeluarMasuk").on("click", function () {
    if (($('#tglPO').val() == ""))
    {   
        //$('#warningPOPenjualanBBM').show(50);
    }   
    else
    {


        var stringSubAkun = readTableContentBankKeluarMasuk("#table-transaksi_kas", 0);
        var stringNominal = readTableContentBankKeluarMasuk("#table-transaksi_kas", 2);
        var stringKeterangan = readTableContentBankKeluarMasuk("#table-transaksi_kas", 3);

        //alert(stringSubAkun);
        $.post('formKasir/simpanKas', {
            tipeKas: $('#kas_masuk_keluar').val(),
            tglTransaksiKas: $('#tglTransaksiKas').val(),
            akunKas: $('#akunKas').val(),
            keteranganKas: $('#keteranganKas').val(),
            arrSubAkun : stringSubAkun,
            arrNominal : stringNominal,
            arrKeterangan: stringKeterangan
           
        }, function(result){
            $('.modal-kas_lainnya').modal('hide');
            window.location.href = 'formKasir';
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

function initHistoryBank(tgl_awal, tgl_akhir, jenis_bank)
{

  $('#table-historyBank').html('');

  $.getJSON("formKasir/getHistoryBankKeluarMasuk", {tgl_awal: tgl_awal, tgl_akhir: tgl_akhir, jenis_bank},   function(result)
  {
      var no=0;
      var trHTML ='';
      var total = 0;
      var button = '';
      trHTML +=
                 '<tr>'
                   + '<th>No. </th>'
                   + '<th>Tanggal</th>'
                   + '<th>Keterangan</th>'
                   + '<th>Nominal</th>'
                   + '<th>Action</th>'
                 +'</tr>';
      $.map(result, function(item)
      {

        no++;

          if (jenis_bank == 'Bank Masuk') {
            button = "<button type='button' class='btn btn-warning btn-sm' data-toggle='modal' onclick=buktiBankMasuk('"+item.ID_JOURNALS+"')><i class='fa fa-print'></i> Cetak Bukti Bank</button></td>";
          } else if (jenis_bank == 'Bank Keluar') {
            button = "<button type='button' class='btn btn-warning btn-sm' data-toggle='modal' onclick=buktiBankKeluar('"+item.ID_JOURNALS+"')><i class='fa fa-print'></i> Cetak Bukti Bank</button></td>";
          }             


          trHTML += "<tr><td>" + no + "</td><td>"
          + item.INDONESIAN_DATE + "</td><td>"
          + item.NOTE_3 + "</td><td>"
          + "Rp. " + item.SALDO.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,') + "</td><td>"
          + button;
      })
     
      $('#table-historyBank').append(trHTML);

  });
}

function initHistoryKas(tgl_awal, tgl_akhir, jenis_kas)
{

  $('#table-historyKas').html('');

  $.getJSON("formKasir/getHistoryKasKeluarMasuk", {tgl_awal: tgl_awal, tgl_akhir: tgl_akhir, jenis_kas},   function(result)
  {
      var no=0;
      var trHTML ='';
      var total = 0;
      var button = '';
      trHTML +=
                 '<tr>'
                   + '<th>No. </th>'
                   + '<th>Tanggal</th>'
                   + '<th>Keterangan</th>'
                   + '<th>Nominal</th>'
                   + '<th>Action</th>'
                 +'</tr>';
      $.map(result, function(item)
      {

        no++;

          if (jenis_kas == 'Kas Masuk') {
            button = "<button type='button' class='btn btn-warning btn-sm' data-toggle='modal' onclick=buktiKasMasuk('"+item.ID_JOURNALS+"')><i class='fa fa-print'></i> Cetak Bukti Kas</button></td>";
          } else if (jenis_kas == 'Kas Keluar') {
            button = "<button type='button' class='btn btn-warning btn-sm' data-toggle='modal' onclick=buktiKasKeluar('"+item.ID_JOURNALS+"')><i class='fa fa-print'></i> Cetak Bukti Kas</button></td>";
          }             


          trHTML += "<tr><td>" + no + "</td><td>"
          + item.INDONESIAN_DATE + "</td><td>"
          + item.NOTE_3 + "</td><td>"
          + "Rp. " + item.SALDO.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,') + "</td><td>"
          + button;
      })
     
      $('#table-historyKas').append(trHTML);

  });
}

function buktiBankMasuk(id_journals)
{
        window.location.href = 'formKasir/pdf_BBM?id_journals='+id_journals;
}

function buktiBankKeluar(id_journals)
{
        window.location.href = 'formKasir/pdf_BBK?id_journals='+id_journals;
}

function buktiKasMasuk(id_journals)
{
        window.location.href = 'formKasir/pdf_BKM?id_journals='+id_journals;
}

function buktiKasKeluar(id_journals)
{
        window.location.href = 'formKasir/pdf_BKK?id_journals='+id_journals;
}

function readTableContentBankKeluarMasuk(tableId, n) 
{
    var table = $(tableId);
    var values = [];
    table.find('tr').each(function(i) {
      var $tds = $(this).find('td'),
        string = $tds.eq(n).text();
    if (i > 1)
    {
      if (string !== "")
      {
        values.push(string.replace(/,/g , ""));    
      }   
    }
      
    });

    var myString = values.join(';');

    return myString;
};