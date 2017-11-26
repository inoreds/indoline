$(function () {

    // Uncomment to style it like Apple Watch
    /*
    if (!Highcharts.theme) {
        Highcharts.setOptions({
            chart: {
                backgroundColor: 'black'
            },
            colors: ['#F62366', '#9DFF02', '#0CCDD6'],
            title: {
                style: {
                    color: 'silver'
                }
            },
            tooltip: {
                style: {
                    color: 'silver'
                }
            }
        });
    }
    // */
    $.getJSON('/ta_titis/dashboard/jsonDashboardGauge',  function(json) {    
    Highcharts.chart('chartGauge', {

        chart: {
            type: 'solidgauge',
            marginTop: 50
        },

        title: {
            text: 'Realisasi Perencanaan Bahan Baku',
            style: {
                fontSize: '20px'
            }
        },

        tooltip: {
            borderWidth: 0,
            backgroundColor: 'none',
            shadow: false,
            style: {
                fontSize: '16px'
            },
            pointFormat: '{series.name}<br><span style="font-size:2em; color: {point.color}; font-weight: bold">{point.total} Ton</span>',
            positioner: function (labelWidth, labelHeight) {
                return {
                    x: 200 - labelWidth / 2,
                    y: 180
                };
            }
        },

        pane: {
            startAngle: 0,
            endAngle: 360,
            background: [{ // Track for Move
                outerRadius: '112%',
                innerRadius: '88%',
                backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0.3).get(),
                borderWidth: 0
            }, { // Track for Exercise
                outerRadius: '87%',
                innerRadius: '63%',
                backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[1]).setOpacity(0.3).get(),
                borderWidth: 0
            }]
        },

        yAxis: {
            min: 0,
            max: 100,
            lineWidth: 0,
            tickPositions: []
        },

        plotOptions: {
            solidgauge: {
                borderWidth: '34px',
                dataLabels: {
                    enabled: false
                },
                linecap: 'round',
                stickyTracking: false
            }
        },

        series: json
    }) 
    });

 $.getJSON('/ta_titis/dashboard/jsonDashboardGaugePelanggan',  function(json) {    
    Highcharts.chart('chartGauge2', {

        chart: {
            type: 'solidgauge',
            marginTop: 50
        },

        title: {
            text: 'Permintaan Pelanggan',
            style: {
                fontSize: '20px'
            }
        },

        tooltip: {
            borderWidth: 0,
            backgroundColor: 'none',
            shadow: false,
            style: {
                fontSize: '16px'
            },
            pointFormat: '{series.name}<br><span style="font-size:2em; color: {point.color}; font-weight: bold">{point.y}%</span>',
            positioner: function (labelWidth, labelHeight) {
                return {
                    x: 200 - labelWidth / 2,
                    y: 180
                };
            }
        },

        pane: {
            startAngle: 0,
            endAngle: 360,
            background: [{ // Track for Move
                outerRadius: '112%',
                innerRadius: '88%',
                backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0.3).get(),
                borderWidth: 0
            }]
        },

        yAxis: {
            min: 0,
            max: 100,
            lineWidth: 0,
            tickPositions: []
        },

        plotOptions: {
            solidgauge: {
                borderWidth: '34px',
                dataLabels: {
                    enabled: false
                },
                linecap: 'round',
                stickyTracking: false
            }
        },

        series: json
    }) 
    });

    $.getJSON('/ta_titis/dashboard/jsonBahanBaku', function(json) {
         Highcharts.chart('pieBahanBaku', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                colors: ['#e04a49', '#578ebe', '#44b6ae', '#dfba49', '#0AFFF3'],
                title: {
                    text: ''
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        },
                        point: {
                            events: {
                                click: function(event) {
                                    var options = this.options;
                                    //$('#orderStatusPieId').val(options.name);
                                    initTablePie(options.name,tahunId);
                                    $('#modalPieImagingOrder').modal('show');
                                }
                            }
                        },
                        showInLegend: true
                    }
                },
                series: [{
                   
                    name: 'Bahan Baku',
                    data: json
                  }]
            });
        });
});


        function grafikPenjualan_bulan(url,tahun)
        {   
                var options = 
                {
                chart: {
                    renderTo: 'grafikPenjualanUmum',
                    type: 'line'
                    
                },
                title: {
                            text: ''
                        },
                xAxis: {
                    categories: []
                },
                yAxis: {
                    title: {
                        text: 'Amount'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    formatter: function() {
                            return '<b>'+ this.series.name +'</b><br/>'+
                            this.x +': '+ this.y + ' Ton';
                    }
                },
                series: []
            }
            
           $.getJSON(url, {tahun: tahun}, function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                chart = new Highcharts.Chart(options);
            });

        }
    

        function grafikPenjualanPerProduk_bulan(url,tahun)
        {   
            var options = {
                chart: {
                    renderTo: 'grafikPenjualanProduk',
                    type: 'column'
                    
                },
                title: {
                            text: ''
                        },
                xAxis: {
                    categories: []
                },
                yAxis: {
                    title: {
                        text: 'Amount'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    formatter: function() {
                            return '<b>'+ this.series.name +'</b><br/>'+
                            this.x +': '+ this.y + ' Ton';
                    }
                },
                series: []
            }
            
           $.getJSON(url, {tahun: tahun}, function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                options.series[1] = json[2];
                options.series[2] = json[3];
                options.series[3] = json[4];
                options.series[4] = json[5];    
                chart = new Highcharts.Chart(options);
            });
        }


        function grafikPerencanaan_bulan(url,tahun)
        {   
            var options = {
                chart: {
                    renderTo: 'grafikProduksi',
                    type: 'line'
                    
                },
                title: {
                            text: ''
                        },
                xAxis: {
                    categories: []
                },
                yAxis: {
                    title: {
                        text: 'Amount'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    formatter: function() {
                            return '<b>'+ this.series.name +'</b><br/>'+
                            this.x +': '+ this.y + ' Ton';
                    }
                },
                series: []
            }
            
           $.getJSON(url, {tahun: tahun}, function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                chart = new Highcharts.Chart(options);
            });
        }



    function grafik_supplier()
    {    
        $.getJSON('/ta_titis/dashboard/grafik_supplier', function(json) {
                $('#grafikRekomendasi').highcharts({
                     chart: {
                            polar: true,
                            type: 'line'
                        },

                        title: {
                            text: ''
                            //x: -80
                        },
                        subtitle: {
                            text: ''
                        },
                        pane: {
                            size: '80%'
                        },

                        xAxis: {
                            categories: json['category'],
                            tickmarkPlacement: 'on',
                            lineWidth: 0
                        },

                        yAxis: {
                            gridLineInterpolation: 'polygon',
                            lineWidth: 0,
                            min: 0
                        },

                        tooltip: {
                            shared: true,
                            pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>'
                        },

                        legend: {
                            align: 'right',
                            verticalAlign: 'top',
                            y: 70,
                            layout: 'vertical'
                        },

                        series: [{
                            name: json['name'],
                            data: json['data'],
                            pointPlacement: 'on'
                        }],
                        credits:false
                });
            });
        }


 $('input:radio[name=optionPeriode]').change(function() {
    var tahun = 0;
        if (this.value == 'tahun') {
            grafikPenjualan_bulan('/ta_titis/dashboard/grafikPenjualan_tahun',tahun);
            grafikPenjualanPerProduk_bulan('/ta_titis/dashboard/grafikPenjualanPerProduk_tahun',tahun);
            grafikPerencanaan_bulan('/ta_titis/dashboard/grafikPerencanaan_tahun',tahun);
        }
        else if (this.value = 'bulan'){
            var tahun = $('#cmbTahun').val();
         //alert(tahun);
            grafikPenjualan_bulan('/ta_titis/dashboard/grafikPenjualan_bulan',tahun);
            grafikPenjualanPerProduk_bulan('/ta_titis/dashboard/grafikPenjualanPerProduk_bulan',tahun);
            grafikPerencanaan_bulan('/ta_titis/dashboard/grafikPerencanaan_bulan',tahun);
        }
    });

 $('#cmbTahun').change(function() {
         var tahun = $('#cmbTahun').val();
         //alert(tahun);
            grafikPenjualan_bulan('/ta_titis/dashboard/grafikPenjualan_bulan',tahun);
            grafikPenjualanPerProduk_bulan('/ta_titis/dashboard/grafikPenjualanPerProduk_bulan',tahun);
            grafikPerencanaan_bulan('/ta_titis/dashboard/grafikPerencanaan_bulan',tahun);
    });
