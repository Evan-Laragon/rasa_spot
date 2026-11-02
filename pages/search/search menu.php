<?php
$menus = [
    [
        'name' => 'Soto Madura',
        'image' => 'soto madura.png',
        'rating' => '4.5',
        'reviews' => '620',
        'price' => 'Rp 25.000'
    ],
    [
        'name' => 'Iga Bakar Jumbo',
        'image' => 'iga bakar jumbo.png',
        'rating' => '4.9',
        'reviews' => '985',
        'price' => 'Rp 30.000'
    ],
    [
        'name' => 'Nasi Ayam Spesial',
        'image' => 'nasi ayam spesial.png',
        'rating' => '4.7',
        'reviews' => '980',
        'price' => 'Rp 28.000'
    ],
    [
        'name' => 'Nasi Padang',
        'image' => 'nasi padang.png',
        'rating' => '4.8',
        'reviews' => '432',
        'price' => 'Rp 25.000'
    ],
    [
        'name' => 'Ayam Geprek',
        'image' => 'ayam geprek.png',
        'rating' => '5.0',
        'reviews' => '1200',
        'price' => 'Rp 18.000'
    ],
    [
        'name' => 'Nasi Goreng gokil',
        'image' => 'nasi goreng gokil.png',
        'rating' => '5.0',
        'reviews' => '2180',
        'price' => 'Rp 20.000'
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodSpot Menu - RasaSpot</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #1a1a1a;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 4px;
        }

        .app-container {
            width: 100%;
            max-width: 1440px;
            min-height: calc(100vh - 8px);
            background-color: #FFFBEB;
            border-radius: 20px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .main-layout {
            display: flex;
            flex: 1;
        }

        .sidebar {
            width: 260px;
            background-color: #FFFBEB;
            padding: 28px 20px;
            border-right: 2px solid #1a1a1a;
            display: flex;
            flex-direction: column;
            gap: 10px;
            flex-shrink: 0;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 16px;
            padding-left: 4px;
            color: #000000;
        }

        .user-profile img {
            width: 36px;
            height: 36px;
            object-fit: cover;
            border-radius: 50%;
        }

        .sidebar-menu {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            background-color: #FCD276;
            border-radius: 8px;
            text-decoration: none;
            color: #000000;
            font-weight: 700;
            font-size: 14px;
            border: 1px solid rgba(0,0,0,0.08);
            transition: all 0.2s ease;
        }

        .sidebar-menu img {
            width: 20px;
            height: 20px;
            object-fit: contain;
        }

        .sidebar-menu:hover {
            background-color: #f7c355;
            transform: translateX(4px);
        }

        .sidebar-menu.setting {
            margin-top: 40px; 
        }

        .sidebar-menu.logout {
            margin-top: 0px; 
        }

        .content-area {
            flex: 1;
            padding: 28px 40px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            overflow-y: auto;
        }

        .page-title {
            font-size: 24px;
            font-weight: 800;
            color: #000000;
        }

        .search-filter-wrapper {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .search-box {
            flex: 1;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 8px 18px 8px 42px;
            border-radius: 30px;
            border: 2px solid #1a1a1a;
            background-color: #F97316;
            color: #ffffff;
            font-size: 14px;
            outline: none;
            font-weight: 500;
        }

        .search-box input::placeholder {
            color: #ffffff;
            opacity: 0.95;
        }

        .search-box .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #ffffff;
            font-size: 14px;
        }

        .filter-btn {
            background-color: #F97316;
            color: #ffffff;
            border: 2px solid #1a1a1a;
            padding: 8px 22px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-categories {
            display: flex;
            gap: 15px;
        }

        .category-dropdown {
            background-color: #F97316;
            color: #ffffff;
            border: 2px solid #1a1a1a;
            padding: 7px 16px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            justify-content: center;
            padding-bottom: 20px;
        }

        /* Ukuran kotak diperkecil proporsional, stroke tipis halus persis Figma */
        .menu-card {
            width: 100%;
            max-width: 285px;
            height: 235px;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #222222;
            box-shadow: 0 2px 6px rgba(0,0,0,0.04);
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .menu-card img.menu-img {
            width: 100%;
            height: 125px;
            object-fit: cover;
        }

        .menu-info {
            padding: 8px 12px;
            display: flex;
            flex-direction: column;
            gap: 2px;
            flex: 1;
        }

        .menu-title {
            font-size: 13px;
            font-weight: 700;
            color: #1a1a1a;
        }

        .menu-rating {
            font-size: 11px;
            color: #555555;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .menu-rating i {
            color: #f59e0b;
        }

        .menu-price {
            font-size: 12px;
            font-weight: 700;
            color: #1a1a1a;
            margin-top: 1px;
        }

        .btn-add {
            position: absolute;
            bottom: 8px;
            right: 10px;
            width: 26px;
            height: 26px;
            border: none;
            background: transparent;
            cursor: pointer;
        }

        .btn-add img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>
</head>
<body>

    <div class="app-container">
        <main class="main-layout">
            
            <aside class="sidebar">
                <div class="user-profile">
                    <img src="../../assest/image/users profile.png" alt="User Profile" onerror="this.src='../../assest/image/user-profile-circle.png'">
                    <span>User</span>
                </div>

                <a href="../../index.php" class="sidebar-menu">
                    <i class="fa-solid fa-house"></i> Home
                </a>
                <a href="../users/profile.php" class="sidebar-menu">
                    <img src="../../assest/image/user-profile-circle.png" alt="Profile"> Profile
                </a>
                <a href="#" class="sidebar-menu">
                    <img src="../../assest/image/diamond.png" alt="Badge"> Badge & Level
                </a>
                <a href="#" class="sidebar-menu">
                    <img src="../../assest/image/file-edit-02.png" alt="Keranjang"> Keranjang
                </a>
                <a href="#" class="sidebar-menu">
                    <img src="../../assest/image/discount-star-02-1.png" alt="Alamat"> Alamat
                </a>
                <a href="#" class="sidebar-menu setting">
                    <img src="../../assest/image/settings.png" alt="Setting"> Setting
                </a>
                <a href="#" class="sidebar-menu logout">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                </a>
            </aside>

            <div class="content-area">
                
                <h1 class="page-title">FoodSpot Menu</h1>

                <div class="search-filter-wrapper">
                    <div class="search-box">
                        <i class="fa-solid fa-magnifying-glass search-icon"></i>
                        <input type="text" placeholder="Cari makanan atau restoran...">
                    </div>
                    <button class="filter-btn">
                        <i class="fa-solid fa-sliders"></i> Filter
                    </button>
                </div>

                <div class="filter-categories">
                    <div class="category-dropdown">
                        Kategori <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="category-dropdown">
                        Rating <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="category-dropdown">
                        Harga <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="category-dropdown">
                        Jarak <i class="fa-solid fa-chevron-down"></i>
                    </div>
                </div>

                <div class="menu-grid">
                    <?php foreach ($menus as $menu): ?>
                    <div class="menu-card">
                        <img src="../../assest/image/<?= $menu['image']; ?>" alt="<?= $menu['name']; ?>" class="menu-img">
                        <div class="menu-info">
                            <div class="menu-title"><?= $menu['name']; ?></div>
                            <div class="menu-rating">
                                <i class="fa-solid fa-star"></i> <?= $menu['rating']; ?> (<?= $menu['reviews']; ?>)
                            </div>
                            <div class="menu-price"><?= $menu['price']; ?></div>
                        </div>
                        <button class="btn-add">
                            <img src="../../assest/image/tombol plus orange.png" alt="Tambah">
                        </button>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>

        </main>
    </div>

</body>
</html>