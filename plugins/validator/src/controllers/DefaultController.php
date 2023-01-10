<?php
/**
 * Stage  plugin for Craft CMS 3.x
 *
 * Description
 *
 * @link      https://craft.com
 * @copyright Copyright (c) 2022 Roy 
 */

namespace pwtvalidator\validator\controllers;

use GrahamCampbell\ResultType\Success;
use pwtvalidator\validator\Validator;

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
 * @package   Validator
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
    $voornaam = $fields["voornaam"];
    $achternaam = $fields["achternaam"];
    $aantalPersonen = $fields["aantalPersonen"];
    $straatnaam = $fields["adres"]["address1"];
    $postcode = $fields["adres"]["zip"];
    $woonplaats = $fields["adres"]["state"];
    

    $success = ['success' => TRUE];
    $pattern = "/\w{0,20}/";

    $noSuccess = $this->asJson(
      [
        'status' => 200,
        'noSuccess' => TRUE,
        'message' => $fields,        
      ]

    );
    

    if (preg_match($pattern,$voornaam)) {      
      return $this->asJson($success);
    }/*
    elseif ($achternaam !== 'scheepers') {
      return $noSuccess;
    }
    elseif ($aantalPersonen === '0') {
      return $noSuccess;
    }
    elseif ($straatnaam !== 'straat') {
      return $noSuccess;
    }
    elseif ($postcode !== '1244dd') {
      // optional character ? before it like whitespace 
      return $noSuccess;
    }
    elseif ($woonplaats !== 'bussum') {
      return $noSuccess;
    }*/
     else {      
      return $noSuccess;
    }
  }
}