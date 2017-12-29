<?php

namespace Drupal\Tests\system\Functional\Form;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests element level submitting.
 *
 * @group form
 *
 * @see \Drupal\form_test\Form\FormTestElementSubmitForm
 */
class ElementSubmitTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  public static $modules = ['form_test'];

  public function testElementSubmit() {
    // Verify that #element_submit handlers are executed.
    $this->drupalGet('form-test/element-submit');
    $edit = [
      'name' => 'element_submit',
      'group_1[name_1]' => 'element_submit_1',
      'group_1[name_2]' => 'element_submit_2',
      'group_2[name_3]' => 'element_submit_3',
    ];
    $this->drupalPostForm(NULL, $edit, 'Save');

    $assert = $this->assertSession();
    $assert->pageTextContains('element_submit triggered');
    $assert->pageTextContains('element_submit group_1:name_1 triggered');
    $assert->pageTextContains('element_submit group_1:name_2 triggered');
    $assert->pageTextContains('element_submit group_2:name_3 triggered');
    $assert->pageTextContains('Executed Drupal\form_test\Form\FormTestElementSubmitForm::submitForm.');
    $assert->pageTextNotContains('Executed Drupal\form_test\Form\FormTestElementSubmitForm::submitForm1.');

    $edit = [
      'name' => 'element_submit',
      'group_1[name_1]' => 'element_submit_1',
      'group_1[name_2]' => 'element_submit_2',
      'group_2[name_3]' => 'element_submit_3',
    ];
    $this->drupalPostForm(NULL, $edit, 'Save group 1');

    $assert = $this->assertSession();
    $assert->pageTextNotContains('element_submit triggered');
    $assert->pageTextContains('element_submit group_1:name_1 triggered');
    $assert->pageTextContains('element_submit group_1:name_2 triggered');
    $assert->pageTextNotContains('element_submit group_2:name_3 triggered');
    $assert->pageTextNotContains('Executed Drupal\form_test\Form\FormTestElementSubmitForm::submitForm.');
    $assert->pageTextContains('Executed Drupal\form_test\Form\FormTestElementSubmitForm::submitForm1.');
  }

}
