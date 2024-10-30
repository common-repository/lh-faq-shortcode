=== LH FAQ Shortcode ===
Contributors: shawfactor
Donate link: https://lhero.org/portfolio/lh-faq-shortcode/
Tags: faq, faqs, frequently asked questions, question, questions
Requires at least: 3.0.
Tested up to: 4.9
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


Creates an accordion style semantic FAQ list

== Description ==

This plugin provides a shortcode to include a HTML5 definition list suitable for FAQ's or other question and answer lists.

This faq is powered by vanilla JavaScript and has minimal styling so it will not conflict with your theme or JavaScript framework. To learn how to configure the shortcode please read the plugin FAQ

Check out a [live example][example]. 

View or [our documentation][docs] for more information. 

All tickets for the project are being tracked on [GitHub][].

[example]: https://princesparktouch.com/faq/#how-does-grading-work
[docs]: http://lhero.org/plugins/lh-faq-shortcode/
[GitHub]: https://github.com/shawfactor/lh-faq-shortcode

== Frequently Asked Questions ==

**How do I create Questions and answers?**

Each question and answer is a WordPress post or page object. The Title is the question and the Answer is the content.

**How do I display the FAQ's?**

Insert the [lh_faq_shortcode] into the post body of the page you wish to have an FAQ on. The short code should either have an attribute of post_parent (in which case the the Q&A's which will be children of the post_parent ID) or post__in (in which case the the Q&A's which will the post specied as ID's in post__in).

**Is this an FAQ on FAQ's?**

Yes it is!


== Installation ==

1. Upload the entire `lh-faq-shortcode` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Add the shortcode [lh_faq_shortcode] to the content of the page on which you want the FAQ, see the FAQ for shortcode options.


== Changelog ==

**1.00 May 01, 2016**  
Initial release.

**1.02 September 12, 2018**  
Singleton pattern.