<div class="sidebar">
    <div class="logo-details">
        <i><img src="<?= base_url(); ?>/icon.PNG" alt=""></i>
        <span class="logo_name"><img src="<?= base_url(); ?>/logo.PNG" alt=""><br>UBJOM PLTMG ARUN</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="<?= base_url('/'); ?>" <?php if ($request->uri->getSegment(1) == "") {
                                                echo 'class="active"';
                                            } ?>>
                <i class='bx bxs-home'></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <?php if (user()->id_bidang && user()->jabatan) : ?>
            <li>
                <a href="<?= base_url('data'); ?>" <?php if ($request->uri->getSegment(1) == "data") {
                                                        echo 'class="active"';
                                                    } ?>>
                    <i class='bx bxs-data'></i>
                    <span class="links_name">Data</span>
                </a>
            </li>
        <?php endif ?>
        <?php if (user()->id_bidang) : ?>
            <li>
                <a href="<?= base_url('bidang'); ?>" <?php if ($request->uri->getSegment(1) == "bidang" || $request->uri->getSegment(1) == "revisi") {
                                                            echo 'class="active"';
                                                        } ?>>
                    <i class='bx bxs-folder-open'></i>
                    <span class="links_name"><?= $divisi['nama']; ?></span>
                </a>
            </li>
        <?php endif ?>
        <?php if (in_groups('MRK')) : ?>
            <li>
                <a href="<?= base_url('mrk'); ?>" <?php if ($request->uri->getSegment(1) == "mrk") {
                                                        echo 'class="active"';
                                                    } ?>>
                    <i class='bx bx-check-double'></i>
                    <span class="links_name">MRK</span>
                </a>
            </li>
        <?php endif; ?>
        <?php if (in_groups('MMK')) : ?>
            <li>
                <a href="<?= base_url('mmk'); ?>" <?php if ($request->uri->getSegment(1) == "mmk") {
                                                        echo 'class="active"';
                                                    } ?>>
                    <i class='bx bx-check-double'></i>
                    <span class="links_name">MMK</span>
                </a>
            </li>
        <?php endif; ?>
        <?php if (in_groups('admin')) : ?>
            <li>
                <a href="<?= base_url('addbidang'); ?>" <?php if ($request->uri->getSegment(1) == "addbidang") {
                                                            echo 'class="active"';
                                                        } ?>>
                    <i class='bx bxs-folder-plus'></i>
                    <span class="links_name">Add Bidang</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin'); ?>" <?php if ($request->uri->getSegment(1) == "admin") {
                                                        echo 'class="active"';
                                                    } ?>>
                    <i class='bx bxs-user-account'></i>
                    <span class="links_name">User List</span>
                </a>
            </li>
        <?php endif; ?>

        <li class="log_out">
            <a href="<?= base_url('logout'); ?>" onclick="return confirm('Apakah Anda Yakin?');">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Log out</span>
            </a>
        </li>
    </ul>
</div>