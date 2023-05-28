<?php
    include('db_covid.php');
    $negara = mysqli_query($koneksi,"select * from angka_penderita");
    while($row = mysqli_fetch_array($negara)){
        $nama_negara[] = $row['country'];
        
        $query = mysqli_query($koneksi,"select total_case from angka_penderita where id='".$row['id']."'");
        $row = $query->fetch_array();
        $jumlah_kasus[] = $row['total_case'];
    }
?>

<!doctype html>
<html>

<head>
	<title>Pie Chart</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>

<body>
	<div id="canvas-holder" style="width:50%">
		<h3>Pie Chart Total Cases</h3>
		<canvas id="piechart"></canvas>
	</div>
	<script>
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data:<?php echo json_encode($jumlah_kasus); ?>,
					backgroundColor: [
					'rgba(255, 0, 0, 0.2)', //merah
					'rgba(255, 127, 0, 0.2)', //jingga
					'rgba(255, 255, 0, 0.2)', //kuning
					'rgba(127, 255, 0, 0.2)', //hijau muda
                    'rgba(66, 118, 1, 0.2)', //hijau tua
					'rgba(74, 146, 214, 0.2)', //biru muda
					'rgba(0, 0, 255, 0.2)', //biru tua
                    'rgba(81, 226, 193, 0.2)', //aqua
					'rgba(249, 120, 170, 0.2)', //nila
					'rgba(127, 0, 255, 0.2)' //ungu
					],
					borderColor: [
                        'rgba(255, 0, 0, 1)', //merah
					'rgba(255, 127, 0, 1)', //jingga
					'rgba(255, 255, 0, 1)', //kuning
					'rgba(127, 255, 0, 1)', //hijau muda
                    'rgba(66, 118, 1, 1)', //hijau tua
					'rgba(74, 146, 214, 1)', //biru muda
					'rgba(0, 0, 255, 1)', //biru tua
                    'rgba(81, 226, 193, 1)', //aqua
					'rgba(249, 120, 170, 1)', //nila
					'rgba(127, 0, 255, 1)' //ungu
					],
					label: 'Presentase Penjualan Barang'
				}],
				labels: <?php echo json_encode($nama_negara); ?>},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('piechart').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});
	</script>
</body>

</html>