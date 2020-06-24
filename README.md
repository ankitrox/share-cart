# Save and Share Cart for WooCommerce

[1. Overview](#overview)

[2. Usage/Installation](#usage)

[3. Prerequisites for plugin to work](#prerequisites)

[4. Plugin settings](#settings)

  * [General Settings](#general)
  * [Email settings](#email)
  * [Save cart settings](#save-cart)



<a name="overview"></a> **Save and Share Cart for WooCommerce** is a WordPress plugin which enabled woocommerce customers to:

* Share cart on various social media platforms like Facebook, Twitter, WhatsApp etc.
* Email the cart to someone else.
* Save the cart for later reference or checkout. (Only logged-in users)


Save and share cart can be useful in following situations:

1. It allows customers to share cart with other people with similar interest.

2. Other people can perform checkout directly after viewing shared cart. No more hustle of finding,viewing and adding products to the cart.

3. Saved carts can be used as wishlist-type.

4. Useful to take support from customer care by sharing carts with them.

5. Adding links to newsletters, ads or communications to quickly add products or sets of products to customers’ carts with one click. **Increasing sales!**

### <a name="usage"></a> Usage/Installation

1. Clone this repository in plugnis directory of wordpress.

2. Move to `share-cart` directory and run `composer install && composer dump-autoload -o`. This will install all dependecies and will create classmap.

3. `cd assets/js` and run `npm i`. This will create all the necessary build files.

4. Go to WordPress dashboard in `Plugins > Installed plugins` and activate the plugin.

### <a name="prerequisites"></a> Prerequisites for plugin to work

1. This plugin uses reCaptcha v2 (checkbox) for preventing attacks from bots which may abuse `Save` and `Email` features of the plugin. You must register the site with Google Recaptcha v2 (Tickbox). You can register the site for recaptcha here: https://www.google.com/recaptcha/admin/create

2. In order for email to work, `Email body` field should be filled appropriately under `Email` settings tab (Described below).

### <a name="settings"></a> Plugin Settings Page

Plugin settings options can be accessed via WooCommerce settings tab. Go to `WooCommerce > Settings > Share Cart` from your wordpress dashboard. Please note that these settings options would be accessible to only those with `shop_manager` capability in WordPress.

Following is the description of each settings tab in settings page.

##### <a name="general"></a> 1. General Settings

**Cart Share Settings**

- Share button position - Select the position where you want to render the `Share cart` button. There are number of options available from which you can choose button placement.

- Share cart button text - Button text to render.

- Shared cart page title - If the cart does not have any title. This title will be used by default for the cart.

**Enable social media for sharing**

Select the social media platforms on which you want to allow your customers to share the cart. It includes following social media platforms:

* Facebook
* Twitter
* Skype
* WhatsApp

Apart from it, you can also allow them to `Email` and `Save` cart. `Copy cart link to clipboard` option is also there if they want to share the cart on some other platforms.

**Miscellaneous**

- Captcha key - This is **important and required option**. you need to register for reCaptcha v2 as the site uses Captcha to prevent from bot attacks.

##### <a name="email"></a> 2. Email Settings

- Email from address (optional) - If someone emails the cart, this address will be used as `from` address in email.
- Email from name (optional) - Used as `from` name in email.
- Email body (Required) - This will be sent as email body. There are several placeholders which can be used and will be replaced by appropriate data at the time of email being sent.

These placeholdres are:

`{cart_link}` - Link of the cart being shared.

`{blogname}` - Name of WordPress site.

`{siteurl}` - URL of WordPress blog.

##### <a name="save-cart"></a> 3. Save cart settings

- Saved cart title - This will be shown as navigation item title inside `My accounts` page.

![Saved cart title](https://sharethingz.com/wp-content/uploads/2020/06/Webp.net-resizeimage.png)
