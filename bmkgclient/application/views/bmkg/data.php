<?php
$id="";//id
$date = date('Y-m-d');
if(isset($datalog) and $datalog):$i=1; foreach($datalog as $row):
	$record_id[] =  $row->record_id;
	$tanggal[] = $row->Tanggal;
	$rad[]= $row->diffuse_rad;
	$global_rad[]= $row->global_rad;
	$dni[]= $row->dni;
	$jam[]= $row->Jam;
	$nett_rad[] = $row->nett_rad;
	$reflective_rad[] = $row->reflective_rad;
	$sunshine[] = $row->sunshine;
	$battery[] = $row->battery;
	$id = "'".$row->record_id."', ".$id;
    $dataku[] = "'". $row->record_id.",".$row->diffuse_rad."',";

$i++; endforeach; endif;	

?>


<html>
   <head>
      <title>Highcharts</title>
      <!-- " echo base_url()."assets/bootstrap/css/bootstrap.min.css"; " -->
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src = "https://code.highcharts.com/highcharts.js"></script> 
	  <script src="https://code.highcharts.com/modules/series-label.js"></script>
	  <script src="https://code.highcharts.com/modules/exporting.js"></script>
	  <script src="https://code.highcharts.com/modules/export-data.js"></script>
	  <link href="https:/netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0, 
user-scalable=no">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
   
<body>

<div class="container">
    <div class="page-header">
        <h1>Data Stasiun Klimatologi Mlati -  BMKG Yogyakarta <span class="pull-right label label-default"><?php echo $tanggal[0]; ?></span></h1>
    </div>
    <div id="container"></div>
    <div class="row">
    	<div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#diffuse_rad" data-toggle="tab">diffuse rad</a></li>
                            <!-- <li><a href="#diffuse_rad2" data-toggle="tab">Diffuse rad rata-rata</a></li> -->
                            <li><a href="#dni" data-toggle="tab">Dni</a></li>
                            <li><a href="#global_rad" data-toggle="tab">Global rad</a></li>
                            <li><a href="#nett_rad" data-toggle="tab">nett rad</a></li>
                            <li><a href="#reflective_rad" data-toggle="tab">reflective_rad</a></li>
                            <li><a href="#sunshine" data-toggle="tab">sunshine</a></li>
                            <li><a href="#battery" data-toggle="tab">battery</a></li>

                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="diffuse_rad">diffuse_rad2</div>
                        <!-- <div class="tab-pane fade" id="diffuse_rad2">Rata-rata diffuse_rad2</div> -->
                        <div class="tab-pane fade" id="dni">dni</div>
                        <div class="tab-pane fade" id="global_rad">global_rad</div>
                        <div class="tab-pane fade" id="nett_rad">nett_rad</div>
                        <div class="tab-pane fade" id="reflective_rad">reflective Rad</div>
                        <div class="tab-pane fade" id="sunshine">sunshine</div>
                        <div class="tab-pane fade" id="battery">battery</div>


                    </div>
                </div>
            </div>
        </div>
	</div>
