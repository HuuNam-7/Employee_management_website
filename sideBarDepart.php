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
        ?>
        <li class="mt-3">
            <a href="editFac.php?id=<?= $userID ?>">
                <i class='bx bx-add-to-queue'></i>
                <span class="links_name">Edit Falculty</span>
            </a>
            <span class="tooltip">Edit Falculty</span>
        </li>
        <?php
        ?>
        <li class="mt-3">
            <a href="totalTask.php">
                <i class='bx bx-message-add'></i>
                <span class="links_name">Total Task</span>
            </a>
            <span class="tooltip">Total Task</span>
        </li>
        <li class="mt-3">
            <a href="addTask.php">
                <i class='bx bx-message-add'></i>
                <span class="links_name">Create Task</span>
            </a>
            <span class="tooltip">Create Task</span>
        </li>
        <li class="mt-3">
            <a href="getFile.php">
                <i class='bx bx-message-add'></i>
                <span class="links_name">Get Task</span>
            </a>
            <span class="tooltip">Get Task</span>
        </li>
        <li class="mt-3">
            <a href="listEmp.php">
                <i class='bx bx-home-circle'></i>
                <span class="links_name">List Employee</span>
            </a>
            <span class="tooltip">List Employee</span>
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