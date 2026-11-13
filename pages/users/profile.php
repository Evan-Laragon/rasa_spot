<?php
require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../repositories/user-repository.php';

$userProfile = getProfile();
$currentPage = 'profile';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - RasaSpot</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= e(app_url('styles/base.css')) ?>">
    <link rel="stylesheet" href="<?= e(app_url('styles/components/sidebar.css')) ?>">
    <link rel="stylesheet" href="<?= e(app_url('styles/pages/profile.css')) ?>">
</head>
<body>
    <div class="app-container">
        <div class="main-layout">
            <?php require __DIR__ . '/../../components/sidebar.php'; ?>

            <main class="profile-content">
                <h1 class="profile-title">Profil</h1>
                <div class="profile-header-info">
                    <img src="<?= e(app_url('assets/image/' . $userProfile['foto'])) ?>" alt="Foto profil">
                    <button type="button" class="btn-ganti-foto">
                        <i class="fa-solid fa-camera" aria-hidden="true"></i> Ganti Foto
                    </button>
                </div>

                <form action="" method="post" class="profile-form">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input id="nama" type="text" name="nama" value="<?= e($userProfile['nama']) ?>" autocomplete="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="<?= e($userProfile['email']) ?>" autocomplete="email" required>
                    </div>
                    <div class="form-group">
                        <label for="telepon">No Telepon</label>
                        <input id="telepon" type="tel" name="telepon" value="<?= e($userProfile['telepon']) ?>" autocomplete="tel" required>
                    </div>
                    <div class="form-action">
                        <button type="submit" class="btn-simpan">Simpan</button>
                    </div>
                </form>
            </main>
        </div>
    </div>
</body>
</html>
