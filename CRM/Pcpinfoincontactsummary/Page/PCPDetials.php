<?php

require_once 'CRM/Core/Page.php';

class CRM_Pcpinfoincontactsummary_Page_PCPDetials extends CRM_Core_Page {
  
  //get pcp details for contact id
  function getSQLData($contactId) {
    $where = NULL;
    if ($contactId) {
      $where = " AND (contribute.contact_id = {$contactId} OR soft_contribute.contact_id = {$contactId})";
    }
    $sql = "SELECT COUNT(contribute.id) as count 
      , DATE(contribute.receive_date) as receive_date 
      , CASE WHEN pcp_block.entity_table = 'civicrm_event' THEN event.title WHEN pcp_block.entity_table = 'civicrm_contribution_page' THEN contribution_page.title END as page_type 
      , SUM(contribute.total_amount) as total 
      , pcp.title as instrument 
      , pcp.id as pcp_id
      , donor.display_name as donor_name
      , donor.id as donor_id 
      , contribute.total_amount as amount 
      FROM civicrm_pcp pcp 
      LEFT JOIN civicrm_contribution_soft soft_contribute ON (pcp.id = soft_contribute.pcp_id) 
      LEFT JOIN civicrm_contribution contribute ON (contribute.id = soft_contribute.contribution_id)
      LEFT JOIN civicrm_contact donor ON (donor.id = contribute.contact_id) 
      LEFT JOIN civicrm_pcp_block pcp_block ON (pcp_block.id = pcp.pcp_block_id) 
      LEFT JOIN civicrm_event event ON (event.id = pcp_block.entity_id AND pcp_block.entity_table = 'civicrm_event') 
      LEFT JOIN civicrm_contribution_page contribution_page ON (contribution_page.id = pcp_block.entity_id AND pcp_block.entity_table = 'civicrm_contribution_page')
      WHERE contribute.receive_date is not null AND soft_contribute.pcp_id IS NOT NULL {$where}
      AND contribute.receive_date <> '0000-00-00' 
      AND contribute.contribution_status_id = 1
      GROUP BY DATE(contribute.receive_date)
      ,page_type , instrument, contribute.id
      ORDER BY contribute.total_amount DESC
    ";
        // print($sql);
    $dao = CRM_Core_DAO::executeQuery($sql);
    $values = array();
    while ($dao->fetch()) {
      $values[] = $dao->toArray();
    }
    
    return $values;       
  }
  
  function run() {
    // CRM_Core_Resources::singleton()
    //   ->addScriptFile('eu.tttp.civisualize', 'js/d3.v3.js', 110, 'html-header', FALSE)
    //   ->addScriptFile('eu.tttp.civisualize', 'js/dc/dc.js', 110, 'html-header', FALSE)
    //   ->addScriptFile('eu.tttp.civisualize', 'js/dc/crossfilter.js', 110, 'html-header', FALSE)
    //   ->addStyleFile('eu.tttp.civisualize', 'js/dc/dc.css');
      
    $contactID  = (int) CRM_Utils_Request::retrieve( 'cid', 'Positive', $this, true, NULL, 'GET');
    $values     = self::getSQLData($contactID);
    $data       = json_encode (array("is_error"=>0, "values" => $values), JSON_NUMERIC_CHECK);
    $this->assign('data', $data);
    
    parent::run();
  }
}
