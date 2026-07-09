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
        <div class="life-os-bg-glow" aria-hidden="true"></div>

        <div class="life-os-shell">
            <header class="life-os-topbar panel">
                <div class="brand">
                    <p class="eyebrow"><?php echo esc_html__('Personal Operating System', 'life-os'); ?></p>
                    <h1><?php echo esc_html__('Life OS', 'life-os'); ?></h1>
                </div>
                <div class="status-chip-wrap">
                    <span class="status-chip"><?php echo esc_html__('admin mode', 'life-os'); ?></span>
                    <span class="status-chip"><?php echo esc_html__('route: /life-os', 'life-os'); ?></span>
                    <span class="status-chip" data-life-os-clock>--:--:--</span>
                </div>
            </header>

            <section class="life-os-grid" aria-label="<?php echo esc_attr__('Life OS Dashboard Panels', 'life-os'); ?>">
                <article class="panel panel-focus">
                    <h2><?php echo esc_html__('Today\'s Focus', 'life-os'); ?></h2>
                    <p class="muted"><?php echo esc_html__('What is the best thing I can do right now?', 'life-os'); ?></p>
                    <ul class="task-list">
                        <li><span class="dot"></span><?php echo esc_html__('Deep work sprint: Goals system model pass', 'life-os'); ?></li>
                        <li><span class="dot"></span><?php echo esc_html__('30-minute movement block', 'life-os'); ?></li>
                        <li><span class="dot"></span><?php echo esc_html__('Journal checkpoint before lunch', 'life-os'); ?></li>
                    </ul>
                </article>

                <article class="panel panel-ai">
                    <h2><?php echo esc_html__('AI Coach', 'life-os'); ?></h2>
                    <p class="mono muted">$ coach --suggest --context=today</p>
                    <p><?php echo esc_html__('You are closest to momentum when you finish one hard thing early. Start the Goals repository implementation now.', 'life-os'); ?></p>
                    <button type="button" class="ghost-btn" disabled><?php echo esc_html__('Run Prompt (coming soon)', 'life-os'); ?></button>
                </article>

                <article class="panel panel-progress">
                    <h2><?php echo esc_html__('Learning Progress', 'life-os'); ?></h2>
                    <div class="meter-row">
                        <span><?php echo esc_html__('System Design', 'life-os'); ?></span>
                        <div class="meter"><span style="width: 72%"></span></div>
                    </div>
                    <div class="meter-row">
                        <span><?php echo esc_html__('WordPress Internals', 'life-os'); ?></span>
                        <div class="meter"><span style="width: 61%"></span></div>
                    </div>
                    <div class="meter-row">
                        <span><?php echo esc_html__('Health Protocol', 'life-os'); ?></span>
                        <div class="meter"><span style="width: 44%"></span></div>
                    </div>
                </article>

                <article class="panel panel-streaks">
                    <h2><?php echo esc_html__('Habit Streaks', 'life-os'); ?></h2>
                    <div class="streak-row"><span><?php echo esc_html__('Workout', 'life-os'); ?></span><strong>12</strong></div>
                    <div class="streak-row"><span><?php echo esc_html__('Reading', 'life-os'); ?></span><strong>9</strong></div>
                    <div class="streak-row"><span><?php echo esc_html__('Sleep Target', 'life-os'); ?></span><strong>6</strong></div>
                </article>

                <article class="panel panel-projects">
                    <h2><?php echo esc_html__('Projects', 'life-os'); ?></h2>
                    <ul class="project-list">
                        <li><span><?php echo esc_html__('Life OS plugin architecture', 'life-os'); ?></span><em><?php echo esc_html__('active', 'life-os'); ?></em></li>
                        <li><span><?php echo esc_html__('ratTube sync workflow', 'life-os'); ?></span><em><?php echo esc_html__('queued', 'life-os'); ?></em></li>
                        <li><span><?php echo esc_html__('Health tracking taxonomy', 'life-os'); ?></span><em><?php echo esc_html__('planning', 'life-os'); ?></em></li>
                    </ul>
                </article>

                <article class="panel panel-log">
                    <h2><?php echo esc_html__('System Log', 'life-os'); ?></h2>
                    <pre aria-label="<?php echo esc_attr__('System log output', 'life-os'); ?>">[ok] plugin bootstrap online
[ok] admin route mounted
[ok] frontend shell mounted
[..] modules pending implementation</pre>
                </article>
            </section>
    </main>
    <?php wp_footer(); ?>
</body>
</html>
