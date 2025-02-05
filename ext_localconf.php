<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'GdprExtensionsComPintPin',
        'gdprpinterestpin',
        [
            \GdprExtensionsCom\GdprExtensionsComPintPin\Controller\GdprPinterestController::class => 'index'
        ],
        // non-cacheable actions
        [
            \GdprExtensionsCom\GdprExtensionsComPintPin\Controller\GdprPinterestController::class => '',
            \GdprExtensionsCom\GdprExtensionsComPintPin\Controller\GdprManagerController::class => 'create, update, delete'
        ],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    // register plugin for cookie widget
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'GdprExtensionsComPintPin',
        'gdprcookiewidget',
        [
            \GdprExtensionsCom\GdprExtensionsComPintPin\Controller\GdprCookieWidgetController::class => 'index'
        ],
        // non-cacheable actions
        [],
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    gdprcookiewidget {
                        iconIdentifier = gdpr_extensions_com_pint_pin-plugin-gdprpinterestpin
                        title = cookie
                        description = LLL:EXT:gdpr_extensions_com_pint_pin/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pint_pin_gdprpinterest.description
                        tt_content_defValues {
                            CType = list
                            list_type = gdprextensionscompintpin_gdprcookiewidget
                        }
                    }
                }
                show = *
            }
       }'
    );
    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod.wizards.newContentElement.wizardItems {
               gdpr.header = LLL:EXT:gdpr_extensions_com_pint_pin/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pint_pin_gdprpinterest.name.tab
        }'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.gdpr {
                elements {
                    gdprpinterestpin {
                        iconIdentifier = gdpr_extensions_com_pint_pin-plugin-gdprpinterestpin
                        title = LLL:EXT:gdpr_extensions_com_pint_pin/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pint_pin_gdprpinterest.name
                        description = LLL:EXT:gdpr_extensions_com_pint_pin/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pint_pin_gdprpinterest.description
                        tt_content_defValues {
                            CType = gdprextensionscompintpin_gdprpinterestpin
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
