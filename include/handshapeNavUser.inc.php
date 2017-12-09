<li>
    <a href="#"><i class="fa fa-header fa-fw"></i> Handshapes<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="../pages/handshapes.php">All Handshapes</a>
        </li>
        <?php
        if ($secLevel >= 3) {
            echo '<li>';
            echo '<a href="../pages/handshape.php?type=1">Add A Handshape</a>';
            echo '</li>';
        }
        ?>
    </ul>
    <!--.nav-second-level--> 
</li>