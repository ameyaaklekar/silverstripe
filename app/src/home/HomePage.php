<?php

use Page;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldComponent;

class HomePage extends Page {

  private static $has_many = [
    'SectionObjects' => SectionObject::class,
    'ContactObject' => ContactObject::class
  ];

  public function getCMSFields() {
    $fields = parent::getCMSFields();

    $fields->addFieldToTab('Root.Main', GridField::create(
      'SectionObjects',
      'Image',
      $this->SectionObjects(),
      GridFieldConfig_RecordEditor::create()
    ));

    return $fields;
  }

}