<?php
session_start();
include "includes/db_con.php"; ?>
<?php include "admin_functions.php"; ?>
<?php
if (isset($_POST['create'])) {

    $dist_name = $_POST['district'];
    $block_name = $_POST['block'];
    $date = $_POST['date'];

    $day_value = $_POST['dayval'];
    $night_value = $_POST['nightval'];
    $average = ($day_value + $night_value) / 2;

    /* query for cheecking the value is exists or not */
    $rtq = "select * from noise_value where district_name='$dist_name' and block_name='$block_name' and day_value='$day_value' and night_value='$night_value' and date='$date'";
    
    $wrq = mysqli_query($connection, $rtq);
    if (mysqli_num_rows($wrq) > 0) {
        $_SESSION['exist'] = 'Data already Exists';
        header('refresh:2');
    } else {
        $query = "INSERT INTO noise_value (district_name, block_name, day_value, night_value, date, average) VALUES ('$dist_name','$block_name','$day_value', '$night_value', '$date', '$average')";

        $result = mysqli_query($connection, $query);

        if ($result == true) {
            $_SESSION['added'] = "Data successfully added";
            header('refresh:2');
        } else {
            echo "Query failed " . mysqli_error($connection);
        }
    }
}
?>

<!-- Header -->
<?php include "includes/header.php"; ?>

<div class="container">
    <?php if (isset($_SESSION['added'])) {
        data_added();
    } else if (isset($_SESSION['exist'])) {
        data_exists();
    }
    ?>

    <form class="form-control mt-5 p-4" action="" method="post">

        <h3>Upload Your Observation</h3>
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
        <div class="form-group">
            <label for="date">Select Date</label><br>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>
        <br>
        <div class="form-group">
            <label for="dayval">Daytime Value</label><br>
            <input type="number" id="dayval" name="dayval" step="0.1" class="form-control" required>
        </div>
        <br>
        <div class="form-group">
            <label for="nightval">Nighttime Value</label><br>
            <input type="number" id="nightval" name="nightval" step="0.1" class="form-control" required>
        </div>
        <br>

        <button type="submit" class="btn btn-success" name="create">Submit</button>
        <button type="reset" class="btn btn-warning">Reset</button>

    </form>
</div>

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

<!-- Footer -->
<?php include "includes/footer.php"; ?>