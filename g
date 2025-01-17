<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Form</title>
    <link rel="stylesheet" href="styles.css">
    <script src="validation.js"></script>
</head>
<body>
    <div class="form-container">
        <h1 style="text-align: center; font-size: 36px; color: #b91919; margin-bottom: 20px;">DONOR Registration Form</h1>

        <form action="submit_form.php" method="POST" onsubmit="return validateForm(event)">
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Name:</label>
                    <input type="text" class="form-input" name="name" placeholder="Mr. X">
                    <div class="error" id="nameError"></div> <!-- Error message -->
                </div>
                <div class="form-group">
                    <label class="form-label">NID:</label>
                    <input type="text" class="form-input" name="nid" placeholder="111222333444">
                    <div class="error" id="nameError"></div> <!-- Error message -->
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Date of Birth:</label>
                    <input type="date" class="form-input" name="dob">
                </div>
                <div class="form-group">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-input" name="email"  placeholder="abc@xyz.com">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Gender:</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="gender" value="male" checked> Male
                        </label>
                        <label>
                            <input type="radio" name="gender" value="female"> Female
                        </label>
                        <label>
                            <input type="radio" name="gender" value="other"> Other
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Contact Number:</label>
                    <input type="tel" class="form-input" name="contact_number" placeholder="+880 123 4567890">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Address:</label>
                    <textarea class="form-input" name="address" placeholder="House#11, Road#11, xyz, xyz."></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Blood Type:</label>
                    <select class="form-input" name="blood_type">
                        <option value="">Select one</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Height:</label>
                    <input type="number" class="form-input" name="height" placeholder="170" value="170"> cm
                </div>
                <div class="form-group">
                    <label class="form-label">Weight:</label>
                    <input type="number" class="form-input" name="weight" placeholder="75" value="75"> kg
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Donated Blood before?:</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="donated_blood_before" value="yes" checked> Yes
                        </label>
                        <label>
                            <input type="radio" name="donated_blood_before" value="no"> No
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Allergy Details:</label>
                    <textarea class="form-input" name="allergy_details" placeholder="I have no allergy issue."></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Serious disease history:</label>
                    <textarea class="form-input" name="serious_disease_history" placeholder="HbsAg/Hcv/HIV/Hepatitis/Covid"></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Has anemia?:</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="anemia" value="yes" checked> Yes
                        </label>
                        <label>
                            <input type="radio" name="anemia" value="no"> No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Cardiac Patient?:</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="cardiac_patient" value="yes" checked> Yes
                        </label>
                        <label>
                            <input type="radio" name="cardiac_patient" value="no"> No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Under Medication?:</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="under_medication" value="yes" checked> Yes
                        </label>
                        <label>
                            <input type="radio" name="under_medication" value="no"> No
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group password-field">
                    <label class="form-label">Password:</label>
                    <input type="password" class="form-input" name="password" placeholder="AbcD@1234">
                    <span class="eye-icon">👁️</span>
                </div>
                <div class="form-group password-field">
                    <label class="form-label">Confirm Password:</label>
                    <input type="password" class="form-input" name="confirm_password" placeholder="AbcD@1234">
                    <span class="eye-icon">👁️</span>
                </div>
            </div>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</body>
</html>