Overview
========

NDF-RT API PHP Library

http://rxnav.nlm.nih.gov/NdfrtAPI.html

The NDF-RT API is a web service for accessing the current 
National Drug File - Reference Terminology (NDF-RT) data set from your program via SOAP/WSDL.

Usage
=====

<pre>
// Base API Class
require 'APIBaseClass.php';

require 'ndfRTApi.php';

$new = new ndfRTApi();

echo $new->getAllInfo('N0000152900') . "\n\n";

echo $new->getAssociationList() . "\n\n";

echo $new->getRelatedConceptsByAssociation('N0000152900','Product_component');

echo $new->getChildConcepts('N0000022046','true');

echo $new->findConceptsByName('morphine','DRUG_KIND');

echo $new->findConceptsByID('RXCUI',161);

echo $new->findDrugInteractions('N0000145914',2);

echo $new->interactions('N0000007070','N0000179514',2);

echo $new->getKindList();

echo $new->getRelatedConceptsByRole('N0000145914','has_PE','false');

echo $new->getParentConcepts('N0000153235','false');

echo $new->getPropertyList();

echo $new->getConceptsByProperty('RxNorm_CUI',161);

echo $new->getRelatedConceptsByReverseRole('N0000000478','may_treat','false');

echo $new->getRoleList();

echo $new->getTypeList();

echo $new->getVAClassOfConcept('N0000160729');

echo $new->getVersion();

// Debug information
die(print_r($new).print_r(get_object_vars($new)).print_r(get_class_methods(get_class($new))));

</pre>


