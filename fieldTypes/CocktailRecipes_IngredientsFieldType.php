<?php

namespace Craft;

/**
 * Ingredients Fieldtype
 *
 * Allows entries to select associated ingredients
 */
class CocktailRecipes_IngredientsFieldType extends BaseFieldType
{
    /**
     * Get the name of this fieldtype
     */
    public function getName()
    {
        return Craft::t('Cocktail Ingredients');
    }

    /**
     * Get this fieldtype's column type.
     *
     * @return mixed
     */
    public function defineContentAttribute()
    {
        // "Mixed" represents a "text" column type, which can be used to store arrays etc.
        return AttributeType::Mixed;
    }

    /**
     * Get this fieldtype's form HTML
     *
     * @param  string $name
     * @param  mixed  $value
     * @return string
     */
    public function getInputHtml($name, $value)
    {
        // call our service layer to get a current list of ingredients
        $ingredients = craft()->cocktailRecipes->getAllIngredients();

        return craft()->templates->render('cocktailrecipes/_fieldtypes/ingredients', array(
            'name'      => $name,
            'options'   => $ingredients,
            'values'    => $value,
        ));
    }
}
