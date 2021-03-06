<?php

/**
 * @see       https://github.com/laminas/laminas-form for the canonical source repository
 * @copyright https://github.com/laminas/laminas-form/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-form/blob/master/LICENSE.md New BSD License
 */

namespace Laminas\Form\View\Helper;

use Laminas\Form\ElementInterface;
use Laminas\Form\Exception;

class FormImage extends FormInput
{
    /**
     * Attributes valid for the input tag type="image"
     *
     * @var array
     */
    protected $validTagAttributes = [
        'name'           => true,
        'alt'            => true,
        'autofocus'      => true,
        'disabled'       => true,
        'form'           => true,
        'formaction'     => true,
        'formenctype'    => true,
        'formmethod'     => true,
        'formnovalidate' => true,
        'formtarget'     => true,
        'height'         => true,
        'src'            => true,
        'type'           => true,
        'width'          => true,
    ];

    /**
     * Render a form <input> element from the provided $element
     *
     * @param  ElementInterface $element
     * @throws Exception\DomainException
     * @return string
     */
    public function render(ElementInterface $element)
    {
        $src = $element->getAttribute('src');
        if (empty($src)) {
            throw new Exception\DomainException(sprintf(
                '%s requires that the element has an assigned src; none discovered',
                __METHOD__
            ));
        }

        return parent::render($element);
    }

    /**
     * Determine input type to use
     *
     * @param  ElementInterface $element
     * @return string
     */
    protected function getType(ElementInterface $element)
    {
        return 'image';
    }
}
