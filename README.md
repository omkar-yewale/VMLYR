# VMLYR

 
CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Resources
 * Other folder information
 
 INTRODUCTION
------------
A Site Config API module is used to alter Drupal basic config form and add API key field. and save and update this APK key into the database.

Using this key we can get access to ipstack and weartherstack API.

Make sure you have valid ipstack and weartherstack API keys.

If both the keys are valid, in the menu bar you will get the weather report menu.

when you navigate to the weather page system will get your IP address and based on this IP address,

it will give you your current city as well as your current weather report in tabular format.

REQUIREMENTS
------------

This module requires no modules outside of the Drupal core.

INSTALLATION
------------

 * Install the Site Config API module as you would normally install a contributed
   Drupal module.
   
The configuration page is at admin/config/system/site-information,
  where you can configure the Basic site details as well as add or update API keys.

CONFIGURATION
-------------

    1. Navigate to Administration > Extend and enable the module.
    2. Navigate to Administration > Configuration > System > Site Information
    3. Add the APK keys and update the configuration.
    
 * After updating configuration visit this URL: /weather (in menu section weather menu is added)
 Here,
The system can get your IP address.

Based on this address using Apistack API it will get your current city location.

after getting the city location using weather stack API it will get your city weather report.

and the result will show in the table format.
 
 
 RESOURCES
-------------
   - [Add Custom Field in site config](https://www.drupal.org/forum/support/post-installation/2019-02-06/add-a-new-custom-field-to-site-infomation-form-in-drupal8)
   - [Extending Sit Config form](https://www.jaypan.com/tutorial/drupal-extending-core-configuration-extending-core-forms-and-overriding-core-routes)
   - [Add New Route](https://www.drupal.org/docs/drupal-apis/routing-system/altering-existing-routes-and-adding-new-routes-based-on-dynamic-ones)
   - [ipstack api](https://ipstack.com/documentation)
   - [weatherstack api](https://weatherstack.com/documentation)

 OTHER FOLDER INFORMATION
---------------------------

In PHP files folder:

1) Program to find all even values from the array recursively.
2) Program to Split the array .
 
