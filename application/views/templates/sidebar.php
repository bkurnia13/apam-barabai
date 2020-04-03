<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="index.html">
                <div class="logo-img">
                    <img src="<?= base_url('assets/') ?>img/pln.png" class="header-brand-img" alt="lavalite" width="30">
                </div>
                <span class="text">APaM v1.0</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <?php if( $title == 'Dashboard' ) : ?>
                        <div class="nav-item active">
                        <?php else : ?>
                        <div class="nav-item">
                    <?php endif; ?>
                        <a href="<?= base_url('dashboard'); ?>"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>

                    <!-- QUERY MENU GROUP -->
                    <?php
                        $role_id = $this->session->userdata('role_id');
                        $queryMenu = "SELECT `menu_group`.`id`, `menu_group`
                                        FROM `menu_group` JOIN `user_access_menu`
                                          ON `menu_group`.`id` = `user_access_menu`.`group_id`
                                       WHERE `user_access_menu`.`role_id` = $role_id 
                                       ORDER BY `user_access_menu`.`group_id` ASC";
                        $menu_group = $this->db->query($queryMenu)->result_array();
                    ?>

                    <!-- LOOPING MENU GRUOP -->
                    <?php foreach( $menu_group as $mg ) : ?>
                        <div class="nav-lavel"><?= $mg['menu_group']; ?></div>

                        <!-- QUERY MENU LEVEL 1 -->
                        <?php
                            $menu_group_id = $mg['id'];
                            $queryMenuLevel1 = "SELECT * FROM `menu_level_1` WHERE `group_id` = $menu_group_id AND `is_active` = 1";
                            $menu_level_1 = $this->db->query($queryMenuLevel1)->result_array();
                        ?>
                        <?php foreach( $menu_level_1 as $m1 ) : ?>
                            <?php if( $m1['submenu'] == 1 ) : ?>
                                <?php $submenu='has-sub'; ?>
                                <?php else : ?>
                                    <?php $submenu=''; ?>
                            <?php endif; ?>
                            <div class="nav-item <?= $submenu; ?>">
                                <a href="javascript:void(0)"><i class="<?= $m1['icon']; ?>"></i><span><?= $m1['menu_name']; ?></span></a>

                                <!-- QUERY MENU LEVEL 2 -->
                                <?php if( $m1['submenu'] == 1 ) : ?>
                                    <?php
                                        $queryMenuLevel2 = "SELECT * FROM `menu_level_2` WHERE `menu_id` = {$m1['id']} AND `is_active` = 1";
                                        $menu_level_2 = $this->db->query($queryMenuLevel2)->result_array();
                                    ?>
                                    <div class="submenu-content">
                                    <?php foreach( $menu_level_2 as $m2 ) : ?>
                                        <?php if( $title == $m2['submenu_name'] ) : ?>
                                            <a href="<?= $m2['url']; ?>" class="menu-item active"><?= $m2['submenu_name']; ?></a>
                                            <?php else : ?>
                                            <a href="<?= $m2['url']; ?>" class="menu-item"><?= $m2['submenu_name']; ?></a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                        <?php endforeach; ?>

                    <?php endforeach; ?>

                    <div class="nav-item">
                        <a href="<?= base_url('auth/logout') ?>"><i class="ik ik-log-out"></i><span>Logout</span></a>
                    </div>
                </nav>
            </div>
        </div>
    </div>