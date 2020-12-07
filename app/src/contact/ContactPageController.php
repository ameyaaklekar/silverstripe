<?php

use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Control\Email\Email;

class HomePageController extends PageController {

  private static $allowed_actions = [
    'ContactForm'
  ];

  public function ContactForm() {
    $form = Form::create(
      $this,
      'ContactForm',
      FieldList::create(
        TextField::create('Name'),
        TextField::create('Email'),
        TextField::create('Company'),
      ),
      FieldList::create(
        FormAction::create('HandleForm', 'Submit')
      ),
      RequiredFields::create(
        'Name',
        'Email'
      )
    );

    return $form;
  }

  /**
   * Function to handle the form action
   *
   * @param $data - data collected from the form
   * @param $form - the form
   * @return void
   */
  public function HandleForm($data, $form) {
    $contact = ContactObject::create();
    $contact->HomePageID = $this->ID;
    $contact->PageID = $this->ID;
    $form->saveInto($contact);
    $contact->write();

    $email = Email::create()->setHTMLTemplate('Email\\ContactEmail')
      ->setData([
        'Data' => $form
      ])
      ->setFrom('support@toast.co.nz')
      ->setTo($data['Email'])
      ->setSubject('Enquiry received from the website');

    if ($email->send()) {
      $form->sessionMessage('Hello ' . $data['Name'] . 'Data stored and email was sent', 'success');
      return $this->redirectBack();
    } else {
      $form->sessionMessage('Hello ' . $data['Name'] . 'Data stored but Email was not sent', 'error');
      //error
      return $this->redirectBack();
    }
  }
}