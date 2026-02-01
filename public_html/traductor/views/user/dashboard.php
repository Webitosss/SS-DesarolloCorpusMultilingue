<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Corpus Mayo-Yoreme</title>

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

        /* MAIN */
        main {
            padding: 40px;
            max-width: 900px;
            margin: auto;
        }

        main h1 {
            text-align: center;
            color: #2563eb;
            margin-bottom: 5px;
        }

        main p.subtitle {
            text-align: center;
            color: #475569;
            margin-bottom: 50px;
        }

        /* SEARCH */
        .search-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        .search-box label {
            font-size: 14px;
            font-weight: bold;
        }

        .search-row {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .search-row input {
            flex: 1;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #cbd5f5;
        }

        .search-row select {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #cbd5f5;
            background: white;
        }

        .search-row button {
            width: auto;
            margin-top: 0;
        }

        /* RESULTS */
        .results-info {
            font-size: 13px;
            color: #475569;
            margin-bottom: 10px;
        }

        .result-card {
            background: white;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border-left: 4px solid #2563eb;
        }

        .result-card .mayo {
            color: #2563eb;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .result-card .spanish {
            color: #334155;
        }

    </style>
</head>
<body>

<?php
    require_once __DIR__ . '/../template/header.php';
?>

<main>
    <h1>Corpus Multilingüe Mayo-Yoreme</h1>
    <p class="subtitle">
        Explora y aprende el idioma Mayo-Yoreme con traducciones de frases
    </p>

    <div class="search-box">

        <form method="GET" action="/traductor/index.php">
            <input type="hidden" name="controller" value="user">
            <input type="hidden" name="action" value="dashboard">

            <div class="search-row">
                <input type="text" name="q" placeholder="Buscar frases...">

                <select name="idioma">
                    <option value="mayo">Mayo-Yoreme</option>
                    <option value="espanol">Español</option>
                </select>

                <button type="submit" class="btn btn-primary">
                    Buscar
                </button>
            </div>
        </form>
    </div>

    <div class="results-info">
        Se encontraron <strong><?php echo $total; ?></strong> resultados
    </div>

    <!-- RESULTADOS -->
    <?php if (empty($frases)): ?>

    <div class="result-card">
        No se encontraron resultados.
    </div>

    <?php else: ?>

        <?php foreach ($frases as $frase): ?>

            <div class="result-card">
                <div class="mayo">
                    <?php echo htmlspecialchars($frase['frase_mayo_yoreme']); ?>
                </div>

                <div class="spanish">
                    <?php echo htmlspecialchars($frase['frase_espanol']); ?>
                </div>
            </div>

        <?php endforeach; ?>

    <?php endif; ?>

</main>

<?php
    require_once __DIR__ . '/../template/footer.php';
?>

</body>
</html>
