<!DOCTYPE html>
<html lang="it">
<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/slide.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title>HomePage</title>
    <meta name="description" content="Descrizione sommaria.">
</head>
<body class="home">
<div class="container">
    <?php session_start(); ?>
    <?php include('common/header.html'); ?>
    <div class="slider content">
        <ul>
            <li>
                <input type="radio" id="slide1" name="slide" checked>
                <label for="slide1"></label>
                <div class="cont-img" alt="panel 1"></div>
            </li>
            <li>
                <input type="radio" id="slide2" name="slide">
                <label for="slide2"></label>
                <div class="cont-img-1" alt="panel 1"></div>
            </li>
            <li>
                <input type="radio" id="slide3" name="slide">
                <label for="slide3"></label>
                <div class="cont-img-2" alt="panel 1"></div>
            </li>
        </ul>
    </div>

    <div class="contPiloti">
        <h2>Top 3 Piloti</h2>
        <?php
        include("connessione.php");
        $q = $connessione->query("SELECT Pilota.cognome, Pilota.nome,
                SUM(Risultati_Gare.punti)
                FROM Pilota INNER JOIN Risultati_Gare ON Pilota.matricola = Risultati_Gare.id_pilota
                INNER JOIN Team ON Pilota.id_team = Team.id
                GROUP BY Risultati_Gare.id_pilota
                ORDER BY SUM(Risultati_Gare.punti) DESC
                LIMIT 3");
        if (!$q) :
            echo "Errore db";
        else :
            while ($row = $q->fetch_array(MYSQLI_NUM)) :
                $pilota = substr($row[1], 0, 1);
                $pilota = "$pilota. $row[0]"; ?>
                <div class="piloti">
                    <span><?php echo $pilota ?></span><br>
                    <span class="punti"><?php echo $row[2] ?> punti</span>
                </div>
            <?php endwhile;
        endif; ?>
    </div>

    <div class="gallery">
        <a tabindex="1"><img src="immagini_index/1.jpg"></a>
        <a tabindex="1"><img src="immagini_index/2.jpg"></a>
        <a tabindex="1"><img src="immagini_index/3.jpg"></a>
        <span class="close"></span>
    </div>


    <?php //qui ci va news
    $sql = "SELECT titolo, descrizione, data FROM Notizia ORDER BY id DESC LIMIT 1;";
    $results = mysqli_query($connessione, $sql);
    $values = array();
    while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
        $values[] = $row;
    ?>
    <?php foreach ($values as $value) : ?>
        <article class="news-home">
            <img src="" alt="">
            <time><?php echo stripslashes($value['data']); ?></time>
            <a href="news.php" target="_self">
                <h3><?php echo stripslashes($value['titolo']); ?></h3>
            </a>
            <p><?php echo stripslashes($value['descrizione']); ?></p>
            <button><a href="news.php">Visita la nostra sezione news!</a></button>
        </article>
    <?php endforeach; ?>

</div>

<?php include('common/footer.php') ?>

</body>

</html>
