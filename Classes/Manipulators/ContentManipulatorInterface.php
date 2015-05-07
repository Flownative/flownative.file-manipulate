<?php
namespace Flownative\File\Manipulate\Manipulators;

/**
 *
 */
interface ContentManipulatorInterface {

	/**
	 * Applies the manipulation to the given content
	 *
	 * @param string $content The file content
	 * @param array $options any options needed for this manipulation
	 * @return string The content after the manipulation was applied
	 */
	public function apply($content, $options);
}