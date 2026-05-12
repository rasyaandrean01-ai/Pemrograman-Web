    <div class="col-9">
        <!-- Komponen Main -->
        <div class="card" style="width: 18rem;">
        <?php
        // tangkap request halaman
        $hal = $_REQUEST['hal'];
        if(!empty($hal)){
            include_once "$hal.php";
        } else {
            include_once "home.php";
        }
        ?>
</div>
</div>