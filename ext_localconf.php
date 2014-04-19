<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'DreadLabs.' . $_EXTKEY,
	'Output',
	array(
		'Content' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Content' => 'create, update, delete',
		
	)
);

// hidden rsa public key into hidden field (gets stored into database as well)
// create record in tx_rsaauth_keys with set pid field + private key in key_value field
// @todo: take a look into rsaauth storage + create custom storage for private key in file system
// decrypt hooks for tce (simple input fields)
// decrypt hooks for rte (rte fields)

// TYPO3\CMS\Backend\Template\DocumentTemplate::preStartPageHook
$hookClassPath = 'EXT:encdec/Classes/Hook/BackendDocumentTemplate.php';
// -- add js libs
$jsLibsHook = $hookClassPath . ':&DreadLabs\\Encdec\\Hook\\BackendDocumentTemplate->addRsaJavaScript';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/template.php']['preStartPageHook'][] = $jsLibsHook;

// -- add inline js
$jsInlineHook = $hookClassPath . ':&DreadLabs\\Encdec\\Hook\\BackendDocumentTemplate->addEncryptDecryptEventListener';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/template.php']['preStartPageHook'][] = $jsInlineHook;

?>