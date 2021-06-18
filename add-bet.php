<h3 class="mb-3 h1">🎆 DODAJ NOWY ZAKŁAD</h3>
<form action="admin-panel.php" method="post">
    <label for="name" class="form-label h3">Nazwa</label>
    <input class="form-control" type="text" name="name" placeholder="Wyświetlana nazwa wydarzenia">
    <br />
    <label for="category" class="form-label h3">Kategoria</label>
    <select name="category" class="form-control">
        <option value="">tutaj nazwy kategorii</option>
    </select>
    <br />
    <label for="sub-category" class="form-label h3">Region</label>
    <select name="sub-category" class="form-control">
        <option value="">tutaj nazwy kategorii</option>
    </select>
    <br />
    <label for="sub-sub-category" class="form-label h3">Wydarzenie</label>
    <select name="sub-sub-category" class="form-control">
        <option value="">tutaj nazwy kategorii</option>
    </select>
    <br />
    <button type="submit" class="btn-lg" style="float: right;">ZMIEŃ</button>
</form>