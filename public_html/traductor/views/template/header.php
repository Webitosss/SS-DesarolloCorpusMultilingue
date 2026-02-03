<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corpus Mayo-Yoreme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f10dc94bac.js" crossorigin="anonymous"></script>  

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            background: #f8fafc;
            color: #0f172a;
        }

        header {
            display: flex;
            align-items: center; 
            justify-content: space-between;
            padding: 25px 50px;
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
        }

        header .user {
            display: flex;
            align-items: center;      
            gap: 12px;
            font-size: 14px;
            flex-wrap: nowrap;
            min-width: 0;
        }

        header .user .username {
            display: flex;
            align-items: center;
            flex: 1 1 auto;
            min-width: 0;
            max-width: 220px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-right: 6px;
            line-height: 1; 
        }

        .profile-toggle {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 0 !important;
            margin: 0 !important;
            height: 36px;            
            line-height: 1 !important;
            background: transparent;
            border: none;
        }

        .profile-toggle::after {
            display: none !important;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #2563eb;
            color: #fff;
            font-weight: 700;
            font-size: 14px;
            flex: 0 0 auto;
            line-height: 1;
        }

        .dropdown-menu {
            transform: translateY(6px);
        }

        @media (max-width: 576px) {
            header .user .username { max-width: 120px; }
            .avatar, .profile-toggle { width: 32px; height: 32px; }
        }

        main {
            padding: 80px;
            max-width: 900px;
            margin: auto;
        }
        
    </style>
</head>
<body>

<?php
    if (!isset($_SESSION['user_id'])) {
        header("Location: /traductor/views/auth/login.php");
        exit;
    }
?>

<header>
    <div class="logo"><i class="fa-solid fa-language"></i> Corpus Mayo-Yoreme</div>

    <div class="user">
        <span class="username"><?php echo htmlspecialchars($_SESSION['nombre']); ?></span>
        <div class="dropdown">
            <button class="profile-toggle dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="avatar">
                    <?php
                        $iniciales = strtoupper(
                            substr($_SESSION['nombre'], 0, 1)
                        );
                        echo $iniciales;
                    ?>
                </div>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="/traductor/index.php?controller=auth&action=logout">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</header>

