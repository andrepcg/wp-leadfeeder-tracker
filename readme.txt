=== Leadfeeder WordPress Tracker ===
Tags: leadfeeder, tracking, leads, simple
Requires at least: 5.0.0
Requires PHP: 5.6.0
Tested up to: 5.6.1
Stable tag: 0.1
License: MIT
License URI: https://opensource.org/licenses/MIT
Contributors: andrepcg

The most simplified Leadfeeder Plugin for WordPress.

== Description ==

Track your WordPress website with Google Analytics service.


= Highlights =
* Simplest way of installing the Leadfeeder tracker in WordPress
* Most lightweight plugin
	* Does not provide any dashboard or statistics reporting tool
	* No Ads, No banner, No usage tracking
* Simplest user interface
	* Single page tab based interface
* Multi-site ready
    * Each sub site need to be configured separately
    * Each sub site will store its own configuration in database, there is no global settings for this plugin
* Ability to place code in header or footer, control priority



= Exclude users based on their role =
* Ability to exclude (stop tracking) for different WordPress roles
* Not tracking anything inside wp-admin area.
* Not tracking anything in preview mode.




== Installation ==
0. Remove existing Google Analytics plugin or disable them.
1. Search for 'Ank Simplified GA' in WordPress Plugin Directory and Download the .zip file & extract it.
2. Upload the folder `wp-lf-tracker` to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins List' page in WordPress Admin Area.
4. Configure this plugin via Settings-->Google Analytics
5. Login to Google Analytics account to view stats.


== Frequently Asked Questions ==

= Tracking code not shown up in front end =

There may be several reasons for this.

* Make sure you have entered a valid tracking ID.
* Check if tracking is not disabled for current logged in user type.
* Try to flush/delete your site cache.
* Try re-installing the plugin.


= Changes does not reflect after saving settings? =

Are you using some Cache/Performance plugin (eg: WP Super Cache/W3 Total Cache) ?

Then flush your WP cache after saving settings.


= Where to find my GA Tracking ID? =

Just go [here](https://support.google.com/analytics/answer/1032385).

= What is debugging mode, How do i use it? =

Debugging mode allows you to troubleshot problems with Google Analytics web tracking.
Once you enable this mode. Open up your site homepage and press F12 to open developer tools,
now switch to console tab to see detailed messages.

You can read more about troubleshooting [here](https://developers.google.com/analytics/resources/articles/gaTrackingTroubleshooting#gaDebug)

Don't forget to disable this mode in production.

This mode is only available for administrators only when they are logged-in to WordPress dashboard.

= How does it work for multi-site? =

You need to configure the plugin for each of sub-site individually.


== Screenshots ==
1. General Options
2. Advanced Options
3. Tracking/Monitor Options
4. Control code execution
5. Troubleshooting Options


== Upgrade Notice ==


== Changelog ==

= 0.1 =
* First beta


== Other Notes ==

