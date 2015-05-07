<?php
namespace Flownative\File\Manipulate\Manipulators;

/**
 *
 */
class RegularExpression implements ContentManipulatorInterface {

	/**
	 * Applies the manipulation to the given content
	 *
	 * @param string $content The file content
	 * @param array $options Pairs of regular expression => replacement (Can be a \Closure that returns a string)
	 * @return string The content after the manipulation was applied
	 */
	public function apply($content, $options) {
		foreach ($options as $expression => $replacement) {
			if ($replacement instanceof \Closure) {
				$content = preg_replace_callback($expression, $replacement, $content);
			} else {
				$content = preg_replace($expression, $replacement, $content);
			}
		}

		return $content;
	}
}