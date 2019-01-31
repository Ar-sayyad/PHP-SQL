<?php include 'includes/header.php'; ?>

  <?php include 'includes/charts.php'; ?>  
<style>
    .hosp_sect,.data_sect,.quest_sect,.nps_sect{
          height: 160px;
    box-shadow: 3px 3px 4px 1px #979797;
    border-radius: 3px;
    color: #fff;
    border: 2px solid #fff;
    } 
    .nps_scores,.trend_nps,.demographics,.monthly_data,.score_dimensions,.demoavg_data,.npschart_data{
        box-shadow: 1px 1px 3px 0px #ccc;
        border-radius: 0px;
        border: 1px solid #ccc;
    }
    .hosp_sect h1, .data_sect h1, .quest_sect h1, .nps_sect h1{
       color: #ffffff;
    font-size: 35px;
    margin-right: 6px;
    float: right;
    }
    .hosp_sect h2, .data_sect h2, .quest_sect h2, .nps_sect h2{
        color: #ffffff;
    font-size: 20px;
    padding-bottom: 36px;
    font-weight: 500;
    }
    .hosp_sect h3, .data_sect h3, .quest_sect h3, .nps_sect h3{
        color: #ffffff;
        font-weight: 500;
        margin-top: 15px;
    }
    .hosp_sect{
       background-color: #c047d4;
    }
    .data_sect{        
        background-color: #2196F3;      
    }
    .quest_sect{
            background-color: #7c6eeb;
    }
    .nps_sect{
          background-color: #4eb955;
    }
    hr {
        margin-top: 0px;
        margin-bottom: 3px;
        height: 1px;
        width: 100%;
        background: #E3ECF7;
    }
    #nps_scores,#trend_nps,#demographics{
         width: 100%;
        height: 300px;
    }
    #score_dimensions,#demoavg_data,#demoavg_data,#demoavg_data,#npschart_data{
         width: 100%;
        height: 250px;
    }
</style>
<body>
	<div id="app_wrapper">
		<?php include 'includes/topbar.php'; ?>
            
		<?php include 'includes/sidebar.php'; ?>
            
			<section id="content_outer_wrapper">
				<div id="content_wrapper">
                                    
					<?php include 'includes/titlebar.php'; ?>
                                    
					<div id="content" class="container-fluid">
						<div class="content-body">							
							
							<!-- ENDS $dashboard_content -->
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                    <div class="card nps_scores">
                                                                            <div class="card-body p-b-0">
                                                                                 <div id="nps_scores"></div>                                                                              
                                                                            </div>									
                                                                    </div>									
                                                            </div>
                                                            <div class="col-md-6">
                                                                    <div class="card trend_nps">
                                                                            <div class="card-body p-b-0">
                                                                                 <div id="trend_nps"></div>                                                                              
                                                                            </div>									
                                                                    </div>									
                                                            </div>
                                                             <div class="col-md-3">
                                                                    <div class="card demographics">
                                                                            <div class="card-body p-b-0">
                                                                                 <div id="demographics"></div>                                                                              
                                                                            </div>									
                                                                    </div>									
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- ENDS $dashboard_content -->
                                                        <div class="row">
                                                             <div class="col-md-3">
                                                                    <div class="card demoavg_data">
                                                                            <div class="card-body p-b-0">
                                                                                 <div id="demoavg_data"></div>                                                                              
                                                                            </div>									
                                                                    </div>									
                                                            </div>
                                                            <div class="col-md-3">
                                                                    <div class="card npschart_data">
                                                                            <div class="card-body p-b-0">
                                                                                 <div id="npschart_data"></div>                                                                              
                                                                            </div>									
                                                                    </div>									
                                                            </div>
                                                           
                                                        </div>
						</div>
					</div>
					<!-- ENDS $content -->
				</div>
				
                            <?php include 'includes/footer.php'; ?>
                            
			</section>
			
		</div>
		
		 <?php include 'includes/footer-min.php'; ?>
    <script type="text/javascript"> 
    Highcharts.theme = {
        colors: ['#7cb5ec', '#f7a35c', '#90ee7e', '#7798BF', '#aaeeee', '#ff0066',
            '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee']
           };

    // Apply the theme
    Highcharts.setOptions(Highcharts.theme);

    Highcharts.chart('nps_scores', {
        colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
            return {
                radialGradient: {
                    cx: 0.5,
                    cy: 0.3,
                    r: 0.7
                },
                stops: [
                    [0, color],
                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        }),
        chart: {
            type: 'solidgauge'
        },
        title: {
            text: 'NPS Score'
        },
        pane: {
            center: ['50%', '75%'],
            size: '100%',
            startAngle: -90,
            endAngle: 90,
            background: {
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#eee',
                innerRadius: '60%',
                outerRadius: '100%',
                shape: 'arc'
            }
        },
        
        // the value axis
        yAxis: {
            stops: [
                [0.1, '#f44336'], // red                
                [0.5, '#da564c'], // light red
                [0.7, '#ffeb3b'], // yellow
                [0.9, '#18861d'], // green  
            ],
            min: 0,
            max: 10,
            minorTickWidth: 1,
            minorTickLength: 5,
            minorTickPosition: "inside",
            minorTickColor: "#000",
            tickPixelInterval: 20,
            tickWidth: 2,
            tickPosition: "inside",
            tickLength: 10,
            tickColor: "#000",
            labels: {
                y: 16,
                step: 2,
                distance: 15,
                rotation: 'auto'
            },
            title: {
                text: ''
            }
        },

        plotOptions: {
            solidgauge: {
                dataLabels: {
                    y: 5,
                    borderWidth: 0,
                    useHTML: true
                }
            }
        },
        series: [{
            name: 'NPS Score',
            data: [5],
            tooltip: {
                valueSuffix: ' %'
            },
            dataLabels: {
              style: {
                  fontSize: "24px"
              },
              color: "#000",
              formatter: function () {
                  var s;
                  s = '<span style="font-size: 24px;">' + this.point.y + '% </span>';                 
                  return s;
              },
              y: -10,
      }
        }]

    },
 // Add some life
 function (chart) {
     if (!chart.renderer.forExport) {
         setInterval(function () {
             var point = chart.series[0].points[0],
                 newVal,
                 inc = Math.round((Math.random() - 0.5) * 2);

             newVal = point.y + inc;
             if (newVal < 0 || newVal > 10) {
                 newVal = point.y - inc;
             }

             point.update(newVal);

         }, 3000);
     }
 });
 
 
 Highcharts.chart('trend_nps', {
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
                return {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, color],
                        [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                    ]
                };
            }),
    title: {
        text: 'Trend in NPS Score'
    },

    subtitle: {
        text: ''
    },
 xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'NPS Score of Month'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            }
        }
         
    },

    series: [{
        name: 'Competitor',
        data: [439, 525, 571, 696, 970, 1099, 1171, 1341,1400,1423,1452,1599]
    }, {
        name: 'City Average',
        data: [249, 240, 297, 598, 724, 602, 781, 904,915,924,925,956]
    }, {
        name: 'National Average',
        data: [117, 177, 260, 397, 301, 343, 421, 593,599,605,623,658]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});

