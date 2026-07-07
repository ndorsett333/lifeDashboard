<?php
/**
 * Life OS frontend dashboard placeholder.
 */

defined('ABSPATH') || exit;

get_header();
?>
<main id="life-os-app" class="life-os-frontend-page" aria-label="<?php echo esc_attr__('Life OS Frontend', 'life-os'); ?>">
    <div class="life-os-container">
        <h1><?php echo esc_html__('Life OS', 'life-os'); ?></h1>
        <p><?php echo esc_html__('Frontend dashboard shell is ready. Modules will be added iteratively.', 'life-os'); ?></p>
    </div>
</main>
<?php
get_footer();
