</head>

<body>
<header>
    <div class="logo">

        
            <h1 class="logo-text">Blog</h1>
        </a>

    </div>

    <i class="fas fa-bars"></i>
    <ul class="nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About</a></li>
        <?php
        if (isset($_SESSION['user_logged_in']) && ($_SESSION['user_logged_in'] === true) && ($_SESSION['user_type'] == 'admin')) {
            ?>
            <li>
                <a href="all-user.php">
                    User
                </a>
            </li>
            <?php
        }
        ?>
        <?php
        if (isset($_SESSION['user_logged_in']) && ($_SESSION['user_logged_in'] === true)) {
            ?>
            <li>
                <a href="all-post.php">
                     Post
                </a>
            </li>
            <li>
                <a href="all-category.php">
                    Category
                </a>
            </li>
            <?php
        }
        ?>
        <li>
            <a href="#">
                <i class="far fa-user"></i>

                <?php
                if (isset($_SESSION['user_logged_in']) && ($_SESSION['user_logged_in'] === true)) {
                    echo $_SESSION['user_name'];
                    ?>

                    <?php
                } else {
                    ?>
                    User
                    <?php
                }
                ?>

                <i class="fas fa-caret-square-down"></i>

            </a>


            <ul>
                <?php
                if (isset($_SESSION['user_logged_in']) && ($_SESSION['user_logged_in'] === true)) {
                    ?>

                    <li><a href="actions/logout.php" class="Logout">Logout</a></li>
                    <?php
                } else {
                    ?>
                    <li><a href="login.php" class="Login">Login</a></li>
                    <li><a href="register.php" class="Register">Register</a></li>
                    <?php
                }
                ?>
            </ul>

        </li>


    </ul>

</header>