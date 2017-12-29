<?php

namespace Drupal\form_test\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\form_test\Callbacks;

/**
 * Form builder for testing \Drupal\Core\Form\FormSubmitter::submitFormElement().
 *
 * Services for testing of element level submitting.
 */
class FormTestElementSubmitForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'form_test_element_submit_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $object = new Callbacks();

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => 'Name',
      '#default_value' => '',
      '#element_validate' => [[$object, 'validateName']],
      '#element_submit' => [[$object, 'submitName']],
    ];
    $form['group_1'] = [
      '#type' => 'details',
      '#tree' => TRUE,
    ];
    $form['group_1']['name_1'] = [
      '#type' => 'textfield',
      '#title' => 'Name 1',
      '#default_value' => '',
      '#element_validate' => [[$object, 'validateName']],
      '#element_submit' => [[$object, 'submitName1']],
    ];
    $form['group_1']['name_2'] = [
      '#type' => 'textfield',
      '#title' => 'Name 2',
      '#default_value' => '',
      '#element_validate' => [[$object, 'validateName']],
      '#element_submit' => [[$object, 'submitName2']],
    ];
    $form['group_1']['submit_1'] = [
      '#type' => 'submit',
      '#value' => 'Save group 1',
      '#limit_element_submit' => [['group_1']],
      '#submit' => [[$this, 'submitForm1']],
    ];
    $form['group_2'] = [
      '#type' => 'details',
      '#tree' => TRUE,
    ];
    $form['group_2']['name_3'] = [
      '#type' => 'textfield',
      '#title' => 'Name 3',
      '#default_value' => '',
      '#element_validate' => [[$object, 'validateName']],
      '#element_submit' => [[$object, 'submitName3']],
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => 'Save',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Output the method is executed.
    drupal_set_message(t('Executed @method.', ['@method' => __METHOD__]));
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm1(array &$form, FormStateInterface $form_state) {
    // Output the method is executed.
    drupal_set_message(t('Executed @method.', ['@method' => __METHOD__]));
  }

}
