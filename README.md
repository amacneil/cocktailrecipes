# Cocktail Recipes Plugin for Blocks CMS

This is an example plugin for the [Blocks CMS Beta](http://blockscms.com/), inspired by
the documentation. It is well documented, and designed to get you up and running quickly,
by giving you a working example to start developing from.

The plugin adds an `ingredients` table to the database, with custom control panel pages
to add new ingredients. It also adds an Ingredients blocktype, which can be added to your
sections or pages.

Obviously there are many things in this plugin which could be done differently for a plugin
this simple. However, we prefer to do things the most complete way possible, to give you a
non-trivial working example.

## Compontents

Cocktail Recipes provides examples of the following Blocks components:

* Ingredients Blocktype (allows user to select from available ingredients)
* Controller (handles template actions)
* Ingredients Model (read only data object)
* Ingredients Record (database definition and write access)
* Service (provdes API to create/save/delete ingredients)
* Templates (provides custom control panel section)
* Twig Extension (provides `shake` twig filter)
* Variables (provides read only API to access ingredients from within templates)

Blocks provides many extension points, and more examples will be added in future
(pull requests accepted).

## Unit Tests

In addition, a PHPUnit test suite is provided to ensure all components are behaving correctly.
To run the tests, run the following commands:

    cd plugins/cocktailrecipes
    composer update --dev
    vendor/bin/phpunit

## License

This work is licenced under the MIT license.
