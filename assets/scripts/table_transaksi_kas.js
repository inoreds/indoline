var TableTransaksi_kas = function () {

    var handleTable = function () {

        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }

        function editRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
           
            jqTds[0].innerHTML = '<input type="text" id="referingPhysicianId2" width="100%" class="form-control " value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<input type="text" id="referingPhysicianName2" name="referingPhysicianName" class="form-control " value="' + aData[1] + '">';
           // jqTds[2].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[2] + '">';
           // jqTds[3].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[3] + '">';
            //jqTds[2].innerHTML = '<a class="edit" href="">Save</a>';
            jqTds[3].innerHTML = '<a class="delete" href="">Delete</a>';
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
           // oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
           // oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            //oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 2, false);
            oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 2, false);
            oTable.fnDraw();
        }

        function cancelEditRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
           // oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
           // oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 2, false);
            oTable.fnDraw();
        }

        var table = $('#table-transaksi_kas');

        var oTable = table.dataTable({

    
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],

    
            // set the initial value
            "pageLength": 10,
            "paging":   false,
            "bFilter": false,
            "bInfo": false,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = $("#table-transaksi_kas_wrapper");



        var nEditing = null;
        var nNew = false;

        $('#table-transaksi_kas_new').click(function (e) {
            e.preventDefault();

            if (nNew && nEditing) {
                if (confirm("Previous row not saved. Do you want to save it ?")) {
                    saveRow(oTable, nEditing); // save
                    $(nEditing).find("td:first").html("Untitled");
                    nEditing = null;
                    nNew = false;

                } else {
                    oTable.fnDeleteRow(nEditing); // cancel
                    nEditing = null;
                    nNew = false;
                    
                    return;
                }
            }

            var aiNew = oTable.fnAddData(['', '', '', '','']);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            editRow(oTable, nRow);
            nEditing = nRow;
            nNew = true;
        });
        
         function checkJumlah(tgl_pesanan)
         {
                var total=0;
                   $.ajax({
                     type: "GET",
                     url: "pemesanan/totalPesananPelanggan", 
                     data: {'tgl_pesanan': tgl_pesanan},
                     dataType: "text",  
                     cache:false,
                     success: 
                          function(data){
                              //as a debugging message.
                            total = data;
                          },
                           async: false // <- this turns it into synchronous
                      });// you have missed this bracket
                  
                 return total;

         }   

        function checkJumlahTable() 
        {
            var table = $('#table-transaksi_kas');
            var total = 0;
            table.find('tr').each(function(i) {
              var $tds = $(this).find('td'),
                jmlh = $tds.eq(2).text();
                total = +total + +jmlh;    
               
            });
            return total;
        };

        $("#barangPenjualanBBM").change(function(){
            /*
            var qtyInvoice = $('#qtyInvoice').val().replace(/,/g , "");
            var priceInvoice = $('#priceInvoice').val().replace(/,/g , "");
            var totalInvoice = Math.round(qtyInvoice * priceInvoice);
            $('#totalInvoice').val(totalInvoice.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
             */
             //alert('test')
        });

        $("#jumlahPenjualan").keyup(function(){
            var qtyInvoice = $('#jumlahPenjualan').val().replace(/,/g , "");
            var priceInvoice = $('#hargaPenjualan').val().replace(/,/g , "");
            var totalInvoice = Math.round(qtyInvoice * priceInvoice);
            $('#subTotalPenjualan').val(totalInvoice.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
             
        });

        $("#hargaPenjualan").keyup(function(){
            var qtyInvoice = $('#jumlahPenjualan').val().replace(/,/g , "");
            var priceInvoice = $('#hargaPenjualan').val().replace(/,/g , "");
            var totalInvoice = Math.round(qtyInvoice * priceInvoice);
            $('#subTotalPenjualan').val(totalInvoice.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
             
        });


        $('#simpanDetailKas').click( function() { 
            
            var aiNew = oTable.fnAddData(['','', '', '','']);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            var newString = new Array();
            oTable.fnUpdate($('.id_account_bukti_kas').val(), nRow, 0, false);
            oTable.fnUpdate($('.id_account_bukti_kas option:selected').text(), nRow, 1, false);
            oTable.fnUpdate($('#nominalAkunKas').val(), nRow, 2, false);
            oTable.fnUpdate($('#keteranganAkunKas').val(), nRow, 3, false);
            oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 4, false);
            oTable.fnDraw();
            $('#nominalAkunKas').val("");
            $('#keteranganAkunKas').val("");
            $("#akunKas").prop("disabled", true);
            $("#kas_masuk_keluar").prop("disabled", true);
           
        });

        table.on('click', '.delete', function (e) {
            e.preventDefault();

            if (confirm("Are you sure to delete this row ?") == false) {
                return;
            }

            var nRow = $(this).parents('tr')[0];
            oTable.fnDeleteRow(nRow);
            alert("Deleted! Do not forget to do some ajax to sync with backend :)");
        });

        
    }

    return {

        //main function to initiate the module
        init: function () {
            handleTable();
        }

    };
    
    

}();