<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="./">Hekasi Bata</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <?php
                    if (isset($_SESSION['account_id'])) {

                        if ($_SESSION['role_id'] == 1) {
                            ?>
                            <li><a href="./list_teacher.php">Teachers</a></li>
                            <li><a href="./list_section.php">Sections</a></li>
                            <li><a href="./logout.php">Logout</a></li>
                            <?php
                        } else if ($_SESSION['role_id'] == 2) {
                            ?>
                            <li><a href="./list_teacher_student.php">Students</a></li>
                            <li><a href="./logout.php">Logout</a></li>
                            <?php
                        } else if ($_SESSION['role_id'] == 3) {
                            ?>
                            <li><a href="./chapters.php">Chapters</a></li>
                            <li><a href="./student_profile.php">Profile</a></li>
                            <li><a href="./logout.php">Logout</a></li>
                            <?php
                        }
                    }
                    ?>
                    <li><a href="./about.php">About Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>