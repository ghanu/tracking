<?php

$or_airp = $_POST['or_airp'];
$dt_airp = $_POST['dt_airp'];
$deptime = $_POST['deptime'];
$rettime = $_POST['rettime'];

if ($or_airp == "")
    exit;
if ($dt_airp == "")
    exit;
if ($deptime == "")
    exit;
if ($rettime == "")
    exit;

class MSSoapClient extends SoapClient {

    function __doRequest($request, $location, $action, $version) {

        echo $request, $location, $action, $version;
        if ($k = preg_match_all("/(xmlns:[a-zA-Z\-_A-Z0-9\"=\/\:\.]*)/i", $request, $regs)) {
            foreach ($regs[0] as $vali) {
                if (strpos($vali, "SOAP-ENV") == false) {
                    $csere.=" " . $vali;
                    $request = str_replace($vali . " ", "", $request);
                    $request = str_replace($vali, "", $request);
                }
            }
        }

        $request = str_replace("<ns2:LowFareSearchReq", "<ns2:LowFareSearchReq" . $csere, $request);

        $request = str_replace('<?xml version="1.0" encoding="UTF-8"?-->', '', $request);

        $request = str_replace(' >', '>', $request);
        $request = str_replace('common_v6_0', 'common_v5_0', $request);
        $request = str_replace('air_v9_0', 'air_v8_0', $request);
        $request = substr($request, 1);

        return parent::__doRequest($request, $location, $action, $version);
    }

    function __getLastRequestHeaders() {
        return parent::__getLastRequestHeaders();
    }

    function __getLastRequest() {
        return parent::__getLastRequest();
    }

}

$hparams = array();

//SOAP_SINGLE_ELEMENT_ARRAYS

$trac["trace"] = 1;
$trac["use"] = SOAP_LITERAL;
$trac["style"] = SOAP_DOCUMENT;
$trac["compression"]=SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | 5;
$trac["compression"] = SOAP_COMPRESSION_ACCEPT;
$trac["type_ns"] = "";
$trac["login"] = "Universal API/uAPI2844938264";
$trac["password"] = "dJ6KwaExehmd69EStjFPYNt76";
$trac["location"] = "https://americas.copy-webservices.travelport.com/B2BGateway/connect/FSP/AirLowFareSearchService";
$trac["soapaction"] = "AirLowFareSearchService";
$trac["soap_version"]=SOAP_1_1;

$classmap = array();
$client_header[] = new SoapHeader("https://americas.copy-webservices.travelport.com/B2BGateway/connect/FSP/AirLowFareSearchService",
                'AuthenticationInfo', $hparams, "");

$tmpClient = new MSSoapClient("air_v18_0/Air.wsdl", $trac);

$client = new MSSoapClient("air_v18_0/Air.wsdl", $trac);
$client->__setSoapHeaders($client_header);


$opta = array();
$opta["SearchAirLeg"] = array();
$opta["SearchAirLeg"][0] = array();
$opta["SearchAirLeg"][1] = array();
$opta["SearchAirLeg"][0]["SearchOrigin"] = array();
$opta["SearchAirLeg"][0]["SearchOrigin"]["City"] = array();
$opta["SearchAirLeg"][0]["SearchOrigin"]["City"]["Code"] = "$or_airp";
$opta["SearchAirLeg"][0]["SearchDestination"] = array();
$opta["SearchAirLeg"][0]["SearchDestination"]["City"] = array();
$opta["SearchAirLeg"][0]["SearchDestination"]["City"]["Code"] = "$dt_airp";
$opta["SearchAirLeg"][0]["SearchDepTime"] = array();
$opta["SearchAirLeg"][0]["SearchDepTime"]["PreferredTime"] = $deptime . "T00:00:00.000-23:59";

$opta["SearchAirLeg"][1]["SearchOrigin"] = array();
$opta["SearchAirLeg"][1]["SearchOrigin"]["City"] = array();
$opta["SearchAirLeg"][1]["SearchOrigin"]["City"]["Code"] = "$dt_airp";
$opta["SearchAirLeg"][1]["SearchDestination"] = array();
$opta["SearchAirLeg"][1]["SearchDestination"]["City"] = array();
$opta["SearchAirLeg"][1]["SearchDestination"]["City"]["Code"] = "$or_airp";
$opta["SearchAirLeg"][1]["SearchDepTime"] = array();
$opta["SearchAirLeg"][1]["SearchDepTime"]["PreferredTime"] = $rettime . "T00:00:00.000-23:59";

$opta["SearchPassenger"] = array();
$opta["SearchPassenger"]["Code"] = "ADT";
$opta["SearchPassenger"]["Age"] = "25";
$opta["AirSearchModifiers"]["RequireSingleCarrier"] = "false";
$opta["AirSearchModifiers"]["MaxStops"] = 2; {
    try {

        $ans = $client->service2($opta);
    } catch (SoapFault $fault) {
        header("Content-type: text/plain");
        $txt = $fault->getMessage();
        echo "\nerror:\n" . $txt . "\n";
        print_r($client->__getLastRequestHeaders());
        echo "\n";
        print_r($client->__getLastRequest());
        echo "\n";
        echo "\n";
        print_r($client->__getLastResponseHeaders());
        echo "\n";
        print_r($client->__getLastResponse());
        echo "\n";
        exit();
    }
}

echo "<xmp>";
print_r($ans);
echo "</xmp>";
?>
