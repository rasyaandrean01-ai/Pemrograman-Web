    <div class="col-9">
            <!-- komponen main/konten -->
            <?php
            // tangkap request halaman
            $hal = $_REQUEST['hal'];
            if(!empty($hal)){
                include_once $hal.'.php';
            } else {
                include_once 'home.php';
            }
            ?>
        </div>
    </div>