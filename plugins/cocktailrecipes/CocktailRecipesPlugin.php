<?php

namespace Blocks;

class CocktailRecipesPlugin extends BasePlugin
{
    public function getName()
    {
        return Blocks::t('Cocktail Recipes');
    }

    public function getVersion()
    {
        return '1.0';
    }

    public function getDeveloper()
    {
        return 'Adrian Macneil';
    }

    public function getDeveloperUrl()
    {
        return 'http://adrianmacneil.com';
    }

    public function hasCpSection()
    {
        return true;
    }

    /**
     * Register control panel routes
     */
    public function hookRegisterCpRoutes()
    {
        return array(
            'cocktailrecipes\/ingredients\/new' => 'cocktailrecipes/ingredients/_edit',
            'cocktailrecipes\/ingredients\/(?P<recipeId>\d+)' => 'cocktailrecipes/ingredients/_edit',
        );
    }

    /**
     * Register twig extension
     */
    public function hookAddTwigExtension()
    {
        Blocks::import('plugins.cocktailrecipes.twigextensions.CocktailRecipesTwigExtension');

        return new CocktailRecipesTwigExtension();
    }

    /**
     * Add default ingredients after plugin is installed
     */
    public function onAfterInstall()
    {
        $ingredients = array(
            array('name' => 'Gin'),
            array('name' => 'Tonic'),
            array('name' => 'Lime'),
            array('name' => 'Soda'),
            array('name' => 'Vodka'),
        );

        foreach ($ingredients as $ingredient) {
            blx()->db->createCommand()->insert('cocktailrecipes_ingredients', $ingredient);
        }
    }
}
