<?php
$restaurants = [
    [
        'name' => 'CW Coffee Gajah Mada',
        'image' => 'cw-coffee.png',
        'rating' => '4.7',
        'reviews' => '980'
    ],
    [
        'name' => 'Mie Gacoan Karya Baru',
        'image' => 'mie-gacoan.png',
        'rating' => '4.7',
        'reviews' => '980'
    ],
    [
        'name' => 'KFC Karya Baru',
        'image' => 'KFC.png',
        'rating' => '4.7',
        'reviews' => '980'
    ]
];

$payments = [
    'Visa.png',
    'master.png',
    'bca.png',
    'qris.png',
    'seabank.png',
    'Mandiri.png'
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page - RasaSpot</title>
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
            padding: 28px 36px;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .top-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .search-box {
            flex: 1;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 6px 18px 6px 42px;
            border-radius: 30px;
            border: 2px solid #1a1a1a;
            background-color: #F97316;
            color: #ffffff;
            font-size: 14px;
            outline: none;
            font-weight: 500;
            cursor: pointer;
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

        .header-icons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .icon-btn {
            background: transparent;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-btn img {
            width: 26px;
            height: 26px;
            object-fit: contain;
        }

        .banner-container {
            width: 100%;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(0,0,0,0.1);
        }

        .banner-container img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
        }

        .section-title {
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 12px;
            color: #000000;
        }

        .resto-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .resto-card {
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            border: 1px solid #e2e8f0;
        }

        .resto-card img {
            width: 100%;
            height: 125px;
            object-fit: cover;
        }

        .resto-info {
            padding: 12px 14px;
        }

        .resto-title {
            font-size: 13px;
            font-weight: 700;
            color: #1a1a1a;
        }

        .resto-rating {
            font-size: 11px;
            color: #666666;
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .resto-rating i {
            color: #f59e0b;
        }

        .filter-section-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            align-items: start;
        }

        .dropdown-trigger {
            width: 100%;
            padding: 10px 16px;
            border-radius: 8px;
            border: none;
            background-color: #F97316;
            font-weight: 700;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            user-select: none;
            font-size: 14px;
        }

        .dropdown-trigger i {
            transition: transform 0.3s ease;
        }

        .dropdown-trigger.active i {
            transform: rotate(180deg);
        }

        .filter-box-wrapper {
            display: none;
            background-color: #ffffff;
            border: 2px solid #F97316;
            border-radius: 8px;
            padding: 12px;
            margin-top: 8px;
            animation: fadeIn 0.2s ease-in-out;
        }

        .filter-box-wrapper.show {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .filter-list-content {
            display: flex;
            width: 100%;
            flex-direction: column;
            gap: 8px;
        }

        .menu-item {
            background: #fffbeebf;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
            color: #1a1a1a;
            border: 1px solid #FCD276;
            cursor: pointer;
            text-align: center;
            transition: all 0.2s ease;
        }

        .menu-item:hover {
            background: #FCD276;
        }

        .footer-container {
            background-color: #ffffff;
            padding: 35px 60px;
            display: grid;
            grid-template-columns: 1.2fr 1.2fr 2fr 1.2fr;
            gap: 30px;
            align-items: flex-start;
            border-top: 2px solid #1a1a1a;
        }

        .footer-col h4 {
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 14px;
            text-transform: uppercase;
            color: #000000;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333333;
        }

        .payment-methods-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px 20px;
            align-items: center;
            max-width: 320px;
        }

        .payment-methods-grid img {
            width: 100%;
            max-width: 85px;
            height: 35px;
            object-fit: contain;
        }

        .social-links li {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="app-container">
        <div class="main-layout">
            
            <aside class="sidebar">
                <div class="user-profile">
                    <img src="assest/image/users-profile.png" alt="User Profile" onerror="this.src='assest/image/user-profile-circle.png'">
                    <span>User</span>
                </div>

                <a href="index.php" class="sidebar-menu">
                    <i class="fa-solid fa-house"></i> Home
                </a>
                <a href="pages/users/profile.php" class="sidebar-menu">
                    <img src="assest/image/user-profile-circle.png" alt="Profile"> Profile
                </a>
                <a href="#" class="sidebar-menu">
                    <img src="assest/image/diamond.png" alt="Badge"> Badge & Level
                </a>
                <a href="#" class="sidebar-menu">
                    <img src="assest/image/file-edit-02.png" alt="Keranjang"> Keranjang
                </a>
                <a href="#" class="sidebar-menu">
                    <img src="assest/image/discount-star-02-1.png" alt="Alamat"> Alamat
                </a>
                <a href="#" class="sidebar-menu setting">
                    <img src="assest/image/settings.png" alt="Setting"> Setting
                </a>
                <a href="#" class="sidebar-menu logout">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                </a>
            </aside>

            <main class="content-area">
                
                <div class="top-header">
                    <div class="search-box">
                        <i class="fa-solid fa-magnifying-glass search-icon"></i>
                        <input type="text" placeholder="Cari makanan, restoran..." onclick="window.location.href='pages/search/search-menu.php'" readonly>
                    </div>
                    <div class="header-icons">
                        <button class="icon-btn">
                            <img src="assest/image/bell-03.png" alt="Notification">
                        </button>
                        <button class="icon-btn">
                            <i class="fa-solid fa-heart" style="color: #ff3b30; font-size: 24px;"></i>
                        </button>
                    </div>
                </div>

                <div class="banner-container">
                    <img src="assest/image/RasaSpotBanner.jpg" alt="Promo RasaSpot">
                </div>

                <div>
                    <h3 class="section-title">Pilih Restoran</h3>
                    <div class="resto-grid">
                        <?php foreach ($restaurants as $resto): ?>
                        <div class="resto-card">
                            <img src="assest/image/<?= $resto['image']; ?>" alt="<?= $resto['name']; ?>">
                            <div class="resto-info">
                                <div class="resto-title"><?= $resto['name']; ?></div>
                                <div class="resto-rating"><i class="fa-solid fa-star"></i> <?= $resto['rating']; ?> (<?= $resto['reviews']; ?>)</div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="filter-section-grid">
                    
                    <div>
                        <h3 class="section-title">Budget</h3>
                        <div class="dropdown-trigger" onclick="toggleDropdown('budget-box', this)">
                            <span id="selected-budget">Semua Budget</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        
                        <div id="budget-box" class="filter-box-wrapper">
                            <div class="filter-list-content">
                                <div class="menu-item" onclick="selectItem('budget', '< Rp 20.000')">< Rp 20.000</div>
                                <div class="menu-item" onclick="selectItem('budget', 'Rp 20.000 - Rp 50.000')">Rp 20.000 - Rp 50.000</div>
                                <div class="menu-item" onclick="selectItem('budget', '> Rp 50.000')">> Rp 50.000</div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="section-title">Filter Alergi</h3>
                        <div class="dropdown-trigger" onclick="toggleDropdown('alergi-box', this)">
                            <span id="selected-alergi">Semua Alergi</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        
                        <div id="alergi-box" class="filter-box-wrapper">
                            <div class="filter-list-content">
                                <div class="menu-item" onclick="selectItem('alergi', 'Bebas Kacang')">Bebas Kacang</div>
                                <div class="menu-item" onclick="selectItem('alergi', 'Bebas Seafood')">Bebas Seafood</div>
                                <div class="menu-item" onclick="selectItem('alergi', 'Bebas Laktosa')">Bebas Laktosa</div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="section-title">Filter Jarak</h3>
                        <div class="dropdown-trigger" onclick="toggleDropdown('jarak-box', this)">
                            <span id="selected-jarak">Semua Jarak</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        
                        <div id="jarak-box" class="filter-box-wrapper">
                            <div class="filter-list-content">
                                <div class="menu-item" onclick="selectItem('jarak', '< 1 km')">< 1 km</div>
                                <div class="menu-item" onclick="selectItem('jarak', '1 km - 3 km')">1 km - 3 km</div>
                                <div class="menu-item" onclick="selectItem('jarak', '> 3 km')">> 3 km</div>
                            </div>
                        </div>
                    </div>

                </div>

            </main>

        </div>

        <footer class="footer-container">
            <div class="footer-col">
                <h4>CUSTOMER SERVICE</h4>
                <ul>
                    <li>Help Centre</li>
                    <li>How To Buy</li>
                    <li>How To Sell</li>
                    <li>Payment Methods</li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>ABOUT FoodSpot</h4>
                <ul>
                    <li>About Us</li>
                    <li>FoodSpot Careers</li>
                    <li>Policies</li>
                    <li>FoodSpot Privacy Policy</li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>PEMBAYARAN</h4>
                <div class="payment-methods-grid">
                    <?php foreach ($payments as $payImg): ?>
                        <img src="assest/image/<?= $payImg; ?>" alt="Payment Logo">
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="footer-col">
                <h4>FOLLOW US</h4>
                <ul class="social-links">
                    <li><i class="fa-brands fa-facebook"></i> Facebook</li>
                    <li><i class="fa-brands fa-instagram"></i> Instagram</li>
                    <li><i class="fa-brands fa-linkedin"></i> LinkedIn</li>
                </ul>
            </div>
        </footer>

    </div>

    <script>
        function toggleDropdown(boxId, triggerEl) {
            const boxEl = document.getElementById(boxId);
            boxEl.classList.toggle('show');
            triggerEl.classList.toggle('active');
        }

        function selectItem(type, value) {
            if (type === 'budget') {
                document.getElementById('selected-budget').innerText = value;
            } else if (type === 'alergi') {
                document.getElementById('selected-alergi').innerText = value;
            } else if (type === 'jarak') {
                document.getElementById('selected-jarak').innerText = value;
            }
        }
    </script>

</body>
</html>