<?php

namespace Blocks;

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

        if ($id = blx()->request->getPost('ingredientId')) {
            $model = blx()->cocktailRecipes->getIngredientById($id);
        } else {
            $model = blx()->cocktailRecipes->newIngredient($id);
        }

        $attributes = blx()->request->getPost('ingredient');
        $model->setAttributes($attributes);

        if (blx()->cocktailRecipes->saveIngredient($model)) {
            blx()->userSession->setNotice(Blocks::t('Ingredient saved.'));

            return $this->redirectToPostedUrl(array('ingredientId' => $model->getAttribute('id')));
        } else {
            blx()->userSession->setError(Blocks::t("Couldn't save ingredient."));

            return $this->renderRequestedTemplate(array('ingredient' => $model));
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

        $id = blx()->request->getRequiredPost('id');
        blx()->cocktailRecipes->deleteIngredientById($id);

        $this->returnJson(array('success' => true));
    }
}
