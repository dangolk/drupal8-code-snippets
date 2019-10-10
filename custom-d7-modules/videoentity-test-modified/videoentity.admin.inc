<?php
/**
 * @file
 * Admin pages for videoentity.module.
 */

/**
 * Form for adding or editing a video entity.
 */
function video_form($form, &$form_state, $VideoEntity, $op = 'edit') {
  $form['name'] = array(
    '#title' => t('Name'),
    '#type' => 'textfield',
    '#default_value' => isset($VideoEntity->name) ? $VideoEntity->name : '',
    '#description' => t('Video title.'),
    '#required' => TRUE,
    '#weight' => -50,
  );

  $form['embedcode'] = array(
    '#title' => t('Embed Code'),
    '#type' => 'textfield',
    '#default_value' => isset($VideoEntity->embedcode) ? $VideoEntity->embedcode : '',
    '#description' => t('Youtube Embed Code.'),
    '#required' => TRUE,
  );

  $form['duration'] = array(
    '#title' => t('Duration'),
    '#type' => 'textfield',
    '#description' => t('Duration of the video in seconds.'),
    '#default_value' => isset($VideoEntity->duration) ? $VideoEntity->duration : '',
    '#weight' => -40,
  );

  field_attach_form('video', $video, $form, $form_state);

  $form['actions'] = array(
    '#type' => 'actions',
    'submit' => array(
      '#type' => 'submit',
      '#value' => isset($VideoEntity->id) ? t('Update vidoooo asset') : t('Save videooo asset'),
    ),
  );
  return $form;
}

/**
 * Validation form entity add/edit form.
 */
function video_form_validate($form, &$form_state) {
  if (isset($form_state['values']['duration']) && !is_numeric($form_state['values']['duration'])) {
    form_set_error('duration', t('Duration field must be an integer value.'));
  }
}

/**
 * Submit handler for entity add/edit form.
 */
function video_form_submit($form, &$form_state) {
  $VideoAsset = entity_ui_form_submit_build_entity($form, $form_state);
  $VideoAsset->save();
  drupal_set_message(t('@name video with @duration s duration has been saved.', array('@name' => $VideoAsset->name, '@duration' => $VideoAsset->duration)));
  $form_state['redirect'] = 'admin/videoentity';
}
