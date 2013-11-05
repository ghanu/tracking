<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cFormController
 *
 * @author gt
 */
include_once('cController.php');

class cFormController extends cController {

    public $controllerScript = '';
    public $viewScript = '';
    public $modalScript = '';
    public $designerSource = array();
    private $currentColumnDetails = array();
    private $currentColumnName = '';
    private $currentTable = '';
    private $javascript = '';
    private $viewallscript = '';
    public $scriptCode = '';
    private $currentControlViewCode = '';
    private $controlScriptCode = '';
    private $viewAllColumnNames = array();
    public $localizationStrings = array();
    private $defaultLocalization = AppLang;
    private $sqlcolumns;

    function createModal() {
        
    }

    function createController() {



        $this->controllerScript = '<?php include_once(\'cController.php\');
class c' . ucwords($this->currentTable) . 'Controller extends cController {
 public $action="viewall";
    public $id="";
    
    function __construct() {
        parent::__construct();
        $this->table = "' . $this->currentTable . '";
    }
    
 function curd() {
        if($this->action=="viewall"||$this->action=="view"){
            $this->column=array("' . $this->currentTable . '.id","' . implode('","', array_values($this->sqlcolumns)) . '");
if($this->action=="viewall"){                
$this->column[]="1 as action";
}';
        if (is_array($sqljoincondtion)) {
            $this->controllerScript .=' $this->join_condition="' . array_values($sqljoincondtion) . '";    ';
        }
        $this->controllerScript .='}elseif($this->action=="editview"){
            $this->column=array("' . implode('","', array_keys($this->sqlcolumns)) . '");';
        if (is_array($sqljoincondtion)) {
            $this->controllerScript .=' $this->join_condition="' . array_values($sqljoincondtion) . '";    ';
        }


        $this->controllerScript .='}elseif($this->action=="add"||$this->action=="edit"){
            $this->column=array(';
        foreach ($this->sqlcolumns as $column_name => $display_column) {
            list($table, $column) = explode(".", $column_name);
            $this->controllerScript .='\'' . $column . '\'=>$_POST[\'' . $column_name . '\'],';
        }
        $this->controllerScript = rtrim($str, ',');

        $this->controllerScript .= ');
                         
         if($this->action=="edit"){                
$this->column[id]=$_POST[id];
}
        }        
        
        
        
        $result=parent::curd($this->action,$this->id);
        
        
        return $result; 
        }
        public function beforeWrite(){
        ' .
                urldecode($this->designerSource['page_settings']['beforewrite'])
                . '
        }
        public function afterWrite(){
        ' .
                urldecode($this->designerSource['page_settings']['afterwrite']) . '
        }
    } ';
    }

    function createView() {
        //print_r($this->designerSource);
        $tables = array_keys($this->designerSource['tables']);
        $this->currentTable = $tables[0];

        $viewalldisplaycolumns = '';

        $this->viewScript.='<div id="nav-menu" class="toolbar">
    <ul>';

        $this->viewScript.='<li><a href="{$AppURL}index.php?file=' . $this->currentTable . '"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li>';
        $this->viewScript.='<li><a href="{$AppURL}index.php?file=' . $this->currentTable . '&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li>';


        $this->viewScript.='</ul>
</div>';
        $this->viewScript.='<table class="contenttable" valign="top"><tr><td>
            {if $content_details_array.page.action neq \'viewall\'}
            {$content_details_array.page.viewactions}';
        $this->viewScript.='{if $content_details_array.page.action neq \'add\'} 
            {include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}
            {/if}';

        foreach ($this->designerSource['tables'][$this->currentTable]['columns'] as $column => $columnproperties) {
            $this->currentColumnName = $column;
            $this->currentColumnDetails = $columnproperties;
            $this->createControl();
            $this->createLayout();
        }
        $this->viewScript.=$this->designerSource['tables'][$this->currentTable]['layout'];
        $viewalldisplaycolumns.=array_values($this->localizationStrings[$this->defaultLocalization]);
        $this->designerSource['tables'][$this->currentTable]['layout'];
        $this->viewScript.=' </td></tr>
            {if $content_details_array.page.request_type eq \'\' && $content_details_array.page.action neq \'view\'}';
        $this->viewScript.= '<tr>
                
                <td>
                    {include file="formelements/submit_button.tpl" inputDetails=$content_details_array.formelements.submit_button}
                    {include file="formelements/reset_button.tpl" inputDetails=$content_details_array.formelements.reset_button}
                    <input type="hidden" value={$content_details_array.page.action} name="formaction" />
                    
                </td>
           </tr>
           {/if}
           </table>';
        $this->viewScript.= '';
        $this->viewScript.='{else}';
        $this->viewScript.='<script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>';
        $this->viewScript.='{html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id=\'' . $this->currentTable . '\'"}
    {literal}
        <script>
            
        $(document).ready(function() {';
        $this->viewScript.='
           geoTable = $(\'#' . $this->currentTable . '\').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [' . $viewalldisplaycolumns . '
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    ' . ($this->designerSource['page_settings']['viewallactions'] ? "return " . $this->designerSource['page_settings']['viewallactions'] : "return null;") . '
								}
							}]



            }
            );';


        $this->viewScript.= $this->javascript;
        $this->viewScript.= '} );
        

        </script>
    {/literal}


{/if}';

//$this->javascript();
        //$this->createControl();    
    }

    function createScript() {
        $this->scriptCode = '<?php ';
        $this->scriptCode.= 'include_once AppRoot . AppController . "c' . ucwords($this->currentTable) . 'Controller.php";' . "\n";
        $this->scriptCode.= '$' . $this->currentTable . 'Obj = new c' . $this->currentTable . 'Controller();' . "\n";
        $this->scriptCode.= '$action = $get["action"]?$get["action"]:"viewall";
    $' . $this->currentTable . 'Obj->id = $id = $get["id"]; 

if($post){
    
$' . $this->currentTable . 'Obj->action = $post["formaction"];
    $content_details_array["page"] = $' . $this->currentTable . 'Obj->curd();
    $' . $this->currentTable . 'Obj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("' . $this->currentTable . '&id=".$' . $this->currentTable . 'Obj->id."&action=view");
    }else{
    $data=$' . $this->currentTable . 'Obj->getSelectData($get["file"], $get["columns"], "id=".$' . $this->currentTable . 'Obj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     
        if($action == "edit"){
            $' . $this->currentTable . 'Obj->action = "editview";
         }else{
            $' . $this->currentTable . 'Obj->action = "view";
         }
     
        
        $defaultdata = $' . $this->currentTable . 'Obj->curd();
        $defaultdata = $defaultdata[0];
    } elseif ($action == "delete") {
    $' . $this->currentTable . 'Obj->action=$action;
    $content_details_array["page"] = $' . $this->currentTable . 'Obj->curd();
    redirect("' . $this->currentTable . '&action=viewall");
    }
    
}


$' . $this->currentTable . 'Obj->beforeWrite();
';
        $this->scriptCode.= '$content_details_array["page"]["request_type"]=$get["dataType"];';

        $this->scriptCode.='$content_details_array["page"]["action"]=$get["action"];';

        $this->scriptCode.='$content_details_array["page"]["heading"]=ucwords("' . $this->designerSource['page_settings']['pageheading'] . '");';

        $this->scriptCode.='$content_details_array["page"]["title"]=ucwords("' . $this->designerSource['page_settings']['pagetitle'] . '");';

        $this->scriptCode.=$this->controlScriptCode;

        $this->scriptCode.= '
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$' . $this->currentTable . 'Obj->setDefaultValue("id",$defaultdata));
            ' . "\n";



        $this->scriptCode.= 'if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$' . $this->currentTable . 'Obj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode(\'' . json_encode(array_keys($this->viewAllColumnNames)) . '\');
}';


