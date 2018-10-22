<nav class="navigation">
    <div class="nav-item logo">
        <a href="/index.php">
            Bannertool
        </a>
    </div>
    <div class="nav-item user-menu dropdown">
        <div id="userMenu" class="user-menu_content" style="display: none;">
            <div class="user-information">
                <div class="user-image"></div>
                <p class="user-information_content">
                    <span class="user-username"><?php echo $_SESSION['username'] ?></span>
                    <span class="user-email"><?php echo $_SESSION['email'] ?></span>
                </p>
            </div>
            <a href="">Account settings</a>
            <a href="">History</a>
            <hr>
            <a href="">Admin settings</a>
            <a href="/tools/banner/add.php">Create new banner</a>
            <hr>
            <a href="/includes/signout.inc.php">Logout</a>
        </div>
    </div>
</nav>

