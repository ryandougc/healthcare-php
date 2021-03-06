<?php include '../partials/header.php'; ?>
<?php

//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../../includes/sessionCheck.php');
//Only give access to patients
require_once('../../includes/adminAccess.php');

//include all of the controllers and models
include '../../model/database.class.php';
include '../../model/account.class.php';
include '../../model/admin.class.php';
include '../../controller/accountcontroller.php';
include '../../controller/admincontroller.php';

$adminController = new AdminController();
$accountList = $adminController->getAccountList();

if(isset($_POST['delete'])) { 
    $adminController->deleteAccount(
        $_POST['delete'],
        filter_input(INPUT_POST, 'accType')
    );
}

if(isset($_POST['edit'])) { 
    header('location: adminModifyAccount.php?accountId='. $_POST['edit']);
}

include '../../view/admin/adminNavBar.php';
?>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">loginid</th>
                    <th scope="col">Account Type</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $accCount = 1;
                        foreach($accountList as $account){
                            echo "<tr>
                                <th scope='row'>" . $accCount ."</th>
                                <td>". $account['FirstName'] . "</td>
                                <td>". $account['LastName'] . "</td>
                                <td>". $account['LoginID'] . "</td>
                                <td>". $account['AccountType'] . "</td>
                                <td>
                                    <form action='' method='post'>
                                        <input type='hidden' name='accType' value'". $account['AccountType'] ."'>
                                        <button class='btn btn-danger' type='submit' name='delete' value='" . $account['AccountID'] . "'>Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <form action='' method='post'>
                                        <button class='btn btn-secondary' type='submit' name='edit' value='" . $account['AccountID'] . "'>Edit</button>
                                    </form>
                                </td>
                            </tr>";
                            $accCount++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php include '../../view/partials/footer.php'; ?>