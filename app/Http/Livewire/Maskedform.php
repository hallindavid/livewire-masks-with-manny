<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Manny;

class Maskedform extends Component
{
	public $phone;
	public $postal;

	public function updated($field)
	{
		if ($field == 'postal')
		{
			$this->postal = strtoupper(Manny::mask($this->postal, "A1A 1A1"));
		}

		if ($field == 'phone')
		{
			//Example 1 - Eliminate all non-numeric characters
			//$this->phone = Manny::stripper($this->phone, ['num']);

			//Example 2 - Make a mask with the format (XXX) XXX-XXXX
			$this->phone = Manny::mask($this->phone, "(111) 111-1111");
			//alt example 2 - make mask with the format XXX-XXX-XXXX
			// $this->phone = Manny::mask($this->phone, "111-111-1111");
			

		}
	}


    public function render()
    {
        return view('livewire.maskedform');
    }
}
