# Założenia i koncept projektu: Gra w 3 Kubki

## Ogólny koncept gry
Projekt to prosta gra przeglądarkowa typu "Gra w 3 Kubki" zrobiona w języku PHP. Gracz zaczyna z wirtualnymi monetami, sam decyduje ile monet stawia na dany ruch i próbuje zgadnąć, pod którym z 3 kubków ukryta jest kulka. Stan konta jest zapamiętywany na komputerze gracza.

---

## 7 Założeń Gry

1. **Startowy kapitał:** Gracz rozpoczyna grę z domyślnym saldem 40 monet.
2. **Dynamiczna stawka:** Gracz sam wpisuje w polu formularza, ile monet chce obstawić w danym losowaniu.
3. **Mechanika losowania (33.3% szans):** Serwer losuje wygrywający kubek za pomocą funkcji `rand(1, 3)`, dając dokładnie 1/3 szansy na wygraną.
4. **Potrójna wygrana (Mnożnik 3x):** Trafienie poprawnego kubka daje nagrodę w postaci potrójnej wartości postawionej stawki.
5. **Zapamiętywanie stanu w Ciasteczkach (Cookies):** Liczba monet jest zapisywana w przeglądarce (`setcookie`), dzięki czemu po przeładowaniu strony lub zamknięciu przeglądarki monety nie znikają.
6. **Walidacja stawki:** System blokuje możliwość wpisania stawki ujemnej, zerowej oraz większej niż aktualnie posiadana liczba monet.
7. **Przycisk Resetu przy Bankructwie:** Gdy gracz straci wszystkie monety (saldo = 0), gra ukrywa kubki i pokazuje przycisk pozwalający zresetować konto do początkowych 40 monet.