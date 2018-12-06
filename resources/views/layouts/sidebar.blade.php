<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <router-link :to="{name : 'home'}"><i class="menu-icon fa fa-laptop"></i>Dashboard</router-link>
                </li>
                <li class="menu-title">Master Data</li><!-- /.menu-title -->
                <li>
                    <router-link to="/category"><i class="menu-icon fa fa-sitemap"></i>&nbsp;Category</router-link>

                </li>
                <li>
                    <router-link to="/brand"><i class="menu-icon fa fa-sitemap"></i>&nbsp;Brand</router-link>
                </li>

                <li>
                    <router-link to="/satuan"><i class="menu-icon fa fa-sitemap"></i>&nbsp;Unit</router-link>
                </li>

                <li class="menu-title">Transaction</li><!-- /.menu-title -->
                <li>
                    </i><router-link to="/barang"><i class="menu-icon fa fa-suitcase"></i>&nbsp; List Items</router-link>
                </li>
                <li>
                    </i><router-link to="/transaction/in"><i class="menu-icon fa fa-suitcase"></i>&nbsp; Receive Items</router-link>
                </li>
                <li>
                    </i><router-link to="/transaction/out"><i class="menu-icon fa fa-suitcase"></i>&nbsp; Issue Items</router-link>
                </li>

                
                <li class="menu-title">Report</li><!-- /.menu-title -->
                <li>
                    <router-link to="/report/stok"><i class="menu-icon fa fa-bullhorn"></i>&nbsp; Items Stock</router-link>
                </li>
                <li>
                    <router-link to="/report/transaction/in"><i class="menu-icon fa fa-bullhorn"></i>&nbsp; Receive</router-link>
                </li>
                <li>
                    <router-link to="/report/transaction/out"><i class="menu-icon fa fa-bullhorn"></i>&nbsp; Issue</router-link>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>