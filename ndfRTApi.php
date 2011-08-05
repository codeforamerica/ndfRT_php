<?php
// SOAP/REST ... implementing REST with SOAP style method selection. 
// Extremely similar to the rxNorm_php api library.
class ndfRTApi extends APIBaseClass{
// would like to some day implement this in SOAP...

	public static $api_url = 'http://rxnav.nlm.nih.gov/REST/Ndfrt';

	public function __construct($url=NULL)
	{
		parent::new_request(($url?$url:self::$api_url));
	}
	public function getAllInfo( $nui ){
		return self::_request("/allInfo/$nui",'GET');	
	}
	
	public function getAssociationList( ){
		return self::_request('/associationList','GET');
	}
	
	public function getRelatedConceptsByAssociation( $nui, $associationName ){
		return self::_request("/associations/nui=$nui&associationName=$associationName",'GET');
	}

	public function getChildConcepts( $nui, $transitive ){
		return self::_request("/childConcepts/nui=$nui&transitive=$transitive",'GET');
	}	
	
	public function findConceptsByName($conceptName,$kindName){
		return self::_request("/conceptName=$conceptName&kindName=$kindName",'GET');
	}		
	
	public function getEPCClassofConcept($nui){
		return self::_request("/EPCC/$nui",'GET');
	}

	public function findConceptsByID($idType,$idString){
		return self::_request("/idType=$idType&idString=$idString",'GET');
	}		

	public function findDrugInteractions( $nui, $scope ){
		return self::_request("/interaction/nui=$nui&scope=$scope",'GET');
	}

	public function interactions( $nui,$nui2, $scope ){
		return self::_request("/interaction/nui1=$nui&nui2=$nui2&scope=$scope",'GET');
	}
	
	public function getKindList( ){
		return self::_request('/kindList','GET');
	}

	public function getRelatedConceptsByRole( $nui, $roleName,$transitive ){
		return self::_request("/nui=$nui&roleName=$roleName&transitive=$transitive",'GET');
	}
	
	public function getParentConcepts( $nui, $transitive ){
		return self::_request("/parentConcepts/nui=$nui&transitive=$transitive",'GET');
	}		
	
	public function getPropertyList( ){
		return self::_request('/propertyList','GET');
	}
	
	public function getConceptsByProperty( $propName, $propertyValue ){
		return self::_request("/propertyName=$propName&propertyValue=$propertyValue",'GET');
	}
	
	public function getRelatedConceptsByReverseRole( $nui, $roleName,$transitive ){
		return self::_request("/reverse/nui=$nui&roleName=$roleName&transitive=$transitive",'GET');
	}	
		
	public function getRoleList( ){
		return self::_request('/roleList','GET');
	}	
	
	public function getTypeList( ){
		return self::_request('/typeList','GET');
	}
	
	public function getVAClassOfConcept($nui){
		return self::_request("/VA/$nui",'GET');
	}
	
	public function getVersion(){
		return self::_request("/version",'GET');
	}
}