        $this->scriptCode.='?>';
    }

    function addSequenceCode($sequence_name) {
        
    }

    function createControl() {


        $this->javascript.= $this->currentColumnDetails['javascript'];
        //TODO has to be json string now its exploded
        if ($this->currentColumnDetails['display_name'] != '' && $this->currentColumnDetails['add_edit_type'] != 'nocontrol') {
            $this->viewAllColumnNames[$this->currentColumnDetails['display_name']] = $this->currentColumnDetails['viewallcolumns'] == 'on' ? 'null, ' : ' {
            "bVisible": false}, ';
        }


        $this->currentColumnDetails['is_mandatory'] = $this->currentColumnDetails['is_mandatory'] == 'on' ? 'required' : '';

        $this->localizationStrings[$this->defaultLocalization][$this->currentColumnName] = $this->currentColumnDetails['display_name'];

        $this->sqlcolumns[$this->currentTable . "." . $this->currentColumnName] = $this->currentTable . "." . $this->currentColumnName;
        switch ($this->currentColumnDetails['add_edit_type']) {

            case 'text':case 'hidden':case 'readonly':

                if ($sequence_name) {
                    $sys_default_code = '$' . $this->currentTable . 'Obj->getNextVal("' . $sequence_name . '")';
                }

                $type = $this->currentColumnDetails['validation'];
                if ($type == 'unique') {
                    $this->javascript .= '$("#"' . $this->currentColumnName . ').bind(\'blur\',function(){
                        geoJs.checkUniqueData("' . $this->currentTable . '","' . $this->currentColumnName . '")});';
                } elseif ($this->currentColumnDetails['add_edit_type'] == 'readonly') {
                    $this->currentColumnDetails['add_edit_type'] = 'text';
                    $readonly = ',"readonly"=>"readonly"';
                }


