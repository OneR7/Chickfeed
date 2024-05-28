<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chickfeed";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
    $sql = "UPDATE kontrol SET status='$status' WHERE id=1";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$result = $conn->query("SELECT status FROM kontrol WHERE id=1");
$row = $result->fetch_assoc();
$current_status = $row['status'];
$conn->close();
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    Beranda
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?php
if ($data['stokpakan'] < 500) {
    echo '<div class="alert alert-danger" role="alert">Stok pakan ayam saat ini: ' . $data['stokpakan'] . 'gram. Mohon isi stok pakan kembali.</div>';
}
?>
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <a href="<?php echo BASEURL; ?>/?controller=jadwal">
                    <div class="info-box">
                        <div class="info_jadwal"></div>
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jadwal</span>
                            <div class="info-box-number"><?php echo $data['jadwal']; ?></div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
                <!-- /.info-box -->
            </div>

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-4">
                <a href="<?php echo BASEURL; ?>/?controller=stokpakan">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-inbox"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Stok Pakan</span>
                            <span class="info-box-number"><?php echo $data['stokpakan']; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
                <!-- /.info-box -->
            </div>
        </div>
        <style>
            .switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
            }

            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: grey;
                transition: .4s;
                border-radius: 34px;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                transition: .4s;
                border-radius: 50%;
            }

            input:checked+.slider {
                background-color: #2196F3;
            }

            input:checked+.slider:before {
                transform: translateX(26px);
            }
        </style>
        <script>
            function toggleStatus() {
                var status = document.getElementById('switch').checked ? 'ON' : 'OFF';
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("status=" + status);

                // Update status saat ini di halaman
                document.getElementById('status').innerText = status;

                if (status === 'ON') {
                    setTimeout(function () {
                        document.getElementById('switch').checked = false;
                        xhr.open("POST", "", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.send("status=OFF");
                        document.getElementById('status').innerText = 'OFF';
                    }, 10000);
                }
            }

            window.onload = function () {
                var currentStatus = '<?php echo $current_status; ?>';
                document.getElementById('switch').checked = (currentStatus === 'ON');
            }
        </script>
        <label class="switch">
            <input type="checkbox" id="switch" onclick="toggleStatus()">
            <span class="slider"></span>
        </label>
        <p>Status Alat Saat Ini : <span id="status"><?php echo $current_status; ?></span></p>

    </div><!--/. container-fluid -->
</section>

