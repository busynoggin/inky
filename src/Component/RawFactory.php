<?php
/**
 *  Row.php
 *
 *
 *  @license    see LICENSE File
 *  @filename   Row.php
 *  @package    inky-parse
 *  @author     Thomas Hampe <github@hampe.co>
 *  @copyright  2013-2016 Thomas Hampe
 *  @date       10.01.16
 */ 


namespace Hampe\Inky\Component;


use Hampe\Inky\Inky;
use PHPHtmlParser\Dom\Node\HtmlNode;
use PHPHtmlParser\Dom\Node\TextNode;

class RawFactory extends AbstractComponentFactory
{

    const NAME = 'raw';

    public function getName()
    {
        return self::NAME;
    }

    /**
     * <raw><%= test %></raw>
     * ---------------------------
     * <%= test %>
     *
     * @param HtmlNode $element
     * @param Inky $inkyInstance
     *
     * @return TextNode
     */
    public function parse(HtmlNode $element, Inky $inkyInstance)
    {
        return new TextNode($element->innerHtml());
    }

}