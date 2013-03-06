<?php

namespace Craft;

/**
 * Cocktail Recipes Variable provides access to database objects from templates
 */
class CocktailRecipesVariable
{
    /**
     * Get all available ingredients
     *
     * @return array
     */
    public function getAllIngredients()
    {
        return craft()->cocktailRecipes->getAllIngredients();
    }

    /**
     * Get a specific ingredient. If no ingredient is found, returns null
     *
     * @param  int   $id
     * @return mixed
     */
    public function getIngredientById($id)
    {
        return craft()->cocktailRecipes->getIngredientById($id);
    }
}
