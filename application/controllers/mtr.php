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
 *
 * ********
 * created on Jun 8, 2011
 * mtr.js AJAX metrics lander
 *
 */

/**
 * Will relieve metric events from JS
 *
 * 
 */
class Mtr extends CI_Controller {

  /**
   * Constructor - Access Codeigniter's controller object
   *
   */
  function __construct() {
    parent::__construct();
  }

  /**
   * The main landing method, we expect these variables to be send
   * via POST:
   * category
   * action
   * label [optional]
   * value [optional]
   * value2 [optional]
   * value3 [optional]
   * value4 [optional]
   *
   * @return void
   */
  public function track()
  {
    $label = $value = $value2 = $value3 = $value4 = '';
    if (is_string($this->input->post('label')))
      $label = $this->input->post('label');
    if (is_string($this->input->post('value')))
      $value = $this->input->post('value');
    if (is_string($this->input->post('value2')))
      $value2 = $this->input->post('value2');
    if (is_string($this->input->post('value3')))
      $value3 = $this->input->post('value3');
    if (is_string($this->input->post('value4')))
      $value4 = $this->input->post('value4');

    $this->load->model('core/metrics');
    $this->metrics->trackCounter($this->input->post('category'),
            $this->input->post('mtraction'),
            $label, $value, $value2, $value3, $value4);

    die_json(array('status' => true));

  // method track
  }

}

