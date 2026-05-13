<?php

require_once "./db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film in uscita al cinema</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .unique-code {
            position: absolute;
            background-color: #b5c15a;
            top: 20px;
            right: 20px;
            margin: 0;
            color: #666;
        }

        h2,
        h3 {
            margin-top: 0;
            color: #333;
        }

        .price-tag {
            display: inline-block;
            background: #e8f5e9;
            padding: 5px 10px;
            border-radius: 4px;
            color: #2e7d32;
            font-weight: bold;
        }

        .info {
            background-color: #85a8ff;
        }
    </style>
</head>

<body>

    <h1>🎬 Cinema PHP - Catalogo</h1>
    <div class="info">
        <h2><?php echo Movie::getTotalMovies();  ?></h2>
    </div>
    <?php foreach ($movieList as $movie) { ?>
        <div class="card">
            <small class="unique-code">Codice Univoco: <?php echo $movie->getInternalCode(); ?></small>
            <h3><?php echo $movie->getTitle(); ?> (<?php echo $movie->getYear(); ?>)</h3>
            <p>Regia: <strong><?php echo $movie->getAuthor(); ?></strong></p>
            <p>Generi: <em><?php echo $movie->getMovieGenresList(); ?></em></p>
            <p>Valutazione: <?php echo $movie->getStarsHtmlRender(); ?></p>
            <div class="price-info">
                <span class="price-tag">Prezzo base: <?php echo number_format($movie->getBasePrice(), 2); ?>$</span>
                <small> | Sconto Anziani: <?php echo number_format($movie->getDiscountedTicketPrice(70), 2); ?>$</small>
                <small> | Sconto Giovani: <?php echo number_format($movie->getDiscountedTicketPrice(16), 2); ?>$</small>
            </div>
        </div>
    <?php
    }
    ?>

</body>

</html>