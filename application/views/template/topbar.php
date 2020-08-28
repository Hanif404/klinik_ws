</head>
  <body class="">
    <div class="page">
      <div class="page-main">
        <div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="./index.html">
                <img src="<?php echo base_url('assets/img/logo_basarnas.png')?>" class="header-brand-img" alt=" logo Basarnas"> Bina Potensi
              </a>
              <div class="d-flex order-lg-2 ml-auto">
                <!-- Notifikasi -->
                <div class="dropdown d-none d-md-flex">
                  <a class="nav-link icon" data-toggle="dropdown">
                    <i class="fe fe-bell"></i>
                    <span class="nav-unread"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url(<?php echo base_url('assets/img/images_home/user4.jpg')?>)"></span>
                      <div>
                        <strong>Nathan</strong> pushed new commit: Fix page load performance issue.
                        <div class="small text-muted">10 minutes ago</div>
                      </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/1.jpg)"></span>
                      <div>
                        <strong>Alice</strong> started new task: Tabler UI design.
                        <div class="small text-muted">1 hour ago</div>
                      </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/18.jpg)"></span>
                      <div>
                        <strong>Rose</strong> deployed new version of NodeJS REST Api V3
                        <div class="small text-muted">2 hours ago</div>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item text-center text-muted-dark">Mark all as read</a>
                  </div>
                </div>

                <!-- Profil -->
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(<?php echo base_url('assets/img/images_home/user4.jpg')?>)"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">Jane Pearson</span>
                      <small class="text-muted d-block mt-1">Bandung</small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="<?php echo base_url('profil') ?>">
                      <i class="dropdown-icon fe fe-user"></i> Profile
                    </a>
                    <a class="dropdown-item" href="<?php echo base_url('landing')?>">
                      <i class="dropdown-icon fe fe-log-out"></i> Log out
                    </a>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="<?php echo base_url('home')?>" class="nav-link active"><i class="fe fe-home"></i> Home</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i>Diklat</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="<?php echo base_url('diklat/Pengajuan') ?>" class="dropdown-item ">Pengajuan Diklat</a>
                      <a href="<?php echo base_url('diklat/Penilaian') ?>"" class="dropdown-item ">Penilaian</a>
                    </div>
                  </li>
                  <!--<li class="nav-item dropdown">
                    <a href="<?php echo base_url('diklat/sertifikat') ?>" class="nav-link" data-toggle="dropdown"><i class="fe fe-file"></i>Sertifikat</a>
                  </li>-->
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown"><i class="fe fe-calendar"></i> Potensi</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="<?php echo base_url('potensi')?>" class="dropdown-item ">Pengajuan Operasi</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>