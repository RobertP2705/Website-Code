<?php
// templates/courseload.php

$semesters = [
    [
        'term' => 'Fall 2023',
        'achievement' => "President's List",
        'courses' => [
            ['code' => 'CHM 121', 'name' => 'General Chemistry I (Honors)', 'grade' => 'A'],
            ['code' => 'CSC 121', 'name' => 'Computer Science I', 'grade' => 'A'],
            ['code' => 'ECO 211', 'name' => 'Microeconomics', 'grade' => 'A'],
            ['code' => 'EGR 100', 'name' => 'Introduction to Engineering', 'grade' => 'A'],
            ['code' => 'MTH 200', 'name' => 'Calculus I', 'grade' => 'A']
        ]
    ],
    [
        'term' => 'Spring 2024',
        'achievement' => "Dean's List",
        'courses' => [
            ['code' => 'CHM 122', 'name' => 'General Chemistry II', 'grade' => 'A'],
            ['code' => 'MTH 201', 'name' => 'Calculus II', 'grade' => 'B'],
            ['code' => 'PHI 205', 'name' => 'Religions of the World (Honors)', 'grade' => 'A'],
            ['code' => 'PHY 201', 'name' => 'General Physics I: Mechanics', 'grade' => 'A']
        ]
    ],
    [
        'term' => 'Fall 2024',
        'achievement' => "President's List",
        'courses' => [
            ['code' => 'CSC 122', 'name' => 'Computer Science II', 'grade' => 'A'],
            ['code' => 'EGR 210', 'name' => 'Analytical Mechanics/Statics', 'grade' => 'A'],
            ['code' => 'MTH 202', 'name' => 'Calculus III', 'grade' => 'A'],
            ['code' => 'PHY 202', 'name' => 'General Physics II: E&M', 'grade' => 'A']
        ]
    ],
    [
        'term' => 'Spring 2025',
        'inProgress' => true,
        'courses' => [
            ['code' => 'CIS 245', 'name' => 'Data Analysis'],
            ['code' => 'CSC 216', 'name' => 'Data Structures & Algorithm Analysis'],
            ['code' => 'MTH 203', 'name' => 'Linear Algebra'],
            ['code' => 'MTH 220', 'name' => 'Discrete Mathematics'],
            ['code' => 'MUS 103', 'name' => 'Music Appreciation']
        ]
    ]
];
?>

<section id="courseload">
    <div class="academic-container">
        <div class="academic-header">
            <h3 class="program-title">Engineering Pathways Program</h3>
            <p class="institution">Harper College / University of Illinois at Urbana-Champaign</p>
            <p class="current-gpa">Current GPA: 3.9</p>
        </div>

        <?php foreach ($semesters as $semester): ?>
            <div class="semester-card">
                <div class="semester-header">
                    <h4 class="semester-title">
                        <?php echo $semester['term']; ?>
                        <?php if (isset($semester['inProgress'])): ?>
                            (In Progress)
                        <?php endif; ?>
                    </h4>
                    <?php if (isset($semester['achievement'])): ?>
                        <span class="achievement-badge">🏆 <?php echo $semester['achievement']; ?></span>
                    <?php endif; ?>
                </div>
                <div class="course-list">
                    <?php foreach ($semester['courses'] as $course): ?>
                        <div class="course-item">
                            <div class="course-info">
                                <span class="course-code"><?php echo $course['code']; ?></span>
                                <span class="course-name"><?php echo $course['name']; ?></span>
                            </div>
                            <?php if (isset($course['grade'])): ?>
                                <span class="course-grade <?php echo $course['grade'] === 'A' ? 'grade-a' : 'grade-b'; ?>">
                                    <?php echo $course['grade']; ?>
                                </span>
                            <?php else: ?>
                                <span class="course-grade in-progress">In Progress</span>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>