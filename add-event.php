<h3 class="mb-3 h1">✨ DODAJ NOWE WYDARZENIE</h3>
<form action="admin-panel.php" method="post">
    <label for="event-name" class="form-label h3">Nazwa</label>
    <input class="form-control" type="text" name="event-name" placeholder="Wyświetlana nazwa wydarzenia np. EURO 2020" required>
    <br />
    <button type="submit" class="btn-lg" style="float: right;">DODAJ</button>
</form>
<br />
<br />
<br />
<h4 class="h3 mb-3">Wydarzenia istniejące już w bazie danych</h4>
<table class="table">
    <tbody>
        <?php include("select-event.php");
        foreach ($subsubcategories as $subsubcategory) {
            foreach ($subsubcategory as $item) {
                echo"<tr><th scope='row'>" . $item . "</th></tr>";
            }
        }
        ?>
    </tbody>
</table>