</div>

   <script type="text/javascript">
		Highcharts.chart('diffuse_rad', {
		    chart: {
		        type: 'line'
		    },
		    title: {
		        text: 'diffuse_rad'
		    },
		    subtitle: {
		        text: 'Source: BMKG'
		    },
		    xAxis: {
		    	categories : [
		    	<?php echo $id ?>
		    	]
		    },
		    yAxis: {
		        title: {
		            text: 'diffuse_rad'
		        }
		    },
		    data: {
			    enablePolling: true,
			    dataRefreshRate: 1
			  },
		    plotOptions: {
		        line: {
		            dataLabels: {
		                enabled: true
		            },
		            enableMouseTracking: true
		        }
		    },
		    series: [{
		        name: 'diffuse_rad',
		        data: [<?php echo join(array_reverse($rad), ',') ?>]
		    }]
		});
		Highcharts.chart('dni', {
		    chart: {
		        type: 'line'
		    },

		    title: {
		        text: 'dni'
		    },
		    subtitle: {
		        text: 'Source: BMKG'
		    },
		    xAxis: {
		    	categories : [
		    	<?php echo $id ?>
		    	],
		    },
		    yAxis: {
		        title: {
		            text: 'dni'
		        }
		    },
		    plotOptions: {
		        line: {
		            dataLabels: {
		                enabled: true
		            },
		            enableMouseTracking: true
		        }
		    },
		    series: [{
		        name: 'dni',
		        data: [<?php echo join(array_reverse($dni), ',') ?>]
		    }]
		});

		Highcharts.chart('global_rad', {
		    chart: {
		        type: 'line'
		    },
		    title: {
		        text: 'global_rad'
		    },
		    subtitle: {
		        text: 'Source: BMKG'
		    },
		    xAxis: {
		    	categories : [
		    	<?php echo $id ?>
		    	]
		    },
		    yAxis: {
		        title: {
		            text: 'global_rad'
		        }
		    },
		    plotOptions: {
		        line: {
		            dataLabels: {
		                enabled: true
		            },
		            enableMouseTracking: true
		        }
		    },
		    series: [{
		        name: 'global_rad',
		        data: [<?php echo join(array_reverse($global_rad), ',') ?>]
		    }]
		});

		Highcharts.chart('nett_rad', {
		    chart: {
		        type: 'line'
		    },
		    title: {
		        text: 'nett_rad'
		    },
		    subtitle: {
		        text: 'Source: BMKG'
		    },
		    xAxis: {
		    	categories : [
		    	<?php echo $id ?>
		    	]
		    },
		    yAxis: {
		        title: {
		            text: 'nett_rad'
		        }
		    },
		    plotOptions: {
		        line: {
		            dataLabels: {
		                enabled: true
		            },
		            enableMouseTracking: true
		        }
		    },
		    series: [{
		        name: 'nett_rad',
		        data: [<?php echo join(array_reverse($nett_rad), ',') ?>]
		    }]
		});
		Highcharts.chart('reflective_rad', {
		    chart: {
		        type: 'line'
		    },
		    title: {
		        text: 'reflective_rad'
		    },
		    subtitle: {
		        text: 'Source: BMKG'
		    },
		    xAxis: {
		    	categories : [
		    	<?php echo $id ?>
		    	]
		    },
		    yAxis: {
		        title: {
		            text: 'reflective_rad'
		        }
		    },
		    plotOptions: {
		        line: {
		            dataLabels: {
		                enabled: true
		            },
		            enableMouseTracking: true
		        }
		    },
		    series: [{
		        name: 'reflective_rad',
		        data: [<?php echo join(array_reverse($reflective_rad), ',') ?>]
		    }]
		});
		Highcharts.chart('sunshine', {
		    chart: {
		        type: 'line'
		    },
		    title: {
		        text: 'sunshine'
		    },
		    subtitle: {
		        text: 'Source: BMKG'
		    },
		    xAxis: {
		    	categories : [
		    	<?php echo $id ?>
		    	]
		    },
		    yAxis: {
		        title: {
		            text: 'sunshine'
		        }
		    },
		    plotOptions: {
		        line: {
		            dataLabels: {
		                enabled: true
		            },
		            enableMouseTracking: true
		        }
		    },
		    series: [{
		        name: 'sunshine',
		        data: [<?php echo join(array_reverse($sunshine), ',') ?>]
		    }]
		});
		Highcharts.chart('battery', {
		    chart: {
		        type: 'line'
		    },
		    title: {
		        text: 'battery'
		    },
		    subtitle: {
		        text: 'Source: BMKG'
		    },
		    xAxis: {
		    	categories : [
		    	<?php echo $id ?>
		    	]
		    },
		    yAxis: {
		        title: {
		            text: 'battery'
		        }
		    }, 
		    plotOptions: {
		        line: {
		            dataLabels: {
		                enabled: true
		            },
		            enableMouseTracking: true
		        }
		    },
		    series: [{
		        name: 'battery',
		        data: [<?php echo join(array_reverse($battery), ',') ?>]
		    }]
		});

   </script>
</body>
   
</html>