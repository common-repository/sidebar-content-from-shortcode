=== Plugin Name ===
Contributors: pflonk
Donate link: http://dev.offensichtlich.net
Tags: sidebar, content, widget, shortcode
Requires at least: 3.7.0
Tested up to: 3.8
Stable tag: 2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This Plugin enables passing content to any sidebar from the page without using userdefined fields. Therefore it is possible to use the WYSIWIG-editor of your choice.

== Description ==

This plugin allows you to pass content to any sidebar from the page without using userdefined fields. Therefore it is possible to use the WYSIWIG-editor of your choice.

<u>How it works:</u>
This plugin comes with a new enclosing shortcode [sidebar_content][/sidebar_content] where you can place any content, you want to have displayed in the sidebar. You will be able to use other shortcodes within this shortcode to use galleries, videos or any other stuff in the sidebar of your choice.

Additionally there will be a new widget which you can insert into the sidebar you want to have the content displayed.
If you would like to pass content to an existing sidebar, there is another possibility using the [insert_sidebar_content] shortcode in any place you want. You are able to pass an id and/or a class to that content, to be able to style it with css as you like. This happens by simply adding:
[insert_sidebar_content id="yourID" class="yourClass"] to the shortcode. You can of course use just one or none of them. If you do not specify any custom class or id, there will be a standard class and id called "insert_scfs" applied to the content, wrapped in a div.

== Installation ==

This section describes how to install the plugin and get it working.

Ideally use the wordpress plugin-search function in the dashboard by searching "Sidebar-Content from Shortcode" and download it there. This will guarantee, that you will be notified, if there is an update for the plugin available.
If you want to install it manually, do the following:

1. Upload 'sidebar-content-from-shortcode.php' to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use it as described above :)
4. Send in bug reports, if you encounter some.

== Frequently Asked Questions ==

= Will there be support for this plugin? =

I will do my best to support, if any issues occur, but - as I am not a professional though - I cannot guarantee any supporttimes :)
I have already made an improvement of the plugin after a friendly request, so do not hesitate to do alike on my blog!

== Changelog ==

= 2.0 =
* Now also supports to pass content directly into any sidebar you like by using another shortcode [insert_sidebar_content]. This can be useful to fill sidebar content into another widget than the widget this plugin provides. Thanks to this idea to Arthur from www.convertic.dk !
* It is possible to pass an id and/or classes to the [insert_sidebar_content]-Tag like this: [insert_sidebar_content id="yourID" class="yourClass"]
* Widget got a bunch of options now, containing class, id, tagnames and titles

= 1.2 =
* Tested with Wordpress 3.8

= 1.1 =
* Added a class and an id called "scfc" to the div, that is wrapping the widget, to enable CSS styling of the contents.

= 1.0 =
* Release of the plugin. Works stable on 3.7.1

== Features ==

1. Widget

* optional title (if empty, no tag will be generated)
* optional title tag (default h3)
* optional title tag CSS-classes
* optional content-wrapper tag (default div)
* optional CSS-classes for content-wrapper tag
* optional CSS-id for content-wrapper tag
* default values for every of the above possibilities

2. Shortcodes

2.1 Content-Enclosement

* [sidebar_content]CONTENT[/sidebar_content] for use on any page

2.2 Widget-Display

* [insert_sidebar_content id="yourID" class="yourClass"] to display the content from the [sidebar_content]-Shortcode in any widget you like
* applicable id and classes

You will find further support on http://dev.offensichtlich.net

== Thanks ==

Thanks to the authors that provided information about how to implement this simple little function that I just put together:

Ryan Bosinger
http://www.ryanbosinger.com/boztown/2013/03/07/wordpress-custom-content/

1st-tec.de
http://www.tipps.1st-tec.de/wordpress/39-wordpress/sidebar-widgets/152-eigene-widgets-fuer-die-sidebar-erstellen.html