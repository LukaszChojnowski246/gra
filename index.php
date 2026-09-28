<?php
 
session_start();

 if (isset($_SESSION["monety"])) {

 }





$_SESSION["monety"] = 40;
$random = round(1, 3);

if ($_SESSION["monety"] < 0) {
    echo "Przegrałeś nie masz monet";
    

}
?>




<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kubki</title>
</head>
<body>
    <Main>
    <section id="srodek">
    <input type="number">
    <h1>Monety = </h1>
    <form method="post">
        <input type="button" value="Przycisk 1">
    </form>
    <form method="post">
        <input type="button" value="Przycisk 2">
    </form>
    <form method="post">
        <input type="button" value="Przycisk 3">
    </form>
    
        
    
    
    

    </section>
    </Main>

</body>
</html>


