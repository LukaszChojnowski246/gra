<?php
/* ==========================================================================
   GRA W 3 KUBKI (PHP)
   Gracz obstawia monety i wybiera 1 z 3 kubków (33.3% szans na wygraną).
   ========================================================================== */

$message = "";

// 1. ODCZYT LUB INICJALIZACJA MONET (Ciasteczka)
if (isset($_COOKIE['user_coins'])) {
    $coins = (int)$_COOKIE['user_coins'];
} else {
    $coins = 40; // Domyślne 40 monet na start
}

// 2. RESTART GRY (Gdy gracz straci monety i kliknie zagraj od nowa)
if (isset($_POST['reset'])) {
    $coins = 40;
    setcookie('user_coins', $coins, time() + (86400 * 30));
    header("Location: index.php");
    exit();
}

// 3. LOGIKA GRY (Gdy gracz kliknie jeden z kubków)
if (isset($_POST['cup']) && $coins > 0) {
    $chosen_cup = (int)$_POST['cup'];
    $bet = isset($_POST['bet']) ? (int)$_POST['bet'] : 0;

    // Sprawdzanie poprawności wpisanej stawki
    if ($bet <= 0) {
        $message = "⚠️ Stawka musi być większa niż 0!";
    } elseif ($bet > $coins) {
        $message = "⚠️ Nie masz tyle monet na koncie!";
    } else {
        // Odejmujemy stawkę i losujemy wygrywający kubek (1, 2 lub 3)
        $coins -= $bet;
        $winning_cup = rand(1, 3);

        // Sprawdzamy wygraną
        if ($chosen_cup === $winning_cup) {
            $reward = $bet * 3; // Wygrana = 3x stawka
            $coins += $reward;
            $message = "🎉 Trafiłeś! Wygrywasz $reward monet!";
        } else {
            $message = "❌ Pudło! Kulka była pod kubkiem nr $winning_cup.";
        }

        // Zapisujemy zaktualizowane monety w przeglądarce na 30 dni
        setcookie('user_coins', $coins, time() + (86400 * 30));
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Gra w 3 Kubki</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background: #f0f2f5; margin-top: 50px; }
        .card { background: white; max-width: 400px; margin: 0 auto; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .cups { display: flex; justify-content: center; gap: 10px; margin: 20px 0; }
        button.cup-btn { font-size: 30px; padding: 15px 25px; cursor: pointer; border: 1px solid #ccc; border-radius: 8px; background: #fff; }
        button.cup-btn:hover { background: #e0e0e0; }
        .msg { font-weight: bold; margin: 15px 0; color: #333; }
        input[type="number"] { padding: 5px; width: 80px; text-align: center; }
    </style>
</head>
<body>

<div class="card">
    <h1>🥤 Gra w 3 Kubki</h1>
    <p>Twoje monety: <strong><?php echo $coins; ?> 💰</strong></p>

    <?php if ($coins <= 0): ?>
        <p class="msg" style="color: red;">Koniec monet! Zbankrutowałeś.</p>
        <form method="post">
            <button type="submit" name="reset">Zagraj od nowa (40 monet)</button>
        </form>
    <?php else: ?>
        <form method="post">
            <p>
                Ile obstawiasz? 
                <input type="number" name="bet" value="5" min="1" max="<?php echo $coins; ?>">
            </p>
            <p>Wybierz kubek:</p>
            <div class="cups">
                <button type="submit" name="cup" value="1" class="cup-btn">🥤 1</button>
                <button type="submit" name="cup" value="2" class="cup-btn">🥤 2</button>
                <button type="submit" name="cup" value="3" class="cup-btn">🥤 3</button>
            </div>
        </form>
    <?php endif; ?>

    <?php if ($message): ?>
        <div class="msg"><?php echo $message; ?></div>
    <?php endif; ?>
</div>

</body>
</html>