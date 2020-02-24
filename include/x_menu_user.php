<div class="header">
    <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="index.php">Camagru</a>

        <ul class="pure-menu-list">
            <li class="pure-menu-item"><a href="https://10.12.100.163/camagru/user/gallery.php" class="pure-menu-link">Gallery</a></li>
            <li class="pure-menu-item"><a href="https://10.12.100.163/camagru/user/montage.php" class="pure-menu-link">Montage</a></li>
            <li class="pure-menu-item"><a href="https://10.12.100.163/camagru/user/profile.php" class="pure-menu-link"><?php if (!empty($_SESSION['username'])) echo $_SESSION['username']; else echo "Username"; ?></a></li>
            <li class="pure-menu-item"><a href="https://10.12.100.163/camagru/include/logout.php?token=<?php echo $_SESSION['token']; ?>" class="pure-menu-link">LogOut</a></li>
        </ul>
    </div>
</div>
