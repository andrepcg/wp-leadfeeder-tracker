<div class="wrap">
    <h2><?php _e('Leadfeeder Wordpress Tracker', 'wp-lf-tracker') ?>
        <small>(v<?php echo LF_WP_PLUGIN_VER; ?>)</small>
    </h2>

    <h2 class="nav-tab-wrapper" id="lf-tabs">
        <a class="nav-tab" id="lf-general-tab" href="#top#lf-general"><?php _e('General', 'wp-lf-tracker') ?></a>
        <a class="nav-tab" id="lf-control-tab" href="#top#lf-control"><?php _e('Control', 'wp-lf-tracker') ?></a>
        <a class="nav-tab" id="lf-troubleshoot-tab" href="#top#lf-troubleshoot"><?php _e('Troubleshoot', 'wp-lf-tracker') ?></a>
    </h2><!--.nav-tab-wrapper-->

    <?php if($this->is_cache_plugin_installed() == true) { ?>
        <div class="notice notice-warning">
            <p><strong>There's a cache plugin installed. Make sure you clear its cache after setting your Leadfeeder tracker, otherwise it might not start acquiring leads.</strong></p>
        </div>
    <?php } ?>

    <form action="<?php echo admin_url('options.php') ?>" method="post" id="lfwpt_form" novalidate>
        <?php
        $options = $this->get_safe_options();
        //wp inbuilt nonce field , etc
        settings_fields(self::PLUGIN_OPTION_GROUP);
        ?>
        <div class="tab-wrapper">
            <section id="lf-general" class="tab-content">
                <table class="form-table">
                    <tr>
                        <th scope="row"><?php _e('Tracker enabled', 'wp-lf-tracker') ?> :</th>
                        <td>
                            <fieldset>
                                <label><input type="radio" name="lfwpt_options[enabled]"
                                              value="1" <?php checked($options['enabled'], 1) ?>>&ensp;<?php _e('Yes', 'wp-lf-tracker') ?>
                                </label><br>
                                <label><input type="radio" name="lfwpt_options[enabled]"
                                              value="0" <?php checked($options['enabled'], 0) ?>>&ensp;<?php _e('No', 'wp-lf-tracker') ?>
                                </label>
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e('Leadfeeder tracking ID', 'wp-lf-tracker') ?> :</th>
                        <td><input type="text" size="25" placeholder="v1_FalvOc2r3E68ZQrz" name="lfwpt_options[lf_script_id]"
                                   value="<?php echo esc_attr($options['lf_script_id']); ?>">
                            <a target="_blank" href="https://help.leadfeeder.com/en/articles/3691296-how-do-i-install-the-leadfeeder-tracker"><i
                                    class="dashicons-before dashicons-external"></i></a>
                            <br>
                            <p class="description"><?php _e('Paste your Leadfeeder tracking ID e.g.', 'wp-lf-tracker') ?>
                                ("<code>v1_xxxxxxxxxxxxxxxx</code>")</p>
                        </td>
                    </tr>
                </table>
            </section>


            <section id="lf-control" class="tab-content">
                <table class="form-table">
                    <tr>
                        <th scope="row"><?php _e('Place tracking code in', 'wp-lf-tracker') ?> :</th>
                        <td>
                            <fieldset>
                                <label><input type="radio" name="lfwpt_options[js_location]"
                                              value="1" <?php checked($options['js_location'], 1) ?>>&ensp;<?php _e('Document header', 'wp-lf-tracker') ?>
                                </label><br>
                                <label><input type="radio" name="lfwpt_options[js_location]"
                                              value="2" <?php checked($options['js_location'], 2) ?>>&ensp;<?php _e('Document footer', 'wp-lf-tracker') ?>
                                </label>
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e('Action priority', 'wp-lf-tracker') ?> :</th>
                        <td><input type="number" size="25" placeholder="20" name="lfwpt_options[js_priority]"
                                   value="<?php echo esc_attr($options['js_priority']); ?>">
                            <p class="description"><?php _e('0 means highest priority', 'wp-lf-tracker') ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e('Stop analytics when', 'wp-lf-tracker') ?> :</th>
                        <td>
                            <fieldset>
                                <?php
                                foreach ($this->get_all_roles() as $role) {
                                    echo '<label>';
                                    echo '<input type="checkbox" name="lfwpt_options[ignore_role_' . $role['id'] . ']" value="1" ' . checked($options['ignore_role_' . $role['id']], 1, 0) . '/>';
                                    echo '&ensp;' . esc_attr($role['name']) . ' ' . __('is logged in', 'wp-lf-tracker');
                                    echo '</label><br />';
                                }
                                ?></fieldset>
                        </td>
                    </tr>
                </table>
            </section>
            <section id="lf-troubleshoot" class="tab-content">
                <table class="form-table">
                    <tr>
                        <th scope="row"><?php _e('Debug database options', 'wp-lf-tracker') ?> :</th>
                        <td>
                            <pre class="db-dump"><?php print_r($options); ?></pre>
                        </td>
                    </tr>
                </table>
            </section>
        </div> <!--.tab-wrapper -->
        <?php submit_button() ?>
    </form>
    <hr>
    <p>
        <?php _e('Developed by', 'wp-lf-tracker') ?> - <a target="_blank" href="https://twitter.com/andrepcg">André Perdigão</a> |
        <?php _e('Contribute on', 'wp-lf-tracker') ?> <a href="https://github.com/andrepcg/wp-leadfeeder-tracker" target="_blank">GitHub</a> |
        ★ <?php _e('Rate this on', 'wp-lf-tracker') ?>
        <a href="https://wordpress.org/support/plugin/wp-lf-tracker/reviews/?filter=5" target="_blank"><?php _e('WordPress') ?></a>
    </p>
</div> <!-- .wrap-->
