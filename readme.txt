=== Comment Autogrow ===
Contributors: scribu
Tags: comments, javascript, autogrow
Requires at least: 2.8
Tested up to: 3.0
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Makes the comment textarea expand in height automatically

== Description ==

Getting comments on your site is one of the most important goals. Longer comments tend to be especially valuable.

However, most comment textareas have a small height, making it difficult to write long comments.

*Enter Autogrow*

Here's how it works: When a commenter almost fills the textarea, instead of getting a scrollbar, the textarea grows in height. This means they can see the entire comment while it's being written, no matter how long it is.

It uses the [Growfield](http://code.google.com/p/jquery-growfield/) plugin for jQuery.

Links: [Demo](http://scribu.net/wordpress/comment-autogrow/ca-1-1.html#respond) | [Plugin News](http://scribu.net/wordpress/comment-autogrow) | [Author's Site](http://scribu.net)

== Frequently Asked Questions ==

= It doesn't work =

First, make sure your theme has this line somewhere in footer.php:

`wp_footer();`

Next, check for JavaScript errors (In Firefox, press Ctrl + Shift + J and reload the page).

== Changelog ==

= 1.1.2 =
* WP 3.0.1 compatibility

= 1.1.1 =
* don't start script if it's not loaded

= 1.1 =
* replace Autogrow library with Growfield2
* compress javascript
* [more info](http://scribu.net/wordpress/comment-autogrow/ca-1-1.html)

= 1.0.1 =
* fixed height issue in IE8
* load script only if comments are open

= 1.0 =
* initial release
* [more info](http://scribu.net/wordpress/comment-autogrow/ca-1-0.html)

