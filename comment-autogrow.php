<?php
/*
Plugin Name: Comment Autogrow
Version: 1.1
Description: Makes the comment textarea expand in height automatically
Author: scribu
Author URI: http://scribu.net
Plugin URI: http://scribu.net/wordpress/comment-autogrow

Copyright (C) 2009 scribu.net (scribu AT gmail DOT com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

commentAutogrow::init();

class commentAutogrow
{
	function init()
	{
		add_action('template_redirect', array(__CLASS__, 'script'));
		add_action('wp_footer', array(__CLASS__, 'init_js'), 20);
	}

	function script()
	{
		$cond = ( is_single() || is_page() ) && $GLOBALS['post']->comment_status == 'open';

		if ( !$cond )
			return;

		$url = plugin_dir_url(__FILE__);

		wp_enqueue_script('growfield', $url . 'growfield.js', array('jquery'), '1.2.5', true);
	}
	
	function init_js()
	{
?>
<script type="text/javascript">
jQuery().ready(function($){	$('#comment').growfield(); });
</script>
<?php
	}
}

