<!-- BEGIN NAVIGATION -->
<div class="header-navigation pull-right font-transform-inherit">
    <ul>
        <?php
        if($thisPage == "Home")
        {
        ?>
        <li class="dropdown active">
            <?php
            }
            else
            {
            ?>
        <li class="dropdown">
        <?php
        }
        ?>
            <a href="index.php">
                Home
            </a>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Help
            </a>
        </li>
        <?php
        if($thisPage == "About Us")
        {
        ?>
        <li class="dropdown active">
            <?php
            }
            else
            {
            ?>
        <li class="dropdown">
            <?php
            }
            ?>
            <a href="aboutus.php">
                About Us
            </a>
        </li>
        <?php
        if($thisPage == "Contact Us")
        {
        ?>
        <li class="dropdown active">
            <?php
            }
            else
            {
            ?>
        <li class="dropdown">
        <?php
        }
        ?>
            <a href="page-contacts.php">
                Contact Us
            </a>
        </li>
        <li class="dropdown dropdown-megamenu">
            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Feedback
            </a>
        </li>

        <!-- BEGIN TOP SEARCH -->
        <li class="menu-search">
            <span class="sep"></span>
            <i class="fa fa-search search-btn"></i>
            <div class="search-box">
                <form action="#">
                    <div class="input-group">
                        <input type="text" placeholder="Search" class="form-control">
                        <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                    </div>
                </form>
            </div>
        </li>
        <!-- END TOP SEARCH -->
    </ul>
</div>
<!-- END NAVIGATION -->