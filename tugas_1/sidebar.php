<div class="card shadow-sm border-0">

    <!-- HEADER -->
    <div class="card-header bg-primary text-white fw-bold">
        My CV - Sidebar
    </div>

    <!-- MENU -->
    <div class="list-group list-group-flush">

        <a href="index.php?hal=home"
           class="list-group-item list-group-item-action py-3">

           Home
        </a>

        <a href="index.php?hal=about"
           class="list-group-item list-group-item-action py-3">

           About
        </a>

        <a href="index.php?hal=contact"
           class="list-group-item list-group-item-action py-3">

           Contact
        </a>

        <a href="index.php?hal=pendidikan_list"
           class="list-group-item list-group-item-action py-3">

           Pendidikan
        </a>

        <a href="index.php?hal=pengalaman_list"
           class="list-group-item list-group-item-action py-3">

           Pengalaman
        </a>

        <!-- LOGIN / LOGOUT -->
        <?php if (!isset($_SESSION['LOGIN'])) { ?>

            <a href="login.php"
               class="list-group-item list-group-item-action text-primary py-3">

               Login
            </a>

        <?php } else { ?>

            <a href="logout.php"
               class="list-group-item list-group-item-action text-danger py-3 fw-semibold">

               <i class="bi bi-box-arrow-right me-1"></i>
               Logout
            </a>

        <?php } ?>

    </div>

</div>