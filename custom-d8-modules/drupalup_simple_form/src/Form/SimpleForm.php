<?php

namespace Drupal\drupalup_simple_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Our simple form class.
 */
class SimpleForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'drupalup_simple_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['number_1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First number'),
    ];

    $form['number_2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Second number'),
    ];

    $form['phone_number'] = [
      '#type' => 'tel',
      '#title' => $this->t('How do I DM you?'),
    ];

    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('How do I email you?'),
    ];

    $form['date'] = [
      '#type' => 'date',
      '#title' => $this->t('Date today?'),
    ];

    $form['url'] = [
      '#type' => 'url',
      '#title' => $this->t('How do I find you on the Internet [URL]?'),
    ];

    $form['search'] = [
      '#type' => 'search',
      '#title' => $this->t('Wanna look up sth?'),
    ];

    $form['range'] = [
      '#type' => 'range',
      '#title' => $this->t('Whatchoo ranging for?'),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Calculate'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message($form_state->getValue('number_1') + $form_state->getValue('number_2'));
  }

}
