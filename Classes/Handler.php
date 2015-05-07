<?php
namespace Flownative\File\Manipulate;

use Flownative\File\Manipulate\Manipulators\ContentManipulatorInterface;

/**
 * Handler for manipulations.
 */
class Handler {

	/**
	 * This manipulates the content of a given file. The options array is expetected in the following format:
	 *
	 * 0 => array(
	 * 	'class' => 'Flownative\File\Manipulate\Manipulators\ContentManipulatorInterface' // Manipulator implementation
	 * 'options' => array() // Options to give to the specific manipulator. See those for how it should look like.
	 * ),
	 * 1 => array(
	 * // Next manipulator just like above, and so on
	 * )
	 *
	 * @param string $filename Path and filename to the file that should be manipulated.
	 * @param array $options These are the manipulation
	 * @return boolean If the manipulations were applied.
	 *
	 * @throws Exception
	 */
	public function manipulateContent($filename, $options = array()) {
		if ($options === array()) {
			return TRUE;
		}

		$content = file_get_contents($filename);

		foreach ($options as $manipulatorConfiguration) {
			$classname = $manipulatorConfiguration['class'];
			$manipulator = new $classname();
			if (!$manipulator instanceof ContentManipulatorInterface) {
				throw new Exception(sprintf('The configured class "%s" to manipulate the given file does not implement the ContentManipulatorInterface', $manipulatorConfiguration['class']), 1430993962);
			}

			$content = $manipulator->apply($content, $manipulatorConfiguration['options']);
		}

		file_put_contents($filename, $content);

		return TRUE;
	}
}