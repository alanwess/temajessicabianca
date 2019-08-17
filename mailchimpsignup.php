<?php

  $api_key = '4ff67647c5d72e42a4152af23b6fdac2-us3';
  $list_id = 'cb807aa227';

  $url = 'https://us3.api.mailchimp.com/3.0/lists/' . $list_id . '/members/';

  $pfb_data = array(
    'email_address' => $_POST['email'],
    'status'        => 'subscribed',
    'merge_fields'  => array(
      'FNAME'       => $_POST['firstname'],
      'LNAME'       => $_POST['lastname']
    ),
  );

  $encoded_pfb_data = json_encode($pfb_data);

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $api_key);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded_pfb_data);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  $results = curl_exec($ch); // store response
  $response = curl_getinfo($ch, CURLINFO_HTTP_CODE); // get HTTP CODE
  $errors = curl_error($ch); // store errors

  curl_close($ch);

  $results = array(
    'results' => $results,
    'response' => $response,
    'errors' => $errors
  );
  
  echo json_encode($results);
?>