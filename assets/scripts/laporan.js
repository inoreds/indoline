$("#btnLaporan-penjualanCustomer").on("click", function () {
    window.location.href = 'lprUmum/pdf_penjualanBBM_Cust?id='+$('#idCustomer').val();
});

$("#btnLaporan-penjualanBBM").on("click", function () {
    window.location.href = 'lprUmum/pdf_penjualanBBM_barang?id='+$('#idBBM').val();
});

$("#btnLaporan-pemakaianBBM").on("click", function () {
    window.location.href = 'lprUmum/pdf_penjualanBBM_barang?id='+$('#idBBM').val();
});

$("#btnLaporan-penjualanPeriode").on("click", function () {
     window.location.href = 'lprUmum/pdf_penjualanBBM_periode?tglAwal='+$('#tglAwalLaporan').val() + '&tglAkhir='+$('#tglAkhirLaporan').val();
});

function laporanPeriode(jenisLaporan)
{
	//alert(jenisLaporan);
	$('#jenisLaporan').val(jenisLaporan);
	$('.modal-periode').modal('show');   
}

function laporanPeriodeBukuBesar(jenisLaporan)
{
    //alert(jenisLaporan);
    $('#jenisLaporan').val(jenisLaporan);
    $('.modal-periodeBukuBesar').modal('show');   
}

function laporaBuktiBank(jenis)
{
    $('#jenisBuktiBank').val(jenis);
    $('.modal-bukti_bank').modal('show');
}

function laporaBuktiBankKeluar(jenis)
{
    //$('#jenisBuktiBank').val(jenis);
    $('.modal-bukti_bank_keluar').modal('show');
}

$('#bayarBank').change(function() {
        if ($('#bayarBank').val() == 'customer') {
                $('#idSupplier').prop('disabled',false);        
        } else if ($('#bayarBank').val() == 'lainnya'){
                $('#idSupplier').prop('disabled',true);        
        }
}); 

$('#sumberBank').change(function() {
        if ($('#sumberBank').val() == 'customer') {
                $('#idCustomer').prop('disabled',false);        
        } else if ($('#sumberBank').val() == 'lainnya'){
                $('#idCustomer').prop('disabled',true);        
        }
});    

$("#btnLaporan-bbm").on("click", function () {
     window.location.href = 'lprKeuangan/pdf_BBM?tahun='+$('#periodeTahun').val() + '&bulan='+$('#periodeBulan').val() + '&customer='+$('#idCustomer').val();
});

$("#btnLaporan-bbm_keluar").on("click", function () {
     window.location.href = 'lprKeuangan/pdf_BBK?tahun='+$('#periodeTahunKeluar').val() + '&bulan='+$('#periodeBulanKeluar').val() + '&supplier='+$('#idSupplier').val();
});



$("#btnLaporan-keuangan").on("click", function () {
    jenisLaporan = $('#jenisLaporan').val();
    if (jenisLaporan == 'Jurnal')
    {
    	 window.location.href = 'lprKeuangan/pdf_jurnal?tahun='+$('#periodeTahun').val()+'&bulan='+$('#periodeBulan').val();
    }
    else if (jenisLaporan == 'Neraca Saldo')
    {
    	window.location.href = 'lprKeuangan/pdf_neracaSaldo?tahun='+$('#periodeTahun').val()+'&bulan='+$('#periodeBulan').val();
    }
    else if (jenisLaporan == 'Laba Rugi')
    {
    	window.location.href = 'lprKeuangan/pdf_labaRugi?tahun='+$('#periodeTahun').val()+'&bulan='+$('#periodeBulan').val();
    }
    else if (jenisLaporan == 'Neraca')
    {
        window.location.href = 'lprKeuangan/pdf_neraca?tahun='+$('#periodeTahun').val()+'&bulan='+$('#periodeBulan').val();
    }
    else if (jenisLaporan == 'Perubahan Modal')
    {
        window.location.href = 'lprKeuangan/pdf_perubahanModal?tahun='+$('#periodeTahun').val()+'&bulan='+$('#periodeBulan').val();
    }
    else if (jenisLaporan == 'Arus Kas')
    {
        window.location.href = 'lprKeuangan/pdf_arusKas?tahun='+$('#periodeTahun').val()+'&bulan='+$('#periodeBulan').val();
    }
});

$("#btnLaporan-keuanganBukuBesar").on("click", function () {
    jenisLaporan = $('#jenisLaporan').val();
    window.location.href = 'lprKeuangan/pdf_bukuBesar?tahun='+$('#periodeTahunBukuBesar').val()+'&bulan='+$('#periodeBulanBukuBesar').val()+'&id='+$('#periodeAkun').val();
});
