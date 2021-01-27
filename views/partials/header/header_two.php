<?php
/**
 * Header Two
 */
?>

<header id="masthead" class="default">
    <div class="container-fluid">   
        <div class="tutor-nav">
            <div class="tutor-navbar-col tutor-navbar-brand">
                <div class="tutor-brand">
                    <?php if ( has_custom_logo() ) : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php the_custom_logo(); ?>
                        </a>
                    <?php else : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php svg( 'logo' ); ?>
                        </a>
                    <?php endif; ?>
                </div><!-- .tutor-brand -->
            </div>
            <div class="tutor-navbar-main-menu">
                    <?php
                        if ( has_nav_menu( 'primary' ) ) :
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'navbar-nav menu-one',
                                )
                            );
                        endif;
                    ?>
                <button class="navbar-toggler">
                    <svg height="30px" id="nav-toggler-id" viewBox="0 0 32 28" width="32px" xml:space="preserve">
                        <path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/>
                    </svg>
                </button>
            </div><!-- .tutor-navbar-main-menu -->
            <div class="tutor-navbar-col tutor-navbar-menu">
                <div class="tutor-navbar-cart">
                    <?php if ( is_user_logged_in() ) : ?>
                        <div class="tutor-header-profile-menu">
                            <div class="tutor-header-profile-photo">
                                <?php
                                    if ( function_exists( 'tutor_utils' ) ) {
                                        echo tutor_utils()->get_tutor_avatar( get_current_user_id(), 'thumbnail' );
                                    }else{
                                        $get_avatar_url = get_avatar_url( get_current_user_id(), 'thumbnail' );
                                        echo "<img alt='' src='$get_avatar_url' />";
                                    }
                                ?>
                            </div><!-- .tutor-header-profile-photo -->
                            <ul>
                                <?php
                                    if ( function_exists( 'tutor_utils' ) ) {
                                        $dashboard_page_id = tutor_utils()->get_option( 'tutor_dashboard_page_id' );
                                        $dashboard_pages = tutor_utils()->tutor_dashboard_pages();
                
                                        foreach ( $dashboard_pages as $dashboard_key => $dashboard_page ) {
                                            $menu_title = $dashboard_page;
                                            $menu_link = tutils()->get_tutor_dashboard_page_permalink( $dashboard_key );
                                            $separator = false;
                                            if ( is_array( $dashboard_page ) ) {
                                                if ( ! current_user_can( tutor()->instructor_role ) ) continue;
                                                $menu_title = tutor_utils()->array_get( 'title', $dashboard_page );
                                                /**
                                                 * Add new menu item property "url" for custom link
                                                 */
                                                if ( isset( $dashboard_page['url'] ) ) {
                                                    $menu_link = $dashboard_page['url'];
                                                }
                                                if ( isset( $dashboard_page['type'] ) && $dashboard_page['type'] == 'separator' ) {
                                                    $separator = true;
                                                }
                                            }
                                            if ( $separator ) {
                                                echo '<li class="tutor-dashboard-menu-divider"></li>';
                                                if ( $menu_title ) {
                                                    echo "<li class='tutor-dashboard-menu-divider-header'>$menu_title</li>";
                                                }
                                            } else {
                                                if ( $dashboard_key === 'index' ) $dashboard_key = '';
                                                echo "<li><a href='" . esc_url( $menu_link ) . "'>" . esc_html( $menu_title ) . " </a> </li>";
                                            }
                                        }
                                    }
                                ?>
                            </ul>
                        </div><!-- .tutor-header-profile-menu -->
                    <?php endif; ?>

                    <?php if ( ! is_user_logged_in() || is_customize_preview() ) : ?>
                    <div class="tutor-get-started-btn">
                        <?php if ( true === get_theme_mod( 'cta_text_toggle', true ) ) : ?>
                            <a class="call-to-action" href="<?php echo esc_url( get_theme_mod( 'cta_text_link', '#' ) ); ?>"><?php echo esc_html( get_theme_mod( 'cta_text', 'Getting Started' ) ); ?></a>
                        <?php endif; ?>
                    </div><!-- .tutor-get-started-btn -->
                    <?php endif; ?>

                </div><!-- .tutor-navbar-cart -->
            </div><!-- .tutor-navbar-menu -->
        </div>
    </div>
</header>