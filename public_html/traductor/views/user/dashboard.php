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
            margin-bottom: 30px;
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
        <label>Buscar en el Corpus</label>

        <div class="search-row">
            <input type="text" placeholder="Buscar frases...">
            <select>
                <option>Mayo-Yoreme</option>
                <option>Español</option>
            </select>
        </div>
    </div>

    <div class="results-info">
        Se encontraron <strong>12</strong> resultados
    </div>

    <!-- RESULTADOS -->
    <div class="result-card">
        <div class="mayo">In jak bwika ka into jooka</div>
        <div class="spanish">Mi casa es grande y está limpia</div>
    </div>

    <div class="result-card">
        <div class="mayo">Ne jiapsi betchibo ka ne betchibo iji jiapsi</div>
        <div class="spanish">Yo trabajo mucho y me gusta trabajar bien</div>
    </div>

    <div class="result-card">
        <div class="mayo">Taa chiokti ka baa jokot</div>
        <div class="spanish">El sol está caliente y el agua está fría</div>
    </div>
</main>

<?php
    require_once __DIR__ . '/../template/footer.php';
?>

</body>
</html>
