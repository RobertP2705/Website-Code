<?php
require '../vendor/autoload.php';
require '../database.php';

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['password']) && $_POST['password'] === 'welcome2rob!') {
        $reviewer_name = $_POST['reviewer_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $company = $_POST['company'] ?? '';
        $rating = $_POST['rating'] ?? 0;
        $review_text = $_POST['review_text'] ?? '';
        $relation_to_robert = $_POST['relation_to_robert'] ?? '';
        $degree = $_POST['degree'] ?? '';

        if ($reviewer_name && $rating && $review_text) {
            Capsule::table('reviews')->insert([
                'reviewer_name' => $reviewer_name,
                'email' => $email,
                'company' => $company,
                'rating' => $rating,
                'review_text' => $review_text,
                'relation_to_robert' => $relation_to_robert,
                'degree' => $degree,
                'created_at' => Capsule::raw('CURRENT_TIMESTAMP'),
                'updated_at' => Capsule::raw('CURRENT_TIMESTAMP')
            ]);
            $success = 'Review submitted successfully!';
        } else {
            $error = 'Please fill in all required fields.';
        }
    } else {
        $error = 'Incorrect password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Review - Robert Prevost</title>
    <style>
        :root {
            --primary-color: #2C3E50;
            --secondary-color: #3498DB;
            --text-color: #2C3E50;
            --bg-color: #FFFFFF;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 2rem;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
            font-weight: 500;
        }

        input, textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        .submit-button {
            background: var(--secondary-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background: var(--primary-color);
        }

        .error {
            background: #fee;
            color: #c00;
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .success {
            background: #efe;
            color: #0c0;
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .back-link {
            display: inline-block;
            margin-top: 1rem;
            color: var(--primary-color);
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
            font-weight: 500;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        .required::after {
            content: " *";
            color: var(--accent-color);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Submit a Review</h1>
        
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div class="success">
                <?php echo $success; ?>
                <br>
                <a href="index.php" class="back-link">Return to homepage</a>
            </div>
        <?php else: ?>
            <form method="POST" action="" class="review-form">
                <div class="form-group">
                    <label for="reviewer_name">Name *</label>
                    <input type="text" id="reviewer_name" name="reviewer_name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                </div>

                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" id="company" name="company">
                </div>

                <div class="form-group">
                    <label for="rating">Rating *</label>
                    <select id="rating" name="rating" required>
                        <option value="">Select a rating</option>
                        <option value="5">5 - Excellent</option>
                        <option value="4">4 - Very Good</option>
                        <option value="3">3 - Good</option>
                        <option value="2">2 - Fair</option>
                        <option value="1">1 - Poor</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="review_text">Review *</label>
                    <textarea id="review_text" name="review_text" required></textarea>
                </div>

                <div class="form-group">
                    <label for="relation_to_robert">Relation to Robert</label>
                    <input type="text" id="relation_to_robert" name="relation_to_robert">
                </div>

                <div class="form-group">
                    <label for="degree">Degree/Certification</label>
                    <input type="text" id="degree" name="degree">
                </div>

                <div class="form-group">
                    <label for="password">Password *</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" class="submit-button">Submit Review</button>
            </form>
            
            <a href="../index.php" class="back-link">← Back to homepage</a>
        <?php endif; ?>
    </div>
</body>
</html>