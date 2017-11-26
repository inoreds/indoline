var TablePemesanan = function () {

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

        var table = $('#table-pemesanan');

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

        var tableWrapper = $("#table-pemesanan_wrapper");

        tableWrapper.find(".dataTables_length select").select2({
            showSearchInput: true //hide search box with special css class
        }); // initialize select2 dropdown

        var nEditing = null;
        var nNew = false;

        $('#table-pemesanan_new').click(function (e) {
            e.preventDefault();

            if (nNew && nEditing) {
                if (confirm("Previose row not saved. Do you want to save it ?")) {
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

            var aiNew = oTable.fnAddData(['', '', '', '']);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            editRow(oTable, nRow);
            nEditing = nRow;
            nNew = true;
        });
        
        $('#simpan-detailPemesanan').click( function() { 
            
            var idNow = $('#referingPhysicianIdManual').val();
            var count=0;
            count = countTotal('#table-pemesanan',2);
            var jumlahPesan = $('#jumlah_pesan').val();
            var totalPerencanaan = $('#total_perencanaan').val();

            //alert(totalPerencanaan);
            var jumlahTotal = count + +jumlahPesan;
            var bedaTotal = totalPerencanaan - count;
            
            if (totalPerencanaan >= jumlahTotal)  
            {
                var aiNew = oTable.fnAddData(['', '', '', '']);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                var newString = new Array();
                oTable.fnUpdate($('#id_supplier').val(), nRow, 0, false);
                oTable.fnUpdate($('#id_supplier').val(), nRow, 1, false);
                oTable.fnUpdate(jumlahPesan, nRow, 2, false);
                oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 3, false);
                oTable.fnDraw();

                $('#jumlah_pesan').val("");

                var kurang = totalPerencanaan -  countTotal('#table-pemesanan',2);
                $('#jumlah_pesan').val(kurang);  
            }        
            else
            {  
                alert("Pesanan Melewati Batas");    
                $('#jumlah_pesan').val(bedaTotal);
            }  
            
            //alert('test');         
          
        });

        function countTotal(tableId, n) 
        {
            var table = $(tableId);
            var values = [];
            var sum=0;
            table.find('tr').each(function(i) 
            {
              var $tds = $(this).find('td'),count = $tds.eq(n).text();
              sum = sum + +count;                
            });

            return sum;
        };

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