<?php
 
session_start();

    $_SESSION["monety"] = 40;
    
    



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
        
        <input type="number" >
        
    <p>monety = <?php echo $_SESSION["monety"] ?></p>
        <form action="" method="post1">
            <button type="button" id="przycisk1" class="cos">
                kubek 1
            </button>
        </form>

        <form action="" method="post2">
            <button type="button" id="przycisk2" class="cos2">
                kubek 2
            </button>
        </form>

    <form action="" method="post3">
        <button type="button" id="przycisk3" class="cos3">
            kubek 3
        </button>
    </form>

    </section>
    </Main>

</body>
</html>
