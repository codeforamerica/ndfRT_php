<?php
/* load simpletest library

   downloadable using

wget http://downloads.sourceforge.net/project/simpletest/simpletest/simpletest_1.1/simpletest_1.1alpha3.tar.gz;
tar -zxf simpletest_1.1alpha3.tar.gz;

*/
require_once('simpletest/autorun.php');
// load baseclass 
require_once('APIBaseClass.php');
// load your class here...
require_once('ndfRTApi.php');
// the name of the api class is 'yourApi'
class TestOfApiClass extends UnitTestCase {
   public $api;
   // put your class name here
   public static $class_name = 'ndfRTApi';
    function testApiConstructs(){
    	$this->api = new self::$class_name();
    	$this->check_class_params('_http _root api_url');
	$this->assertIsA($this->api->getAllInfo('N0000152900'), 'string');
	$this->assertIsA($this->api->getAssociationList(), 'string');
	$this->assertIsA($this->api->getRelatedConceptsByAssociation('N0000152900','Product_component'), 'string');
	$this->assertIsA($this->api->getChildConcepts('N0000022046','true'), 'string');
	$this->assertIsA($this->api->findConceptsByName('morphine','DRUG_KIND'), 'string');
	$this->assertIsA($this->api->findConceptsByID('RXCUI',161), 'string');
	$this->assertIsA($this->api->findDrugInteractions('N0000145914',2), 'string');
	$this->assertIsA($this->api->interactions('N0000007070','N0000179514',2), 'string');
	$this->assertIsA($this->api->getKindList(), 'string');
	$this->assertIsA($this->api->getRelatedConceptsByRole('N0000145914','has_PE','false'), 'string');
	$this->assertIsA($this->api->getParentConcepts('N0000153235','false'), 'string');
	$this->assertIsA($this->api->getPropertyList(), 'string');
	$this->assertIsA($this->api->getConceptsByProperty('RxNorm_CUI',161), 'string');
	$this->assertIsA($this->api->getRelatedConceptsByReverseRole('N0000000478','may_treat','false'), 'string');
	$this->assertIsA($this->api->getRoleList(), 'string');
	$this->assertIsA($this->api->getTypeList(), 'string');
	$this->assertIsA($this->api->getVAClassOfConcept('N0000160729'), 'string');
	$this->assertIsA($this->api->getVersion(), 'string');
    }

    function check_class_params($params=NULL,$mode=TRUE){
    	// look up parameters inside of class and see if they are set/ true
    	// also allow to only check for certain parameters by passing in an array with the names of those variables or a space seperated string
    	// parameters to look for in the object
    	$api_class_vars =  get_class_vars(get_class($this->api));
    	if($params != null && is_string($params)){    		
			$params = explode(' ',$params);
			foreach($params as $key_name)
				$api_vars [$key_name] = "$key_name";
			$api_vars = array_intersect_key($api_class_vars,$api_vars);
    	}
    	else
    		$api_vars = $api_class_vars;		
    	// anything that isnt intersected should return false
   
    	foreach($api_vars as $key=>$value){
    		if($mode == TRUE)
    			$this->assertTrue(array_key_exists($key,$api_class_vars));
    		elseif($mode == FALSE)
    			$this->assertFalse(array_key_exists($key,$api_class_vars));
    		}
    }
}
?>
