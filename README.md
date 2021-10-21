# laragrad/largent

## Installation

1. Install a package

	composer require laragarad/largent
	
2. Publish resources and migrations
	
	php artisan vendor:publish --tag=largent

3. If your accountable entties use keys of type 'uuid' then change config key 'laragrad.largent.entity_key_type' to 'uuid'

4. Migrate tables

	php artisan migrate
	

