=== Save and Share Cart for WooCommerce ===
Contributors: wpgurudev
Donate link: http://sharethingz.com
Tags: woocommerce, cart, share, social, facebook, google, twitter, e-commerce, save
Requires at least: 5.0.0
Tested up to: 5.4.2
Requires PHP: 7.2
Stable tag: 2.0.0
License: GPLv2 or later (of course!)
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Save and share woocommerce cart with anyone

== Description ==
This plugin allows you to save and share WooCommerce cart directly from your store. This would help other users to do quick checkout with pre-populated cart.

[Documentation for the plugin](https://github.com/ankitrox/share-cart/blob/master/README.md "Save and Share Cart for WooCommerce Documentation")

= Features =

* Allows customers to share cart with other people with similar interest.
* Other people can perform directly checkout after viewing shared cart.
* Saved carts can be used as wishlist-type.
* Useful to take support from customer care by sharing carts with them.
* Adding links to newsletters, ads or communications to quickly add products or sets of products to customers’ carts with one click. Increasing sales!
* Helps in more conversions!
* Strong support.
* For customization according to your need contact: https://www.facebook.com/shrthngz

== Installation ==
Install Save and Share Cart for WooCommerce from the 'Plugins' section in your dashboard (Plugins > Add New > Search for Save and Share Cart for WooCommerce ).

Place the downloaded plugin directory into your wordpress plugin directory.

Activate it through the 'Plugins' section.

== Frequently Asked Questions ==

= Email is not getting sent or empty =
You have to enter the email template in plugin settings. Go to `WooCommerce > Settings > Share Cart > Email > Email body`.

= Captcha is throwing error =
This plugin uses reCaptcha v2 (checkbox) for preventing attacks from bots which may abuse Save and Email features of the plugin.
You must register the site with Google Recaptcha v2 (Tickbox).
You can register the site for recaptcha here: https://www.google.com/recaptcha/admin/create

= Where I can see the saved carts? =
You can access the saved carts in "My accounts" section of WooCommerce. You should be able to see "Saved carts" menu in
the account navigation.

== Screenshots ==

1. General Settings.
2. Email Settings.
3. Saved cart settings.
4. Share cart button.
5. Share cart pop-up.

== Changelog ==

= 2.0.0 =
* Rewrite: Revamp entire plugin to use React.js components.
* API: Use APIs to read/write data via plugin.
* UI: Change the entire UI to be more intuitive.
* Fix: Copy link to clipboard.
* Fix: Translation domain.

= 1.0.7 =
* Hook: `wcssc_cart_saved` added in save_cart function.
* JS: `sharebox_updated` event added for modal update.
* Feature: Total quantity and Total price in cart template.

= 1.0.6 =
* Fix: Icon breaking on single saved cart page.

= 1.0.5 =
* Update: Fontawesome to version 5.x
* Fix: Fix icon classes.

= 1.0.4 =
* Fix: Ajax loader displaying on non-wc pages.
* Fix: Share cart button text not changing.
* Feature: Copy to clipboard option.

= 1.0.3 =
* Filter to add custom shared cart single template.
* Description field for save cart.

= 1.0.2 =
* Bug fix: Remove saved cart.

= 1.0.1 =
* Default title for saved cart pages in settings.
* Docblock changes.
* Code formatting.

= 1.0.0 =
* First release.

== Upgrade Notice ==

= 2.0.0 =
* Complete revamp of the plugin.
* React.JS based components, more fast and intuitive user interface.
* WP REST API for data communication.
