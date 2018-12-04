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
                    <router-link to="/category"><i class="menu-icon fa fa-laptop"></i>&nbsp;Kategori</router-link>

                </li>
                <li>
                    <router-link to="/brand"><i class="menu-icon fa fa-sitemap"></i>&nbsp;Brand</router-link>
                </li>

                <li>
                    <router-link to="/satuan"><i class="menu-icon fa fa-sitemap"></i>&nbsp;Satuan</router-link>
                </li>

                <li class="menu-title">Transaction</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Items</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="menu-icon fa fa-suitcase"></i><router-link to="/barang">&nbsp; List Items</router-link>
                        </li>
                        <li>
                            <i class="menu-icon fa fa-suitcase"></i><router-link to="/transaction/in">&nbsp; Receive Items</router-link>
                        </li>
                        <li>
                            <i class="menu-icon fa fa-suitcase"></i><router-link to="/transaction/out">&nbsp; Issue Items</router-link>
                        </li>
                    </ul>
                </li>

                
                <li class="menu-title">Report</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Select</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="menu-icon fa fa-bullhorn"></i><router-link to="/report/stok">&nbsp; Items Stock</router-link>
                        </li>
                        <li>
                            <i class="menu-icon fa fa-bullhorn"></i><router-link to="/report/transaction/in">&nbsp; Receive</router-link>
                        </li>
                        <li>
                            <i class="menu-icon fa fa-bullhorn"></i><router-link to="/report/transaction/out">&nbsp; Issue</router-link>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>