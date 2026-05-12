<nav class="navbar navbar-expand-lg bg-primary shadow-sm"
     data-bs-theme="dark">

    <div class="container-fluid">

        <!-- LOGO -->
        <a class="navbar-brand d-flex align-items-center"
           href="index.php">

            <img src="img/sttnf.png"
                 alt="Logo"
                 width="40"
                 class="me-2">

            My CV
        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- NAVBAR -->
        <div class="collapse navbar-collapse"
             id="navbarSupportedContent">

            <!-- MENU -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <!-- HOME -->
                <li class="nav-item">

                    <a class="nav-link"
                       href="index.php?hal=home">

                       Home
                    </a>

                </li>

                <!-- ABOUT -->
                <li class="nav-item">

                    <a class="nav-link"
                       href="index.php?hal=about">

                       About
                    </a>

                </li>

                <!-- CONTACT -->
                <li class="nav-item">

                    <a class="nav-link"
                       href="index.php?hal=contact">

                       Contact
                    </a>

                </li>

                <!-- DROPDOWN DATA -->
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       data-bs-toggle="dropdown">

                       Data
                    </a>

                    <ul class="dropdown-menu">

                        <li>

                            <a class="dropdown-item"
                               href="index.php?hal=pendidikan_list">

                               Pendidikan
                            </a>

                        </li>

                        <li>

                            <a class="dropdown-item"
                               href="index.php?hal=pengalaman_list">

                               Pengalaman
                            </a>

                        </li>

                    </ul>

                </li>

            </ul>

            <!-- SEARCH + LOGIN -->
            <div class="d-flex align-items-center gap-2">

                <!-- SEARCH -->
                <form class="d-flex"
                      method="GET">

                    <!-- INPUT -->
                    <input class="form-control me-2"
                          type="text"
                          name="keyword"
                          placeholder="Cari data...">

                    <!-- PILIH SEARCH -->
                    <select name="hal"
                        class="form-select me-2">

                    <option value="pendidikan_list"
                        <?= ($_GET['hal'] ?? '') == 'pendidikan_list' ? 'selected' : '' ?>>

                        Pendidikan

                    </option>

                    <option value="pengalaman_list"
                        <?= ($_GET['hal'] ?? '') == 'pengalaman_list' ? 'selected' : '' ?>>

                        Pengalaman

                    </option>

                </select>

                    <!-- BUTTON -->
                    <button class="btn btn-light fw-semibold me-3"
                            type="submit">

                        Search

                    </button>

                </form>

                <!-- LOGIN -->
                <?php if (!isset($_SESSION['LOGIN'])) { ?>

                    <a href="login.php"
                       class="btn btn-outline-light px-4 fw-semibold">

                        Login

                    </a>

                <?php } else { ?>

                    <!-- FOTO + NAMA -->
                    <div class="d-flex align-items-center text-white me-2">

                        <img src="img/<?= $_SESSION['FOTO'] ?>"
                             width="38"
                             height="38"
                             class="rounded-circle border border-white me-2">

                        <span class="fw-semibold">

                            <?= $_SESSION['NAMA'] ?>

                        </span>

                    </div>

                    <!-- LOGOUT -->
                    <a href="logout.php"
                       class="btn btn-danger fw-semibold">

                        Logout

                    </a>

                <?php } ?>

            </div>

        </div>

    </div>

</nav>