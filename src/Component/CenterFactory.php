<?php
/**
 *  CenterFactory.php
 *
 *
 *  @license    see LICENSE File
 *  @filename   CenterFactory.php
 *  @package    inky-parse
 *  @author     Thomas Hampe <github@hampe.co>
 *  @copyright  2013-2016 Thomas Hampe
 *  @date       13.03.16
 */


namespace Hampe\Inky\Component;

use Hampe\Inky\Inky;
use PHPHtmlParser\Dom\Node\HtmlNode;

class CenterFactory extends AbstractComponentFactory
{
    const NAME = 'center';

    /**
     * @return string
     */
    public function getName()
    {
        return self::NAME;
    }

    /**
     * @param HtmlNode $element
     * @param Inky $inkyInstance
     *
     * @return HtmlNode
     */
    public function parse(HtmlNode $element, Inky $inkyInstance)
    {
        $isParsed = true;
        foreach($element->getChildren() as $childElement) {
            if($childElement instanceof HtmlNode) {
                if($childElement->getAttribute('align') !== 'center'
                    || !$this->elementHasCssClass($childElement, 'float-center')) {
                    $isParsed = false;
                }
            }
        }
        if($isParsed) {
            return $element;
        }

        $center = $this->node('center', $element->getAttributes());


        foreach($element->getChildren() as $childElement) {
            if($childElement instanceof HtmlNode) {
                $childElement->setAttribute('align', 'center');
                $this->addCssClass('float-center', $childElement);
            }
            $center->addChild($childElement);
        }

        $result = $center->find('.menu-item');
        foreach($result as $node) {
            if($node instanceof HtmlNode) {
                $this->addCssClass('float-center', $node);
            }
        }

        return $center;
    }


}