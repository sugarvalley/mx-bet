<h3 class="mb-3 h1">🎆 DODAJ NOWY ZAKŁAD</h3>
<form action="admin-panel.php" method="post">
    <label for="bet-name" class="form-label h3">Nazwa</label>
    <input class="form-control" type="text" name="bet-name" placeholder="Wyświetlana nazwa zakładu np. Mecz X - Y" required>
    <br />
    <label for="date" class="form-label h3">Data</label>
    <br />
    <input type="datetime-local" class="form-control" name="date" required min="<?php echo date('Y-m-d\TH:i'); ?>">
    <br />
    <label for="category" class="form-label h3">Kategoria</label>
    <select name="category" class="form-control" size="1" required>
            <?php include("select-category.php");
            foreach ($categories as $category) {
                foreach ($category as $item) {
                    echo"<option value='" . $item . "'>" . $item . "</option>";
                }
            }
            ?>
    </select>
    <br />
    <label for="sub-category" class="form-label h3">Region</label>
    <select name="sub-category" class="form-control" size="1" required>
        <?php include("select-region.php");
        foreach ($subcategories as $subcategory) {
            foreach ($subcategory as $item) {
                echo"<option value='" . $item . "'>" . $item . "</option>";
            }
        }
        ?>
    </select>
    <br />
    <label for="sub-sub-category" class="form-label h3">Wydarzenie</label>
    <select name="sub-sub-category" class="form-control" size="1" required>
        <?php include("select-event.php");
        foreach ($subsubcategories as $subsubcategory) {
            foreach ($subsubcategory as $item) {
                echo"<option value='" . $item . "'>" . $item . "</option>";
            }
        }
        ?>
    </select>
    <br />
    <button type="submit" class="btn-lg" style="float: right;">DODAJ</button>
</form>