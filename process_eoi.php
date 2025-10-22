<?php
// Start session for storing success messages
session_start();

// Check if this is a success page view (after redirect)
$is_success_view = isset($_GET['success']) && $_GET['success'] == '1' && isset($_SESSION['submission_successful']);

// Block direct access - redirect if not POST request and not success view
// Also check for required POST fields to ensure form was actually submitted
if (!$is_success_view) {
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: apply.php");
        exit();
    }
    
    // Check for at least some required POST fields to prevent direct access
    if (!isset($_POST['job_reference']) || !isset($_POST['first_name']) || !isset($_POST['email'])) {
        header("Location: apply.php");
        exit();
    }
}

// Include database settings
require_once('settings.php');

// Initialize response variables
$errors = [];

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to validate job reference
function validate_job_reference($job_ref) {
    if (empty($job_ref)) {
        return "Job reference is required";
    }
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z0-9]{5}$/", $job_ref)) {
        return "Job reference must be exactly 5 characters with at least one letter and one number";
    }
    return "";
}

// Function to validate name fields
function validate_name($name, $field_name) {
    if (empty($name)) {
        return "$field_name is required";
    }
    if (!preg_match("/^[A-Za-z][A-Za-z\s'-]{1,19}$/", $name)) {
        return "$field_name must be 2-20 characters and can only contain letters, spaces, hyphens, or apostrophes";
    }
    return "";
}

// Function to validate date of birth
function validate_dob($dob) {
    if (empty($dob)) {
        return "Date of birth is required";
    }
    if (!preg_match("/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/", $dob)) {
        return "Date of birth must be in format dd/mm/yyyy";
    }
    
    // Check if date is valid and person is at least 18 years old
    list($day, $month, $year) = explode("/", $dob);
    if (!checkdate($month, $day, $year)) {
        return "Invalid date";
    }
    
    $dob_time = strtotime("$year-$month-$day");
    $min_time = strtotime('-18 years');
    $max_time = strtotime('-100 years');
    
    if ($dob_time > $min_time) {
        return "You must be at least 18 years old";
    }
    if ($dob_time < $max_time) {
        return "Invalid date of birth";
    }
    
    return "";
}

// Function to validate gender
function validate_gender($gender) {
    if (empty($gender)) {
        return "Gender is required";
    }
    if (!in_array($gender, ["male", "female", "other"])) {
        return "Invalid gender selection";
    }
    return "";
}

// Function to validate address
function validate_address($address) {
    if (empty($address)) {
        return "Street address is required";
    }
    if (!preg_match("/^[A-Za-z0-9\s,.\-\/]{5,40}$/", $address)) {
        return "Street address must be 5-40 characters and can only contain letters, numbers, spaces, and basic punctuation";
    }
    return "";
}

// Function to validate suburb
function validate_suburb($suburb) {
    if (empty($suburb)) {
        return "Suburb/Town is required";
    }
    if (!preg_match("/^[A-Za-z\s'-]{2,40}$/", $suburb)) {
        return "Suburb/Town must be 2-40 characters and can only contain letters, spaces, hyphens, or apostrophes";
    }
    return "";
}

// Function to validate state
function validate_state($state) {
    if (empty($state)) {
        return "State is required";
    }
    $valid_states = ["VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT"];
    if (!in_array($state, $valid_states)) {
        return "Invalid state selection";
    }
    return "";
}

// Function to validate postcode
function validate_postcode($postcode) {
    if (empty($postcode)) {
        return "Postcode is required";
    }
    if (!preg_match("/^\d{4}$/", $postcode)) {
        return "Postcode must be exactly 4 digits";
    }
    return "";
}

// Function to validate email
function validate_email($email) {
    if (empty($email)) {
        return "Email address is required";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";
    }
    return "";
}

