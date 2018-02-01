
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand" href="index.php">
                     <img alt="tb paving logo" src="logo.png" style="height: 40px;margin-top: -10px; margin-right:5px; float: left;">OptimasDB
                </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               <!-- <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>

                </li>
                -->

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                      <!--  <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li> -->
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-power-off fa-fw"></i> Odhlásit se</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Hledat...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                         <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Nástěnka</a>
                            </li>
                            <li>
                                <a href="?page=klienti"><i class="fa fa-users fa-fw"></i> Zákazníci</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-calendar fa-fw"></i> Jednání <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                  <li>
                                      <a href="?page=add_jednani"> <i class="fa fa-plus-circle fa-fw"></i> Nové jednání</a>
                                  </li>
                                    <li>
                                        <a href="?page=nevyrizene_jednani"> <i class="fa fa-times-circle fa-fw"></i> Nevyřízené</a>
                                    </li>
                                    <li>
                                        <a href="?page=vypisJednani"> <i class="fa fa-list fa-fw"></i> Všechny</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="?page=stroje"><i class="fa fa-rocket" aria-hidden="true"></i> Stroje</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-calculator fa-fw"></i> Nabídky <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="?page=nova_nabidka"> <i class="fa fa-plus-circle fa-fw"></i> Nová</a>
                                    </li>
                                    <li>
                                        <a href="?page=nabidky"> <i class="fa fa-list fa-fw"></i> Všechny</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Objednávky <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <!--<li>
                                        <a href="?page=nova_objednavka"> <i class="fa fa-plus-circle fa-fw"></i> Nová</a>
                                    </li> -->
                                    <li>
                                        <a href="?page=objednavky"> <i class="fa fa-list fa-fw"></i> Všechny</a>
                                    </li>
                                    <li>
                                        <a href="?page=nevyrizene_objednavky"> <i class="fa fa-times-circle fa-fw"></i> Nevyřízené</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-wrench fa-fw"></i> Nastavení <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="panels-wells.html">Změnit heslo</a>
                                    </li>
                                    <li>
                                        <a href="?page=add_dopravce">Přidat dopravce</a>
                                    </li>
                                    <li>
                                        <a href="?page=add_produkt">Přidat produkt</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                   <a href="?page=sestavy"><i class="fa fa-clone" aria-hidden="true"></i> Sestavy</a>
                               </li>
                      <!--  <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Nastavení<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?p=moznosti">Možnosti</a>
                                </li>
                            </ul>

                        </li> -->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
