<?php

require_once 'pcpinfoincontactsummary.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function pcpinfoincontactsummary_civicrm_config(&$config) {
   // CRM_Core_Resources::singleton()
   //  ->addScriptFile('eu.tttp.civisualize', 'js/d3.v3.js', 110, 'html-header', FALSE)
   //  ->addScriptFile('eu.tttp.civisualize', 'js/dc/dc.js', 110, 'html-header', FALSE)
   //  ->addScriptFile('eu.tttp.civisualize', 'js/dc/crossfilter.js', 110, 'html-header', FALSE)
   //  ->addStyleFile('eu.tttp.civisualize', 'js/dc/dc.css');
  _pcpinfoincontactsummary_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function pcpinfoincontactsummary_civicrm_xmlMenu(&$files) {
  _pcpinfoincontactsummary_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function pcpinfoincontactsummary_civicrm_install() {
  // Check dependencies
  pcpinfoincontactsummary_check_dependencies();
  
  _pcpinfoincontactsummary_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function pcpinfoincontactsummary_civicrm_uninstall() {
  _pcpinfoincontactsummary_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function pcpinfoincontactsummary_civicrm_enable() {
  _pcpinfoincontactsummary_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function pcpinfoincontactsummary_civicrm_disable() {
  _pcpinfoincontactsummary_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function pcpinfoincontactsummary_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _pcpinfoincontactsummary_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function pcpinfoincontactsummary_civicrm_managed(&$entities) {
  _pcpinfoincontactsummary_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function pcpinfoincontactsummary_civicrm_caseTypes(&$caseTypes) {
  _pcpinfoincontactsummary_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function pcpinfoincontactsummary_civicrm_angularModules(&$angularModules) {
_pcpinfoincontactsummary_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function pcpinfoincontactsummary_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _pcpinfoincontactsummary_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Functions below this ship commented out. Uncomment as required.
 *

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function pcpinfoincontactsummary_civicrm_preProcess($formName, &$form) {

}

*/


/**
 * Function to check the dependency
 *    - whether Civisualize extension is installed/enabled
 */
function pcpinfoincontactsummary_check_dependencies() {
  _pcpinfoincontactsummary_civix_civicrm_config();
  if (!in_array('uk.co.vedaconsulting.pcp_civisualize' , pcpinfoincontactsummary_get_active_extensions())) {
    $status = ts('Civisualize extension is either not installed/enabled. <br />Please install/enable Civisualize extension in order to install this extension.');
    CRM_Core_Session::setStatus( $status );
    $redirect_url = CRM_Utils_System::url( 'civicrm/admin/extensions', 'reset=1' );
    CRM_Utils_System::redirect( $redirect_url );
    exit;
  }
}

/**
 * Function to get active CiviCRM Extensions
 */
function pcpinfoincontactsummary_get_active_extensions() {
  $params = array(
    'version' => 3,
    'sequential' => 1,
  );
  $result = civicrm_api('Extension', 'get', $params);
  $allExtension = $result['values'];
  $activeExtension = array();
  foreach ($allExtension as $key => $value) {
    if ($value['status'] == 'installed') {
      $activeExtension[] = $value['key'];
    }
  }
  return $activeExtension;
}


function pcpinfoincontactsummary_civicrm_tabs( &$tabs, $contactID ) {
  require_once 'CRM/Pcpinfoincontactsummary/Page/PCPDetails.php';
  $checkPcpExists = CRM_Pcpinfoincontactsummary_Page_PCPDetails::getSQLData($contactID);
  if (!CRM_Utils_Array::crmIsEmptyArray($checkPcpExists)) {
    $url = CRM_Utils_System::url( 'civicrm/contact/pcpinfo', 'snippet=2&cid='.$contactID);
    $tabs[] = array( 'id'    => 'pcp',
                     'url'   => $url,
                     'title' => 'PCP',
                     'weight'=> 300
                    );
  }
}


function pcpinfoincontactsummary_civicrm_pageRun( &$page ) {
  $name = $page->getVar('_name');
  //FIXME:need to include only for the contact pcp tab. getting slow now when using in hook
  if ($name == 'CRM_Contact_Page_View_Summary') {
   CRM_Core_Resources::singleton()
    ->addScriptFile('uk.co.vedaconsulting.pcp_civisualize', 'js/d3.v3.js', 110, 'html-header', FALSE)
    ->addScriptFile('uk.co.vedaconsulting.pcp_civisualize', 'js/dc/dc.js', 110, 'html-header', FALSE)
    ->addScriptFile('uk.co.vedaconsulting.pcp_civisualize', 'js/dc/crossfilter.js', 110, 'html-header', FALSE)
    ->addStyleFile('uk.co.vedaconsulting.pcp_civisualize', 'js/dc/dc.css');
  }
}
