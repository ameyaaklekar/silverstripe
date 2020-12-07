<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\File;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextAreaField;

class SectionObject extends DataObject {

  private static $db = [
    'SubTitle' => 'Text',
    'Title' => 'Text',
    'Description' => 'Text'
  ];

  private static $has_one = [
    'ImageSource' => File::class,
    'HomePage' => HomePage::class
  ];

  private static $owns = [
    'ImageSource'
  ];

  public function getCMSFields() {
    return new FieldList(
      TextField::create('SubTitle'),
      TextField::create('Title'),
      TextareaField::create('Description'),
      UploadField::create('ImageSource')
    );
  }

}