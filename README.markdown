Overview
========

RxNorm RESTful Web API
http://rxnav.nlm.nih.gov/

An alternative web service developed at the National Library of Medicine for the RxNorm data from the previously released SOAP-based RxNorm API web services. 

Usage
=====

<pre>
// Base API Class
require 'APIBaseClass.php';

require 'rxNormApi.php';

$new = new rxNormApi();

echo $new->getRxNormVersion();
	
echo $new->getIdTypes();

echo $new->getRelaTypes();

echo $new->getSourceTypes();

echo $new->getTermTypes();

// Debug information
die(print_r($new).print_r(get_object_vars($new)).print_r(get_class_methods(get_class($new))));

</pre>


