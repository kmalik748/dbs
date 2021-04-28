<?php
if (isset($_SESSION["darkTheme"]) && $_SESSION["darkTheme"] == 1){
    $navClass = "bg-dark navbar-dark";
    $txtColor = "text-light";
    $themeLinkText = "Light Theme";
}else{
    $navClass = "bg-light navbar-light shadow";
    $txtColor = "text-dark";
    $themeLinkText = "Dark Theme";
}
?>
<nav class="navbar navbar-expand-sm d-flex align-items-center <?php echo $navClass; ?> font-roboto">
    <ul class="navbar-nav d-flex align-items-center">
        <li class3="nav-item active">
            <a class="nav-link" href="#">
                <img style="height: 40px;" src="assets/imgs/dbs.png">
            </a>
        </li>
        <li class="nav-item ml-3">
            <a class="nav-link <?php echo $txtColor; ?>" href="admin_dashboard.php">Dashboard</a>
        </li>
        <?php
        if($_SESSION['id']!=1){
            echo '
            ';
        }
        if($_SESSION["is_admin"]){
            ?>

            <li class="nav-item ml-3">
<!--                <button class="a_modal_button nav-link --><?php //echo $txtColor; ?><!--" type="button" data-toggle="modal" data-target="#addNewDevice">-->
<!--                    Add Device-->
<!--                </button>-->
                <a href="admin_add_device.php" class="a_modal_button nav-link <?php echo $txtColor; ?>">
                    Add Device
                </a>
            </li>
            <li class="nav-item ml-3">
                <a class="nav-link <?php echo $txtColor; ?>" href="./users.php">Users Management</a>
            </li>
            <li class="nav-item ml-3">
                <a class="nav-link <?php echo $txtColor; ?>" href="./customize-dashboard.php">Dashboards Management</a>
            </li>
        <?php
        }
        ?>

        <li class="nav-item ml-3">
            <a class="nav-link <?php echo $txtColor; ?>" href="app/changeTheme.php"><?php echo $themeLinkText; ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo $txtColor; ?>" href="app/logout.php">Logout</a>
        </li>
    </ul>
</nav>
