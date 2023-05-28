<?php
    include('db_covid.php');
    $label = ["India","Japan","South Korea","Turkey","Vietnam","Taiwan","Iran","Indonesia","Malaysia","Israel"];

    // Query untuk line chart dan bar chart
    for($country = 1;$country < 11;$country++)
    {
        $query = mysqli_query($koneksi,"select total_recovered from angka_penderita where id='$country'");
        $row = $query->fetch_array();
        $jumlah_kasus[] = $row['total_recovered'];
    }

    // Query untuk pie chart dan doughnut chart
    $negara = mysqli_query($koneksi,"select * from angka_penderita");
    while($row2 = mysqli_fetch_array($negara)){
        $nama_negara[] = $row2['country'];
        
        $query = mysqli_query($koneksi,"select total_recovered from angka_penderita where id='".$row2['id']."'");
        $row2 = $query->fetch_array();
        $jumlah_kasus2[] = $row2['total_recovered'];
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Chart Covid-19 pada 10 Negara di Asia</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div style="width: 800px;height: 800px">
		<h3>Line Chart Total Recovered</h3>
        <canvas id="lineChart"></canvas>
        <h3>Bar Chart Total Recovered</h3>
		<canvas id="barChart"></canvas>
	</div>
    <br><br><br><br><br><br>
    <div id="canvas-holder" style="width:60%">
		<h3>Pie Chart Total Recovered</h3>
		<canvas id="piechart"></canvas>
	</div>
    <div id="canvas-holder" style="width:60%">
        <h3>Doughnut Chart Total Recovered</h3>
		<canvas id="doughnutchart"></canvas>
	</div>

	<script>
        // Penggunaan Chart.js untuk membuat line chart dengan data yang diambil dari PHP
		var ctx = document.getElementById("lineChart").getContext('2d');
		var lineChart = new Chart(ctx, {
			type: 'line',
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

        // Penggunaan Chart.js untuk membuat bar chart dengan data yang diambil dari PHP
        var ctx = document.getElementById("barChart").getContext('2d');
		var barChart = new Chart(ctx, {
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

        // Penggunaan Chart.js untuk membuat pie chart dengan data yang diambil dari PHP
        var ctx = document.getElementById("piechart").getContext('2d');
        var piechart = new Chart(ctx, {
            type: 'pie',
			data: {
				datasets: [{
					data:<?php echo json_encode($jumlah_kasus2); ?>,
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
        });
		
        // Penggunaan Chart.js untuk membuat doughnut chart dengan data yang diambil dari PHP
        var doughnutChartctx = document.getElementById("doughnutchart").getContext('2d');
        var doughnutChart = new Chart(doughnutChartctx, {
            type: 'doughnut',
			data: {
				datasets: [{
					data:<?php echo json_encode($jumlah_kasus2); ?>,
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
        });

		// Menunggu hingga seluruh halaman selesai dimuat
		window.onload = function() {
			// Mendapatkan konteks rendering 2D dari elemen canvas dengan id "piechart"
			var ctx = document.getElementById('piechart').getContext('2d');		
			// Membuat objek Chart baru dengan menggunakan konteks rendering dan konfigurasi yang diberikan dalam variabel "config"
			window.myPie = new Chart(ctx, config);
		};

        // Event listener pada elemen dengan id 'randomizeData' yang akan dipicu ketika elemen tersebut diklik
		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

        // Event listener pada elemen dengan id 'addDataset' yang akan dipicu ketika elemen tersebut diklik
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

        window.onload = function() {
            // Mendapatkan konteks rendering 2D dari elemen canvas dengan id "doughnutchart"
			var ctx = document.getElementById('doughnutchart').getContext('2d');
			window.myDoughnut = new Chart(doughnutChartctx, config);
		};

        // Event listener pada elemen dengan id 'randomizeData' yang akan dipicu ketika elemen tersebut diklik
        document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myDoughnut.update();
		});

        // Event listener pada elemen dengan id 'addDataset' yang akan dipicu ketika elemen tersebut diklik
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
			window.myDoughnut.update();
		});
	</script>
</body>
</html>