//TODO check

                if ($this->currentColumnDetails['add_edit_type'] != 'hidden')
                    $this->currentControlViewCode = '{if $content_details_array.page.action eq \'view\'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.' . $this->currentColumnName . '}
                
                {else}';
                $this->currentControlViewCode.='{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.' . $this->currentColumnName . '}';
                if ($this->currentColumnDetails['add_edit_type'] != 'hidden')
                    $this->currentControlViewCode.='{/if}';
                $this->controlScriptCode .= '$content_details_array["formelements"]["' . $this->currentColumnName . '"]=array("type"=>"' . $this->currentColumnDetails['add_edit_type'] . '","name"=>"' . $this->currentColumnName . '","required"=>"' . $this->currentColumnDetails['is_mandatory'] . '","value"=>$' . $this->currentTable . 'Obj->setDefaultValue("' . $this->currentColumnName . '",$defaultdata,"' . $sys_default_code . '"),"placeholder"=>"' . $this->currentColumnDetails['placeholder'] . '");';
                break;


            case 'checkbox':

                $this->currentControlViewCode = '{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.' . $this->currentColumnName . '}';
                $this->controlScriptCode.= '$content_details_array["formelements"]["' . $this->currentColumnName . '"]=array("type"=>"' . $this->currentColumnDetails['add_edit_type'] . '","name"=>"' . $this->currentColumnName . ',"required"=>"' . $this->currentColumnDetails['is_mandatory'] . '","value"=>$' . $this->currentTable . 'Obj->setDefaultValue("' . $this->currentColumnName . '",$defaultdata,' . $sys_default_code . '),"placeholder"=>"' . $this->currentColumnDetails['placeholder'] . '");';
                break;
            case 'date':
                $this->sqlcolumns[$this->currentTable . "." . $this->currentColumnName] = "DATE_FORMAT(" . $this->currentTable . "." . $this->currentColumnName . ",'\".AppDateFormatDb.\"') as $this->currentColumnName";

                $this->currentControlViewCode = '{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.' . $this->currentColumnName . '}';
                $this->controlScriptCode.= '$content_details_array["formelements"]["' . $this->currentColumnName . '"]=array("type"=>"' . $this->currentColumnDetails['add_edit_type'] . '","name"=>"' . $this->currentColumnName . ',"required"=>"' . $this->currentColumnDetails['is_mandatory'] . '","value"=>$' . $this->currentTable . 'Obj->setDefaultValue("' . $this->currentColumnName . '",$defaultdata,' . $sys_default_code . '),"placeholder"=>"' . $this->currentColumnDetails['placeholder'] . '");';
                break;
            case 'select':case 'multiselect':

                if ($this->currentColumnDetails['static_data']) {

                    $this->controlScriptCode.= '$content_details_array["formelements"]["' . $this->currentColumnName . '"]=array("name"=>"' . $this->currentColumnName . '","required"=>"' . $this->currentColumnDetails['is_mandatory'] . '","data"=>array(" ' . $this->currentColumnDetails['static_data'] . '"),"value"=>$' . $this->currentTable . 'Obj->setDefaultValue("' . $value . '",$defaultdata),"addonfly"=>' . $this->currentColumnDetails['addonfly'] . ' );';
                } else {

                    $this->sqlcolumns[$this->currentTable . "." . $this->currentColumnName] = $this->currentTable . '_' . $this->currentColumnName . '_ref' . '.' . $this->currentColumnDetails["reference_column"] . ' as ' . $this->currentColumnName;


                    $sqljoincondtion[$this->currentTable . "." . $this->currentColumnName] = 'Left Join ' . $_POST[$value . "_reference_table"] . ' ' . $this->currentTable . '_' . $this->currentColumnName . '_ref on ' . $this->currentTable . '_' . $this->currentColumnName . '_ref.id=' . $this->currentTable . '.' . $this->currentColumnName;
                    if ($_POST[$value . "_dependent"] != '')
                        $dependent[$_POST[$value . "_dependent"]][$value] = $_POST[$value . "_dependent"];

                    if (is_array($dependent))
                        if (in_array($value, $dependent)) {
                            $selectboxdatavariable = 'dummy';
                        }
                    if ($_POST[$value . "_reference_table"] != '') {
                        $scriptDetails_add = "\$selectboxdata=\$" . $this->currentTable . "Obj->getSelectData('" . $_POST[$value . "_reference_table"] . "','id," . $_POST[$value . "_reference_column"] . "','" . $_POST[$value . "_reference_column_condition"] . "','" . $_POST[$value . "_reference_column_orderby"] . "');";
                        $scriptDetails_view = "\$selectboxdata=\$" . $this->currentTable . "Obj->getSelectData('" . $_POST[$value . "_reference_table"] . "','id," . $_POST[$value . "_reference_column"] . "','" . $_POST[$value . "_reference_column_condition"] . "','" . $_POST[$value . "_reference_column_orderby"] . "');";
                        $selectboxdatavariable = 'selectboxdata';
                    }

                    $dependent_event = "";
                    if ($_POST[$value . "_dependent"] != '') {

                        $scriptDetails_add .= "\$sql_" . $value . '=base64_encode(\'' . $_POST[$value . "_dependent_query"] . '\');';
                        $this->javascript.="$('#" . $this->currentColumnName . ".').bind('change',function(){
                            
geoJs.loaddependentValues(this, '" . $this->currentColumnDetails['dependent'] . " ', '" . $this->currentColumnName . "');});";
                    }
                }

                if ($_POST[$value . "_type"] == 'multiselect') {

                    $multi_select = ',"multiple"=>"true"';
                }

                $this->sqlcolumns[] = $_POST[$value . "_reference_table"] . "." . $_POST[$value . "_reference_column"];

                $sqljoins[] = $_POST[$value . "_reference_table"];

                if ($_POST[$value . "_addonfly"] == 'on') {
                    $addonfly = 'array("' . $this->currentColumnDetails["reference_table"] . '","' . $this->currentColumnDetails["reference_column"] . '") ';
                }

                $this->currentControlViewCode = '{if $content_details_array.page.action eq \'view\'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.' . $this->currentColumnName . '}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.' . $this->currentColumnName . '}
{/if}                    
';

                break;
            case 'image':

                $this->viewAllColumnNames[$this->currentColumnDetails['display_name']] = $this->currentColumnDetails['viewallcolumns'] == 'on' ? ' {
                    "fnRender": function ( oObj ) {
                        return \'<img src="\'+AppViewUploadsURL+oObj.aData[1]+\'" />\' ;
        },
        "bUseRendered": false
      },' : ' {
            "bVisible": false}, ';
                $this->currentControlViewCode = ' 
                    {if $content_details_array.page.action eq \'view\'} 
{include file = "formelements/image.tpl" inputDetails = $content_details_array.formelements.' . $value . '}
{else}
{include file = "formelements/input.tpl" inputDetails = $content_details_array.formelements.' . $value . '}
    {/if}

';
                $scriptDetails = '$content_details_array["formelements"]["' . $value . '"] = array("displayName" => "' . makeDisplayName($value) . '", "type" => "text", "name" => "' . $value . '", "id" => "' . $value . '", "class", "style", "error", "mandatory" => true);
                ';
                break;

            case 'camera':

                $this->viewAllColumnNames[$this->defaultLocalization][$this->currentColumnDetails['display_name']] = $this->currentColumnDetails['viewallcolumns'] == 'on' ? ' {
                    "fnRender": function ( oObj ) {
                        return \'<img src="\'+AppViewUploadsURL+oObj.aData[1]+\'" />\' ;
        },
        "bUseRendered": false
      },' : ' {
            "bVisible": false}, ';


                $this->currentControlViewCode = '{if $smarty.get.action eq \'view\'}
                    {include file="formelements/img.tpl" inputDetails=$content_details_array.formelements.' . $value . '}
                        {$content_details_array.formelements.' . $value . '.value} 
                                            {else}';
                $this->currentControlViewCode .= '{include file="formelements/camera.tpl" inputDetails=$content_details_array.formelements.' . $value . '}';
                $this->currentControlViewCode.='{/if}';

                $scriptDetails_add = '$content_details_array["formelements"]["' . $value . '"]=array(
                    "photoimage" => array("src"=>($' . $this->currentTable . 'Obj->setDefaultValue("' . $value . '",$defaultdata,"")!=""?AppViewUploadsURL.$' . $this->currentTable . 'Obj->setDefaultValue("' . $value . '",$defaultdata,""):AppImgURL."noimage.jpg"),"name"=>"' . $value . '_image","id"=>"' . $value . '_image","alt"=>"' . $value . '"),
                    "photoimage_add"=>array("src"=>AppImgURL."icon_plus.gif","class"=>"loadtakephoto","table"=>"' . $this->currentTable . '","column"=>"' . $value . '"),
                    "photoimage_hidden"=>array("name"=>"' . $value . '","type"=>"hidden","value"=>$' . $this->currentTable . 'Obj->setDefaultValue("' . $value . '",$defaultdata,AppImgURL."noimage.jpg"))
                    );';

                $scriptDetails_view = '$content_details_array["formelements"]["' . $value . '"]=array("src"=>($' . $this->currentTable . 'Obj->setDefaultValue("' . $value . '",$defaultdata,"")!=""?AppViewUploadsURL.$' . $this->currentTable . 'Obj->setDefaultValue("' . $value . '",$defaultdata,""):AppImgURL."noimage.jpg"));';

                break;
            case 'textarea':


                $this->currentControlViewCode = '{include file="formelements/textarea.tpl" inputDetails=$content_details_array.formelements.' . $value . '}';
                $scriptDetails_add = '$content_details_array["formelements"]["' . $value . '"]=array("name"=>"' . $value . '","id"=>"' . $value . '","required"=>"' . $mandatory . '","value"=>$' . $this->currentTable . 'Obj->setDefaultValue("' . $value . '",$defaultdata));';
                $scriptDetails_view = '$content_details_array["formelements"]["' . $value . '"]=array("name"=>"' . $value . '","id"=>"' . $value . '","value"=>$' . $this->currentTable . 'Obj->setDefaultValue("' . $value . '",$defaultdata,' . $_POST[$value . "_default_value"] . '),"readonly"=>"readonly");';
                break;
            case 'radio':

                $this->currentControlViewCode = '{include file="formelements/radio.tpl" inputDetails=$content_details_array.formelements.' . $value . '}';
                $scriptDetails_add .= '$content_details_array["formelements"]["' . $value . '"]=array("name"=>"' . $value . '","id"=>"' . $value . '","data"=>$selectboxdata,"value"=>$' . $this->currentTable . 'Obj->setDefaultValue("' . $value . '",$defaultdata));';

                break;
        }
    }

    function createLayout() {
        libxml_use_internal_errors(true);
        $doc = new DOMDocument();
        $doc->preserveWhiteSpace = false;

        $doc->loadHTML($this->designerSource['tables'][$this->currentTable]['layout']);
        $xPath = new DOMXPath($doc);
        $nodes = $xPath->query('//*[@id="' . $this->currentColumnName . '"]');
        if ($nodes->item(0)) {
            $control = $doc->createTextNode($this->currentControlViewCode);
            $nodes->item(0)->parentNode->appendChild($control);
            $nodes->item(0)->parentNode->removeChild($nodes->item(0));
        }
        $nodes = $xPath->query('//*[@id="' . $this->currentColumnName . '_label"]');
        if ($nodes->item(0)) {
            $label = $doc->createTextNode('{$content_details_array.localization.' . $this->currentColumnName . '}');
            $nodes->item(0)->parentNode->appendChild($label);
            $nodes->item(0)->parentNode->removeChild($nodes->item(0));
        }


        $this->designerSource['tables'][$this->currentTable]['layout'] = $doc->saveHTML();
    }

//    'information_schema.COLUMNS', 'column_name', array("TABLE_SCHEMA='". DataBaseName."'","TABLE_NAME='".$this->currentTable."'"), 'ORDINAL_POSITION'
}

?>
