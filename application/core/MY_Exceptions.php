<?php

/**
 *  @copyright  (C) 2000-2011 Thanasis Polychronakis - All Rights Reserved
 *  @author Thanasis Polychronakis <thanasisp@gmail.com>
 *
 * ********
 * This program is bound to the license agreement that can be found in the root
 * folder of this project. This Agreement does not give you any intellectual property
 * rights in the program. It does not Grand you permission to copy, distribute, redistribute
 * or make any possible use of this program, this is a private work intended for private use.
 *
 * You should have received a copy of the License Agreement along with this program
 * If not, write to: Plastikopiitiki S.A., Attn: Thanasis Polychronakis, P.O. Box 60374,
 * Zip 57001, Thermi, Greece
 *
 *
 * ********
 * created on Jun 1, 2011
 * MY_Exceptions.php Extending the CI core Exceptions class
 *
 */



class MY_Exceptions extends CI_Exceptions {

  public function __construct() {
    parent::__construct();

  }


  /**
   * Custom error handling for ajax errors
   *
   * This doesn't work, need to understand CI mechanics better...
   *
   * @param string $message
   * @return void we die
   */
  public function ajax_error($message)
  {
    die(_json_encode(array('error' => $message)));
  }


}