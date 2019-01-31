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
    #demoavg_data,#income_data,#demographics{
         width: 100%;
        height: 300px;
    }
    #Daily_Report,#npschart_data{
         width: 100%;
        height:350px;
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
                                                            <div class="col-md-4">
                                                                    <div class="card demoavg_data">
                                                                            <div class="card-body p-b-0">
                                                                                 <div id="demoavg_data"></div>                                                                              
                                                                            </div>									
                                                                    </div>									
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <div class="card income_data">
                                                                            <div class="card-body p-b-0">
                                                                                 <div id="income_data"></div>                                                                              
                                                                            </div>									
                                                                    </div>									
                                                            </div>
                                                             <div class="col-md-4">
                                                                    <div class="card demographics">
                                                                            <div class="card-body p-b-0">
                                                                                 <div id="demographics"></div>                                                                              
                                                                            </div>									
                                                                    </div>									
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- ENDS $dashboard_content -->
                                                        <div class="row">
                                                             <div class="col-md-7">
                                                                    <div class="card Daily_Report">
                                                                            <div class="card-body p-b-0">
                                                                                 <div id="Daily_Report"></div>                                                                              
                                                                            </div>									
                                                                    </div>									
                                                            </div>
                                                            <div class="col-md-5">
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

  
  Highcharts.chart('income_data', {
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
        text: 'Income Ratio'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}Cr.</b>'
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
        name: 'Hopsital Income',
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
        text: 'Education Ratio'
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
        name: 'Education Ratio',
        data: [
            
            ['Basic Life Support (BLS)', 10.8],
            {
                name: 'HealthStream Learning System (HLC) ',
                y: 11.0,
                sliced: true,
                selected: true
            },
            ['Advanced Cardiac Life Support (ACLS)', 1.8],
            ['Neonatal Resuscitation Program (NRP)', 6.2],
            ['Pediatric Life Support (PALS) ', 3.4],
            ['Fetal monitoring', 7.5],            
            ['Diabetes', 5.5],
            ['Anticoagulant Medications', 12.5],
            ['Asthma', 8.2],
            ['COPD', 1.7],
            ['Infant CPR', 3.5],
            ['Heart Failure', 5.6],
            ['Cancer', 3.7]
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
                ['Male', 56.59],
                ['Female', 43.41]
            ],
            showInLegend: true
        }]
    });




 Highcharts.chart('npschart_data', {
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
 </script>
 <script type="text/javascript"> 
   var chart = Highcharts.chart('Daily_Report', {     
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
            text: 'NPS Score - 2018 (Click Column to view Daily)'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'NPS Score'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '{series.name}<br>',
            pointFormat: '{point.name}: <b>{point.y:.2f}%</b><br/>'
        },

        "series": [
            {
                "name": "Monthly NPS",
                "colorByPoint": true,
                "data": [
                    {
                        "name": "Jan",
                        "y": 12.74,
                        "drilldown": "January"
                    },
                    {
                        "name": "Feb",
                        "y": 10.57,
                        "drilldown": "February"
                    },
                    {
                        "name": "March",
                        "y": 7.23,
                        "drilldown": "March"
                    },
                    {
                        "name": "April",
                        "y": 5.58,
                        "drilldown": "April"
                    },
                    {
                        "name": "May",
                        "y": 7.02,
                        "drilldown": "May"
                    },
                    {
                        "name": "June",
                        "y": 10.92,
                        "drilldown": "June"
                    },
                    {
                        "name": "July",
                        "y": 7.62,
                        "drilldown": "July"
                    },
                    {
                        "name": "Aug",
                        "y": 9.62,
                        "drilldown": "August"
                    },
                    {
                        "name": "Sept",
                        "y": 7.62,
                        "drilldown": "September"
                    },
                    {
                        "name": "Oct",
                        "y": 5.58,
                        "drilldown": "October"
                    },
                    {
                        "name": "Nov",
                        "y": 4.02,
                        "drilldown": "November"
                    },
                    {
                        "name": "Dec",
                        "y": 7.92,
                        "drilldown": "December"
                    }

                ]
            }
        ],
        "drilldown": {
            "series": [
                {
                    "name": "January",
                    "id": "January",
                    "data": [
                        [
                            "1",
                            0.1
                        ],
                        [
                            "2",
                            1.3
                        ],
                        [
                            "3",
                            3.02
                        ],
                        [
                            "4",
                            1.4
                        ],
                        [
                            "5",
                            0.88
                        ],
                        [
                            "6",
                            0.56
                        ],
                        [
                            "7",
                            0.45
                        ],
                        [
                            "8",
                            0.49
                        ],
                        [
                            "9",
                            0.32
                        ],
                        [
                            "10",
                            0.29
                        ],
                        [
                            "11",
                            0.79
                        ],
                        [
                            "12",
                            0.18
                        ],
                        [
                            "13",
                            0.13
                        ],
                        [
                            "14",
                            2.16
                        ],
                        [
                            "15",
                            0.13
                        ],
                        [
                            "16",
                            0.11
                        ],
                        [
                            "17",
                            0.17
                        ],
                        [
                            "18",
                            0.26
                        ],
                        [
                            "19",
                            0.26
                        ],
                        [
                            "20",
                            0.36
                        ],
                        [
                            "21",
                            0.60
                        ],
                        [
                            "22",
                            0.46
                        ],
                        [
                            "23",
                            0.12
                        ],
                        [
                            "24",
                            0.20
                        ],
                        [
                            "25",
                            0.26
                        ],
                        [
                            "26",
                            0.56
                        ],
                        [
                            "27",
                            0.65
                        ],
                        [
                            "28",
                            0.76
                        ],
                        [
                            "29",
                            0.16
                        ],
                        [
                            "30",
                            0.15
                        ],
                         [
                            "31",
                            0.60
                         ]
                    ]
                },
                {
                    "name": "February",
                    "id": "February",
                    "data": [
                        [
                            "1",
                            0.1
                        ],
                        [
                            "2",
                            1.3
                        ],
                        [
                            "3",
                            3.02
                        ],
                        [
                            "4",
                            1.4
                        ],
                        [
                            "5",
                            0.88
                        ],
                        [
                            "6",
                            0.56
                        ],
                        [
                            "7",
                            0.45
                        ],
                        [
                            "8",
                            0.49
                        ],
                        [
                            "9",
                            0.32
                        ],
                        [
                            "10",
                            0.29
                        ],
                        [
                            "11",
                            0.79
                        ],
                        [
                            "12",
                            0.18
                        ],
                        [
                            "13",
                            0.13
                        ],
                        [
                            "14",
                            2.16
                        ],
                        [
                            "15",
                            0.13
                        ],
                        [
                            "16",
                            0.11
                        ],
                        [
                            "17",
                            0.17
                        ],
                        [
                            "18",
                            0.26
                        ],
                        [
                            "19",
                            0.26
                        ],
                        [
                            "20",
                            0.36
                        ],
                        [
                            "21",
                            0.60
                        ],
                        [
                            "22",
                            0.46
                        ],
                        [
                            "23",
                            0.12
                        ],
                        [
                            "24",
                            0.20
                        ],
                        [
                            "25",
                            0.26
                        ],
                        [
                            "26",
                            0.56
                        ],
                        [
                            "27",
                            0.65
                        ],
                        [
                            "28",
                            0.76
                        ]
                    ]
                },
                {
                    "name": "March",
                    "id": "March",
                    "data": [
                         [
                             "1",
                             0.1
                         ],
                         [
                             "2",
                             1.3
                         ],
                         [
                             "3",
                             3.02
                         ],
                         [
                             "4",
                             1.4
                         ],
                         [
                             "5",
                             0.88
                         ],
                         [
                             "6",
                             0.56
                         ],
                         [
                             "7",
                             0.45
                         ],
                         [
                             "8",
                             0.49
                         ],
                         [
                             "9",
                             0.32
                         ],
                         [
                             "10",
                             0.29
                         ],
                         [
                             "11",
                             0.79
                         ],
                         [
                             "12",
                             0.18
                         ],
                         [
                             "13",
                             0.13
                         ],
                         [
                             "14",
                             2.16
                         ],
                         [
                             "15",
                             0.13
                         ],
                         [
                             "16",
                             0.11
                         ],
                         [
                             "17",
                             0.17
                         ],
                         [
                             "18",
                             0.26
                         ],
                         [
                             "19",
                             0.26
                         ],
                         [
                             "20",
                             0.36
                         ],
                         [
                             "21",
                             0.60
                         ],
                         [
                             "22",
                             0.46
                         ],
                         [
                             "23",
                             0.12
                         ],
                         [
                             "24",
                             0.20
                         ],
                         [
                             "25",
                             0.26
                         ],
                         [
                             "26",
                             0.56
                         ],
                         [
                             "27",
                             0.65
                         ],
                         [
                             "28",
                             0.76
                         ],
                         [
                             "29",
                             0.16
                         ],
                         [
                             "30",
                             0.15
                         ],
                         [
                             "31",
                             0.46
                         ]
                    ]
                },
                {
                    "name": "April",
                    "id": "April",
                    "data": [
                         [
                             "1",
                             0.1
                         ],
                         [
                             "2",
                             1.3
                         ],
                         [
                             "3",
                             3.02
                         ],
                         [
                             "4",
                             1.4
                         ],
                         [
                             "5",
                             0.88
                         ],
                         [
                             "6",
                             0.56
                         ],
                         [
                             "7",
                             0.45
                         ],
                         [
                             "8",
                             0.49
                         ],
                         [
                             "9",
                             0.32
                         ],
                         [
                             "10",
                             0.29
                         ],
                         [
                             "11",
                             0.79
                         ],
                         [
                             "12",
                             0.18
                         ],
                         [
                             "13",
                             0.13
                         ],
                         [
                             "14",
                             2.16
                         ],
                         [
                             "15",
                             0.13
                         ],
                         [
                             "16",
                             0.11
                         ],
                         [
                             "17",
                             0.17
                         ],
                         [
                             "18",
                             0.26
                         ],
                         [
                             "19",
                             0.26
                         ],
                         [
                             "20",
                             0.36
                         ],
                         [
                             "21",
                             0.60
                         ],
                         [
                             "22",
                             0.46
                         ],
                         [
                             "23",
                             0.12
                         ],
                         [
                             "24",
                             0.20
                         ],
                         [
                             "25",
                             0.26
                         ],
                         [
                             "26",
                             0.56
                         ],
                         [
                             "27",
                             0.65
                         ],
                         [
                             "28",
                             0.76
                         ],
                         [
                             "29",
                             0.16
                         ],
                         [
                             "30",
                             0.15
                         ]
                    ]
                },
                {
                    "name": "May",
                    "id": "May",
                    "data": [
                         [
                             "1",
                             0.1
                         ],
                         [
                             "2",
                             1.3
                         ],
                         [
                             "3",
                             3.02
                         ],
                         [
                             "4",
                             1.4
                         ],
                         [
                             "5",
                             0.88
                         ],
                         [
                             "6",
                             0.56
                         ],
                         [
                             "7",
                             0.45
                         ],
                         [
                             "8",
                             0.49
                         ],
                         [
                             "9",
                             0.32
                         ],
                         [
                             "10",
                             0.29
                         ],
                         [
                             "11",
                             0.79
                         ],
                         [
                             "12",
                             0.18
                         ],
                         [
                             "13",
                             0.13
                         ],
                         [
                             "14",
                             2.16
                         ],
                         [
                             "15",
                             0.13
                         ],
                         [
                             "16",
                             0.11
                         ],
                         [
                             "17",
                             0.17
                         ],
                         [
                             "18",
                             0.26
                         ],
                         [
                             "19",
                             0.26
                         ],
                         [
                             "20",
                             0.36
                         ],
                         [
                             "21",
                             0.60
                         ],
                         [
                             "22",
                             0.46
                         ],
                         [
                             "23",
                             0.12
                         ],
                         [
                             "24",
                             0.20
                         ],
                         [
                             "25",
                             0.26
                         ],
                         [
                             "26",
                             0.56
                         ],
                         [
                             "27",
                             0.65
                         ],
                         [
                             "28",
                             0.76
                         ],
                         [
                             "29",
                             0.16
                         ],
                         [
                             "30",
                             0.15
                         ],
                          [
                             "31",
                             0.12
                          ]
                    ]
                },
                {
                    "name": "June",
                    "id": "June",
                    "data": [
                         [
                             "1",
                             0.1
                         ],
                         [
                             "2",
                             1.3
                         ],
                         [
                             "3",
                             3.02
                         ],
                         [
                             "4",
                             1.4
                         ],
                         [
                             "5",
                             0.88
                         ],
                         [
                             "6",
                             0.56
                         ],
                         [
                             "7",
                             0.45
                         ],
                         [
                             "8",
                             0.49
                         ],
                         [
                             "9",
                             0.32
                         ],
                         [
                             "10",
                             0.29
                         ],
                         [
                             "11",
                             0.79
                         ],
                         [
                             "12",
                             0.18
                         ],
                         [
                             "13",
                             0.13
                         ],
                         [
                             "14",
                             2.16
                         ],
                         [
                             "15",
                             0.13
                         ],
                         [
                             "16",
                             0.11
                         ],
                         [
                             "17",
                             0.17
                         ],
                         [
                             "18",
                             0.26
                         ],
                         [
                             "19",
                             0.26
                         ],
                         [
                             "20",
                             0.36
                         ],
                         [
                             "21",
                             0.60
                         ],
                         [
                             "22",
                             0.46
                         ],
                         [
                             "23",
                             0.12
                         ],
                         [
                             "24",
                             0.20
                         ],
                         [
                             "25",
                             0.26
                         ],
                         [
                             "26",
                             0.56
                         ],
                         [
                             "27",
                             0.65
                         ],
                         [
                             "28",
                             0.76
                         ],
                         [
                             "29",
                             0.16
                         ],
                         [
                             "30",
                             0.15
                         ]
                    ]
                },
                {
                    "name": "July",
                    "id": "July",
                    "data": [
                         [
                             "1",
                             0.1
                         ],
                         [
                             "2",
                             1.3
                         ],
                         [
                             "3",
                             3.02
                         ],
                         [
                             "4",
                             1.4
                         ],
                         [
                             "5",
                             0.88
                         ],
                         [
                             "6",
                             0.56
                         ],
                         [
                             "7",
                             0.45
                         ],
                         [
                             "8",
                             0.49
                         ],
                         [
                             "9",
                             0.32
                         ],
                         [
                             "10",
                             0.29
                         ],
                         [
                             "11",
                             0.79
                         ],
                         [
                             "12",
                             0.18
                         ],
                         [
                             "13",
                             0.13
                         ],
                         [
                             "14",
                             2.16
                         ],
                         [
                             "15",
                             0.13
                         ],
                         [
                             "16",
                             0.11
                         ],
                         [
                             "17",
                             0.17
                         ],
                         [
                             "18",
                             0.26
                         ],
                         [
                             "19",
                             0.26
                         ],
                         [
                             "20",
                             0.36
                         ],
                         [
                             "21",
                             0.60
                         ],
                         [
                             "22",
                             0.46
                         ],
                         [
                             "23",
                             0.12
                         ],
                         [
                             "24",
                             0.20
                         ],
                         [
                             "25",
                             0.26
                         ],
                         [
                             "26",
                             0.56
                         ],
                         [
                             "27",
                             0.65
                         ],
                         [
                             "28",
                             0.76
                         ],
                         [
                             "29",
                             0.16
                         ],
                         [
                             "30",
                             0.15
                         ],
                         [
                             "31",
                             0.36
                         ]
                    ]
                },
                {
                    "name": "August",
                    "id": "August",
                    "data": [
                         [
                             "1",
                             0.1
                         ],
                         [
                             "2",
                             1.3
                         ],
                         [
                             "3",
                             3.02
                         ],
                         [
                             "4",
                             1.4
                         ],
                         [
                             "5",
                             0.88
                         ],
                         [
                             "6",
                             0.56
                         ],
                         [
                             "7",
                             0.45
                         ],
                         [
                             "8",
                             0.49
                         ],
                         [
                             "9",
                             0.32
                         ],
                         [
                             "10",
                             0.29
                         ],
                         [
                             "11",
                             0.79
                         ],
                         [
                             "12",
                             0.18
                         ],
                         [
                             "13",
                             0.13
                         ],
                         [
                             "14",
                             2.16
                         ],
                         [
                             "15",
                             0.13
                         ],
                         [
                             "16",
                             0.11
                         ],
                         [
                             "17",
                             0.17
                         ],
                         [
                             "18",
                             0.26
                         ],
                         [
                             "19",
                             0.26
                         ],
                         [
                             "20",
                             0.36
                         ],
                         [
                             "21",
                             0.60
                         ],
                         [
                             "22",
                             0.46
                         ],
                         [
                             "23",
                             0.12
                         ],
                         [
                             "24",
                             0.20
                         ],
                         [
                             "25",
                             0.26
                         ],
                         [
                             "26",
                             0.56
                         ],
                         [
                             "27",
                             0.65
                         ],
                         [
                             "28",
                             0.76
                         ],
                         [
                             "29",
                             0.16
                         ],
                         [
                             "30",
                             0.15
                         ],
                         [
                             "31",
                             0.36
                         ]
                    ]
                },
                {
                    "name": "September",
                    "id": "September",
                    "data": [
                         [
                             "1",
                             0.1
                         ],
                         [
                             "2",
                             1.3
                         ],
                         [
                             "3",
                             3.02
                         ],
                         [
                             "4",
                             1.4
                         ],
                         [
                             "5",
                             0.88
                         ],
                         [
                             "6",
                             0.56
                         ],
                         [
                             "7",
                             0.45
                         ],
                         [
                             "8",
                             0.49
                         ],
                         [
                             "9",
                             0.32
                         ],
                         [
                             "10",
                             0.29
                         ],
                         [
                             "11",
                             0.79
                         ],
                         [
                             "12",
                             0.18
                         ],
                         [
                             "13",
                             0.13
                         ],
                         [
                             "14",
                             2.16
                         ],
                         [
                             "15",
                             0.13
                         ],
                         [
                             "16",
                             0.11
                         ],
                         [
                             "17",
                             0.17
                         ],
                         [
                             "18",
                             0.26
                         ],
                         [
                             "19",
                             0.26
                         ],
                         [
                             "20",
                             0.36
                         ],
                         [
                             "21",
                             0.60
                         ],
                         [
                             "22",
                             0.46
                         ],
                         [
                             "23",
                             0.12
                         ],
                         [
                             "24",
                             0.20
                         ],
                         [
                             "25",
                             0.26
                         ],
                         [
                             "26",
                             0.56
                         ],
                         [
                             "27",
                             0.65
                         ],
                         [
                             "28",
                             0.76
                         ],
                         [
                             "29",
                             0.16
                         ],
                         [
                             "30",
                             0.15
                         ]
                    ]
                },
                {
                    "name": "October",
                    "id": "October",
                    "data": [
                         [
                             "1",
                             0.1
                         ],
                         [
                             "2",
                             1.3
                         ],
                         [
                             "3",
                             3.02
                         ],
                         [
                             "4",
                             1.4
                         ],
                         [
                             "5",
                             0.88
                         ],
                         [
                             "6",
                             0.56
                         ],
                         [
                             "7",
                             0.45
                         ],
                         [
                             "8",
                             0.49
                         ],
                         [
                             "9",
                             0.32
                         ],
                         [
                             "10",
                             0.29
                         ],
                         [
                             "11",
                             0.79
                         ],
                         [
                             "12",
                             0.18
                         ],
                         [
                             "13",
                             0.13
                         ],
                         [
                             "14",
                             2.16
                         ],
                         [
                             "15",
                             0.13
                         ],
                         [
                             "16",
                             0.11
                         ],
                         [
                             "17",
                             0.17
                         ],
                         [
                             "18",
                             0.26
                         ],
                         [
                             "19",
                             0.26
                         ],
                         [
                             "20",
                             0.36
                         ],
                         [
                             "21",
                             0.60
                         ],
                         [
                             "22",
                             0.46
                         ],
                         [
                             "23",
                             0.12
                         ],
                         [
                             "24",
                             0.20
                         ],
                         [
                             "25",
                             0.26
                         ],
                         [
                             "26",
                             0.56
                         ],
                         [
                             "27",
                             0.65
                         ],
                         [
                             "28",
                             0.76
                         ],
                         [
                             "29",
                             0.16
                         ],
                         [
                             "30",
                             0.15
                         ],
                          [
                             "31",
                             0.36
                          ]
                    ]
                },
                {
                    "name": "November",
                    "id": "November",
                    "data": [
                         [
                             "1",
                             0.1
                         ],
                         [
                             "2",
                             1.3
                         ],
                         [
                             "3",
                             3.02
                         ],
                         [
                             "4",
                             1.4
                         ],
                         [
                             "5",
                             0.88
                         ],
                         [
                             "6",
                             0.56
                         ],
                         [
                             "7",
                             0.45
                         ],
                         [
                             "8",
                             0.49
                         ],
                         [
                             "9",
                             0.32
                         ],
                         [
                             "10",
                             0.29
                         ],
                         [
                             "11",
                             0.79
                         ],
                         [
                             "12",
                             0.18
                         ],
                         [
                             "13",
                             0.13
                         ],
                         [
                             "14",
                             2.16
                         ],
                         [
                             "15",
                             0.13
                         ],
                         [
                             "16",
                             0.11
                         ],
                         [
                             "17",
                             0.17
                         ],
                         [
                             "18",
                             0.26
                         ],
                         [
                             "19",
                             0.26
                         ],
                         [
                             "20",
                             0.36
                         ],
                         [
                             "21",
                             0.60
                         ],
                         [
                             "22",
                             0.46
                         ],
                         [
                             "23",
                             0.12
                         ],
                         [
                             "24",
                             0.20
                         ],
                         [
                             "25",
                             0.26
                         ],
                         [
                             "26",
                             0.56
                         ],
                         [
                             "27",
                             0.65
                         ],
                         [
                             "28",
                             0.76
                         ],
                         [
                             "29",
                             0.16
                         ],
                         [
                             "30",
                             0.15
                         ]
                    ]
                },
                {
                    "name": "December",
                    "id": "December",
                    "data": [
                         [
                             "1",
                             0.1
                         ],
                         [
                             "2",
                             1.3
                         ],
                         [
                             "3",
                             3.02
                         ],
                         [
                             "4",
                             1.4
                         ],
                         [
                             "5",
                             0.88
                         ],
                         [
                             "6",
                             0.56
                         ],
                         [
                             "7",
                             0.45
                         ],
                         [
                             "8",
                             0.49
                         ],
                         [
                             "9",
                             0.32
                         ],
                         [
                             "10",
                             0.29
                         ],
                         [
                             "11",
                             0.79
                         ],
                         [
                             "12",
                             0.18
                         ],
                         [
                             "13",
                             0.13
                         ],
                         [
                             "14",
                             2.16
                         ],
                         [
                             "15",
                             0.13
                         ],
                         [
                             "16",
                             0.11
                         ],
                         [
                             "17",
                             0.17
                         ],
                         [
                             "18",
                             0.26
                         ],
                         [
                             "19",
                             0.26
                         ],
                         [
                             "20",
                             0.36
                         ],
                         [
                             "21",
                             0.60
                         ],
                         [
                             "22",
                             0.46
                         ],
                         [
                             "23",
                             0.12
                         ],
                         [
                             "24",
                             0.20
                         ],
                         [
                             "25",
                             0.26
                         ],
                         [
                             "26",
                             0.56
                         ],
                         [
                             "27",
                             0.65
                         ],
                         [
                             "28",
                             0.76
                         ],
                         [
                             "29",
                             0.16
                         ],
                         [
                             "30",
                             0.15
                         ],
                          [
                             "31",
                             0.36
                          ]
                    ]
                }
            ]
        }
    });

</script>

	</body>
</html>
