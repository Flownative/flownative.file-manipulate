Simple File Manipulator Library
===============================

Entry point for file manipulation, mainly planned for scaffolding.

Currently contains code to manipulate (text) file content by replacing.
By implementing the ContentManipulatorInterface own content manipulations can
easily be added.

Future plans include manipulating other file types and the file (name, path) itself.


What does it do?
----------------

You give it a file(path) and a configuration and it manipulates the file content.

Example
-------

Given you have a code template SomeFile.php:

	<?php
	namespace {namespace};
	
	class {className} {
	
		// some scaffolded code here
	
	}


And you want to scaffold it. So you would copy the template to the designated place and use this code:
	
	<?php
	$someFile = 'SomeFile.php';
	
	$configuration = array(
		array(
			'class' => 'Flownative\File\Manipulate\Manipulators\StringReplace',
			'options' => array(
				'{namespace}' => 'Some\Namespace\For\Scaffolded',
				'{className}' => 'TheScaffoldedClass'
			)
		)
	);
	
	$handler = new \Flownative\File\Manipulate\Handler();
	$handler->manipulateContent($someFile, $configuration);
