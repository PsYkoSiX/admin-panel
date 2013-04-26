<?php
include 'DB_connection.php';

$checkbox_value = $_POST['ch'];
$checkbox_id = $_POST['id'];

$sql = "update admin set cc_status = '" . $checkbox_value . "' where id = '" . $checkbox_id . "'";
$stmt = $db->prepare($sql);
$stmt->execute();
$row_count = $stmt->rowCount();
if ($row_count > 0) {
    echo '<span class="alert alert-success">Successfully changed status...!</span>';
} else {
    echo '<span class="alert alert-error">Change error occur...!</span>';
}

