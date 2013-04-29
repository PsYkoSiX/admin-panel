<?php
session_start();
include 'session_check.php';
include 'libs/pagination.class.php';
include 'DB_connection.php';
include 'search_form.php';
include 'message_user.php';

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . './error_log.txt');
error_reporting(E_ALL);
?>
<div class="container">
    <table class="table table-striped table-hover table-condensed">
        <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Institute</th>
        <th>Graduate Year</th>
        <th>Action</th>
        </thead>
        <tbody>
        <?php
        try {

            $sql = "SELECT * FROM userInfo  where fullname LIKE '%" . $_SESSION['name'] . "%' and email LIKE '%" . $_SESSION['userEmail'] . "%' and yearofgraduation LIKE '%" . $_SESSION['year'] . "%' and universityorinstitute LIKE '%" . $_SESSION['institute'] . "%'";
            $stmt = $db->query($sql);

            $list_count = $stmt->rowCount();
            $email_list = '';
            $products = array();

            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                $email_list = $email_list . $row['email'] . ',';
                $products[] = $row;
            }
            $_SESSION['email_list'] = $email_list;
            if (count($products)) {
                // Create the pagination object
                $pagination = new pagination($products, (isset($_GET['page']) ? $_GET['page'] : 1), 10);
                // Decide if the first and last links should show
                $pagination->setShowFirstAndLast(true);
                // You can overwrite the default seperator
                $pagination->setMainSeperator(' | ');
                // Parse through the pagination class
                $productPages = $pagination->getResults();
                // If we have items
                if (count($productPages) != 0) {
                    // Create the page numbers
                    $pageNumbers = '<div class="paginate">' . "<span class='pull-left span3 text-left'>Filtered users count : $list_count</span>" . $pagination->getLinks($_GET) .
                        "<div class='span3 pull-right text-center'><a href='email_send_multiple.php?userCount=$list_count' data-toggle='modal' data-target='#email_Modal'>Compose email to all</a></div></div>";
                    // Loop through all the items in the array
                    foreach ($productPages as $productArray) {
                        echo
                            "<tr>
                            <td>" . $productArray['fullname'] . "</td>
                            <td>" . $productArray['email'] . "</td>
                            <td>" . $productArray['contactnumber'] . "</td>
                            <td>" . $productArray['universityorinstitute'] . "</td>
                            <td>" . $productArray['yearofgraduation'] . "</td>
                            <td><a href='user_details_check.php?userId=" . $productArray['id'] . "' data-toggle='modal' data-target='#user_detail_Modal'>View</a>
                                <span> | </span>
                                <a href='email_send_single.php?userEmail=" . $productArray['email'] . "' data-toggle='modal' data-target='#email_Modal'>Send email</a>
                            </td>
                            </tr>";
                    }
                    echo '</tbody></table>';
                    echo $pageNumbers;
                } else {
                    echo '<p class="alert alert-error">There are no values for display</p>';
                }
            } else {
                echo '<p class="alert alert-error">There are no values for display</p>';
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        ?>
        </tbody>
    </table>
</div>

<!--<a class="btn" href="user_details.php?userId=100" data-toggle="modal" data-target="#myModal">Launch demo modal</a>-->

<!-- Modal -->
<div id="user_detail_Modal" class="modal hide fade">
    <div class="modal-header">
        <a class="close" href="index.php<?php if (isset($_GET['page'])) {
            echo '?page=' . $_GET['page'];
        }?>">×</a>
        <h4>User details window</h4>
    </div>
    <div class="modal-body">
        <!--Auto inject user_details.php to here by modal-->
    </div>
    <div class="modal-footer">
        <a class="btn btn-small" href="index.php<?php if (isset($_GET['page'])) {
            echo '?page=' . $_GET['page'];
        }?>">Close</a>
    </div>
</div>

<div id="email_Modal" class="modal hide fade">
    <div class="modal-header">
        <a class="close" href="index.php<?php if (isset($_GET['page'])) {
            echo '?page=' . $_GET['page'];
            $_SESSION['page'] = $_GET['page'];
        }?>">×</a>
        <h4>Email sending window</h4>
    </div>
    <div class="modal-body">
        <!--Auto inject email_send_single.php to here by modal-->
    </div>
    <div class="modal-footer">
        <a class="btn btn-small" href="index.php<?php if (isset($_GET['page'])) {
            echo '?page=' . $_GET['page'];
        }?>">Close</a>
    </div>
</div>

<?php
unset($_SESSION['email_send_error']);
unset($_SESSION['email_send_success']);
?>
<script src="javascript/bootstrap.js" type="text/javascript"></script>
<script src="javascript/jquery.js" type="text/javascript"></script>