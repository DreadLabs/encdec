<?php
namespace DreadLabs\Encdec\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 tommy <tommy@van-tomas.de>
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ContentController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * contentRepository
	 *
	 * @var \DreadLabs\Encdec\Domain\Repository\ContentRepository
	 * @inject
	 */
	protected $contentRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$contents = $this->contentRepository->findAll();
		$this->view->assign('contents', $contents);
	}

	/**
	 * action show
	 *
	 * @param \DreadLabs\Encdec\Domain\Model\Content $content
	 * @return void
	 */
	public function showAction(\DreadLabs\Encdec\Domain\Model\Content $content) {
		$this->view->assign('content', $content);
	}

	/**
	 * action new
	 *
	 * @param \DreadLabs\Encdec\Domain\Model\Content $newContent
	 * @dontvalidate $newContent
	 * @return void
	 */
	public function newAction(\DreadLabs\Encdec\Domain\Model\Content $newContent = NULL) {
		$this->view->assign('newContent', $newContent);
	}

	/**
	 * action create
	 *
	 * @param \DreadLabs\Encdec\Domain\Model\Content $newContent
	 * @return void
	 */
	public function createAction(\DreadLabs\Encdec\Domain\Model\Content $newContent) {
		$this->contentRepository->add($newContent);
		$this->flashMessageContainer->add('Your new Content was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \DreadLabs\Encdec\Domain\Model\Content $content
	 * @return void
	 */
	public function editAction(\DreadLabs\Encdec\Domain\Model\Content $content) {
		$this->view->assign('content', $content);
	}

	/**
	 * action update
	 *
	 * @param \DreadLabs\Encdec\Domain\Model\Content $content
	 * @return void
	 */
	public function updateAction(\DreadLabs\Encdec\Domain\Model\Content $content) {
		$this->contentRepository->update($content);
		$this->flashMessageContainer->add('Your Content was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \DreadLabs\Encdec\Domain\Model\Content $content
	 * @return void
	 */
	public function deleteAction(\DreadLabs\Encdec\Domain\Model\Content $content) {
		$this->contentRepository->remove($content);
		$this->flashMessageContainer->add('Your Content was removed.');
		$this->redirect('list');
	}

}
?>