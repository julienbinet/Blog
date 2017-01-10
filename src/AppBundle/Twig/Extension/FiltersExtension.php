<?php

namespace AppBundle\Twig\Extension;

class FiltersExtension extends \Twig_Extension {

    public function getFilters() {
        return array(new \Twig_SimpleFilter('excerpt', array($this, 'wordsExcerpt')));
    }

    public function wordsExcerpt($content, $wordsNumber, $endword="...")
    {
        $words = str_word_count($content, 1);

        if (!empty($content) && (count($words) > $wordsNumber)) {
            $output = array();
            for ($wordsCounter = 0; $wordsCounter < $wordsNumber; $wordsCounter++) {
                $output[] = $words[$wordsCounter];
            }
            return implode(' ', $output).$endword;
        }

        return $content;

    }


    public function getName() {
        return "excerpt_extension";
    }

}
