<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"  style="background:#0CB5D3;"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a>SMK WIKRAMA BOGOR</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a >WK</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">RPL PRIDE - Gen16</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-pen"></i><span>Input</span></a>
                <ul class="dropdown-menu">

                  <?php if($_SESSION['hak'] == 'kepsek'):?>

                  <li><a class="nav-link" href="<?= base_url('siswa') ?>">Siswa</a></li>
                  <li><a class="nav-link" href="<?= base_url('guru') ?>">Guru</a></li>
                  <li><a class="nav-link" href="<?= base_url('kurikulum') ?>">Kurikulum</a></li>
                  <li><a class="nav-link" href="<?= base_url('kepala_sekolah') ?>">kepala sekolah</a></li>
                  <li><a class="nav-link" href="<?= base_url('User') ?>">User</a></li>

                  <?php elseif($_SESSION['hak'] == 'kurikulum'):?>

                  <li><a class="nav-link" href="<?= base_url('siswa') ?>">Siswa</a></li>
                  <li><a class="nav-link" href="<?= base_url('guru') ?>">Guru</a></li>
                    
                  <?php elseif($_SESSION['hak'] == 'guru'):?> 

                    <li><a class="nav-link" href="<?= base_url('kurikulum') ?>">Kurikulum</a></li>
                    <li><a class="nav-link" href="<?= base_url('siswa') ?>">Siswa</a></li>
                    
                  <?php elseif($_SESSION['hak'] == 'siswa'):?> 
                    
                    <li><a class="nav-link" href="<?= base_url('siswa') ?>">Siswa</a></li>

                  <?php endif ?>
                </ul>
              </li>
            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="<?= base_url('Auth/logout') ?>" class="btn btn-info btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i> Logout.
              </a>
            </div>
        </aside>
      </div>
    </div>
  </div>