<?php

/*
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC. All rights reserved.                        |
 |                                                                    |
 | This work is published under the GNU AGPLv3 license with some      |
 | permitted exceptions and without any warranty. For full license    |
 | and copyright information, see https://civicrm.org/licensing       |
 +--------------------------------------------------------------------+
 */

/**
 *
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 */


namespace api\v4\Action;

use Civi\Api4\Contact;
use api\v4\Api4TestBase;
use Civi\Test\TransactionalInterface;

/**
 * Class UpdateContactTest
 * @package api\v4\Action
 * @group headless
 */
class UpdateContactTest extends Api4TestBase implements TransactionalInterface {

  public function testUpdateWithIdInWhere(): void {
    $contactId = Contact::create(FALSE)
      ->addValue('first_name', 'Johann')
      ->addValue('last_name', 'Tester')
      ->addValue('contact_type', 'Individual')
      ->execute()
      ->first()['id'];

    $contact = Contact::update(FALSE)
      ->addWhere('id', '=', $contactId)
      ->addValue('first_name', 'Testy')
      ->execute()
      ->first();
    $this->assertEquals('Testy', $contact['first_name']);
    $this->assertEquals('Tester', $contact['last_name']);
  }

  public function testUpdateWithIdInValues(): void {
    $contactId = Contact::create(FALSE)
      ->addValue('first_name', 'Bobby')
      ->addValue('last_name', 'Tester')
      ->addValue('contact_type', 'Individual')
      ->execute()
      ->first()['id'];

    $contact = Contact::update(FALSE)
      ->addValue('id', $contactId)
      ->addValue('first_name', 'Billy')
      ->execute();
    $this->assertCount(1, $contact);
    $this->assertEquals($contactId, $contact[0]['id']);
    $this->assertEquals('Billy', $contact[0]['first_name']);
    $this->assertEquals('Tester', $contact[0]['last_name']);
  }

  public function testContactImage(): void {
    $file = $this->createTestRecord('File', [
      'mime_type' => 'image/png',
      'file_name' => 'test.png',
      'content' => 'Hello World',
    ]);
    $contact = Contact::create(FALSE)
      ->addValue('first_name', 'Johann')
      ->addValue('last_name', 'Tester')
      ->addValue('contact_type', 'Individual')
      ->addValue('image_file_id', $file['id'])
      ->execute()
      ->first();

    $this->assertStringContainsString('civicrm%2Fcontact%2Fimagefile&photo=' . $file['uri'], $contact['image_URL']);
  }

}
