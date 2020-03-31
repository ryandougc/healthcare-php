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

//Include the page header
include '../../view/partials/header.php';

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

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="hidden" name="accountId" value="<?php echo $accountId ?>">

    <label for="loginIdInput">LoginID</label>
    <input type="text" id="loginIdInput" name="loginid" value="<?php echo $accountDetails['LoginID']; ?>">

    <label for="fNameInput">First Name</label>
    <input type="text" id="fNameInput" name="firstName" value="<?php echo $accountDetails['FirstName']; ?>">

    <label for="lNameInput">Last Name</label>
    <input type="text" id="lNameInput" name="lastName" value="<?php echo $accountDetails['LastName']; ?>">

    <label for="pwordInput">Password</label>
    <input type="password" id="pwordInput" name="pword">

    <label for="pwordMatchInput">Password Match</label>
    <input type="password" id="pwordMatchInput" name="pwordMatch">

    <button type="submit" name="submit">Update</button>
</form>
