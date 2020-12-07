<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\File;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextAreaField;

class BannerObject extends DataObject {

  private static $db = [
    'Heading1' => 'Text',
    'Heading2' => 'Text',
    'Heading3' => 'Text',
    'ButtonLink' => 'Text',
  ];

  private static $has_one = [
    'ImageSource' => File::class,
    'HomePage' => HomePage::class,
    'Page' => Page::class,
  ];

  private static $owns = [
    'ImageSource'
  ];

  public function getCMSFields() {
    return new FieldList(
      TextField::create('Heading1'),
      TextField::create('Heading2'),
      TextField::create('Heading3'),
      UploadField::create('ImageSource'),
      TextField::create('ButtonLink'),
    );
  }

}