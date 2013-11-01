<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="refresh" content="5">

		<LINK href="styles.css" rel="stylesheet" type="text/css">

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Nick's Raspberry Pi</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
<?php
	try{
		$dbh = new PDO('sqlite:/var/www/realtime_data.db');
		foreach($dbh->query('select * from Temperatures') as $row)
		{
			$result_temp[] = $row['Temp'];
			$result_count[] = $row['Count'];
		}
	   }
	catch(PDOException $e) {
		echo $e->getMessage();
	   }
?>

$(function () {
        $('#container').highcharts({
            title: {
                text: 'Sensor Temperatures',
                x: -20 //center
            },
            subtitle: {
                text: 'Last 4 Days',
                x: -20
            },
            xAxis: {
                categories: [<?php echo join($result_time, ',') ?>]
            },
            yAxis: {
                title: {
                    text: 'Temperature (°C)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '°C'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Sensor 1',
                data: [<?php echo join($result_temp, ',') ?>]
            }]
        });
    });
    

		</script>
	</head>
	<body>
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<center>
<?php
	print ("<table id=\"sensor\">
	       <th>Time</th>
	       <th>Temp</th>
               <th>Sample #</th>");
	try{
		$dbh = new PDO('sqlite:/var/www/realtime_data.db');
		$rc = 1;
		foreach($dbh->query('select * from Temperatures') as $row)
		{
			if($rc%2 ==0)
			{
				print("<tr class=\"alt\">");
				print("<td>". $row['Time'] ."</td>");
				print("<td>". $row['Temp'] ."</td>");
				print("<td>". $row['Count'] ."</td>");
                                print("</tr>");  
			}
			else
			{
				print("<tr>");
				print("<td>". $row['Time'] ."</td>");
				print("<td>". $row['Temp'] ."</td>");
				print("<td>". $row['Count'] ."</td>");
                                print("</tr>");	
			}
			$rc = $rc + 1;
		}
	   }
	catch(PDOException $e) {
		echo $e->getMessage();
	   }
	print("</table>");
?>
</center>
	</body>
</html>
