<!-- Main content -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    Jadwal
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Jadwal Pemberian Pakan Ayam</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modalTambahJadwal">
                            Tambah Jadwal
                        </button>
                        <br></br>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jam</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['alljadwal'] as $index => $jadwal): ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?php echo $jadwal['waktu']; ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-danger"
                                                href="<?php echo BASEURL; ?>/?controller=jadwal&method=hapus_jadwal&id_jadwal=<?php echo $jadwal['id_jadwal']; ?>&id_peternak=<?php echo $_SESSION['id_peternak']; ?>">
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="modal fade" id="modalTambahJadwal" tabindex="-1" role="dialog"
                    aria-labelledby="modalTambahJadwalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahJadwalLabel">Tambah Jadwal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulir Tambah Jadwal -->
                                <form method="post"
                                    action="<?php echo BASEURL; ?>/?controller=jadwal&method=tambah_jadwal">
                                    <div class="form-group">
                                        <label for="waktu">Waktu</label>
                                        <input type="time" step="1" class="form-control" id="waktu" name="waktu"
                                            placeholder="Masukkan Waktu" value="00:00:00">
                                    </div>
                                    <!-- Tambahkan bidang formulir lainnya sesuai kebutuhan -->
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="hapusJadwal" tabindex="-1" role="dialog"
                    aria-labelledby="modalHapusJadwalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalHapusJadwalLabel">Hapus Jadwal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulir Tambah Jadwal -->
                                <form method="post"
                                    action="<?php echo BASEURL; ?>/?controller=jadwal&method=tambah_jadwal">
                                    <div class="form-group">
                                        <label for="waktu">Waktu</label>
                                        <input type="time" step="1" class="form-control" id="waktu" name="waktu"
                                            placeholder="Masukkan Waktu" value="00:00:00">
                                    </div>
                                    <!-- Tambahkan bidang formulir lainnya sesuai kebutuhan -->
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>