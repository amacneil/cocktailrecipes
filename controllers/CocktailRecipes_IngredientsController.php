<?php

namespace Craft;

/**
 * Ingredients Controller
 *
 * Defines actions which can be posted to by forms in our templates.
 */
class CocktailRecipes_IngredientsController extends BaseController
{
    /**
     * Save Ingredient
     *
     * Create or update an existing ingredient, based on POST data
     */
    public function actionSaveIngredient()
    {
        $this->requirePostRequest();

        if ($id = craft()->request->getPost('ingredientId')) {
            $model = craft()->cocktailRecipes->getIngredientById($id);
        } else {
            $model = craft()->cocktailRecipes->newIngredient($id);
        }

        $attributes = craft()->request->getPost('ingredient');
        $model->setAttributes($attributes);

        if (craft()->cocktailRecipes->saveIngredient($model)) {
            craft()->userSession->setNotice(Craft::t('Ingredient saved.'));

            return $this->redirectToPostedUrl(array('ingredientId' => $model->getAttribute('id')));
        } else {
            craft()->userSession->setError(Craft::t("Couldn't save ingredient."));

            craft()->urlManager->setRouteVariables(array('ingredient' => $model));
        }
    }

    /**
     * Delete Ingredient
     *
     * Delete an existing ingredient
     */
    public function actionDeleteIngredient()
    {
        $this->requirePostRequest();
        $this->requireAjaxRequest();

        $id = craft()->request->getRequiredPost('id');
        craft()->cocktailRecipes->deleteIngredientById($id);

        $this->returnJson(array('success' => true));
    }
}
