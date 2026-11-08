<?php
$user_profile = [
    'nama' => 'Bang Satrio',
    'email' => 'satrio@gmail.com',
    'telepon' => '0812-1288-1272',
    'foto' => 'users-profile.png'
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - RasaSpot</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background-color: #1a1a1a; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 4px; }
        .app-container { width: 100%; max-width: 1440px; min-height: calc(100vh - 8px); background-color: #FFFBEB; border-radius: 20px; overflow: hidden; display: flex; flex-direction: column; border: 2px solid #1a1a1a; }
        .main-layout { display: flex; flex: 1; }

        .sidebar { width: 260px; background-color: #FFFBEB; padding: 28px 20px; border-right: 2px solid #1a1a1a; display: flex; flex-direction: column; gap: 10px; }
        .user-profile { display: flex; align-items: center; gap: 12px; font-size: 22px; font-weight: 800; margin-bottom: 16px; padding-left: 4px; color: #000000; }
        .user-profile img { width: 36px; height: 36px; object-fit: cover; border-radius: 50%; }
        .sidebar-menu { display: flex; align-items: center; gap: 12px; padding: 10px 16px; background-color: #FCD276; border-radius: 8px; text-decoration: none; color: #000000; font-weight: 700; font-size: 14px; border: 1px solid rgba(0,0,0,0.08); transition: all 0.2s ease; }
        .sidebar-menu img { width: 20px; height: 20px; object-fit: contain; }
        .sidebar-menu:hover { background-color: #f7c355; transform: translateX(4px); }
        .sidebar-menu.setting { margin-top: 40px; }
        .sidebar-menu.logout { margin-top: 0px; }

        .profile-content { padding: 40px 60px; flex: 1; background-color: #FFFBEB; }
        .profile-title { font-size: 24px; font-weight: 700; color: #1a1a1a; margin-bottom: 30px; }
        .profile-header-info { display: flex; align-items: center; gap: 20px; margin-bottom: 40px; }
        .profile-header-info img { width: 90px; height: 90px; border-radius: 50%; object-fit: cover; border: 1px solid #1a1a1a; }
        .btn-ganti-foto { background: transparent; border: none; font-size: 16px; font-weight: 700; color: #1a1a1a; cursor: pointer; display: flex; align-items: center; gap: 8px; }
        .profile-form { max-width: 600px; }
        .form-group { margin-bottom: 24px; }
        .form-group label { display: block; font-size: 16px; font-weight: 500; color: #1a1a1a; margin-bottom: 8px; }
        .form-group input { width: 100%; padding: 14px 16px; border-radius: 4px; border: 1px solid #F97316; font-size: 16px; color: #666666; outline: none; background-color: #ffffff; }
        .form-action { text-align: center; margin-top: 40px; }
        .btn-simpan { background-color: #F97316; color: #ffffff; border: none; padding: 14px 40px; border-radius: 4px; font-size: 16px; font-weight: 600; cursor: pointer; min-width: 220px; }
        .btn-simpan:hover { background-color: #e06312; }
    </style>
</head>
<body>
    <div class="app-container">
        <div class="main-layout">
            
            <aside class="sidebar">
                <div class="user-profile">
                    <img src="../../assest/image/<?= $user_profile['foto'] ?>" alt="User Profile" onerror="this.src='../../assest/image/user-profile-circle.png'">
                    <span>User</span>
                </div>

                <a href="../../index.php" class="sidebar-menu">
                    <i class="fa-solid fa-house"></i> Home
                </a>
                <a href="profile.php" class="sidebar-menu">
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

            <main class="profile-content">
                <h2 class="profile-title">Profil</h2>
                <div class="profile-header-info">
                    <img src="../../assest/image/<?= $user_profile['foto'] ?>" alt="Foto Profil" onerror="this.src='../../assest/image/user-profile-circle.png'">
                    <button type="button" class="btn-ganti-foto">
                        <i class="fa-solid fa-camera"></i> Ganti Foto
                    </button>
                </div>
                
                <form action="" method="POST" class="profile-form">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" value="<?= $user_profile['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?= $user_profile['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" name="telepon" value="<?= $user_profile['telepon'] ?>">
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