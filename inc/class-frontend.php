<?php

namespace Leadfeeder\Plugins\Wp_Lf_Tracker;


/**
 * Class Frontend
 * @package Leadfeeder\Plugins\Wp_Lf_Tracker
 */
class Frontend extends Singleton
{

    /**
     * Stores database options
     * @var array
     */
    private $db = array();


    protected function __construct()
    {
        // Store database options in a local array
        $this->db = get_option(LF_WP_OPTION_NAME);

        // Get action's priority
        $js_priority = absint($this->db['js_priority']);

        // Decide where to print code
        if ($this->db['js_location'] == 1) {
            add_action('wp_head', array($this, 'print_tracking_code'), $js_priority);
        } else {
            add_action('wp_footer', array($this, 'print_tracking_code'), $js_priority);
        }
    }

    /**
     * Prepare and print javascript code to front end
     */
    public function print_tracking_code()
    {
        // Store database options into a local variable coz it is going to modified
        $options = $this->db;

        // Check if to proceed or not, return early with a message if not
        $tracking_status = $this->is_tracking_possible(true);

        if ($tracking_status['status'] === false) {
            $this->load_view('lf-disabled.php', $tracking_status);
            return;
        }

        // Finalize some db options
        $options['lf_script_id'] = esc_js($options['lf_script_id']);

        $view_array = $this->prepare_lf_script($options);

        $this->load_view('lf-script.php', $view_array);
    }


    private function prepare_lf_script($options)
    {
        return array(
            'trackingId' => $options['lf_script_id'],
        );
    }


    /**
     * Load view and show it to front-end
     * @param $file string File name
     * @param $options array Array to be passed to view, not an unused variable
     * @throws \Exception
     */
    private function load_view($file, $options)
    {
        $file_path = plugin_dir_path(LF_WP_BASE_FILE) . 'views/' . $file;
        if (is_readable($file_path)) {
            require $file_path;
        } else {
            throw new \Exception('Unable to load template file - ' . esc_html($file_path));
        }
    }


    /**
     * Function determines whether to print tracking code or not
     * @param $reason bool
     * @return bool|array
     */
    private function is_tracking_possible($reason = false)
    {
        $status = array(
            'status' => false,
            'reason' => ''
        );

        if (is_preview()) {
            $status['reason'] = 'Leadfeeder tracker is disabled in preview mode';
        }
        else if (empty($this->db['lf_script_id'])) {
            $status['reason'] = 'Leadfeeder script ID is not set';
        }
        else if ($this->db['enabled'] == 0) {
            $status['reason'] = 'disabled in settings';
        } // if a user is logged in
        else if (is_user_logged_in()) {

            if (is_multisite() && is_super_admin()) {
                // if a network admin is logged in
                if (isset($this->db['ignore_role_networkAdmin']) && ($this->db['ignore_role_networkAdmin'] == 1)) {
                    $status['reason'] = 'Leadfeeder tracker is disabled for networkAdmin';
                } else {
                    $status['status'] = true;
                }
            } else {
                // If a normal user is logged in
                $role = $this->get_current_user_role();
                if (isset($this->db['ignore_role_' . $role]) && ($this->db['ignore_role_' . $role] == 1)) {
                    $status['reason'] = 'Leadfeeder tracker is disabled for - ' . $role;
                } else {
                    $status['status'] = true;
                }
            }
        } else {
            $status['status'] = true;
        }

        return ($reason) ? $status : $status['status'];
    }


    private function get_current_user_role()
    {
        $user = get_userdata(get_current_user_id());
        return empty($user) ? '' : array_shift($user->roles);
    }

}
