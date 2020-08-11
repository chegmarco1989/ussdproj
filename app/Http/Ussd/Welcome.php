<?php

namespace App\Http\Ussd;

use App\Http\Ussd\Airtime\GetRecipientNumber;
use Sparors\Ussd\State;

class Welcome extends State
{
    protected function beforeRendering(): void
    {
		$shortcode = request('message');
		$initializerNumber = request('operatorNumber');
		
		if ($shortcode == '#159#' && $initializerNumber == "+225458654713") {
			$this->menu->text('Welcome To ChegUSSD')
					   ->lineBreak(1)
					   ->text('Select an option')
					   ->lineBreak(2)
					   ->listing([
						  'Airtime Topup',
						  'Data Bundle',
						  'TV Subscription',
						  'ECG/GWCL',
						  'Talk To Us'
					   ])
					   ->lineBreak(2)
					   ->text('Powered by ChegTel');
					   
        } else {
				return 'Invalid short code';
		}
    }

    protected function afterRendering(string $argument): void
    {
        # if input is equal to 1, 2, 3, 4 or 5, render the appropriate state
        $this->decision->equal('1', GetRecipientNumber::class)
                       ->between(2, 5, MaintenanceMode::class)
                       ->any(Welcome::class);
    }
}