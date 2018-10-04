<?php
include('koneksi.php');
$query = mysqli_query($koneksi, "SELECT * FROM data_log ORDER BY record_id DESC LIMIT 20");
$id="";
while($data = mysqli_fetch_array($query)){
	$record_id[] =  $data['record_id'];
	$tanggal[] = $data['Tanggal'];
	$rad[]= $data['diffuse_rad'];
	$global_rad[]= $data['global_rad'];
	$dni[]= $data['dni'];
	$nett_rad[] = $data['nett_rad'];
	$reflective_rad[] = $data['reflective_rad'];
	$sunshine[] = $data['sunshine'];
	$battery[] = $data['battery'];
	$id = "'".$data['record_id']."', ".$id;
	$dataku[] = "'".$data['record_id'].",". $data['diffuse_rad']."',";

}
$query2 = mysqli_query($koneksi, "SELECT Tanggal, AVG(diffuse_rad) as diffuse_rad_rata2 FROM data_log GROUP BY Tanggal ORDER BY record_id DESC LIMIT 20");
$id1="";
while($data = mysqli_fetch_array($query2)){
	$avgdiff[] =  number_format($data['diffuse_rad_rata2'], 2);
	$tanggal[] = $data['Tanggal'];
	$id1 = "'".$data['Tanggal']."', ".$id1;

}

		
?>
<html>
   <head>
      <title>Highcharts</title>
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src = "https://code.highcharts.com/highcharts.js"></script> 
	  <script src="https://code.highcharts.com/modules/series-label.js"></script>
	  <script src="https://code.highcharts.com/modules/exporting.js"></script>
	  <script src="https://code.highcharts.com/modules/export-data.js"></script>
	  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0, 
user-scalable=no">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
   
<body>

<div class="container">
    <div class="page-header">
        <h1>Data Stasiun Klimatologi Mlati -  BMKG Yogyakarta <span class="pull-right label label-default"></span></h1>
    </div>
    <div class="row">
    	<div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#diffuse_rad" data-toggle="tab">diffuse rad</a></li>
                            <li><a href="#diffuse_rad2" data-toggle="tab">Diffuse rad rata-rata</a></li>
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
                        <div class="tab-pane fade" id="diffuse_rad2">Rata-rata diffuse_rad2</div>
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



<!--    <div id="diffuse_rad" style="padding-left: 10%; padding-right: 10%"></div><hr><br>
   <div id="diffuse_rad2" style="padding-left: 10%; padding-right: 10%"></div><hr><br>
   <div id="dni" style="padding-left: 10%; padding-right: 10%"></div><hr><br>
   <div id="global_rad" style="padding-left: 10%; padding-right: 10%"></div><hr><br>
   <div id="nett_rad" style="padding-left: 10%; padding-right: 10%"></div><hr><br>
   <div id="reflective_rad" style="padding-left: 10%; padding-right: 10%"></div><hr><br>
   <div id="sunshine" style="padding-left: 10%; padding-right: 10%"></div><hr><br>
   <div id="battery" style="padding-left: 10%; padding-right: 10%"></div><hr> -->

   <script type="text/javascript">
		Highcharts.chart('diffuse_rad', {
		    chart: {
		        type: 'line'
		    },
		    title: {
		        text: 'diffuse_rad<hr>'
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
		        name: 'Waktu',
		        data: [<?php echo join(array_reverse($rad), ',') ?>]
		    }]
		});

		Highcharts.chart('diffuse_rad2', {
		    chart: {
		        type: 'line'
		    },
		    title: {
		        text: 'diffuse_rad rata-rata'
		    },
		    subtitle: {
		        text: 'Source: BMKG'
		    },
		    xAxis: {
		    	categories : [
		    	<?php echo $id1 ?>
		    	]
		    },
		    yAxis: {
		        title: {
		            text: 'diffuse_rad'
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
		        name: 'rata-rata diffuse_rad perhari',
		        data: [<?php echo join(array_reverse($avgdiff), ',') ?>]
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
		        name: 'Waktu',
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
		        name: 'Waktu',
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
		        name: 'Waktu',
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
		        name: 'Waktu',
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
		        name: 'Waktu',
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
		        name: 'Waktu',
		        data: [<?php echo join(array_reverse($battery), ',') ?>]
		    }]
		});
   </script>
</body>
   
</html>