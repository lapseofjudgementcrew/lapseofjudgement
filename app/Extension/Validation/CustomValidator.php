<?php namespace App\Extension\Validation;
 
class CustomValidator extends \Illuminate\Validation\Validator {
 
  public function validateHex($attribute, $value, $parameters)
  {
    if(preg_match("/^#?([a-f0-9]{6}|[a-f0-9]{3})$/", $value))
    {
      return true;
    }
   
    return false;
  }
  /**
   * Validates current password
   * 
   */
  public function validatePassword($attribute,$value,$parameters)
  {
  	
  	if(\Auth::user()){
  		$this->setCustomMessages(array('password' => 'Invalid password.'));

	  	return \Hash::check($value,\Auth::user()->password);	 
	}

	$this->setCustomMessages(array('password' => 'You need to be logged in.'));
	return false;
  }
 
}