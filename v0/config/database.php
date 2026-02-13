<?php
    /**
     * Database Configuration and Connection
     * ICT-IMS Application
     */

    // Set timezone for application
    date_default_timezone_set("Asia/Manila");

    // Define the site root
    define('SITE_ROOT', 'http://localhost/ict-ims');

    // Database credentials
    // TODO: Move sensitive credentials to environment variables or .env file for production
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'ict_ims_db');
    define('DB_PORT', 3306);
    define('DB_CHARSET', 'utf8mb4');

    // Enable mysqli error reporting for better debugging
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    /**
     * Establish MySQL database connection
     * Uses procedural MySQLi with proper error handling
     */
    try {
        $con = mysqli_connect(
            DB_SERVER, 
            DB_USERNAME, 
            DB_PASSWORD, 
            DB_NAME, 
            DB_PORT
        );

        // Set character set to utf8mb4 for proper encoding
        if (!mysqli_set_charset($con, DB_CHARSET)) {
            throw new Exception("Error setting charset: " . mysqli_error($con));
        }

    } catch (Exception $e) {
        // Log error securely (don't expose to user in production)
        error_log("Database Connection Error: " . $e->getMessage());
        
        // Display user-friendly message
        die("Unable to connect to the database. Please try again later.");
    }
    
?>