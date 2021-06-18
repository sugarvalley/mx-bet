<h3 class="mb-3 h3">Teraz dodaj kursy dla wydarzenia: <?php echo $bet_name; ?></h3>
<form action="admin-panel.php" method="post">
    <input type="hidden" name="id_bet_entity" value=" <?php echo $id_bet_entity; ?>">
    <label for="choice-name1" class="form-label h3">Wybór nr 1</label>
    <input class="form-control" type="text" name="choice-name1" placeholder="Wyświetlana nazwa wyboru np. Polska" required>
    <br />
    <label for="odd1" class="form-label h3">Kurs nr 1</label>
    <input class="form-control" type="number" step="0.01" name="odd1" placeholder="Wartość kursu np. 1.98" required>
    <br />
    <label for="choice-name2" class="form-label h3">Wybór nr 2</label>
    <input class="form-control" type="text" name="choice-name2" placeholder="Wyświetlana nazwa wyboru np. Niemcy" required>
    <br />
    <label for="odd2" class="form-label h3">Kurs nr 2</label>
    <input class="form-control" type="number" step="0.01" name="odd2" placeholder="Wartość kursu np. 1.44" required>
    <br />
    <label for="choice-name3" class="form-label h3">Wybór nr 3</label>
    <input class="form-control" type="text" name="choice-name3" placeholder="Opcjonalny trzeci wybór - np. Remis">
    <br />
    <label for="odd3" class="form-label h3">Kurs nr 3</label>
    <input class="form-control" type="number" step="0.01" name="odd3" placeholder="Opcjonalna wartość kursu np. 2.35">
    <br />
    <button type="submit" class="btn-lg" style="float: right;">DODAJ</button>
</form>