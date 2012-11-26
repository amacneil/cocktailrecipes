<?php

namespace Blocks;

use Twig_Extension;
use Twig_Filter_Method;

class CocktailRecipesTwigExtension extends Twig_Extension
{
    public function getName()
    {
        return 'cocktailrecipes';
    }

    public function getFilters()
    {
        return array(
            'shake' => new Twig_Filter_Method($this, 'shakeFilter'),
        );
    }

    /**
     * The "shake" filter shakes up the order of words in a sentence.
     *
     * Usage: {{ "Bartender, I'd like a drink please."|shake }}
     */
    public function shakeFilter($content)
    {
        $words = preg_split('/\s+/', $content);
        shuffle($words);

        return implode(' ', $words);
    }
}
