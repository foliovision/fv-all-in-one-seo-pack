=== FV Simpler SEO ===
Contributors: FolioVision
Tags: post,google,seo,meta,meta keywords,meta description,title,posts,plugin, search engine optimization
Requires at least: 3.4
Tested up to: 4.4
Stable tag: trunk

Simple and effective SEO. Non-invasive, elegant. Ideal for client facing projects.

== Description ==

A simplified version of All in One SEO Pack!

Streamlined interface with no keywords field. Option to turn off excerpts and automated descriptions. Far better for pure SEO and for client use. Check screenshots.

Optimizes your Wordpress blog for Search Engines (Search Engine Optimization).

**If upgrading from All in One SEO Pack, please back up your database first!**

[Support](http://foliovision.com/seo-tools/wordpress/plugins/fv-all-in-one-seo-pack/) |
[Change Log](http://foliovision.com/seo-tools/wordpress/plugins/fv-all-in-one-seo-pack/changelog/) |

Some features:

* support for Google authorship and publisher fields
* support for Facebook Open Graph and Twitter Cards
* Canonical URLs
* Fine tune Page Navigational Links 
* Built-in API so other plugins/themes can access and extend functionality
* Provides SEO Integration for WP e-Commerce sites
* Support for CMS-style WordPress installations
* Automatically optimizes your **titles** for search engines
* Generates **META tags automatically**
* Avoids the typical duplicate content found on Wordpress blogs
* For beginners, you don't even have to look at the options, it works out-of-the-box. Just install.
* For advanced users, you can fine-tune everything
* You can override any title and set any META description and any META keywords you want.
* Backward-Compatibility with many other plugins, like Auto Meta, Ultimate Tag Warrior and others.
* Support for qTranslate
* noindex and nofollow for each post (also excludes post from search and link rel prev/next attributes)

== Changelog ==

= Version 1.6.30 - 25 February 2016 =
* Fix loading of plugin settings

= Version 1.6.29 - 23 February 2016 =
* Added import for Genesis SEO
* Disabled Genesis SEO functionality along with FV Simpler SEO installed

= Version 1.6.28 - 17 December 2015 =
* Admin CSS - fixes for WP 4.4

= Version 1.6.27 - 31 August 2015 =
* Feature - link rel next/prev links for archives!
* Bugfix - short title tooltip whitespace fix
* Bugfix - shortened post slug editing

= Version 1.6.26 - 27 May 2015 =
* Bugfix - qTranslate tags fix for OG and Twitter Cards tags

= Version 1.6.25 - 12 May 2015 =
* Feature - Category SEO title option added
* Feature - Custom post type title rewritting
* Feature - use this plugin to insert your Google Analytics, Statcounter and custom HTML in header and footer
* Feature - Wordpress Seo by Yoast import function
* Feature - XML Sitemaps & Google News feed plugin support - use our plugin to include/exclude categories and authors from XML sitemap
* Improvement - hAtom microformats (.hentry element class inserted by Wordpress) removed by default. hEntry is a microformat declaration which makes sure Google reads your post tags better, but we turn it off by default to keep the site structured data clean - only add what you really need.
* Improvement - Open Graph - added checking for duplicate images in og:image tag
* Improvement - Open Graph - only featured image and 2 widest images from content will be used (Facebook only picks the biggest images from Open Graph)
* Improvement - Wordpress shortlink - removed by default as they are bit against the concept of permalinks where the link doesn't change. Shortlinks can change as they are using post ID, so then you loose the link to your blog. Twitter has its own link shortening service.
* SEO - get rid of /?attachment_id={attachment_id} and /year/month/post-name/attachment-name kind of pages. Creates 301 redirections and replaces such links in content - enabled by default!
* Bugfix - meta description hint outputted by javascript was saved to postmeta if custom excerpt was set 

= Version 1.6.24 - 16 May 2014 =
* Improvement - all images from content are available for Facebook Open Graph now

= Version 1.6.23 - 15 April 2014 =
* Bugfix - "Use Categories for META keywords" option couldn't be turned on
* Bugfix - PHP warnings

= Version 1.6.22 - 21 March 2014 =
* Feature - added support for translations
* Feature - Facebook Open Graph support added (on by default)
* Feature - setting for custom post archive titles
* Feature - Twitter Cards support added (on by default)

= Version 1.6.21 - 13 Nov 2013 =
* Feature - Google Authorship and Publisher support. Visit Settings -> FV Simpler SEO -> Social Networking

= Version 1.6.20 - 23 Sep 2013 =
* Feature - better settings screen
* Feature - noindex feature now also excludes from YARPP related posts plugin
* Feature - option for post short title (on by default)
* Feature - Search Engine Results Preview box counts on post excerpt too
* Bugfix - extra DB queries when using page menu label in WP Nav Menus
* Bugfix - missing localization hook for title rewrite for posts
* Bugfix - URL shortening when doing Quick Edit
* Bugfix - tag archives in some templates - title rewrite function is counting less on using wp_title()

= Version 1.6.19 - 30 Jan 2013 =
* Added option for noindex and nofollow. Enable in plugin settings extra options first! This option also removes the page from link rel prev/next attributes and WP search.
* Fix for replacing of menu item labels

= Version 1.6.18 - 9 Jan 2013 =
* Fixed warnings from incomplete WP filter calls

= Version 1.6.17 - 7 Jan 2013 =
* Added Shortening of URL based on longest words in link

= Version 1.6.16 - 21 Dec 2012 =
* Added warnings when post doesn't have title or description while updating or publishing

= Version 1.6.15 - 26 Jul 2012 =
* better support for qTranslate - separate title and meta description fields!
* Wordpress Menus now use Short Title (Menu Label)

= Version 1.6.14 - 15 Dec 2011 =
* fix for Menu Label in Wordpress 3.3

= Version 1.6.13 - 24 Oct 2011 =
* Bing site verification tag support added
* Yahoo site verification tag support added
* qTranslate for menu labels and titles
* page number support in Description Format.
* Bugfixes

= Version 1.6.12.1 - 25 May 2011 =
* Bugfix release - slashes in title templates

= Version 1.6.12 - 13 April 2011 =
* Search Engines Results Page preview
* Wordpress post title now appears in Long title field if no Long title is specified for easier editing
* Bugfix - less db queries on wp_list_pages menus
* Bugfix - is_static_posts_page bug (used for title instead of is_static_front_page)
* Experimental - optional custom canonical link field

= Version 1.6.11 - 30 July 2010 =
* Wordpress 3.0 warning message removed

= Version 1.6.10 - 27 March 2010 =
* small bug fix

= Version 1.6.9 - 11 March 2010 =
* fix to support hosts without Multibye Support in PHP

= Version 1.6.8 - 4 February 2010 =
* total core rewrite, with the help of Mark Jaquith to overcome XSS cross scripting dangers in the original All in One SEO Pack plugin
* completely simplified user interface
* intelligent, non-intrusive defaults created. No need to configure advanced options. Wordpress and FV Simpler SEO plugin will take care of all fundamental SEO out of the box.
* please excuse the lag between updates. Someone started deleting All in One SEO plugin forks and competitors from the Wordpress plugin directory so we were unable to release our improvements properly until now. You will see a hole in the Wordpress.org downloads on account of these mysterious disappearances.

= Version 1.6.7 - 23 October 2009 =
* first release
* created from All in One SEO Pack 1.6.7 because we missed some options

== Installation ==

You can use the built in installer and upgrader, or you can install the plugin
manually.

1. You can either use the automatic plugin installer or your FTP program to upload it to your wp-content/plugins directory
the top-level folder. Don't just upload all the php files and put them in `/wp-content/plugins/`.
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Visit your SEO options (*Options - FV Simpler SEO*) for Wordpress 2.3.x, (*Settings - FV Simpler SEO*) for Wordpress 2.5.x-2.8.x 
1. Configure any options as desired
1. That's it!

If you have to upgrade manually simply repeat the installation steps and re-enable the plugin.

**If upgrading, please back up your database first!**

== Screenshots ==

1. FV Simpler SEO meta box - only the important things remain, the others can be turned on in options
2. FV Simpler SEO options screen


== Frequently Asked Questions ==

= So what's the advantage of this plugin over the original All in One SEO Pack ? =

The usage is simpler as the keywords field is disabled by default. And the Wordpress excerpts can be turned of for descriptions.

= Can I turn the keywords field back on? =

Yes you can. Check out 'Add keywords field to post editing screen' in plugin options.

= Why would anyone want to turn of the Wordpress excerpts for the descriptions? =

If you are doing some custom stuff (for example) with your templates, it might come handy. We need it.

= What about the rest of the original plugin functionality? =

It's all there.
