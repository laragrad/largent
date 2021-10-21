# laragrad/largent

## Installation

Install a package

	composer require laragarad/largent
	
Publish translation and config resources
	
	php artisan vendor:publish --tag=largent
	
If you need, you can to publish migrations, but it is not required.

	php artisan vendor:publish --tag=largent-migrations

If your accountable entities use **uuid** keys then change config key **laragrad.largent.entity_key_type** value to **uuid**

Run table migrations

	php artisan migrate

## Configurating and operation handler creating

...

