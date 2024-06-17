<?php
/**
 *  ComponentFactoryInterface.php
 *
 *
 *  @license    see LICENSE File
 *  @filename   ComponentFactoryInterface.php
 *  @package    inky-parse
 *  @author     Thomas Hampe <github@hampe.co>
 *  @copyright  2013-2016 Thomas Hampe
 *  @date       10.01.16
 */ 


namespace Hampe\Inky\Component;


use Hampe\Inky\Inky;
use PHPHtmlParser\Dom\Node\AbstractNode;
use PHPHtmlParser\Dom\Node\Collection;
use PHPHtmlParser\Dom\Node\HtmlNode;

interface ComponentFactoryInterface
{

    /**
     * @return string
     */
    public function getName();

    /**
     * @param HtmlNode $element
     * @param Inky $inkyInstance
     *
     * @return AbstractNode|Collection
     */
    public function parse(HtmlNode $element, Inky $inkyInstance);

}