Highcharts.chart('demographics', {
     colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
                return {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, color],
                        [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                    ]
                };
            }),
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 0,
            beta: 0
        }
    },
    title: {
        text: 'Top 10 Trending Hospitals'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'City Wise Hopsital',
        data: [
            {
                name: 'Ruby',
                y: 18.0,
                sliced: true,
                selected: true
            },
            ['Jahangir', 12.8],
            ['Jaslok', 11.8],
            ['Apollo', 6.2],
            ['Bombay', 3.8],
            ['Induja', 2.5],            
            ['KEM', 8.5],
            ['IIT', 10.5],
            ['Noble', 6.2],
            ['Breach Candy', 0.7]
        ]
    }]
});

 
    /*****ondate_core_deposition*****/

    Highcharts.chart('demoavg_data', {
        colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
            return {
                radialGradient: {
                    cx: 0.5,
                    cy: 0.3,
                    r: 0.7
                },
                stops: [
                    [0, color],
                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        }),
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            allowPointSelect: true,
            keys: ['name', 'y', 'selected', 'sliced'],
            options3d: {
                enabled: true,
                alpha: 0,
                beta: 0
            }
        },
        title: {
            text: 'Age Dimensions'
        },
        tooltip: {
            headerFormat: '',
            pointFormat: '{point.name}: <b>{point.percentage:.2f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 25,
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.2f}%',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    },
                    connectorColor: 'silver'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Age',
            data: [
                ['Male', 67],
                ['Female', 33]
            ],
            showInLegend: true
        }]
    });

 var chart = Highcharts.chart('npschart_data', {
        colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
            return {
                radialGradient: {
                    cx: 0.5,
                    cy: 0.3,
                    r: 0.7
                },
                stops: [
                    [0, color],
                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        }),
        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 5,
                beta: 1
            }
        },
        title: {
            text: 'NPS'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'A',
                'B',
                'C',
                'D',
                'E',
                'F'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'NPS'
            }
        },
        tooltip: {
            headerFormat: '{point.x}<br>',
            pointFormat: '{series.name}: <b>{point.y:.2f}</b><br/>'
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
                type: 'column',
            name: 'Breakdown',
            colorByPoint: true,
            data: [58, 89, 48, 92, 26, 120, 51],
            showInLegend: false

        }]
    });

 </script>
	</body>
</html>
