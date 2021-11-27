<?php include "includes/db_con.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "functions.php"; ?>

<?php

$dist_name = "";
$block_name = "";

if (isset($_POST['show'])) {
    $dist_name = $_POST['district'];
    $block_name = $_POST['block'];

    $query = "SELECT * FROM noise_value WHERE block_name = '$block_name' ORDER BY date";
    $result = mysqli_query($connection, $query);

    $day_value_array = array();
    $night_value_array = array();
    $date_array = array();

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $day_value_array[] = $row['day_value'];
            $night_value_array[] = $row['night_value'];
            $date_array[] = $row['date'];
        }
    } else {
        echo "No Record Found !!!";
    }
}

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 p-5">
            <h4 class="text-center">Block Wise Noise Visualization</h4>
            <form action="" method="post" class="form-control p-4">

                <div class="form-group">
                    <label for="district">Select District</label>
                    <select class="form-select" name="district" id="district" onchange="fetchBlock(this.value)" required>
                        <option value="">-- Select --</option>
                        <?php getDistrictInOptionForm(); ?>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="block">Select Block</label>
                    <select class="form-select" name="block" id="block" required>
                        <option value="">-- Select --</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-outline-success" name="show">Show</button>
                <button type="reset" class="btn btn-outline-warning">Reset</button>

            </form>
        </div> <!-- End of col-sm-6 -->

        <div class="col-sm-6 p-5">
            <h4 class="text-center"><?php echo $dist_name . " : " . $block_name; ?></h4>
            <div class="chartCase">
                <canvas id="myChart"></canvas>
            </div>

        </div> <!-- End of col-sm-6 -->

    </div>

</div>

<script type="text/javascript" src="js/chart.min.js"></script>

<script type="text/javascript">
    function fetchBlock(id) {
        $('#block').html('');
        $.ajax({
            type: 'post',
            url: 'ajaxdata.php',
            data: {
                dist_name: id
            },
            success: function(data) {
                $('#block').html(data);
            }
        })
    }
</script>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($date_array); ?>,
            datasets: [{
                    label: 'Daytime Noise in dB',
                    data: <?php echo json_encode($day_value_array); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Nighttime Noise in dB',
                    data: <?php echo json_encode($night_value_array); ?>,
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }
            ]
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

<?php include "includes/footer.php"; ?>