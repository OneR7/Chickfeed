<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo BASEURL; ?>/?controller=beranda" class="brand-link">
        <img src="public/img/logoo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">ChickFeed</span>
    </a>
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="public/img/peternak.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['username']?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo BASEURL; ?>/?controller=beranda" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a href="<?php echo BASEURL; ?>/?controller=jadwal" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Jadwal
                        </p>
                    </a>
                </li>
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a href="<?php echo BASEURL; ?>/?controller=stokpakan" class="nav-link">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>
                            Stok Pakan
                        </p>
                    </a>
                </li>
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a href="<?php echo BASEURL; ?>/?controller=logout" class="nav-link text-red">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
                <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalLogout">
                    Logout
                </button> -->
            </ul>
        </nav>
    </div>

    <!-- <div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="modalLogoutLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLogoutLabel">Tambah Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo BASEURL; ?>/?controller=logout">
                        <div class="form-group">
                            <label>Apakah anda yakin ingin logout ?</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
</aside>
<div class="content-wrapper">