<?php 

'#states' => array(
  $listener_state => array(
    $jquery_selector_for_caller => array($caller_state_change => $caller_state_value),
  ),
),

$form['title'] = array(
  '#type' => 'textfield',
  '#title' => t('Title'),
);
$form['mycheckbox'] = array(
  '#type' => 'checkbox',
  '#title' => t('My checkbox'),
  '#states' => array(
    'checked' => array(
      'input[name="title"]' => array('filled' => TRUE),
    ),
  ),
);