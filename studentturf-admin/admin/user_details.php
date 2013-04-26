<?php
session_start();
include 'session_check.php';
include 'DB_connection.php';
?>

<div class="width-full">
    <table class="table table-striped table-hover table-condensed">
        <tbody>
        <?php
        try {
            $sql = "SELECT * FROM userInfo where id=" . $_GET['userId'];
            $stmt = $db->query($sql);
            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                echo '<tr><td>Full Name</td><td>' . $row['fullname'] . '</td>';
                echo '<tr><td>Gender</td><td>' . $row['sex'] . '</td>';
                echo '<tr><td>Email</td><td>' . $row['email'] . '</td>';
                echo '<tr><td>Contact</td><td>' . $row['contactnumber'] . '</td>';
                echo '<tr><td>Address</td><td>' . $row['address'] . '</td>';
                echo '<tr><td>Date of birth</td><td>' . $row['dateofbirth'] . '</td>';
                echo '<tr><td>Language</td><td>' . $row['languages'] . '</td>';
                echo '<tr><td>Institute</td><td>' . $row['universityorinstitute'] . '</td>';
                echo '<tr><td>Stream of degree</td><td>' . $row['streamofdegree'] . '</td>';
                echo '<tr><td>Name of degree</td><td>' . $row['nameofdegree'] . '</td>';
                echo '<tr><td>Stage</td><td>' . $row['stageyourin'] . '</td>';
                echo '<tr><td>Year of graduation</td><td>' . $row['yearofgraduation'] . '</td>';
                echo '<tr><td>Professional skills</td><td>' . $row['professionalskills'] . '</td>';
                echo '<tr><td>Personal skills</td><td>' . $row['personalskills'] . '</td>';
                echo '<tr><td>Project experience</td><td>' . $row['projectexperiences'] . '</td>';
                echo '<tr><td>Current working place</td><td>' . $row['currentworkplace'] . '</td>';
                echo '<tr><td>Current position</td><td>' . $row['currentposition'] . '</td>';
                echo '<tr><td>Web site</td><td>' . $row['otherwebsites'] . '</td>';
                echo '<tr><td>Other interests</td><td>' . $row['otherinterests'] . '</td>';
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        ?>
        </tbody>
    </table>
</div>