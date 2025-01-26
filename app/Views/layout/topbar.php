<nav>
    <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard"><?= $menu; ?></span>
    </div>
    <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search'></i>
    </div> -->
    <div class="profile-details" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="<?= base_url('profileIMG/' . user()->user_image); ?>" alt="">
        <span class="admin_name"><?= user()->fullname; ?><br><span class="jabatan"><?= user()->email; ?></span></span>
        <i class='bx bx-chevron-down'></i>
    </div>
    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
        <li><a class="dropdown-item" href="<?= base_url('profile'); ?>">Profile</a></li>
        <li><a class="dropdown-item" href="<?= base_url('password'); ?>">Ubah Password</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a href="<?= base_url('logout'); ?>" class="dropdown-item" onclick="return confirm('Apakah Anda Yakin?');">Logout</a></li>
    </ul>
</nav>