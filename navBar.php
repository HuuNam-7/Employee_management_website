<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu" id="btn"></span>
            </button>
        </div>
        <div>

            <?php
            $userForLogo = $_SESSION['user'];
            if ($userForLogo['decentralization'] == 'admin') {
            ?>
            <a class="navbar-brand brand-logo" href="adminhome.php">
                <img width="40" height="100%" src="./images/adminT.png" alt="logo" />
            </a>
            <?php
            } elseif ($userForLogo['decentralization'] == 'department') {
            ?>
            <a class="navbar-brand brand-logo" href="departhome.php">
                <img width="40" height="100%" src="./images/adminT.png" alt="logo" />
            </a>
            <?php
            } else {
            ?>
            <a class="navbar-brand brand-logo" href="employee.php">
                <img width="40" height="100%" src="./images/adminT.png" alt="logo" />
            </a>
            <?php
            }
            ?>
            <a class="navbar-brand brand-logo-mini" href="adminhome.php">
                <img src="./images/img1/logo-mini.svg" alt="logo" />
            </a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
        <?php
        $accountDB = getAccountData();
        $user = $_SESSION['user'];
        $userName = $user['username'];

        ?>
        <ul class="nav navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block">
                <h1 class="welcome-text">Good Afternoon, <span class="text-black fw-bold">
                        <?= $userName ?></span></h1>
            </li>
        </ul>
        <?php
        ?>

        <ul class="nav navbar-nav list-inline mx-auto">
            <li class="nav-item ml-5 list-inline-item">
                <a class="nav-link text-dark" href="#">
                    <i class="fa fa-user"></i> Welcome!
                </a>
            </li>
            <li class="nav-item ml-5 list-inline-item">
                <a class="nav-link text-dark" href="#">
                    <i class="fa fa-user"></i> Profile
                </a>
            </li>
            <li class="nav-item ml-5 list-inline-item">
                <a class="nav-link text-dark" href="logout.php">
                    <i class="fa fa-power-off"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</nav>