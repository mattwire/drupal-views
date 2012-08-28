<?php

/**
 * @file
 * Definition of Drupal\views\Tests\UI\UITestBase.
 */

namespace Drupal\views\Tests\UI;

use Drupal\views\Tests\ViewsSqlTest;

/**
 * Provides a base class for testing the Views UI.
 */
abstract class UITestBase extends ViewsSqlTest {

  protected $profile = 'standard';

  protected function setUp() {
    parent::setUp();

    $this->enableViewsTestModule();

    $this->adminUser = $this->drupalCreateUser(array('administer views'));

    $views_admin = $this->drupalCreateUser(array('administer views', 'administer blocks', 'bypass node access', 'access user profiles', 'view revisions'));
    $this->drupalLogin($views_admin);
  }

}
