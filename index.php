<?php 
require 'vendor/autoload.php';
require 'database.php';

use Illuminate\Database\Capsule\Manager as Capsule;

session_set_cookie_params([
    'samesite' => 'Strict',
    'secure' => true,
    'httponly' => true,
    'path' => '/'
]);
session_start();

$error = '';
$success = '';
$reviews = Capsule::table('reviews')->orderBy('created_at', 'desc')->get();
$averageScore = number_format(Capsule::table('reviews')->avg('rating'), 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handleFormSubmission();
}

function handleFormSubmission() {
    global $error, $success, $reviews, $averageScore;
    
    if ($_POST['password'] !== 'welcome2rob!') {
        $error = 'Incorrect password';
        return;
    }

    $fields = [
        'reviewer_name' => $_POST['reviewer_name'] ?? '',
        'email' => $_POST['email'] ?? '',
        'company' => $_POST['company'] ?? '',
        'rating' => $_POST['rating'] ?? 0,
        'review_text' => $_POST['review_text'] ?? '',
        'relation_to_robert' => $_POST['relation_to_robert'] ?? '',
        'degree' => $_POST['degree'] ?? ''
    ];

    if (empty($fields['reviewer_name']) || empty($fields['rating']) || empty($fields['review_text'])) {
        $error = 'Please fill in all required fields.';
        return;
    }

    // Insert review
    $fields['created_at'] = Capsule::raw('CURRENT_TIMESTAMP');
    $fields['updated_at'] = Capsule::raw('CURRENT_TIMESTAMP');
    
    Capsule::table('reviews')->insert($fields);
    
    // Refresh data
    $success = 'Review submitted successfully!';
    $reviews = Capsule::table('reviews')->orderBy('created_at', 'desc')->get();
    $averageScore = number_format(Capsule::table('reviews')->avg('rating'), 1);
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robert Prevost - Software Engineer</title>
    <link rel="icon" type="image/x-icon" href="assets/images/atom.png">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'templates/header.php'; ?>
    
    <?php include 'templates/navigation.php'; ?>

    <main>
        <?php include 'templates/projects.php'; ?>

        <?php include 'templates/work_experience.php'; ?>

        <?php include 'templates/reviews.php'; ?>
        
        <?php include 'templates/courseload.php'; ?>

        <?php include 'templates/modal.php'; ?>
    </main>

    <script src="js/main.js"></script>
</body>
</html>