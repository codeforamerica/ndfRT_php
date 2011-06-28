<?php
// SOAP/REST ... implementing REST with SOAP style method selection. 
// Extremely similar to the rxNorm_php api library.
class ndfRT extends APIBaseClass{
// would like to some day implement this in SOAP...

	public static $api_url = 'http://rxnav.nlm.nih.gov/REST/Ndfrt';

	public function __construct($url=NULL)
	{
		parent::new_request(($url?$url:self::$api_url));
	}
	public function getAllInfo( $nui ){
	// is 'name' search type?
		return self::_request(self::$api_url."/allInfo/nui=$nui");
	
	}
	
	public function getAssociationList( ){
		return self::_request(self::$api_url.'/associationList');
	}
	
	public function getRelatedConceptsByAssociation( $nui, $associationName ){
		return self::_request(self::$api_url."/associations/nui=$nui&associationName=$associationName");
	}

	public function getChildConcepts( $nui, $transitive ){
		return self::_request(self::$api_url."/childConcepts/nui=$nui&transitive=$transitive");
	}	
	
	public function findConceptsByName($conceptName,$kindName){
		return self::_request(self::$api_url."/conceptName=$conceptName&kindName=$kindName");;
	}		
	
	public function getEPCClassofConcept($nui){
		return self::_request(self::$api_url."/EPCC/$nui");
	}

	public function findConceptsByID($idType,$idString){
		return self::_request(self::$api_url."/idtype=$idType&idString=$idString");
	}		

	public function findDrugInteractions( $nui, $scope ){
		return self::_request(self::$api_url."/interaction/nui=$nui&scope=$scope");
	}

	public function interactions( $nui,$nui2, $scope ){
		return self::_request(self::$api_url."/interaction/nui1=$nui&nui2=$nui2&scope=$scope");
	}
	
	public function getKindList( ){
		return self::_request(self::$api_url.'/kindList');
	}

	public function getRelatedConceptsByRole( $nui, $roleName,$transitive ){
		return self::_request(self::$api_url."/interaction/nui=$nui&roleName=$scope&transitive=$transitive");
	}
	
	public function getParentConcepts( $nui, $transitive ){
		return self::_request(self::$api_url."/parentConcepts/nui=$nui&transitive=$transitive");
	}		
	
	public function getPropertyList( ){
		return self::_request(self::$api_url.'/propertyList');
	}
	
	public function getConceptsByProperty( $propName, $propertyValue ){
		return self::_request(self::$api_url."/propertyName=$propName&propertyValue=$propertyValue");
	}
	
	public function getRelatedConceptsByReverseRole( $nui, $roleName,$transitive ){
		return self::_request(self::$api_url."/reverse/nui=$nui&roleName=$scope&transitive=$transitive");
	}	
		
	public function getRoleList( ){
		return self::_request(self::$api_url.'/roleList');
	}	
	
	public function getTypeList( ){
		return self::_request(self::$api_url.'/typeList');
	}
	
	public function getVAClassOfConcept($nui){
		return self::_request(self::$api_url."/VA/$nui");
	}
	
	public function getVersion(){
		return self::_request(self::$api_url."/version");
	}
}