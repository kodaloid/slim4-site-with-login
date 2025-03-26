# Slim4 Site With Login

A remix of my [SlimPHP](https://github.com/slimphp/Slim) template demonstrating
how to setup a website with a simple login system.

## How To Use

Before you get started, make sure you have at-least the bare minimum 
pre-requisites, which are PHP & Composer. Using a terminal, navigate into a 
fresh directory for your project, then use the following commands:

```bash
# make a directory
mkdir my-app
cd my-app

# clone this repo
git clone https://github.com/kodaloid/slim4-site-with-login .

# get composer to prepare dependencies
composer install

# also prepare the node dependencies
npm install

# setup the .env file (make sure to edit it!)
cp .env.example .env

# start the project (uses built-in php web server)
composer start
```

You can use whichever webserver you want, however if your webserver does not 
point the root at the `/public/` folder, you will need to rename the 
`.htaccess.example` file to `.htaccess` and modify the `RewriteBase` so that 
things work correctly.

## Compiling Assets

This version of the project comes with SASS and TypeScript support. Files are
stored in the `/assets` folder, and are built using NodeJS outputting to the
public folder `/public/assets`. 

To compile assets, use this command:

```bash
npm run dev
```

Or change it to this to enable auto-recompile.

```bash
npm run dev-watch
```

You don't have to use these technologies, but they can be very useful and time
saving.