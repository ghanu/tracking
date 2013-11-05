<?php

/**
 * Description of cGridController
 *
 * @author mgovindan
 */
class cGridController {

        public $js;
        public $html;
        public $gridId;
        public $properties;
        private $jsappend;
        private $dataType;

        function __construct() {
                $this->js = '';
                $this->html = '';
                $this->gridId = '';
                $this->properties = '';
        }

        function createGrid() {
                $this->js = 'jQuery("#' . $this->gridId . '").jqGrid({';
                $this->js.='sortable:' . $this->properties['sortable'] . ',';
                $this->js.="url:'" . $this->properties['url'] . "',";
                $this->js.='datatype:"' . ($this->properties['datatype'] ? $this->properties['datatype'] : 'json') . '",';
                $this->js.='mtype:"' . ($this->properties['mtype'] ? $this->properties['mtype'] : 'GET') . '",';
                $this->js.='rowNum:"' . ($this->properties['rowNum'] ? $this->properties['rowNum'] : '25') . '",';
                $this->js.='rowList:[' . ($this->properties['rowList'] ? $this->properties['rowList'] : '25,50,100') . '],';
                $this->js.='sortname:"' . $this->properties['sortname'] . '",';
                $this->js.='sortorder:"' . ($this->properties['sortorder'] ? $this->properties['sortorder'] : 'asc') . '",';
                $this->js.='caption:"' . $this->properties['caption'] . '",';
                $this->js.='altRows:' . $this->properties['altRows'] . ',';
                $this->js.='height:' . $this->properties['height'] . ',';
                $this->js.='autowidth:' . $this->properties['autowidth'] . ',';
                $this->js.='viewrecords:"' . $this->properties['viewrecords'] . '",';
                $this->js.='scroll: "1' . $this->properties['scroll'] . '",';

                $this->js.='hidegrid:"' . ($this->properties['hidegrid'] ? $this->properties['hidegrid'] : 'false') . '",';
                if ($this->properties['pager']) {
                        $this->addPager();
                }

                if ($this->properties['toolbar']) {
                        $this->addToolBar();
                }
                $this->js.='colNames:[' . $this->properties['colNames'] . '],';
                $this->js.='colModel:[' . $this->createColumns() . ']';
                ;
                $this->js.='});';
                $this->js.=$this->jsappend;

                $this->html.='<table id="' . $this->gridId . '"></table>';
        }

        function addPager() {
                $this->js.='pager:"' . $this->properties['pager'] . '",';
                $this->html.='<div id="' . $this->properties['pager'] . '" ></div>';
                $this->jsappend.='jQuery("#' . $this->gridId . '").jqGrid("navGrid","#' . $this->properties['pager'] . '",{edit:false,add:false,del:false},{},{},{},{multipleSearch:true});';
        }

        function addToolBar() {
                $this->js.='toolbar:[true,"' . $this->properties['toolbar'] . '"],';
                $this->jsappend.='$("#' . $this->properties['toolbar'][0] . '_' . $this->gridId . '").append("' . $this->properties['toolbar_content_' . $this->properties['toolbar']] . '");';
//         $this->jsappend.='jQuery("#'.$this->gridId.'").jqGrid("navButtonAdd","'.$this->properties['toolbar'][0].'_'.$this->gridId.'",{});';
//         $this->html.='<div id="'.$this->properties['pager'].'" style="250px"></div>';
        }

        function createColumns() {
                foreach ($this->properties['columnDetails'] as $columnName => $columnDetailsRecord) {
                        $columns[$columnName].= '{name:"' . $columnDetailsRecord['name'].'",'; 
                        $columns[$columnName].='index:"' . $columnDetailsRecord['index'].'",'; 
                        $columns[$columnName].='width:"' . '170'.'",';
                        $columns[$columnName].='datatype:"' . $columnDetailsRecord['sorttype'].'",'; 
                        if($columnDetailsRecord['sorttype']=='date')
                                $columns[$columnName].='datefmt:"' . $columnDetailsRecord['datefmt'].'",'; 

                        $columns[$columnName].='align:"' . $columnDetailsRecord['align'].'"}'; 
                        //                        datatype:"' . $columnDetailsRecord['sorttype'] . '",align:"' . $columnDetailsRecord['align'] . '"}';
                        $this->dataType[$columnDetailsRecord['name']] = $columnDetailsRecord['sorttype'];
//                        $this->createContextMenus($columnDetailsRecord['name']);
                }
                return implode(',', $columns);
        }

        function createContextMenus($column_id) {

                $dataType = $this->dataType[$column_id];
                $this->html.='<ul id="menu_' . $column_id . '" class="geocontextmenu cm_default ui-widget-content">
        <li class="icon" ><span class="icon "></span>Alignment
                        <ul>
                                <li id="align_left" class="icon">
                                        <span class="icon sprite sprite-alignleft"></span>
                                        Left
                                </li>
                                <li id="align_right" class="icon">
                                        <span class="icon sprite sprite-alignright"></span>
                                        Right
                                </li>
                                <li id="align_center" class="icon">
                                        <span class="icon sprite sprite-alignhorizontalcenter"></span>
                                        Center
                                </li>

                        </ul>
        </li>
        <li class="icon">
                <span class="icon "></span>
                Add Sort
        </li>';
                if ($dataType == 'date' || $dataType == 'numeric') {
                        $this->html.='<li class="icon">
                <span class="icon "></span>
                Format
                <ul>';
                        if ($dataType == 'date') {
                                $this->html.='<li id="formatdate_dd1mm1yyyy" class="icon">
                                <span class="icon "></span>
                                DD/MM/YYYY
                        </li>
                        <li class="icon">
                                <span id="formatdate_mm1dd1yyyy" class="icon "></span>
                                MM/DD/YYYY
                        </li>
                        <li class="icon">
                                <span id="formatdate_dd1Mon1yyyy" class="icon "></span>
                                DD/Mon/YYYY
                        </li>';
                        }
                        if ($dataType == 'numeric') {
                                $this->html.='<li class="icon">
                                <span class="icon sprite sprite-numberformatincdecimals"></span>
                                No Decimals

                        </li>
                        <li class="icon">
                                <span class="icon sprite sprite-numberformatincdecimals"></span>
                                <select size=2 onchange=setDecimalPoints(e,this.value)>
<option value=0>0</option>                                
<option value=1>1</option>                                
<option value=2>2</option>                                
<option value=3>3</option>                                
</select><button>Ok</button>

                        </li>
                        <li class="icon">
                                <span class="icon sprite sprite-numberformatincdecimals"></span>
                                .000
                        </li>
                        <li class="icon ">
                                <span class="icon sprite sprite-numberformatincdecimals"></span>
                                ##,###.00
                        </li>';
                        }

                        $this->html.='</ul>
        </li>';
                }
                $this->html.='<li class="separator"></li>
        <li id="hide_column" class="icon" >
                <span class="icon sprite sprite-deletecolumns"></span>
                <a>Hide Column</a>
        </li>
        <li id="freeze_column" class="icon">
                <span class="icon "></span>
                Freeze Column
        </li>
        <li id="add_column" class="icon" >
                <span class="icon "></span>
                <a >Add Column</a>
        </li>
        <li id="rename_column" class="icon">
                <span class="icon "></span>
                <a >Rename Column</a>
        </li>
</ul>';
                $this->jsappend.="jQuery('#" . $this->gridId . "_" . $column_id . "').geocontextmenu('menu_" . $column_id . "',{onSelect:function(e,context){contextFunctions(jQuery(this),context,e);}});";
        }

        function addTitle() {
                
        }

        function __destruct() {
                ;
        }

}

?>
