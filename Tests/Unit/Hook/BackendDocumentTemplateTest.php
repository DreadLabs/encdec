<?php
namespace DreadLabs\Encdec\Tests\Hook;

class BackendDocumentTemplateTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {

	/**
	 *
	 * @var \DreadLabs\Encdec\Hook\BackendDocumentTemplate
	 */
	protected $hook = NULL;

	public function setUp() {
		$this->hook = new \DreadLabs\Encdec\Hook\BackendDocumentTemplate();
	}

	/**
	 *
	 * @test
	 */
	public function rsaJavascriptLibrariesAreAddedToTheBackendTemplate() {
// 		$templateMock =
	}
}
?>