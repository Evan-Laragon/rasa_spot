<?php
require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../repositories/menu-repository.php';
require_once __DIR__ . '/../../validations/search-validation.php';

$searchRequest = getSearchRequest($_GET);
$searchResult = validateSearch($searchRequest);
$query = $searchResult['value'];
$menus = $searchResult['error'] === '' ? getMenus($query) : [];
$currentPage = 'search';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - RasaSpot</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= e(app_url('styles/base.css')) ?>">
    <link rel="stylesheet" href="<?= e(app_url('styles/components/sidebar.css')) ?>">
    <link rel="stylesheet" href="<?= e(app_url('styles/pages/search-menu.css')) ?>">
</head>
<body>
    <div class="app-container">
        <main class="main-layout">
            <?php require __DIR__ . '/../../components/sidebar.php'; ?>

            <section class="content-area">
                <h1 class="page-title">FoodSpot Menu</h1>

                <form class="search-filter-wrapper" method="get" action="<?= e(app_url('pages/search/search-menu.php')) ?>">
                    <label class="search-box">
                        <i class="fa-solid fa-magnifying-glass search-icon" aria-hidden="true"></i>
                        <input type="search" name="q" value="<?= e($query) ?>" maxlength="100" placeholder="Cari makanan atau restoran..." aria-label="Cari menu">
                    </label>
                    <button class="filter-btn" type="submit">
                        <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i> Cari
                    </button>
                </form>

                <?php if ($searchResult['error'] !== ''): ?>
                    <p class="search-message" role="alert"><?= e($searchResult['error']) ?></p>
                <?php elseif ($query !== '' && $menus === []): ?>
                    <p class="search-message" role="status">Menu tidak ditemukan.</p>
                <?php endif; ?>

                <div class="filter-categories" aria-label="Kategori filter">
                    <button class="category-dropdown" type="button">Kategori <i class="fa-solid fa-chevron-down" aria-hidden="true"></i></button>
                    <button class="category-dropdown" type="button">Rating <i class="fa-solid fa-chevron-down" aria-hidden="true"></i></button>
                    <button class="category-dropdown" type="button">Harga <i class="fa-solid fa-chevron-down" aria-hidden="true"></i></button>
                    <button class="category-dropdown" type="button">Jarak <i class="fa-solid fa-chevron-down" aria-hidden="true"></i></button>
                </div>

                <div class="menu-grid">
                    <?php foreach ($menus as $menu): ?>
                        <article class="menu-card">
                            <img src="<?= e(app_url('assets/image/' . $menu['image'])) ?>" alt="<?= e($menu['name']) ?>" class="menu-img">
                            <div class="menu-info">
                                <h2 class="menu-title"><?= e($menu['name']) ?></h2>
                                <p class="menu-rating">
                                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                                    <?= e($menu['rating']) ?> (<?= e($menu['reviews']) ?>)
                                </p>
                                <p class="menu-price"><?= e($menu['price']) ?></p>
                            </div>
                            <button class="btn-add" type="button" aria-label="Tambah <?= e($menu['name']) ?> ke keranjang">
                                <img src="<?= e(app_url('assets/image/tombol plus orange.png')) ?>" alt="">
                            </button>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
