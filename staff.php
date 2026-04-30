<?php include 'php/header.php'; ?>

<?php include 'php/hero.php'; ?>

<main>
    <div class="container content-page">
        <section class="staff-section">
            <h2>Faculty & Administration</h2>
            <p>Our experienced and dedicated staff are committed to student success and well-being.</p>

            <div class="staff-grid">
                <?php
                // config already included in header.php
                $staff_query = $conn->query("SELECT * FROM staff WHERE is_active = 1 ORDER BY position ASC");
                
                if ($staff_query->num_rows > 0) {
                    while ($staff = $staff_query->fetch_assoc()) {
                        echo '<div class="staff-card">
                            <div class="staff-image">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <h3>' . sanitizeInput($staff['name']) . '</h3>
                            <p class="position">' . sanitizeInput($staff['position']) . '</p>
                            <p class="department">' . sanitizeInput($staff['department']) . '</p>';
                            
                            if (!empty($staff['email'])) {
                                echo '<p><i class="fas fa-envelope"></i> ' . sanitizeInput($staff['email']) . '</p>';
                            }
                            if (!empty($staff['phone'])) {
                                echo '<p><i class="fas fa-phone"></i> ' . sanitizeInput($staff['phone']) . '</p>';
                            }
                            if (!empty($staff['bio'])) {
                                echo '<p class="bio">' . sanitizeInput($staff['bio']) . '</p>';
                            }
                        echo '</div>';
                    }
                } else {
                    $temporary_staff = array(
                        array('name' => 'Staff Member 1', 'position' => 'Coming Soon', 'department' => 'Staff directory coming soon', 'image' => 'staff1.jpeg'),
                        array('name' => 'Staff Member 2', 'position' => 'Coming Soon', 'department' => 'Staff directory coming soon', 'image' => 'staff2.jpeg')
                    );

                    foreach ($temporary_staff as $staff_card) {
                        echo '<div class="staff-card staff-card-temporary">
                            <div class="staff-image staff-image-photo">
                                <img src="images/' . sanitizeInput($staff_card['image']) . '" alt="' . sanitizeInput($staff_card['name']) . '">
                            </div>
                        </div>';
                    }
                }
                ?>
            </div>

            <div class="staff-info-box">
                <h3>Management</h3>
                <div class="management-list">
                    <div class="management-item">
                        <h4>Director</h4>
                        <p>Phone: <a href="tel:<?php echo preg_replace('/[^0-9+]/','',SCHOOL_DIRECTOR_PHONE); ?>"><?php echo SCHOOL_DIRECTOR_PHONE; ?></a></p>
                    </div>
                    <div class="management-item">
                        <h4>Administration Office</h4>
                        <p>Phone: <a href="tel:<?php echo preg_replace('/[^0-9+]/','',SCHOOL_PHONE1); ?>"><?php echo SCHOOL_PHONE1; ?></a></p>
                        <p>Email: <a href="mailto:<?php echo SCHOOL_EMAIL; ?>"><?php echo SCHOOL_EMAIL; ?></a></p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php include 'php/footer.php'; ?>
