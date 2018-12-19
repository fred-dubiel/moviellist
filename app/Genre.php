<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
	/**
	 * @var String
	 */
	private $name;

    
    public function setName($name)
    {
		$this->name = $name;    	
    }

    public function getName()
    {
		return $this->name;
    }


    
}
