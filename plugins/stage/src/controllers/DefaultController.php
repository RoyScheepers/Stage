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
use PDO;

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
        $success = Craft::$app->db->createCommand('SELECT field_drop_hxidtydg,field_aankomstDatum_ggcaqlwk,field_vertrekDatum_obhljofn FROM fmc_kalender')->queryAll(PDO::FETCH_ASSOC);
      
      
      $v = $_POST['fields']  ;
      //. $_POST['aankomstDatum'] . $_POST['datetime']
      $x = $v['aankomstDatum'];
      $z = $x['datetime'];

        
        $w = $v['vertrekDatum'];
          $e = $w['datetime'];

          
        $t = $v['drop'];
         
      

        return $this->asJson(
            [
                'status' => 200,
                'message' => $z, 
                'message2' => $e, 
                'message3' => $t, 
                'success' => $success
            ]
        );
    }

} 

/* 
var_dump($_POST);die();
*/
