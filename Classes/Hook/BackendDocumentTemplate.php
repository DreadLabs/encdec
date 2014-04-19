<?php
namespace DreadLabs\Encdec\Hook;

class BackendDocumentTemplate {

	public function addRsaJavaScript(array &$params, \TYPO3\CMS\Backend\Template\DocumentTemplate &$template) {

		if (FALSE === $this->isHookConditionMet()) {
			return NULL;
		}

		$javascriptPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::siteRelPath('rsaauth') . 'resources/';

		$path = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL') . $javascriptPath;

		$files = array(
			'jsbn_jsbn' => $path . 'jsbn/jsbn.js',
			'jsbn_prng4' => $path . 'jsbn/prng4.js',
			'jsbn_rng' => $path . 'jsbn/rng.js',
			'jsbn_rsa' => $path . 'jsbn/rsa.js',
			'jsbn_base64' => $path . 'jsbn/base64.js'
			// 'jsbn_rsaauth_min' => $path . 'rsaauth_min.js'
		);

		foreach ($files as $key => $file) {
			$template->JScodeLibArray[$key] = '<script type="text/javascript" src="' . $file . '"></script>';
		}
	}

	public function addEncryptDecryptEventListener(array &$params,\TYPO3\CMS\Backend\Template\DocumentTemplate &$template) {

		if (FALSE === $this->isHookConditionMet()) {
			return NULL;
		}

		// $template->JScodeArray['encrypt_decrypt_eventlistener'] = 'alert(\'Hey!\');';
		// $editConf = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('edit');
		// $template->JScodeArray['encdec_debug'] = 'alert(\'' . json_encode($editConf) . '\')';
	}

	protected function isHookConditionMet() {

		$editConf = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('edit');

		$isEditConfArray = is_array($editConf);
		$isExtensionKeyInEditConfArray = array_key_exists('tx_encdec_domain_model_content', (array) $editConf);

		return $isEditConfArray && $isExtensionKeyInEditConfArray;
	}
}
?>