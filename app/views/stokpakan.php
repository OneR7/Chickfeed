<!-- Main content -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">
            Stok Pakan
            </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?php
foreach($data['stok_pakan'] as $stok) {
    if ($stok['stok_pakan'] < 500) {
        echo "<div class='alert alert-danger' role='alert'> Stok pakan ayam saat ini: " . $stok['stok_pakan'] . " gram. Mohon isi stok pakan kembali. </div>";
    }
}
?>
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card" >
            <div class="card-header">
            <h3 class="card-title">Data Stok Pakan Ayam</h3>
            </div>
            <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>No</th>
                <th>Berat/Gram</th>
                <!-- <th>Action</th> -->
                </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    <?php foreach($data['stok_pakan'] as $stok): ?>
                        <tr>
                            <td><?php echo $index++; ?></td>
                            <td><?php echo $stok['stok_pakan']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
</section>