// Function to validate phone number
function validate_phone($phone) {
    if (empty($phone)) {
        return "Phone number is required";
    }
    if (!preg_match("/^\d{8,12}$/", $phone)) {
        return "Phone number must be 8-12 digits";
    }
    return "";
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate job reference
    $job_reference = sanitize_input($_POST["job_reference"] ?? "");
    $error = validate_job_reference($job_reference);
    if (!empty($error)) {
        $errors["job_reference"] = $error;
    }
    
    // Sanitize and validate first name
    $first_name = sanitize_input($_POST["first_name"] ?? "");
    $error = validate_name($first_name, "First name");
    if (!empty($error)) {
        $errors["first_name"] = $error;
    }
    
    // Sanitize and validate last name
    $last_name = sanitize_input($_POST["last_name"] ?? "");
    $error = validate_name($last_name, "Last name");
    if (!empty($error)) {
        $errors["last_name"] = $error;
    }
    
    // Sanitize and validate date of birth
    $dob = sanitize_input($_POST["date_of_birth"] ?? "");
    $error = validate_dob($dob);
    if (!empty($error)) {
        $errors["dob"] = $error;
    }
    
    // Sanitize and validate gender
    $gender = sanitize_input($_POST["gender"] ?? "");
    $error = validate_gender($gender);
    if (!empty($error)) {
        $errors["gender"] = $error;
    }
    
    // Sanitize and validate street address
    $street_address = sanitize_input($_POST["street_address"] ?? "");
    $error = validate_address($street_address);
    if (!empty($error)) {
        $errors["street_address"] = $error;
    }
    
    // Sanitize and validate suburb
    $suburb = sanitize_input($_POST["suburb"] ?? "");
    $error = validate_suburb($suburb);
    if (!empty($error)) {
        $errors["suburb"] = $error;
    }
    
    // Sanitize and validate state
    $state = sanitize_input($_POST["state"] ?? "");
    $error = validate_state($state);
    if (!empty($error)) {
        $errors["state"] = $error;
    }
    
    // Sanitize and validate postcode
    $postcode = sanitize_input($_POST["postcode"] ?? "");
    $error = validate_postcode($postcode);
    if (!empty($error)) {
        $errors["postcode"] = $error;
    }
    
    // Sanitize and validate email
    $email = sanitize_input($_POST["email"] ?? "");
    $error = validate_email($email);
    if (!empty($error)) {
        $errors["email"] = $error;
    }
    
    // Sanitize and validate phone
    $phone = sanitize_input($_POST["phone"] ?? "");
    $error = validate_phone($phone);
    if (!empty($error)) {
        $errors["phone"] = $error;
    }
    
    // Process skills (optional)
    $skills = isset($_POST["skills"]) ? implode(", ", $_POST["skills"]) : "";
    
    // Process other skills (optional)
    $other_skills = sanitize_input($_POST["other_skills"] ?? "");
    
    // If no errors, proceed with database insertion
    if (empty($errors)) {
        try {
            // Connect to database
            $conn = new mysqli($host, $username, $password, $database);
            
            // Check connection
            if ($conn->connect_error) {
                throw new Exception("Connection failed: " . $conn->connect_error);
            }
            
            // Check if eoi table exists, create it if it doesn't
            $table_check = $conn->query("SHOW TABLES LIKE 'eoi'");
            if ($table_check->num_rows == 0) {
                $create_table_sql = "CREATE TABLE eoi (
                    EOInumber INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    job_reference VARCHAR(10) NOT NULL,
                    first_name VARCHAR(40) NOT NULL,
                    last_name VARCHAR(40) NOT NULL,
                    date_of_birth VARCHAR(20),
                    gender VARCHAR(10),
                    street_address VARCHAR(100),
                    suburb VARCHAR(40),
                    state VARCHAR(10),
                    postcode VARCHAR(10),
                    email VARCHAR(255),
                    phone VARCHAR(25),
                    skills VARCHAR(255),
                    other_skills TEXT,
                    status ENUM('New', 'Current', 'Final') DEFAULT 'New',
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";
                
                if (!$conn->query($create_table_sql)) {
                    throw new Exception("Error creating table: " . $conn->error);
                }
            }
            
            // Prepare and execute SQL to insert data
            $stmt = $conn->prepare("INSERT INTO eoi (job_reference, first_name, last_name, date_of_birth, gender, street_address, suburb, state, postcode, email, phone, skills, other_skills) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
            $stmt->bind_param("sssssssssssss", 
                $job_reference, 
                $first_name, 
                $last_name, 
                $dob, 
                $gender, 
                $street_address, 
                $suburb, 
                $state, 
                $postcode, 
                $email, 
                $phone, 
                $skills, 
                $other_skills
            );
            
            if ($stmt->execute()) {
                $eoi_number = $conn->insert_id;
                
                // Store success data in session
                $_SESSION['submission_successful'] = true;
                $_SESSION['eoi_number'] = $eoi_number;
                
                // Close database connections
                $stmt->close();
                $conn->close();
                
                // Redirect to success page to prevent resubmission
                header("Location: process_eoi.php?success=1");
                exit();
            } else {
                throw new Exception("Error inserting record: " . $stmt->error);
            }
            
        } catch (Exception $e) {
            $errors["database"] = "Database error: " . $e->getMessage();
        }
    }
}

// Check if we're showing success page (after redirect)
$submission_successful = false;
$eoi_number = null;

if (isset($_GET['success']) && $_GET['success'] == '1' && isset($_SESSION['submission_successful'])) {
    $submission_successful = $_SESSION['submission_successful'];
    $eoi_number = $_SESSION['eoi_number'];
    
    // Clear session data after displaying
    unset($_SESSION['submission_successful']);
    unset($_SESSION['eoi_number']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Application Submission - Digital Futures Learning Hub</title>
    <link rel="stylesheet" href="styles/styles.css" />
</head>
<body class="submission-page">
    <a class="skip-link" href="#main-content">Skip to main content</a>
    
    <?php include 'header.inc'; ?>
    <?php include 'nav.inc'; ?>
    
    <!-- Main content area with skip link target -->
    <main id="main-content">
        <div class="container">
            <?php if ($submission_successful): ?>
                <!-- Success message with EOI number -->
                <section class="submission-success">
                    <h2>Application Submitted Successfully!</h2>
                    <p>Thank you for your interest in joining Digital Futures Learning Hub.</p>
                    <p>Your Expression of Interest has been received and will be reviewed by our team.</p>
                    <p><strong>Your EOI Reference Number: <?php echo htmlspecialchars($eoi_number); ?></strong></p>
                    <p>Please keep this number for your records.</p>
                    <div class="form-actions">
                        <a href="index.php" class="btn btn-primary">Return to Home</a>
                        <a href="jobs.php" class="btn btn-secondary">View More Jobs</a>
                    </div>
                </section>
            <?php else: ?>
                <!-- Error message with validation feedback -->
                <section class="submission-error">
                    <h2>Application Submission Error</h2>
                    <p>There were problems with your submission. Please review the errors below:</p>
                    
                    <ul class="error-list">
                        <?php foreach ($errors as $field => $message): ?>
                            <li><?php echo htmlspecialchars($message); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    
                    <div class="form-actions">
                        <a href="apply.php" class="btn btn-primary">Return to Form</a>
                    </div>
                </section>
            <?php endif; ?>
        </div>
    </main>
    
    <?php include 'footer.inc'; ?>
</body>
</html>
