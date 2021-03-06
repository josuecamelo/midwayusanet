<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomPlanEmail extends Mailable
{
	use Queueable, SerializesModels;
	public $data;
	
	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($data)
	{
		$this->data = $data;
	}
	
	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		$goal = kebab_case($this->data->goal);
		$gender = $this->data->gender;
		
		return $this
			->subject('Midway Custom Plan')
			->view('site.emails.custom-plan')
			->attach('pdf/custom-plan/' . $gender . '/' . $goal . '.pdf', [
				'mime' => 'application/pdf',
			]);
	}
}
