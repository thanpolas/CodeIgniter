<?php

/**
* Copyright 2000-2011 Athanasios Polychronakis. All Rights Reserved.
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
*      http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS-IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
* 
* @author Athanasios Polychronakis <thanpolas@gmail.com>
 *
 * ********
 * created on Jun 27, 2011
 * message.php User private messages
 *
 */

/**
 * User private messages
 *
 * @author Thanasis Polychronakis <thanasisp@gmail.com>
 */
class message extends CI_Controller{

  function __construct() {
    parent::__construct();

    // Authed only area!
    if (!$this->user->isAuthed())
      raise_error ('You need to be logged in to perform this action');


    $this->load->model('msg');
  }

  /**
   * Perform a PM send
   *
   * We expect 'to_userId' (int) and 'message'
   *
   * @return void
   */
  public function send()
  {


    // fill in our data array
    $data = array(
        'from_userId' => $this->user->getID(),
        'to_userId' => (int) $this->input->post('to_userId'),
        'message' => (string) Valid::RipString($this->input->post('message'), 140)
    );

    $this->msg->send($data);

    die_json(array('status' => 10));

  }

  /**
   * Get the current user's private messages
   *
   * We pull for the past 6 months or 100 messages
   *
   * @return void
   */
  public function get()
  {

    die_json($this->msg->get());


  }

  /**
   * Perform a read on a message
   *
   *
   * @param int $msgId
   * @return void
   */
  public function read($msgId)
  {
    $msgId = (int) $msgId;
    die_json($this->msg->read($msgId));
  }

  /**
   * Perform a read on all the messages
   * from a specific user
   *
   *
   * @param int $uId
   * @return void
   */
  public function readUser($uId)
  {
    $uId = (int) $uId;
    die_json($this->msg->readUser($uId));
  }

  /**
   * Delete a message
   *
   * @param int $msgId
   * @return void
   */
  public function delete($msgId)
  {
    $msgId = (int) $msgId;
    die_json($this->msg->delete($msgId));
  }
}

?>
