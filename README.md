# Cocktail Recipes Plugin for Craft CMS

This is an example plugin for the [Craft CMS Beta](http://buildwithcraft.com/), inspired by
the documentation. It is well documented, and designed to get you up and running quickly,
by giving you a working example to start developing from.

The plugin adds an `ingredients` table to the database, with custom control panel pages
to add new ingredients. It also adds an Ingredients fieldtype, which can be added to your
sections or pages.

Obviously there are many things in this plugin which could be done differently for a plugin
this simple. However, we prefer to do things the most complete way possible, to give you a
non-trivial working example.

## Installation

1. Upload this directory to `craft/plugins/cocktailrecipes/` on your server.
2. Enable the plugin under Craft Admin > Settings > Plugins

## Components

Cocktail Recipes provides examples of the following Craft components:

* Ingredients Fieldtype (allows user to select from available ingredients)
* Controller (handles template actions)
* Ingredients Model (read only data object)
* Ingredients Record (database definition and write access)
* Service (provdes API to create/save/delete ingredients)
* Templates (provides custom control panel section)
* Twig Extension (provides `shake` twig filter)
* Variables (provides read only API to access ingredients from within templates)

Craft provides many extension points, and more examples will be added in future
(pull requests accepted).

## Unit Tests

In addition, a PHPUnit test suite is provided to ensure all components are behaving correctly.
To run the tests, run the following commands:

    cd plugins/cocktailrecipes
    composer update --dev
    vendor/bin/phpunit

## Coding Standards

All code follows the standard PHP [PSR-2 coding style guide](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md).
This is being adopted by a large number of PHP frameworks, to ensure consistency in the PHP community.
The coding style can easily be verified/fixed by running [php-cs-fixer](http://cs.sensiolabs.org/).

## License

This work is licenced under the MIT license.
