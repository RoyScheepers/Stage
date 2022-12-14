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

    $fields = Craft::$app->getRequest()->getRequiredParam('fields');
    $aankomstDatum = $fields['aankomstDatum']['datetime'];
    $vertrekDatum = $fields['vertrekDatum']['datetime'];
    $dropField = $fields['drop'];

    $dataQuery = Craft::$app->db->createCommand(' select count(*) from fmc_kalender
        WHERE field_drop_hxidtydg = :dropField 
        -- aankomst 
        and ((:aankomstDatum  >= field_aankomstDatum_ggcaqlwk  
        and :aankomstDatum < field_vertrekDatum_obhljofn) 
        -- vertrek 
        or ( :vertrekDatum  > field_aankomstDatum_ggcaqlwk  
        and :vertrekDatum <= field_vertrekDatum_obhljofn )
        -- aankomst datum tussen boeking 
        -- vertrek datum tussen boeking 
        or (
          field_aankomstDatum_ggcaqlwk >=  :aankomstDatum and 
          field_vertrekDatum_obhljofn  <= :vertrekDatum
            ))')
            ->bindValue(':aankomstDatum', $aankomstDatum)
            ->bindValue(':vertrekDatum', $vertrekDatum)
            ->bindValue(':dropField', $dropField)
            ->queryScalar();


    if ($dataQuery === 0) {
      return $this->asJson(
        [
          'status' => 200,          
          'success' => TRUE,
        ]
      );
    } else {
      return $this->asJson(
        [
          'status' => 200,
          'noSuccess' => TRUE, 
        ]
      );
    }
  }

}