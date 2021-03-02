# Slim 3 Application  
### Symfony 5 APi Client

This application is the front-end part of sf5-api.

## Install the Application

Create a directory, and clone the repo in it.  

    git clone https://github.com/igorbalden/sf5-api-cnt.git ./

  	composer install

Copy `./env.example` to `.env`. Edit it.  

Ensure `logs/` is web writeable.

	composer start
	
After that, open `http://localhost:8080` in your browser.

Run this command in the application directory to run the test suite

	composer test

That's it!
