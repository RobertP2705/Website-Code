<?php
// templates/reviews.php
global $reviews, $averageScore;
?>
<section id="reviews">
    <h2 class="section-title">Reviews</h2>
    <div class="review-section">
        <div class="average-score">
            Average Rating: <?php echo $averageScore; ?> / 5
        </div>

        <?php foreach ($reviews as $review): ?>
            <div class="review-card">
                <div class="review-header">
                    <div>
                        <strong><?php echo htmlspecialchars($review->reviewer_name); ?></strong>
                        <?php if ($review->company): ?>
                            <span> - <?php echo htmlspecialchars($review->company); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="rating">
                        <?php echo $review->rating; ?>/5
                    </div>
                </div>
                <p><?php echo nl2br(htmlspecialchars($review->review_text)); ?></p>
                <?php if ($review->relation_to_robert): ?>
                    <p><small>Relation: <?php echo htmlspecialchars($review->relation_to_robert); ?></small></p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <div style="text-align: center; margin-top: 2rem;">
            <a href="templates/submit_review.php" class="submit-button" style="text-decoration: none;">Submit a Review</a>
        </div>
    </div>
</section>