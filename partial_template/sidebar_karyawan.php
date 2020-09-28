<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="?halaman=beranda" <?php if($_GET['halaman'] == "beranda") {echo "class='active'";} ?>><i class="lnr lnr-home"></i> <span>Beranda</span></a></li>
                <li><a href="?halaman=absensi" <?php if($_GET['halaman'] == "absensi") {echo "class='active'";} ?>><i class="lnr lnr-alarm"></i> <span>Absensi</span></a></li>
            </ul>
        </nav>
    </div>
</div>

