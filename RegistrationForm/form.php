<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Registration Form</title>
</head>

<body>
    <?php require_once 'formPost.php'; ?>

    <div>
        <div>Registration Form</div>
        <div>
            <form action="form.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend>YOUR ACCOUNT DETAILS</legend>
                    <div>
                        <div>
                            <label>Prefix:</label>
                            <?php $prefixData = ['Mr', 'Miss', 'Ms', 'Mrs', 'Dr']; ?>
                            <select name="account[prefix]">
                                <option disabled="" selected="">Select</option>
                                <?php foreach ($prefixData as $value) : ?>
                                    <?php $selected = getValue('account', 'prefix') == $value ? "selected" : ""; ?>
                                    <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label>First Name:</label>
                            <input type="text" name="account[firstName]" placeholder="First Name" required value="<?php echo getvalue('account', 'firstName'); ?>">
                            <?php echo !validate('account', 'firstName', 'name') ? "Invalid First Name" : ""; ?>
                        </div>
                        <div>
                            <label>Last Name:</label>
                            <input type="text" name="account[lastName]" placeholder="Last Name" required value="<?php echo getvalue('account', 'lastName'); ?>">
                            <?php echo !validate('account', 'lastName', 'name') ? "Invalid Last Name" : ""; ?>
                        </div>
                    </div>
                    <div>
                        <label>Date of Birth:</label>
                        <input type="date" name="account[dateOfBirth]" value="<?php echo getvalue('account', 'dateOfBirth'); ?>">
                    </div>
                    <div>
                        <label>Contact No.:</label>
                        <input type="text" name="account[contact]" required value="<?php echo getvalue('account', 'contact'); ?>">
                        <?php echo !validate('account', 'contact', 'phone') ? "Invalid Contact Number" : ""; ?>
                    </div>
                    <div>
                        <label>Email:</label>
                        <input type="text" name="account[email]" required value="<?php echo getvalue('account', 'email'); ?>">
                        <?php echo !validate('account', 'email', 'email') ? "Invalid Email" : ""; ?>
                    </div>
                    <div>
                        <label>Password:</label>
                        <input type="password" name="account[password]" requiured value="<?php echo getvalue('account', 'password'); ?>">
                    </div>
                    <div>
                        <label>Confirm Password:</label>
                        <input type="password" name="account[rePassword]" required value="<?php echo getvalue('account', 'rePassword'); ?>">
                        <?php echo !validate('account', 'rePassword', 'password') ? "Password not match" : ""; ?>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>ADDRESS INFORMATION</legend>
                    <div>
                        <div>
                            <label>Address Line 1:</label>
                            <input type="text" name="address[line1]" required value="<?php echo getvalue('address', 'line1'); ?>">
                            <?php echo !validate('address', 'line1', 'address') ? "Invalid Address Line 1" : ""; ?>
                        </div>
                        <div>
                            <label>Address Line 2:</label>
                            <input type="text" name="address[line2]" required value="<?php echo getvalue('address', 'line2'); ?>">
                            <?php echo !validate('address', 'line2', 'address') ? "Invalid Address Line 2" : ""; ?>
                        </div>
                        <div>
                            <label>Company:</label>
                            <input type="text" name="address[company]" value="<?php echo getvalue('address', 'company'); ?>">
                        </div>
                        <div>
                            <label>City:</label>
                            <input type="text" name="address[city]" value="<?php echo getvalue('address', 'city'); ?>">
                        </div>
                        <div>
                            <label>State:</label>
                            <input type="text" name="address[state]" value="<?php echo getvalue('address', 'state'); ?>">
                        </div>
                        <div>
                            <label>Country:</label>
                            <?php $countryData = ['India', 'USA', 'UK', 'London']; ?>
                            <select required name="address[country]">
                                <option disabled="" selected="">Select</option>
                                <?php foreach ($countryData as $value) : ?>
                                    <?php $selected = getValue('address', 'country') == $value ? "selected" : ""; ?>
                                    <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php echo !validate('address', 'country', 'country') ? "Invalid Country" : ""; ?>
                        </div>
                        <div>
                            <label>Postal Code:</label>
                            <input type="text" name="address[postalCode]" required value="<?php echo getvalue('address', 'postalCode'); ?>">
                            <?php echo !validate('address', 'postalCode', 'postalCode') ? "Invalid Postal Code" : ""; ?>
                        </div>
                    </div>
                </fieldset>
                <div>
                    <?php $checked = 'true' == getValue('account', 'optional') ? "checked" : ""; ?>
                    <input type="checkbox" id="optionalCheckbox" name="account[optional]" value="true" <?php echo $checked; ?>> Show Other Information
                </div>
                <fieldset id="optionalFieldset">
                    <legend>OTHER INFORMATION</legend>
                    <div>
                        <label>Describe Yourself:</label>
                        <textarea name="other[describeYourself]"><?php echo getvalue('other', 'describeYourself'); ?></textarea>
                        <?php echo !validate('other', 'describeYourself', 'describeYourself') ? "Invalid Paragraph" : ""; ?>
                    </div>
                    <div>
                        <label>Profile Image:</label>
                        <input type="file" name="other[profileImage]">
                    </div>
                    <div>
                        <label>Certificate Upload:</label>
                        <input type="file" name="other[certificate]">
                        <?php echo !validate('other', 'certificate', 'pdf') ? "Invalid format" : ""; ?>
                    </div>
                    <div>
                        <label>How long have you been in business?</label>
                        <?php $businessDurationData = ['UNDER 1 YEAR', '1-2 YEARS', '2-5 YEARS', '5-10 YEARS', 'OVER 10 YEARS']; ?>
                        <?php foreach ($businessDurationData as $value) : ?>
                            <?php $checked = getValue('other', 'businessDuration') == $value ? "checked" : ""; ?>
                            <input type="radio" name="other[businessDuration]" value="<?php echo $value ?>" <?php echo $checked; ?>> <?php echo $value; ?>
                        <?php endforeach; ?>
                    </div>
                    <div>
                        <label>Number of unique clients you see each week?</label>
                        <?php $uniqueClientsData = ['1-5', '6-10', '11-15', '15+']; ?>
                        <select name="other[uniqueClients]">
                            <option disabled="" selected="">Select</option>
                            <?php foreach ($uniqueClientsData as $value) : ?>
                                <?php $selected = getValue('other', 'uniqueClients') == $value ? "selected" : ""; ?>
                                <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label>How do you like us to get in touch with you?</label>s
                        <?php $getInTouchData = ['Post', 'Email', 'SMS', 'Phone']; ?>
                        <?php foreach ($getInTouchData as $value) : ?>
                            <?php $checked = in_array($value, getValue('other', 'getinTouch', [])) ? "checked" : ""; ?>
                            <input type="checkbox" name="other[getinTouch][]" value="<?php echo $value ?>" <?php echo $checked; ?>><?php echo $value; ?>
                        <?php endforeach; ?>
                        <?php echo !validate('other', 'getinTouch') ? "Field is empty" : ""; ?>
                    </div>
                    <div>
                        <label>Hobbies:</label>
                        <?php $hobbiesData = ['Listening to Music', 'Travelling', 'Blogging', 'Sports', 'Art']; ?>
                        <select name="other[hobbies][]" multiple>
                            <?php foreach ($hobbiesData as $value) : ?>
                                <?php $selected = in_array($value, getValue('other', 'hobbies', [])) ? "selected" : ""; ?>
                                <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </fieldset>
                <div><button type="submit" name="submit">Submit</button></div>
            </form>
        </div>
    </div>

    <script src="form.js"></script>

</body>

</html>