$("#tambahPOPembelianBarangKapal").on("click", function () {
    $('#status').val('tambah');
    $('.modalInput').modal('show');
});


$("#simpanPembelianBarangKapal").on("click", function () {
    if (($('#tglPO').val() == ""))
    {   
        $('#warningPOPenjualanBBM').show(50);
    }   
    else
    {


        var stringNamaBarang = readTableContentPenjualan("#table-transaksi_pembelianBarangKapal", 0);
        var stringJumlah = readTableContentPenjualan("#table-transaksi_pembelianBarangKapal", 1);
        var stringSatuan = readTableContentPenjualan("#table-transaksi_pembelianBarangKapal", 2);
        var stringHargaSatuan = readTableContentPenjualan("#table-transaksi_pembelianBarangKapal", 3);
        var stringHargaTotal = readTableContentPenjualan("#table-transaksi_pembelianBarangKapal", 4);    
        alert(stringSatuan);
        $.post('trnPembelianBarangKapal/simpan', {
            tglPembelian: $('#tglPembelian').val(),
            idVessel: $('#idVessel').val(),
            namaBarang: stringNamaBarang,
            jumlah: stringJumlah,
            idSatuan: stringSatuan,
            hargaSatuan: stringHargaSatuan,
            hargaTotal: stringHargaTotal,
            st: $('#status').val()
        }, function(result){
            $('.modalInput').modal('hide');
            window.location.href = 'trnPembelianBarangKapal';
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

function readTablePembelian_barangKapal(tableId, n) 
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


