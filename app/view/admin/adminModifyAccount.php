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

$accountId = filter_input(INPUT_GET, 'accountId');

$account = new AdminController();
$accountDetails = $account->getAccountByID($accountId);

if(isset($_POST['submit'])) {
    //Get and filter inputs
    $accountId    = filter_input(INPUT_POST, 'accountId');
    $loginid    = filter_input(INPUT_POST, 'loginid');
    $pword      = filter_input(INPUT_POST, 'pword');
    $pwordMatch = filter_input(INPUT_POST, 'pwordMatch');
    $firstName  = filter_input(INPUT_POST, 'firstName');
    $lastName   = filter_input(INPUT_POST, 'lastName'); 

    //Check if passwords match
    if($pword !== $pwordMatch){
        header('location: ?accountId='. $accountId .'&message=pwordMatch');
    }

    $account->updateAccount(
        $accountId,
        $loginid,
        $pword,
        $firstName,
        $lastName
    );
}

include '../../view/admin/adminNavBar.php';
?>            
            <form class="form-editprofile" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="accountId" value="<?php echo $accountId ?>">
                <div class="form-row">
                <label for="loginIdInput">LoginID</label>
                <input class="form-control" type="text" id="loginIdInput" name="loginid" value="<?php echo $accountDetails['LoginID']; ?>">
                </div>
                <div class="form-row">
                <label for="fNameInput">First Name</label>
                <input class="form-control" type="text" id="fNameInput" name="firstName" value="<?php echo $accountDetails['FirstName']; ?>">
                </div>
                <div class="form-row">
                <label for="lNameInput">Last Name</label>
                <input class="form-control" type="text" id="lNameInput" name="lastName" value="<?php echo $accountDetails['LastName']; ?>">
                </div>
                <div class="form-row">
                <label for="pwordInput">Password</label>
                <input class="form-control" type="password" id="pwordInput" name="pword">
                </div>
                <div class="form-row">
                <label for="pwordMatchInput">Password Match</label>
                <input class="form-control" type="password" id="pwordMatchInput" name="pwordMatch">
                </div>
                <p></p>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Update</button>
            </form>
            
        </div>
    </div>


<?php include '../../view/partials/footer.php'; ?>