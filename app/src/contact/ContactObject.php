<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class ContactObject extends DataObject {

  private static $db = [
    'Name' => 'Text',
    'Company' => 'Text',
    'Email' => 'Text',
  ];

  private static $has_one = [
    'HomePage' => HomePage::class,
    'Page' => Page::class,
  ];

  public function getCMSFields() {
    return new FieldList(
      TextField::create('Name'),
      TextField::create('Email'),
      TextField::create('Company'),
    );
  }

}