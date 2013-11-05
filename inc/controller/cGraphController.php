<?php

/**
 * Description of cGraphController
 *
 * @author mgovindan
 */
class cGraphController {

    public $html;
    public $base;
    private $uniqueID;
    public $properties;
    public $data_url;

    function __construct() {
        $this->base = AppChartURL;
        $this->uniqueID = '04081982';
        $this->properties['width'] = '100';
        $this->properties['height'] = '100';
        $this->data_url = '';
    }

    function includeGraphFiles() {

        $this->html.='<script src="' . $this->base . 'swfobject.js" type="text/javascript"></script> ';
    }

    function createGraph() {
        $protocol = ($_SERVER['HTTPS'] != '' && strtoupper($_SERVER['HTTPS']) == 'ON') ? 'https' : 'http';
        $this->includeGraphFiles();
        $this->uniqueID = $this->uniqueID++;
        $this->html.='<div id="gcontainer_' . $this->uniqueID . '"></div>' . "\n";
        $this->html.= '<script type="text/javascript">' . "\n";
        $this->html.= 'var so = new swfobject("' . $this->base . 'open-flash-chart.swf", "gchart_' . $this->uniqueID . '", "' . $this->properties['width'] . '", "' . $this->properties['height'] . '", "9", "#FFFFFF");' . "\n";

        $this->html.= 'so.addVariable("data-file", "' . $this->data_url . '");' . "\n";

        $this->html.= 'so.addParam("allowScriptAccess", "always" );' . "\n";
        $this->html.= 'so.write("gchartcontainer_' . $this->uniqueID . '");' . "\n";
        $this->html.= '</script>' . "\n";
        $this->html.= '<noscript>' . "\n";

        $this->html.= '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="' . $protocol . '://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" ';
        $this->html.= 'width="' . $this->properties['width'] . '" height="' . $this->properties['height'] . '" id="gchart_' . $this->uniqueID . '" align="middle">' . "\n";
        $this->html.= '<param name="allowScriptAccess" value="sameDomain" />' . "\n";
        $this->html.= '<param name="movie" value="' . $this->base . 'open-flash-chart.swf?data=' . $this->data_url . '" />' . "\n";
        $this->html.= '<param name="quality" value="high" />' . "\n";
        $this->html.= '<param name="bgcolor" value="#FFFFFF" />' . "\n";
        $this->html.= '<embed src="' . $this->base . 'open-flash-chart.swf?data=' . $this->data_url . '" quality="high" bgcolor="#FFFFFF" width="' . $this->properties['width'] . '" height="' . $this->properties['height'] . '" name="gchart_' . $this->uniqueID . '" align="middle" allowScriptAccess="sameDomain" ' . "\n";
        $this->html.= 'type="application/x-shockwave-flash" pluginspage="' . $protocol . '://www.macromedia.com/go/getflashplayer" id="gchart_' . $this->uniqueID . '"/>' . "\n";
        $this->html.= '</object>';

        $this->html.= '</noscript>';
    }

    function createBarGraph() {
        
    }

    function createPieGraph() {
        
    }

    function __destruct() {
        
    }

}

?>
