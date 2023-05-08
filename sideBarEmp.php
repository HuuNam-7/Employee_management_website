<div class="sidebar">
    <div class="logo_content">
        <div class="logo">
            <div class="logo_name"><?= $userName ?></div>
        </div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav_list">
        <li>
            <i class='bx bx-search'></i>
            <input type="text" placeholder="Search...">
            <span class="tooltip">Search</span>
        </li>

        <?php
        $user = $_SESSION['user'];
        $userID = $user['id'];
        ?>
        <li class="mt-3">
            <a href="empSeeTask.php?id=<?= $userID?>">
                <i class='bx bx-book-add'></i>
                <span class="links_name">Notification</span>
            </a>
            <span class="tooltip">Notification</span>
        </li>
        <?php
        ?>

        <li class="mt-3">
            <a href="submitFile.php">
                <i class='bx bx-add-to-queue'></i>
                <span class="links_name">Total Task</span>
            </a>
            <span class="tooltip">Total Task</span>
        </li>
        <li class="mt-3">
            <a href="empProfile.php?id=<?= $userID?>">
                <i class='bx bx-message-add'></i>
                <span class="links_name">Profile</span>
            </a>
            <span class="tooltip">Profile</span>
        </li>
        <li class="mt-3">
            <a href="logout.php">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Log out</span>
            </a>
            <span class="tooltip">Log out</span>
        </li>
    </ul>
</div>