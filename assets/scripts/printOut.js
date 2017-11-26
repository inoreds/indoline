	var path = window.location.pathname;
	var subPage = path.split("/").pop();
	var page = path.split('/').slice(-2, -1)[0];

	var split = path.split("/");
	var uri = split.slice(0, split.length - 2).join("/");

	//alert(subPage);

	if ((page == 'mstSupplier') && (subPage == 'printOut'))
	{
		window.print();
	}
	if ((page == 'mstSupplier') && (subPage == 'printOut'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + 'mstSupplier';
	    };    
	}

	if ((page == 'mstCustomer') && (subPage == 'printOut'))
	{
		window.print();
	}
	if ((page == 'mstCustomer') && (subPage == 'printOut'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + 'mstCustomer';
	    };    
	}

	if ((page == 'mstSatuan') && (subPage == 'printOut'))
	{
		window.print();
	}
	if ((page == 'mstSatuan') && (subPage == 'printOut'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + 'mstSatuan';
	    };    
	}
	if ((page == 'mstPBBKB') && (subPage == 'printOut'))
	{
		window.print();
	}
	if ((page == 'mstBBM') && (subPage == 'printOut'))
	{
		window.print();
	}
	if ((page == 'mstBBM') && (subPage == 'printOut'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + 'mstBBM';
	    };    
	}

	if ((page == 'stokBBM') && (subPage == 'printOut'))
	{
		window.print();
	}
	if ((page == 'stokBBM') && (subPage == 'printOut'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + 'stokBBM';
	    };    
	}

	if ((page == 'mstPengguna') && (subPage == 'printOut'))
	{
		window.print();
	}
	if ((page == 'mstPengguna') && (subPage == 'printOut'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + 'mstPengguna';
	    };    
	}

	if ((page == 'mstKapal') && (subPage == 'printOut'))
	{
		window.print();
	}
	if ((page == 'mstKapal') && (subPage == 'printOut'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + 'mstKapal';
	    };    
	}
	

	//==============================

	if ((page == 'mstKategoriAkun') && (subPage == 'printOut'))
	{
		window.print();
	}
	if ((page == 'mstKategoriAkun') && (subPage == 'printOut'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + 'mstKategoriAkun';
	    };    
	}

	if ((page == 'mstSubAkun') && (subPage == 'printOut'))
	{
		window.print();
	}
	if ((page == 'mstSubAkun') && (subPage == 'printOut'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + 'mstSubAkun';
	    };    
	}	

	if ((page == 'mstKategoriAsset') && (subPage == 'printOut'))
	{
		window.print();
	}
	if ((page == 'mstKategoriAsset') && (subPage == 'printOut'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + 'mstKategoriAsset';
	    };    
	}

	if ((page == 'mstAsset') && (subPage == 'printOut'))
	{
		window.print();
	}
	if ((page == 'mstAsset') && (subPage == 'printOut'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + 'mstAsset';
	    };    
	}

	if ((page == 'mstCurrency') && (subPage == 'printOut'))
	{
		window.print();
	}
	if ((page == 'mstCurrency') && (subPage == 'printOut'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + 'mstCurrency';
	    };    
	}
	
	if ((page == 'mstKurs') && (subPage == 'printOut'))
	{
		window.print();
	}
	if ((page == 'mstKurs') && (subPage == 'printOut'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + 'mstKurs';
	    };    
	}

	if ((page == 'mstKategoriJurnal') && (subPage == 'printOut'))
	{
		window.print();
	}
	if ((page == 'mstKategoriJurnal') && (subPage == 'printOut'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + 'mstKategoriJurnal';
	    };    
	}

	if ((page == 'jurnal') && (subPage == 'printOut'))
	{
		window.print();
	}
	if ((page == 'jurnal') && (subPage == 'printOut'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + 'jurnal';
	    };    
	}

	//===================================

	if ((subPage == 'printOut_detil'))
	{
		window.print();
	}
	if ((subPage == 'printOut_detil'))
	{
		var afterPrint = function() 
	    {
	    	window.location.href = uri + '/' + page;
	    };    
	}

	if ((page == 'printOut_sertifikatKapal'))
	{
		window.print();
	}
	if ((page == 'printOut_sertifikatKapal'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + '?subItem=sertifikatKapal&id='+ subPage;
	    };    
	}

	if ((page == 'printOut_historyPerbaikan'))
	{
		window.print();
	}
	if ((page == 'printOut_historyPerbaikan'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + '?subItem=historyPerbaikan&id='+ subPage;
	    };    
	}

	if ((page == 'printOut_sertifikatKapal'))
	{
		window.print();
	}
	if ((page == 'printOut_sertifikatKapal'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + '?subItem=sertifikatKapal&id='+ subPage;
	    };    
	}

	if ((page == 'printOut_daftarABK'))
	{
		window.print();
	}
	if ((page == 'printOut_daftarABK'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + '?subItem=daftarABK&id='+ subPage;
	    };    
	}

	if ((page == 'printOut_inventarisKapal'))
	{
		window.print();
	}
	if ((page == 'printOut_inventarisKapal'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + '?subItem=inventarisKapal&id='+ subPage;
	    };    
	}

	if ((page == 'trnPenjualanBBM') && (subPage == 'printOut_MBA'))
	{
		window.print();
	}
	if ((page == 'trnPenjualanBBM') && (subPage == 'printOut_MBA'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + page;
	    };    
	}

	if ((page == 'trnPenjualanBBM') && (subPage == 'printOut_MBT'))
	{
		window.print();
	}
	if ((page == 'trnPenjualanBBM') && (subPage == 'printOut_MBT'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + page;
	    };    
	}

	if ((page == 'daftarPiutang') && (subPage == 'kwitansi'))
	{
		window.print();
	}
	if ((page == 'daftarPiutang') && (subPage == 'kwitansi'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + page;
	    };    
	}

	if ((page == 'trnPenjualanBBM') && (subPage == 'invoice'))
	{
		window.print();
	}
	if ((page == 'trnPenjualanBBM') && (subPage == 'invoice'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + page;
	    };    
	}

	if ((page == 'trnPenjualanBBM') && (subPage == 'kwitansi'))
	{
		window.print();
	}
	if ((page == 'trnPenjualanBBM') && (subPage == 'kwitansi'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + page;
	    };    
	}
	if ((page == 'trnPenjualanNonPPn') && (subPage == 'kwitansi'))
	{
		window.print();
	}
	if ((page == 'trnPenjualanNonPPn') && (subPage == 'kwitansi'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + page;
	    };    
	}

	if ((page == 'trnPembelianNonPertamina') && (subPage == 'getPO'))
	{
		window.print();
	}
	if ((page == 'trnPembelianNonPertamina') && (subPage == 'getPO'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + page;
	    };    
	}
	if ((page == 'trnPembelianPertamina') && (subPage == 'getPO'))
	{
		window.print();
	}
	if ((page == 'trnPembelianPertamina') && (subPage == 'getPO'))
	{
		var afterPrint = function() 
	    {

	    	window.location.href = uri + "/" + page;
	    };    
	}

	if (window.matchMedia) {
	    var mediaQueryList = window.matchMedia('print');
	    mediaQueryList.addListener(function(mql) {
	        if (mql.matches) {
	            beforePrint();
	        } else {
	            afterPrint();
	        }
	    });
	}
	
	//window.onbeforeprint = beforePrint;
	//window.onafterprint = afterPrint;