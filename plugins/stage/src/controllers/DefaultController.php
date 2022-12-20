<?php
/**
 * Stage  plugin for Craft CMS 3.x
 *
 * Description
 *
 * @link      https://craft.com
 * @copyright Copyright (c) 2022 Roy 
 */

namespace pwtstage\stage\controllers;

use GrahamCampbell\ResultType\Success;
use pwtstage\stage\Stage;

use Craft;
use craft\web\Controller;

/**
 * Default Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    Roy 
 * @package   Stage
 * @since     1
 */
class DefaultController extends Controller
{
    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected array |int|bool $allowAnonymous = ['index'];

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/stage/default
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = '';
        
        //Craft::$app->db->createCommand('SELECT field_drop_hxidtydg, field_aankomstDatum_ggcaqlwk, field_vertrekDatum1_myyqusai FROM fmc_kalender')->queryAll(Stage::fetch_assoc);
        //while ($row = $result->FETCH_ASSOC()){
      //  }
        return $this->asJson(
            [
                'status' => 200,
                'message' => $result,                
                'success' => random_int(1,30) < 20 

                // db in docker
                // database field id field_drop_hxidtydg, field_aankomstDatum_ggcaqlwk, field_vertrekDatum1_myyqusai
                // database table fmc_kalender
                // if value name[fields//formulier] === fields uit de database return false 
                // else true 
            ]
        );   
    }

   
}
