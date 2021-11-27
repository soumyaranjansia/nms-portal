<?php include "includes/db_con.php"; ?>
<?php include "functions.php"; ?>

<?php

$district_array = array();
$num_of_dist = 0;
$district_avg_value_array = array();

$query = "SELECT DISTINCT district_name FROM noise_value";
$result = mysqli_query($connection, $query);
if ($result == true) {
    while ($row = mysqli_fetch_assoc($result)) {
        $district_array[] = $row['district_name'];
        $num_of_dist++;
    }
}

for ($i = 0; $i < $num_of_dist; $i++) {
    $sum = 0;
    $no_of_records = 0;
    $q = "SELECT * FROM noise_value WHERE district_name = '$district_array[$i]'";
    $r = mysqli_query($connection, $q);

    if ($r == true) {
        while ($row = mysqli_fetch_assoc($r)) {
            $sum += $row['average'];
            $no_of_records++;
        }
    }
    $district_avg_value_array[] = $sum / $no_of_records;
}

header("refresh:60");

?>


<!-- Header -->
<?php include "includes/header.php"; ?>

<!-- Start of banner -->
<div class="container-fluid mt-5 p-5" style="height: 540px;">
    <div class="row">
        <div class="col-sm-6 p-5 text-center">
            <h1 style="font-size: 3rem; font-weight:bolder;">Just Promise Yourself That Ever Drive But Never Noise</h1>
            <p style="font-size: 1.2rem;">
                Study and Data Visulization of Odisha Noise Pollution
            </p>
            <a href="#dd" class="btn btn-secondary">Find Out More</a>
        </div>

        <div class="col-sm-6">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div><!-- End of banner -->

<div class="container" id="dd">

    <div class="row">
        <h2 class="text-center">Odisha State Dashboard</h2>
        <div class="col-sm-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name of District</th>
                        <th>Avg Noise at Daytime (in dB)</th>
                        <th>Avg Noise at Nighttime (in dB)</th>
                        <th>Average Noise (in dB)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php getDistrictAvgTable($district_array, $num_of_dist); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Here we include our JavaScript files -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/chart.min.js"></script>


<!-- real time data from mysqli for mychart -->
<script>
    // for fist graph

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($district_array); ?>,
            datasets: [{
                label: 'Noise in dB',
                data: <?php echo json_encode($district_avg_value_array); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?php include "includes/footer.php" ?>