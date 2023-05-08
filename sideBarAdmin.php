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
        <li class="mt-3">
            <a href="addDepartment.php">
                <i class='bx bx-book-add'></i>
                <span class="links_name">Add Department</span>
            </a>
            <span class="tooltip">Add Department</span>
        </li>
        <li class="mt-3">
            <a href="addEmployee.php">
                <i class='bx bx-add-to-queue'></i>
                <span class="links_name">Add Employee</span>
            </a>
            <span class="tooltip">Add Employee</span>
        </li>
        <li class="mt-3">
            <a href="addAccount.php">
                <i class='bx bx-message-add'></i>
                <span class="links_name">Add Account</span>
            </a>
            <span class="tooltip">Add Account</span>
        </li>
        <!-- where 'department' = dencentralization -->

        <li class="mt-3">
            <a href="totalDepartment.php">
                <i class='bx bx-user'></i>
                <span class="links_name">Total Department</span>
            </a>
            <span class="tooltip">Total Department</span>
        </li>
        <li class="mt-3">
            <a href="totalEmployee.php">
                <i class='bx bx-home-circle'></i>
                <span class="links_name">Total Employee</span>
            </a>
            <span class="tooltip">Total Employee</span>
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