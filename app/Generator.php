<?php

class Generator {

	private $_vars       = array();
	private $_options    = array();
	private $_settings   = array();

	public $errors = array();

	public function __construct()
	{
		$this->_vars = array(
			'basename'  => filter_input(INPUT_POST, 'pluginName'),
			'lowername' => strtolower(filter_input(INPUT_POST, 'pluginName')),
			'version'   => filter_input(INPUT_POST, 'pluginVersion'),
			'developer' => filter_input(INPUT_POST, 'pluginAuthor'),
			'url'       => filter_input(INPUT_POST, 'pluginUrl')
		);

		$this->_options = array(
			'default' => array(
				'included' => true,
				'files'    => array(
					'README.md',
					'(.*)Plugin.php'
				)
			),
			'hasVariables' => array(
				'included' => true,
				'files'    => array(
					'variables/(.*)Variable.php'
				)
			),
			'hasServices' => array(
				'included' => true,
				'files'    => array(
					'services/(.*)Service.php'
				)
			),
			'hasModels' => array(
				'included' => true,
				'files'    => array(
					'models/(.*)Model.php'
				)
			),
			'hasEvents' => array(
				'included' => true,
				'files'    => array(
					'events/(.*)Event.php'
				)
			),
			'hasControllers' => array(
				'included' => true,
				'files'    => array(
					'controllers/(.*)Controller.php'
				)
			),
			'hasRecords' => array(
				'included' => true,
				'files'    => array(
					'records/(.*)_BaseRecord.php'
				)
			),
			'hasWidgets' => array(
				'included' => true,
				'files'    => array(
					'widgets/(.*)_DefaultWidget.php',
					'templates/_widgets'
				)
			),
			'hasFieldTypes' => array(
				'included' => true,
				'files'    => array(
					'fieldtypes/(.*)_DefaultFieldType.php',
					'templates/_fields',
					'resources/css/(.*)Field.less',
					'resources/css/(.*)Field.css',
					'resources/js/(.*)Field.js'
				)
			),
			'hasTwigExtensions' => array(
				'included' => true,
				'files'    => array(
					'twigextensions/(.*)TwigExtension.php'
				)
			),
			'hasCpSection'      => true,
			'includeComments'   => true
		);

		$this->_settings = array(
			'filenameVarDelimiter' => '_',
			'templateVarDelimiter' => '_',
			'templateBasePath'     => '../templates/plugin/',
			'scratchPath'          => '../temp/',
		);
	}

	public function go()
	{
		if ($this->_validate())
			$this->_generate();
	}

	private function _validate()
	{
		/**
		 * TODO: improve messaging, check against existing plugins for name conflicts
		 */

		$isValid = true;

		foreach ($this->_vars as $key => $value)
		{
			if ( empty($value) )
			{
				$this->errors[] = $key.' is required';
				$isValid = false;
			}
		}

		return $isValid;
	}

	private function _generate()
	{
		$templateBasePath = $this->_settings['templateBasePath'];
		$scratchPath      = $this->_settings['scratchPath'];
		$lcName           = $this->_vars['lowername'];
		$zipFilePath      = $scratchPath.$lcName.'-craft-plugin.zip';

		$zip = new ZipArchive;

		if ($result = $zip->open($zipFilePath, ZipArchive::CREATE) === TRUE)
		{
			$it = new RecursiveDirectoryIterator($templateBasePath);

			foreach(new RecursiveIteratorIterator($it) as $file)
			{
				if ( ! $it->isDot() && is_file($file))
				{
					$zipPath          = (basename($file) !== 'README.md') ? $lcName.'-craft-plugin/'.$lcName.'/' : $lcName.'-craft-plugin/';
					$zipFilename      = $this->_replaceFilename(str_replace($templateBasePath, $zipPath, $file));
					$renderedTemplate = $this->_replaceVars(file_get_contents($file), $this->_vars);
										
					$zip->addFromString($zipFilename, $renderedTemplate);
				}
			}

			$zip->close();

			if (file_exists($zipFilePath))
			{
				header('Pragma: public');
				header('Expires: 0');
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($zipFilePath)) . ' GMT');
				header('Content-Type: application/force-download');
				header('Content-Disposition: inline; filename="'.basename($zipFilePath).'"');
				header('Content-Transfer-Encoding: binary');
				header('Content-Length: ' . filesize($zipFilePath));
				header('Connection: close');
				readfile($zipFilePath);

				if ( ! unlink($zipFilePath))
				{
					echo "Didn't delete that file. :(";
				}

				exit();
			}
		}
		else
		{
			echo 'failed: '.$result;
		}
	}


	function _getFileSet($setName = 'all')
	{

	}


	function _replaceFilename($filename)
	{
		return str_replace($this->_settings['filenameVarDelimiter'].'basename'.$this->_settings['filenameVarDelimiter'], $this->_vars['basename'], $filename);
	}


	function _replaceVars($template = '', $vars = array())
	{
		$placeholders = array_keys($vars);
		$values       = array_values($vars);

		for ($i=0; $i < sizeof($placeholders); $i++) { 
			$placeholders[$i] = $this->_settings['templateVarDelimiter'].$placeholders[$i].$this->_settings['templateVarDelimiter'];
		}

		return str_replace($placeholders, $values, $template);
	}

}