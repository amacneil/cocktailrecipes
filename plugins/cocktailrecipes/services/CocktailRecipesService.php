<?php

namespace Blocks;

/**
 * Cocktail Recipes Service
 *
 * Provides a consistent API for our plugin to access the database
 */
class CocktailRecipesService extends BaseApplicationComponent
{
    protected $ingredientRecord;

    /**
     * Create a new instance of the Cocktail Recpies Service.
     * Constructor allows IngredientRecord dependency to be injected to assist with unit testing.
     *
     * @param @ingredientRecord IngredientRecord The ingredient record to access the database
     */
    public function __construct($ingredientRecord = null)
    {
        $this->ingredientRecord = $ingredientRecord;
        if (is_null($this->ingredientRecord)) {
            $this->ingredientRecord = CocktailRecipes_IngredientRecord::model();
        }
    }

    /**
     * Get a new blank ingredient
     *
     * @param  array                           $attributes
     * @return CocktailRecipes_IngredientModel
     */
    public function newIngredient($attributes = array())
    {
        $model = new CocktailRecipes_IngredientModel();
        $model->setAttributes($attributes);

        return $model;
    }

    /**
     * Get all ingredients from the database.
     *
     * @return array
     */
    public function getAllIngredients()
    {
        $records = $this->ingredientRecord->findAll(array('order'=>'t.name'));

        return CocktailRecipes_IngredientModel::populateModels($records, 'id');
    }

    /**
     * Get a specific ingredient from the database based on ID. If no ingredient exists, null is returned.
     *
     * @param  int   $id
     * @return mixed
     */
    public function getIngredientById($id)
    {
        if ($record = $this->ingredientRecord->findByPk($id)) {
            return CocktailRecipes_IngredientModel::populateModel($record);
        }
    }

    /**
     * Save a new or existing ingredient back to the database.
     *
     * @param  CocktailRecipes_IngredientModel $model
     * @return bool
     */
    public function saveIngredient(CocktailRecipes_IngredientModel &$model)
    {
        if ($id = $model->getAttribute('id')) {
            if (null === ($record = $this->ingredientRecord->findByPk($id))) {
                throw new Exception(Blocks::t('Can\'t find ingredient with ID "{id}"', array('id' => $id)));
            }
        } else {
            $record = $this->ingredientRecord->create();
        }

        $record->setAttributes($model->getAttributes());
        if ($record->save()) {
            // update id on model (for new records)
            $model->setAttribute('id', $record->getAttribute('id'));

            return true;
        } else {
            $model->addErrors($record->getErrors());

            return false;
        }
    }

    /**
     * Delete an ingredient from the database.
     *
     * @param  int $id
     * @return int The number of rows affected
     */
    public function deleteIngredientById($id)
    {
        return $this->ingredientRecord->deleteByPk($id);
    }
}
