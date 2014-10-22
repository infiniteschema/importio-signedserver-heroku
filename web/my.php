<?php

/* validate (and manipulate) query */
function my_validate(&$query) {
  // my logic
  /* example:
  $o = json_decode($query);
  $connectorGuids = json_encode($o->connectorGuids);
  //["8f628f9d-b564-4888-bc99-1fb54b2df7df","7290b98f-5bc0-4055-a5df-d7639382c9c3","14d71ff7-b58f-4b37-bb5b-e2475bdb6eb9","9c99f396-2b8c-41e0-9799-38b039fe19cc","a0087993-5673-4d62-a5ae-62c67c1bcc40"]
  $hash = md5($connectorGuids);
  if ($hash != "e8c53cc2e703eac27a191a05b6eb899d") {
    unset($o->connectorGuids);
    unset($o->input);
    $o->error = "invalid connectorGuids; please create your own server at https://github.com/infiniteschema/importio-signedserver-heroku";
    $query = json_encode($o);
  }
  */
}

