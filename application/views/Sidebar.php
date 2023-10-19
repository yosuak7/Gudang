<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark " id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link" href="<?php echo base_url('Beranda') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Transaksi
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo base_url('Beranda/barangmasuk') ?>">Barang Masuk</a>
                            <a class="nav-link" href="<?php echo base_url('Beranda/barangkeluar') ?>">Barang Keluar</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Data
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo base_url('Beranda/laporandatabarang') ?>">Data Barang</a>
                            <a class="nav-link" href="<?php echo base_url('Beranda/datacustomer') ?>">Data Customer</a>
                            <a class="nav-link" href="<?php echo base_url('Beranda/datasupplier') ?>">Data Supplier</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Settings</div>
                    <a class="nav-link" href="<?php echo base_url('Beranda/profile') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-solid fa-user"></i></div>
                        Profile
                    </a>
                    <a class="nav-link" href="<?php echo base_url('Beranda/users') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-solid fa-users"></i></div>
                        Users
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <a>Logged in as: <?= $this->session->userdata('name') ?></a>
            </div>
        </nav>
    </div>