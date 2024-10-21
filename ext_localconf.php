<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'GdprExtensionsComPinterestPin',
        'gdprpinterestpin',
        [
            \GdprExtensionsCom\GdprExtensionsComPinterestPin\Controller\GdprPinterestController::class => 'index'
        ],
        // non-cacheable actions
        [
            \GdprExtensionsCom\GdprExtensionsComPinterestPin\Controller\GdprPinterestController::class => '',
            \GdprExtensionsCom\GdprExtensionsComPinterestPin\Controller\GdprManagerController::class => 'create, update, delete'
        ],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    // register plugin for cookie widget
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'GdprExtensionsComPinterestPin',
        'gdprcookiewidget',
        [
            \GdprExtensionsCom\GdprExtensionsComPinterestPin\Controller\GdprCookieWidgetController::class => 'index'
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
                        iconIdentifier = gdpr_extensions_com_pinterest_pin-plugin-gdprpinterestpin
                        title = cookie
                        description = LLL:EXT:gdpr_extensions_com_pinterest_pin/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pinterest_pin_gdprpinterest.description
                        tt_content_defValues {
                            CType = list
                            list_type = gdprextensionscompinterestpin_gdprcookiewidget
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
               gdpr.header = LLL:EXT:gdpr_extensions_com_pinterest_pin/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pinterest_pin_gdprpinterest.name.tab
        }'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.gdpr {
                elements {
                    gdprpinterestpin {
                        iconIdentifier = gdpr_extensions_com_pinterest_pin-plugin-gdprpinterestpin
                        title = LLL:EXT:gdpr_extensions_com_pinterest_pin/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pinterest_pin_gdprpinterest.name
                        description = LLL:EXT:gdpr_extensions_com_pinterest_pin/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_pinterest_pin_gdprpinterest.description
                        tt_content_defValues {
                            CType = gdprextensionscompinterestpin_gdprpinterestpin
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
