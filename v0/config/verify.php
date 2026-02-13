<?php 
/**
 * User Authentication Verification
 * Handles login form submission, validates credentials, and manages session
 */

session_start();

// Security: Prevent session fixation attacks
session_regenerate_id(true);

require_once "config.php";

// Configuration
define('ADMIN_ROLE', 1);
define('MANAGER_ROLE', 2);
define('USER_ROLE', 3);

/**
 * Sanitize input data
 * Removes whitespace and prevents common injections
 *
 * @param string $data Input data to sanitize
 * @return string Sanitized data
 */
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Determine redirect URL based on user role
 *
 * @param int $role_id User's role ID
 * @return string Redirect URL
 */
function getRedirectUrl($role_id) {
    switch ($role_id) {
        case USER_ROLE:
            return "../app/self-inventory";
        case ADMIN_ROLE:
        case MANAGER_ROLE:
        default:
            return "../app/dashboard";
    }
}

// Check if username and password are provided
if (!isset($_POST['username']) || !isset($_POST['password'])) {
    header("Location: ../index.php?error=Username and Password are required");
    exit();
}

// Sanitize input
$username = validate($_POST['username']);
$password = $_POST['password']; // Don't sanitize password before hashing

// Validate inputs are not empty
if (empty($username)) {
    header("Location: ../index.php?error=Username is required");
    exit();
}

if (empty($password)) {
    header("Location: ../index.php?error=Password is required");
    exit();
}

// Use prepared statement to prevent SQL injection
$sql = "SELECT employee_id, username, password, picture, firstname, lastname, role_id, emp_email_add 
        FROM employee 
        WHERE username = ?";

$stmt = mysqli_prepare($con, $sql);

if ($stmt === false) {
    error_log("Prepare failed: " . mysqli_error($con));
    header("Location: ../index.php?error=Login system error");
    exit();
}

// Bind parameter
mysqli_stmt_bind_param($stmt, "s", $username);

// Execute statement
if (!mysqli_stmt_execute($stmt)) {
    error_log("Execute failed: " . mysqli_stmt_error($stmt));
    header("Location: ../index.php?error=Login system error");
    exit();
}

// Get results
$result = mysqli_stmt_get_result($stmt);

// Check if user exists
if (mysqli_num_rows($result) !== 1) {
    header("Location: ../index.php?error=Invalid username or password");
    exit();
}

$row = mysqli_fetch_assoc($result);

// Verify password hash
if (!password_verify($password, $row['password'])) {
    header("Location: ../index.php?error=Invalid username or password");
    exit();
}

// Password verified - set session variables
$_SESSION['username'] = $row['username'];
$_SESSION['loggedin'] = true;
$_SESSION['id'] = $row['employee_id'];
$_SESSION['session_picture'] = $row['picture'];
$_SESSION['firstname'] = $row['firstname'];
$_SESSION['lastname'] = $row['lastname'];
$_SESSION['role_id'] = $row['role_id'];
$_SESSION['email'] = $row['emp_email_add'];

mysqli_stmt_close($stmt);

// Redirect to appropriate page based on role
$redirect_url = getRedirectUrl($row['role_id']);
header("Location: $redirect_url");
exit();