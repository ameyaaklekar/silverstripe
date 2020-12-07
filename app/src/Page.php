<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
    use SilverStripe\Forms\GridField\GridFieldComponent;

    class Page extends SiteTree
    {
        private static $db = [];

        private static $has_many = [
            'BannerObjects' => BannerObject::class,
        ];

        public function getCMSFields() {
            $fields = parent::getCMSFields();
        
            $fields->addFieldToTab('Root.Main', GridField::create(
              'BannerObjects',
              'Image',
              $this->BannerObjects(),
              GridFieldConfig_RecordEditor::create()
            ));
        
            return $fields;
        }
    }
}
