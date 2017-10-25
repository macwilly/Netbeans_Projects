<li>
    <a href="#"><i class="fa fa-hand-o-right fa-fw"></i> Animated Signs<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="../pages/signList.php">View Signs</a>
        </li>
        <?php
        if($secLevel >= 2){
            echo '<li>';
            echo '<a href="../pages/sign.php?type=1">Add Sign</a>';
            echo '</li>';
        }
        if($secLevel == 3){
            echo '<li>';
            echo '<a href="../pages/attributes.php">Sign Attributes</a>';
            echo '</li>';
            echo '<li>';
            echo '<a href="../pages/attribute.php?type=1">Add Attribute</a>';
            echo '</li>';
        }
        ?>
    </ul>
    <!--.nav-second-level--> 
</li>