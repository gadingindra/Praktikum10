<?php
    include('db_covid.php');
    $label = ["India","Japan","South Korea","Turkey","Vietnam","Taiwan","Iran","Indonesia","Malaysia","Israel"];

    for($country = 1;$country < 11;$country++)
    {
        $query = mysqli_query($koneksi,"select total_case from angka_penderita where id='$country'");
        $row = $query->fetch_array();
        $jumlah_kasus[] = $row['total_case'];
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bar Chart Covid-19 pada 10 Negara di Asia</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div style="width: 800px;height: 800px">
		<canvas id="myChart"></canvas>
	</div>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($label); ?>,
				datasets: [{
					label: 'Grafik Covid-19 pada 10 Negara di Asia',
					data: <?php echo json_encode($jumlah_kasus); ?>,
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>