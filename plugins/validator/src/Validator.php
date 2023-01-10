<?php
/**
 * validator plugin for Craft CMS 3.x
 *
 * validator
 *
 * @link      https://craft.com
 * @copyright Copyright (c) 2023 roy
 */

namespace pwtvalidator\validator;


use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\UrlManager;
use craft\events\RegisterUrlRulesEvent;

use yii\base\Event;

/**
 * Class Validator
 *
 * @author    roy
 * @package   Validator
 * @since     1
 *
 */
class Validator extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Validator
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public string $schemaVersion = '1';

    /**
     * @var bool
     */
    public bool $hasCpSettings = false;

    /**
     * @var bool
     */
    public bool $hasCpSection = false;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;
        // Register our site routes
        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['Api/validator'] = 'validator/default/index';
            }
        );

        // Register our CP routes
        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_CP_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['cpActionTrigger1'] = 'validator/default/do-something';
            }
        );

        Craft::info(
            Craft::t(
                'validator',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

// Protected Methods
// =========================================================================

}