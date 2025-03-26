# Kodaloid's SlimPHP Skeleton

[SlimPHP](https://github.com/slimphp/Slim) is becoming more and more useful to me, so I've spent some time building
this skeleton to improve my production speed. This is a bare bones SlimPHP app
with ENV settings file loading, twig templates, logging & JWT auth.

A lot of the skeleton you see here was inspired by another Git repo by *GoThinkster* 
which can be found [here](https://github.com/gothinkster/slim-php-realworld-example-app/). 
Their example was written for a much older version of SlimPHP so I put a lot of 
work in to bring things up to date. This skeleton is designed for PHP 8.2+ and 
for SlimPHP 4+.

## How To Use

Before you get started, make sure you have at-least the bare minimum 
pre-requisites, which are PHP & Composer. Using a terminal, navigate into a 
fresh directory for your project, then use the following commands:

```bash
# make a directory
mkdir my-app
cd my-app

# clone this repo
git clone https://github.com/kodaloid/slim4-skeleton .

# get composer to prepare dependencies
composer install

# setup the .env file (make sure to edit it!)
cp .env.example .env

# start the project (uses built-in php web server)
composer start
```

You can use whichever webserver you want, however if your webserver does not 
point the root at the `/public/` folder, you will need to rename the 
`.htaccess.example` file to `.htaccess` and modify the `RewriteBase` so that 
things work correctly.


## Example Routes

A few test routes have been setup to demo how this works, they are setup in the
file `/src/routes.php`. The first is the home route at `http://localhost:8080/`
which should render a twig template.

The second is visit `http://localhost:8080/hello/droid`. Which should output the
text `Hello, droid`, demonstrating pass through arguments.

The third is a demo for JWT. 

Use an API client, set the endpoint to `http://localhost:8080/api/test` and pass
a JWT formatted token (encode using `JWT_SECRET` in the `.env` file) using the 
Bearer method. This should output text similar to `Test Worked! Issuer is xxx`.