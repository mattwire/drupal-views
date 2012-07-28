<?php

/**
 * @file
 * Definition of Drupal\views\Tests\Handler\FieldXssTest.
 */

namespace Drupal\views\Tests\Handler;

use Drupal\views\Tests\ViewsSqlTest;

/**
 * Tests the core views_handler_field_css handler.
 *
 * @see CommonXssUnitTest
 */
class FieldXssTest extends ViewsSqlTest {
  public static function getInfo() {
    return array(
      'name' => 'Field: Xss',
      'description' => 'Test the core views_handler_field_css handler.',
      'group' => 'Views Handlers',
    );
  }

  function dataHelper() {
    $map = array(
      'John' => 'John',
      "Foo\xC0barbaz" => '',
      'Fooÿñ' => 'Fooÿñ'
    );

    return $map;
  }


  function viewsData() {
    $data = parent::viewsData();
    $data['views_test']['name']['field']['handler'] = 'views_handler_field_xss';

    return $data;
  }

  public function testFieldXss() {
    $view = $this->getBasicView();

    $view->display['default']->handler->override_option('fields', array(
      'name' => array(
        'id' => 'name',
        'table' => 'views_test',
        'field' => 'name',
      ),
    ));

    $this->executeView($view);

    $counter = 0;
    foreach ($this->dataHelper() as $input => $expected_result) {
      $view->result[$counter]->views_test_name = $input;
      $this->assertEqual($view->field['name']->advanced_render($view->result[$counter]), $expected_result);
      $counter++;
    }
  }
}
