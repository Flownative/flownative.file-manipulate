<?php
namespace Flownative\File\Manipulate\Manipulators;

/**
 * A simple string replacement manipulator.
 */
class StringReplace implements ContentManipulatorInterface {

	/**
	 * Applies the manipulation to the given content
	 *
	 * @param string $content The file content
	 * @param array $options Pairs of placeholder => replacement
	 * @return string The content after the manipulation was applied
	 */
	public function apply($content, $options) {
		return str_replace(array_keys($options), array_values($options), $content);
	}
}