<?php
/**
 * Life OS frontend dashboard placeholder.
 */

defined('ABSPATH') || exit;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo esc_html(get_bloginfo('name')) . ' - ' . esc_html__('Life OS', 'life-os'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class('life-os-frontend'); ?>>
    <?php wp_body_open(); ?>
    <main id="life-os-app" class="life-os-frontend-page" aria-label="<?php echo esc_attr__('Life OS Frontend', 'life-os'); ?>">
        <div class="life-os-container" style="padding: 2rem; max-width: 1200px; margin: 0 auto;">
            <h1><?php echo esc_html__('Life OS', 'life-os'); ?></h1>
            <p><?php echo esc_html__('Frontend dashboard shell is ready. Modules will be added iteratively.', 'life-os'); ?></p>
        </div>
    </main>
    <?php wp_footer(); ?>
</body>
</html>
