<?php

namespace Blocks;

/**
 * Ingredients Blocktype
 *
 * Allows entries to select associated ingredients
 */
class CocktailRecipes_IngredientsBlockType extends BaseBlockType
{
    /**
     * Get the name of this blocktype
     */
    public function getName()
    {
        return Blocks::t('Cocktail Ingredients');
    }

    /**
     * Get this blocktype's column type.
     *
     * @return mixed
     */
    public function defineContentAttribute()
    {
        // "Mixed" represents a "text" column type, which can be used to store arrays etc.
        return AttributeType::Mixed;
    }

    /**
     * Get this blocktype's form HTML
     *
     * @param  string $name
     * @param  mixed  $value
     * @return string
     */
    public function getInputHtml($name, $value)
    {
        // call our service layer to get a current list of ingredients
        $ingredients = blx()->cocktailRecipes->getAllIngredients();

        return blx()->templates->render('cocktailrecipes/_blocktypes/ingredients', array(
            'name'      => $name,
            'options'   => $ingredients,
            'values'    => $value,
        ));
    }
}
