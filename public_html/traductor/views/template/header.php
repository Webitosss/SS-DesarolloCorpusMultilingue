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
            background: #ffffff;
            padding: 25px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
        }

        header .logo {
            font-weight: bold;
            color: #2563eb;
            font-size: 18px;
        }

        header .user {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
        }

        .avatar {
            background: #2563eb;
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
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
        <span><?php echo htmlspecialchars($_SESSION['nombre']); ?></span>
        <div class="avatar">
            <?php
                $iniciales = strtoupper(
                    substr($_SESSION['nombre'], 0, 1)
                );
                echo $iniciales;
            ?>
        </div>
    </div>
</header>

