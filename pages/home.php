<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../repositories/home-repository.php';

 $restaurants = getRestaurants();
 $payments = getPaymentMethods();
$currentPage = 'home';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - RasaSpot</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= e(app_url('styles/base.css')) ?>">
    <link rel="stylesheet" href="<?= e(app_url('styles/components/sidebar.css')) ?>">
    <link rel="stylesheet" href="<?= e(app_url('styles/components/footer.css')) ?>">
    <link rel="stylesheet" href="<?= e(app_url('styles/pages/home.css')) ?>">
</head>
<body>
    <div class="app-container">
        <div class="main-layout">
            <?php require __DIR__ . '/../components/sidebar.php'; ?>

            <main class="content-area">
                <header class="top-header">
                    <a class="search-box search-link" href="<?= e(app_url('pages/search/search-menu.php')) ?>">
                        <i class="fa-solid fa-magnifying-glass search-icon" aria-hidden="true"></i>
                        <span>Cari makanan, restoran...</span>
                    </a>
                    <div class="header-icons">
                        <button class="icon-btn" type="button" aria-label="Notifikasi">
                            <img src="<?= e(app_url('assets/image/bell-03.png')) ?>" alt="">
                        </button>
                        <button class="icon-btn favorite-btn" type="button" aria-label="Favorit">
                            <i class="fa-solid fa-heart" aria-hidden="true"></i>
                        </button>
                    </div>
                </header>

                <div class="banner-container">
                    <img src="<?= e(app_url('assets/image/RasaSpotBanner.jpg')) ?>" alt="Promo RasaSpot">
                </div>

                <section aria-labelledby="restaurant-heading">
                    <h1 class="section-title" id="restaurant-heading">Pilih Restoran</h1>
                    <div class="resto-grid">
                        <?php foreach ($restaurants as $restaurant): ?>
                            <article class="resto-card">
                                <img src="<?= e(app_url('assets/image/' . $restaurant['image'])) ?>" alt="<?= e($restaurant['name']) ?>">
                                <div class="resto-info">
                                    <h2 class="resto-title"><?= e($restaurant['name']) ?></h2>
                                    <p class="resto-rating">
                                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                                        <?= e($restaurant['rating']) ?> (<?= e($restaurant['reviews']) ?> ulasan)
                                    </p>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>

                <section class="filter-section-grid" aria-label="Filter menu">
                    <?php
                    $filters = [
                        'budget' => [
                            'label' => 'Budget',
                            'default' => 'Semua Budget',
                            'options' => ['< Rp 20.000', 'Rp 20.000 - Rp 50.000', '> Rp 50.000'],
                        ],
                        'alergi' => [
                            'label' => 'Filter Alergi',
                            'default' => 'Semua Alergi',
                            'options' => ['Bebas Kacang', 'Bebas Seafood', 'Bebas Laktosa'],
                        ],
                        'jarak' => [
                            'label' => 'Filter Jarak',
                            'default' => 'Semua Jarak',
                            'options' => ['< 1 km', '1 km - 3 km', '> 3 km'],
                        ],
                    ];
                    ?>
                    <?php foreach ($filters as $type => $filter): ?>
                        <div class="filter-group">
                            <h2 class="section-title"><?= e($filter['label']) ?></h2>
                            <button class="dropdown-trigger" type="button" aria-expanded="false" aria-controls="<?= e($type) ?>-box">
                                <span id="selected-<?= e($type) ?>"><?= e($filter['default']) ?></span>
                                <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
                            </button>
                            <div id="<?= e($type) ?>-box" class="filter-box-wrapper">
                                <div class="filter-list-content">
                                    <?php foreach ($filter['options'] as $option): ?>
                                        <button class="menu-item" type="button" data-filter-type="<?= e($type) ?>" data-filter-value="<?= e($option) ?>">
                                            <?= e($option) ?>
                                        </button>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>
            </main>
        </div>

        <?php require __DIR__ . '/../components/footer.php'; ?>
    </div>
    <script src="<?= e(app_url('assets/js/home.js')) ?>" defer></script>
</body>
</html>
