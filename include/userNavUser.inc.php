<li>
    <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <?php 
            if($secLevel >=2){
                echo '<li>';
                echo '<a href="../pages/users.php">All Users</a>';
                echo '</li>';
                echo '<li>';
                echo '<a href="../pages/user.php?type=1">Add User</a>';
                echo '</li>';
            }
        ?>
        <li>
            <a href="../pages/user.php?type=2">Edit User</a>
        </li>
        <li>
            <a  href="../classes/logout.php"> Logout</a>
        </li>
    </ul>
    <!--.nav-second-level--> 
</li>