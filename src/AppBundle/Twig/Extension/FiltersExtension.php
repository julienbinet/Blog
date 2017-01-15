<?php

namespace AppBundle\Twig\Extension;

class FiltersExtension extends \Twig_Extension {

    public function getFilters() {
        return array(new \Twig_SimpleFilter('excerpt', array($this, 'wordsExcerpt')));
    }

    public function wordsExcerpt($content, $max_words=100, $endword="...")
    {
        $text = strip_tags($content);
        $words = explode(' ', $text);
        if (count($words) > $max_words) {
            return implode(' ', array_slice($words, 0, $max_words)) . $endword;
        }
        return $text;

    }


    public function getName() {
        return "excerpt_extension";
    }

}
