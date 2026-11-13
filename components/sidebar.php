<aside class="sidebar">
    <div class="user-profile">
        <img src="<?= e(app_url('assets/image/users-profile.png')) ?>" alt="Foto profil">
        <span>User</span>
    </div>

    <a href="<?= e(app_url('index.php')) ?>" class="sidebar-menu<?= $currentPage === 'home' ? ' active' : '' ?>">
        <i class="fa-solid fa-house" aria-hidden="true"></i> Home
    </a>
    <a href="<?= e(app_url('pages/users/profile.php')) ?>" class="sidebar-menu<?= $currentPage === 'profile' ? ' active' : '' ?>">
        <img src="<?= e(app_url('assets/image/user-profile-circle.png')) ?>" alt=""> Profile
    </a>
    <a href="#" class="sidebar-menu">
        <img src="<?= e(app_url('assets/image/diamond.png')) ?>" alt=""> Badge &amp; Level
    </a>
    <a href="#" class="sidebar-menu">
        <img src="<?= e(app_url('assets/image/file-edit-02.png')) ?>" alt=""> Keranjang
    </a>
    <a href="#" class="sidebar-menu">
        <img src="<?= e(app_url('assets/image/discount-star-02-1.png')) ?>" alt=""> Alamat
    </a>
    <a href="#" class="sidebar-menu setting">
        <img src="<?= e(app_url('assets/image/settings.png')) ?>" alt=""> Setting
    </a>
    <a href="#" class="sidebar-menu logout">
        <i class="fa-solid fa-arrow-right-from-bracket" aria-hidden="true"></i> Logout
    </a>
</aside>
