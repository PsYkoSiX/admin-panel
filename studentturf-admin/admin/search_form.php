<?php
if (!isset($_SESSION['name']) && !isset($_SESSION['userEmail']) && !isset($_SESSION['institute']) && !isset($_SESSION['year'])) {
    $_SESSION['name'] = '';
    $_SESSION['userEmail'] = '';
    $_SESSION['institute'] = '';
    $_SESSION['year'] = '';
}
if (isset($_POST['name']) || isset($_POST['userEmail']) || isset($_POST['institute']) || isset($_POST['year'])) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['userEmail'] = $_POST['userEmail'];
    $_SESSION['institute'] = $_POST['institute'];
    $_SESSION['year'] = $_POST['year'];
} else {
    if ($_SESSION['name'] == null) {
        $_SESSION['name'] = '';
    }
    if ($_SESSION['userEmail'] == null) {
        $_SESSION['userEmail'] = '';
    }
    if ($_SESSION['institute'] == null) {
        $_SESSION['institute'] = '';
    }
    if ($_SESSION['year'] == null) {
        $_SESSION['year'] = '';
    }
}
?>
<div class="text-center">
    <form class="form-search" action="index.php" method="post">
        <input type="text" name="name" class="input-medium search-query" placeholder="Name"
               value="<?php echo $_SESSION['name']?>"/>
        <input type="text" name="userEmail" class="input-medium search-query" placeholder="Email address"
               value="<?php echo $_SESSION['userEmail']?>"/>
        <input type="text" name="institute" class="input-medium search-query"
               placeholder="University or institute" value="<?php echo $_SESSION['institute']?>"/>
        <dev class="input-append">
            <input type="text" name="year" class="input-medium search-query" placeholder="Graduate Year"
                   value="<?php echo $_SESSION['year']?>"/>
            <button type="submit" class="btn">Search</button>
        </dev>
    </form>
</div>