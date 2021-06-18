<?php
$db = mysqli_connect("localhost", "root", "root");
mysqli_select_db($db, "wprgmxbet");
$sql = "SELECT DISTINCT(login) FROM user ORDER BY login";
$sql_result = mysqli_query($db, $sql);
$usernames = [];
while ($row = mysqli_fetch_row($sql_result)) {
    $usernames[] = $row;
}
mysqli_close($db);
?>

<h3 class="mb-3 h1">💸 ZMIEŃ STAN KONTA</h3>
<form action="admin-panel.php" method="post">
    <label for="username-list" class="form-label h3">Nazwa użytkownika</label>
    <input class="form-control" list="username-list-options" id="username-list" name="user" placeholder="Szukaj...">
    <datalist id="username-list-options">
        <?php
        foreach ($usernames as $username) {
            foreach ($username as $user) {
                echo "<option value='" . $user . "'>";
            }
        }
        ?>
    </datalist>
    <br />
    <label class="form-label h3" for="value">Wartość</label>
    <div class='input-group mb-2'>
        <input class="form-control" id="value" type='number' name='money' min="0" value='50'>
        <div class='input-group-prepend'>
            <div class='input-group-text'>zł</div>
        </div>
    </div>
    <br />
    <button type="submit" class="btn-lg" style="float: right;">ZMIEŃ</button>
</form>