<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    {{-- <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a> --}}
                    <router-link to="/"><i class="menu-icon fa fa-laptop"></i>Dashboard</router-link>
                </li>
                <li class="menu-title">Master Data</li><!-- /.menu-title -->
                <li>
                    {{-- <a href="widgets.html"> <i class="menu-icon fa fa-sitemap"></i>Kategori </a> --}}
                    <router-link to="/category"><i class="menu-icon fa fa-laptop"></i>Kategori</router-link>

                </li>
                <li>
                    <router-link to="/brand"><i class="menu-icon fa fa-sitemap"></i>Brand</router-link>
                </li>

                <li>
                    <router-link to="/satuan"><i class="menu-icon fa fa-sitemap"></i>Satuan</router-link>
                </li>

                <li class="menu-title">Master Barang</li><!-- /.menu-title -->

                <li>
                    <router-link to="/barang"><i class="menu-icon fa fa-suitcase"></i>Barang</router-link>
                </li>
                
                <li>
                    <a href="widgets.html"> <i class="menu-icon fa fa-suitcase"></i>In </a>
                </li>
                <li>
                    <a href="widgets.html"> <i class="menu-icon fa fa-suitcase"></i>Out </a>
                </li>
                <li class="menu-title">Laporan</li><!-- /.menu-title -->
                <li>
                    <a href="widgets.html"> <i class="menu-icon fa fa-bullhorn"></i>In </a>
                </li>
                <li>
                    <a href="widgets.html"> <i class="menu-icon fa fa-bullhorn"></i>Out </a>
                </li>
                <li>
                    <a href="widgets.html"> <i class="menu-icon fa fa-bullhorn"></i>Stok </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>