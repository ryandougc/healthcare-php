<?php include '../partials/header.php'; ?>
<body>
<?php
include '../../view/staff/staffNavBar.php';
?>
            <!-- Sign up form 
            <h2>Update Staff Profile</h2>
            <form class="form-editprofile" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-row">
                    <label for="phoneNumInput">Phone Number</label>
                    <input id="phoneNumInput" class="form-control" type="text" name="phoneNum" 
                    value="<?php echo $patientDetails['PatientPhone']; ?>">
                </div>
                <div class="form-row">
                    <label for="addresInput">Address</label>
                    <input id="addresInput" class="form-control" type="text" name="address" 
                    value="<?php echo $patientDetails['PatientAddress']; ?>">
                </div>
                <div class="form-row">
                    <label for="cityInput">City</label>
                    <input id="cityInput" class="form-control" type="text" name="city"
                    value="<?php echo $patientDetails['PatientCity']; ?>">
                </div>
                <div class="form-row">
                    <label for="provinceInput">Province</label>
                    <input id="provinceInput" class="form-control" type="text" name="province"
                    value="<?php echo $patientDetails['PatientProvince']; ?>">
                </div>
                    <div class="form-row">
                    <label for="postCodeInput">Postal Code</label>
                    <input id="postCodeInput" class="form-control" type="text" name="postCode"
                value="<?php echo $patientDetails['PatientPostCode']; ?>">

                <div>
                    <h4>Receive Email Notifications?</h4>

                    <label for="emailNotifNoRadio">No</label>
                    <input id="emailNotifNoRadio" type="radio" name="emailNotifications"  value="0" <?php if($patientDetails['EmailNotifications'] == 0) {echo 'checked'; }?>>

                    <label for="emailNotifYesRadio">Yes</label>
                    <input id="emailNotifYesRadio" type="radio" name="emailNotifications"  value="1" <?php if($patientDetails['EmailNotifications'] == 1) {echo 'checked'; }?>>
                </div>
            
                <button type="submit" name="submit">Update</button>
            </form>
        </div>
    </div>-->

<?php include '../partials/footer.php'; ?>