$(function () {
    var tahun = $('#cmbTahun').val();
    grafikPenjualan_bulan('/ta_titis/dashboard/grafikPenjualan_bulan',tahun);
    grafikPenjualanPerProduk_bulan('/ta_titis/dashboard/grafikPenjualanPerProduk_bulan',tahun);
    grafikPerencanaan_bulan('/ta_titis/dashboard/grafikPerencanaan_bulan',tahun);
    grafik_supplier();
});


var beforePrint = function() {
   var chart = $('#grafikPenjualanUmum').highcharts();
    chart.setSize(600, 400,false); 
};

var afterPrint = function() {
    var chart = $('#grafikPenjualanUmum').highcharts();
     chart.setSize(1600, 400,false); 
};

$("#printLaporanUmum").on("click", function () 
{
    var tipe = $('input[name="optionPeriode"]:checked').val();
    if (tipe == 'bulan')
    {
        var tahun = $('#cmbTahun').val();
        uri = "/ta_titis/laporan/cetakLaporan?jenisLaporan=Bulanan&nilaiLaporan="+tahun;
        window.location.href = uri;
    }
    else if (tipe == 'tahun')
    {
        uri = "/ta_titis/laporan/cetakLaporan?jenisLaporan=Tahunan";
        window.location.href = uri;
    }
});

$("#printLaporanProduk").on("click", function () 
{
    var tipe = $('input[name="optionPeriode"]:checked').val();
    if (tipe == 'bulan')
    {
        var tahun = $('#cmbTahun').val();
        uri = "/ta_titis/laporan/cetakLaporanProduk?jenisLaporan=Bulanan&nilaiLaporan="+tahun;
        window.location.href = uri;
    }
    else if (tipe == 'tahun')
    {
        uri = "/ta_titis/laporan/cetakLaporanProduk?jenisLaporan=Tahunan";
        window.location.href = uri;
    }
});

$("#printLaporanProduksi").on("click", function () 
{
    var tipe = $('input[name="optionPeriode"]:checked').val();
    if (tipe == 'bulan')
    {
        var tahun = $('#cmbTahun').val();
        uri = "/ta_titis/laporan/cetakLaporanProduksi?jenisLaporan=Bulanan&nilaiLaporan="+tahun;
        window.location.href = uri;
    }
    else if (tipe == 'tahun')
    {
        uri = "/ta_titis/laporan/cetakLaporanProduksi?jenisLaporan=Tahunan";
        window.location.href = uri;
    }
});


