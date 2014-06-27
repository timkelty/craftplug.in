<?php 
namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class _basename_TwigExtension extends \Twig_Extension
{
	
	protected $input  = array();
	protected $fields = array();


	public function getName()
    {
        return '_basename_';
    }


	public function getFilters()
    {
        return array(
            'foo' => new Twig_Filter_Method($this, 'foo'),
        );
    }

	
	public function foo()
    {
    	$output = '';

		return $output;
	}

}