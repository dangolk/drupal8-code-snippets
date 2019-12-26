<?php

namespace Drupal\drupalup_simple_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

/**
 * Our simple form class.
 */
class SimpleAjaxForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'drupalup_simple_ajax_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['message'] = [
      '#type' => 'markup',
      '#markup' => '<div class="result_message"></div>',
    ];

    $form['number_1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First number'),
    ];

    $form['number_2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Second number'),
    ];

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Whats your name?'),
    ];

    $form['phone_number'] = [
      '#type' => 'tel',
      '#title' => $this->t('Whats your number?'),
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
      '#title' => $this->t('Whats your website [URL]:'),
    ];

    $form['search'] = [
      '#type' => 'search',
      '#title' => $this->t('Wanna look up sth?'),
    ];

    $form['range'] = [
      '#type' => 'range',
      '#title' => $this->t('Whatchoo ranging for?'),
    ];

    $form['actions'] = [
      '#type' => 'button',
      '#value' => $this->t('Calculate'),
      '#ajax' => [
        'callback' => '::setMessage',
      ]
    ];

    return $form;
  }

  public function setMessage(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();

    $response->addCommand(
      new HtmlCommand(
        '.result_message',
        '<div class="my_top_message">' 
        .'</br>' 
        .$this->t("Thank you @name !", [ '@name' => ($form_state->getValue('name')) ])
        .'</br>' 
        .$this->t("Your email is @email", [ '@email' => ($form_state->getValue('email')) ])
        .'</br>' 
        .$this->t("Todays date is @date", [ '@date' => ($form_state->getValue('date')) ])
        .'</br>' 
        .$this->t("Your contact number is @number", [ '@number' => ($form_state->getValue('phone_number')) ])
        .'</br>' 
        .$this->t("Your website is @web", [ '@web' => ($form_state->getValue('url')) ])
        .'</br>' 
        . $this->t('And btw, sum of @num1 and @num2 is @result', 
          [
            '@num1' => ($form_state->getValue('number_1')),
            '@num2' => ($form_state->getValue('number_2')),
            '@result' => ($form_state->getValue('number_1') + $form_state->getValue('number_2'))
          ]
        )
      ) 
    );

    return $response;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
  }

}
