<footer id="footer-bar" class="row">
<p id="footer-copyright" class="col-xs-12">
&copy;AutoIT
</p>
</footer>
</div>
</div>
</div>
</div>
 
<script src="<?php echo base_url();?>partnerIT/js/demo-skin-changer.js"></script>  
<script src="<?php echo base_url();?>partnerIT/js/jquery.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/demo.js"></script>  
 
<script src="<?php echo base_url();?>partnerIT/js/moment.min.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/jquery-jvectormap-world-merc-en.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/gdp-data.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/flot/jquery.flot.min.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/flot/jquery.flot.threshold.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/flot/jquery.flot.axislabels.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/skycons.js"></script>
 
<script src="<?php echo base_url();?>partnerIT/js/scripts.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/pace.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<!--<script src="https://code.highcharts.com/modules/exporting.js"></script>-->
<script>
	$(document).ready(function() {
		
Highcharts.chart('highchartdiv', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: false
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
             credits: {
      enabled: false
  },
    series: [{
        type: 'pie',
        name: 'Percentage',
         data: [<?php $company_info = $this->test_model->get_company_count();
  foreach ($company_info as $row) {     
     ?>   
<?php echo "['".$this->test_model->get_company_name($row['company_id'])."',". $this->test_model->get_company_test_count($row['company_id'])."]";?>,

<?php } ?>
                         
        ]
    }]
});


Highcharts.chart('highchartdiv1', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 40,
            beta: 0
        }
    },
    title: {
        text: false
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 40,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
             credits: {
      enabled: false
  },
    series: [{
        type: 'pie',
        name: 'Percentage',
        data: [
            ['Passed', 45],
            {
                name: 'Failed',
                y: 30,
                sliced: true,
                selected: true
            }
             
        ]
    }]
});



	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		 
	    
		/* SPARKLINE - graph in header */
		var orderValues = [10,8,5,7,4,4,3,8,0,7,10,6,5,4,3,6,8,9];

		$('.spark-orders').sparkline(orderValues, {
			type: 'bar', 
			barColor: '#ced9e2',
			height: 25,
			barWidth: 6
		});

		var revenuesValues = [8,3,2,6,4,9,1,10,8,2,5,8,6,9,3,4,2,3,7];

		$('.spark-revenues').sparkline(revenuesValues, {
			type: 'bar', 
			barColor: '#ced9e2',
			height: 25,
			barWidth: 6
		});

		/* ANIMATED WEATHER */
		var skycons = new Skycons({"color": "#03a9f4"});
		// on Android, a nasty hack is needed: {"resizeClear": true}

		// you can add a canvas by it's ID...
		skycons.add("current-weather", Skycons.SNOW);

		// start animation!
		skycons.play();

	});
	</script>
</body>

</html>