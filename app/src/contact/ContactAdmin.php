<?php 

use SilverStripe\Admin\ModelAdmin;

class ContactAdmin extends ModelAdmin {

  private static $menu_title = 'Contact Inquiries';
  private static $url_segment = 'contact-inquiries';

  private static $managed_models = [
    ContactObject::class
  ];

}