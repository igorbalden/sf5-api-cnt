# Symfony 5 APi Client - Slim Framework 3 

This application is the front-end part of sf5-api.

## Install the Application

Create a directory, and clone the repo in it.  

    git clone https://github.com/igorbalden/sf5-api-cnt.git ./

  	php composer.phar install

Copy `./env.example` to `.env`. Edit it, if so needed.  

Ensure `logs/` is web writeable.

	php composer.phar start
	
After that, open `http://localhost:8080` in your browser.

Run this command in the application directory to run the test suite

	php composer.phar test

That's it!
