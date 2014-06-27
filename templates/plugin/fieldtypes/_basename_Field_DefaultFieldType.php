<?php
namespace Craft;

class _basename_Field_DefaultFieldType extends BaseFieldType
{
	public function getName()
	{
		return Craft::t('_basename_');
	}


	/**
	 * Defines the settings.
	 *
	 * @access protected
	 * @return array
	 */
	
	protected function defineSettings()
	{
		return array();
	}


	/**
	 * Returns the field's settings HTML.
	 *
	 * @return string|null
	 */
	
	public function getSettingsHtml()
	{
		return craft()->templates->render('_lowername_/settings', array(
			'settings' => $this->getSettings()
		));
	}


	/**
	 * Display fieldtype
	 *
	 * @param string $name  Our fieldtype handle
	 * @return string Return our fields input template
	 */
	
	public function getInputHtml($name, $value)
	{
		craft()->templates->includeCssResource('_lowername_/css/_lowername_Field.css');
		craft()->templates->includeJsResource('_lowername_/js/_lowername_Field.js');

		$id = craft()->templates->formatInputId($name);

		return craft()->templates->render('_lowername_/_fields/input', array(
			'name'     => $name,
			'value'    => $value,
			'settings' => $this->getSettings()
		));
	}
}