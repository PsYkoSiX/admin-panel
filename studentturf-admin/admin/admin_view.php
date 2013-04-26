<?php
session_start();
include 'session_expire.php';
include 'session_check.php';
include 'libs/pagination.class.php';
include 'DB_connection.php';
include 'admin_layout.php';

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . './error_log.txt');
error_reporting(E_ALL);
?>
<div class="container">
    <div class="row-fluid">
        <div class="span8 padding-10">
            <table class="table table-striped table-hover table-condensed">
                <thead>
                <th>Admin ID</th>
                <th>Email</th>
                <th>Include List</th>
                </thead>
                <tbody>
                <?php
                try {
                    $sql = "SELECT * FROM admin";
                    $stmt = $db->query($sql);
                    $list_count = $stmt->rowCount();

                    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                        $products[] = $row;
                    }
                    if (count($products)) {
                        // Create the pagination object
                        $pagination = new pagination($products, (isset($_GET['page']) ? $_GET['page'] : 1), 5);
                        // Decide if the first and last links should show
                        $pagination->setShowFirstAndLast(true);
                        // You can overwrite the default seperator
                        $pagination->setMainSeperator(' | ');
                        // Parse through the pagination class
                        $productPages = $pagination->getResults();
                        // If we have items
                        if (count($productPages) != 0) {
                            // Create the page numbers
                            echo $pageNumbers = '<div class="paginate">' . $pagination->getLinks($_GET) . '</div>';
                            // Loop through all the items in the array
                            foreach ($productPages as $productArray) {
                                echo
                                    "<tr>
                                    <td>" . $productArray['id'] . "</td>
                                    <td>" . $productArray['admin_name'] . "</td>
                                    <td>" . '<input type=checkbox id="' . $productArray['id'] . '" rel="' . $productArray['cc_status'] . '"
                                            ' . $productArray['cc_status'] . ' onclick="change_check(this.id)"/></td>
                            </tr>';
                            }
                            echo '</tbody></table>';
//                            echo $pageNumbers;
                        } else {
                            echo '<p class="alert alert-error">There are no values for display</p>';
                        }
                    }
                } catch (PDOException $ex) {
                    echo $ex->getMessage();
                }
                ?>
                </tbody>
            </table>
            <div class="margin-right-10">
                <a class="paginate pull-left" href="change_password.php">Change my password</a>

                <div class="span3 paginate text-center"><a
                        href="email_send_admin.php" data-toggle="modal"
                        data-target="#email_Modal">Compose email</a></div>
                <div class="span6 pull-right text-right" id="message"></div>
            </div>
        </div>
        <div class="span4">

            <form method="post" class="form-signin" action="add_admin_check.php">
                <label>
                    <input type="text" name="username" class="input-block-level" placeholder="Email address"/>
                </label>
                <label>
                    <input type="password" name="password" class="input-block-level" placeholder="Password"/>
                </label>
                <label>
                    <input type="password" name="re_password" class="input-block-level" placeholder="Re type password"/>
                </label>
                <!--        <label class="checkbox">
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>-->
                <div>
                    <button type="submit" class="btn btn-small btn-success">Create new admin</button>
                </div>
                <div id="status_message">
                    <?php if (isset($_SESSION['pw_add_error'])) {
                        echo '<div class="alert alert-error padding-top-10">';
                        echo "<span>" . $_SESSION['pw_add_error'] . "</span>";
                        echo '</div>';
                    }
                    ?>

                    <?php if (isset($_SESSION['pw_add_success'])) {
                        echo '<div class="alert alert-success padding-top-10">';
                        echo "<span>" . $_SESSION['pw_add_success'] . "</span>";
                        echo '</div>';
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
    <?php include 'unset_sessions.php';?>
</div>


<div id="email_Modal" class="modal hide fade">
    <div class="modal-header">
        <a class="close" href="admin_view.php<?php if (isset($_GET['page'])) {
            echo '?page=' . $_GET['page'];
            $_SESSION['page'] = $_GET['page'];
        }?>">×</a>
        <h4>Email sending window</h4>
    </div>
    <div class="modal-body">
        <!--Auto inject user_details.php to here by modal-->
    </div>
    <div class="modal-footer">
        <a class="btn btn-small" href="admin_view.php<?php if (isset($_GET['page'])) {
            echo '?page=' . $_GET['page'];
        }?>">Close</a>
    </div>
</div>

<!--<script src="javascript/jquery-1.4.2.js"></script>-->
<script type="text/javascript">
    function change_check(id) {
        var ch = $('#'.concat(id)).attr('rel');
        if (ch == 'checked') {
            ch = null;
        } else {
            ch = 'checked';
        }
        $('#'.concat(id)).attr('rel', ch);

        $('#message').show();
        setTimeout(function () {
            $('#message').hide();
        }, 1000);

        $.ajax({
            url: 'jQuery_add_cc.php',
            type: 'POST',
            data: {ch: ch, id: id },
            success: function (res) {
//                alert(res);
                $('#message').html(res);
            }
        });
    }

    $(document).ready(function () {
        $('#status_message').show();
        setTimeout(function () {
            $('#status_message').hide();
        }, 1000 * 5);
    });
</script>

<script src="javascript/bootstrap.js" type="text/javascript"></script>
<script src="javascript/jquery.js" type="text/javascript"></script>