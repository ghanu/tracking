<?php
function getPartnerList($company_id, $product_category_id, $target, $activity_id, $relationship_id="",$JW="")
        {
        global $db,$sql,$sys_master_relationship,$sys_master_company,$sys_company_product_details,$LC;
        $sql->table=$sys_master_relationship." smr";
        $sql->column="'$target?product_category_id=$product_category_id&relationship_id='||smr.relationship_id||'&JW=$JW',
                        smc.company_name@$LC as company_name";
        $sql->join_condition[]="inner join $sys_master_company smc on smc.company_id=smr.partner_id";
        $sql->join_condition[]="inner join $sys_company_product_details scpd on scpd.product_details_id=smr.product_details_id";
        $product_category_condition = ($product_category_id==101)?"101,119":(($product_category_id==106)?"106,103,119,120":$product_category_id);
        $sql->condition[] = "scpd.product_category_id in ($product_category_condition)";
        $sql->condition[] = "scpd.activity_id in ('$activity_id')";
	$sql->condition[] = "smr.record_status ='act'";
        $sql->order_by = "smc.company_name";
        $sql->generateSelectQuery();
        $db->query=$sql->query;
        $db->runQuery();
        $partner_array=$db->returnArrays();
        return $partner_array;
        }

function showSupplierList($company_id,$product_category_id,$target,$relationship_id="",$JW="")
        {
        global $page, $form,$report;
        $supplier_array=getPartnerList($company_id, $product_category_id, $target, 'sel', $relationship_id);
	if(!$supplier_array)
                {
                echo "<div align=\"center\"> No Suppliers </div>";
                $page->doFooterHtml();
                exit;
                }
       $default="$target?product_category_id=$product_category_id&relationship_id=$relationship_id&JW=$JW";
	$form->properties=array("name"=>"relationship_id","onChange"=>"self.location.href=this.value","accesskey"=>"B");
        $form->select_tag_properties=array("default"=>$default,"arrays"=>$supplier_array,"restore_default"=>true,"default_name"=>"Select a Supplier");
	$supplier_form[0]["Supplier Name"]="<label id=\"buyer\">".$form->generateSelectTag()."</label>";

	$report->data=$supplier_form;
        $report->customization["table_style"]="width:50%; border-style:solid; border-width:thin; border-collapse:collapse";
        $report->customization["tr_style"]="border-style:none; border-width:thin; border-collapse:collapse";
        $report->highlight=false;
        $report->title="Commercial Details";
        echo "<div align=\"center\">";
        $report->doVerticalTable();
        echo "</div>";

        }

function showBuyerList($company_id,$product_category_id,$target,$relationship_id="",$JW="")
        {
        global $page, $form,$report;
        $buyer_array=getPartnerList($company_id, $product_category_id, $target, 'buy', $relationship_id,$JW);
        if(!$buyer_array)
                {
                echo "<div align=\"center\">No Buyers</div>";
                $page->doFooterHtml();
                exit;
                }
        $default="$target?product_category_id=$product_category_id&relationship_id=$relationship_id&JW=$JW";
        $form->properties=array("name"=>"relationship_id","onChange"=>"self.location.href=this.value","accesskey"=>"B");
        $form->select_tag_properties=array("default"=>$default,"arrays"=>$buyer_array,"restore_default"=>true,"default_name"=>"Select a Buyer");
        $buyer_form[0]["Buyer Name"]="<label id=\"buyer\">".$form->generateSelectTag()."</label>";

        $report->data=$buyer_form;
        $report->customization["table_style"]="width:50%; border-style:solid; border-width:thin; border-collapse:collapse";
        $report->customization["tr_style"]="border-style:none; border-width:thin; border-collapse:collapse";
        $report->highlight=false;
        $report->title="Commercial Details";
        echo "<div align=\"center\">";
        $report->doVerticalTable();
        echo "</div>";
        }

function getRelationList($activity_id="buy")
        {
        global $page, $form,$report,$db;
	global $sys_master_relationship,$sys_company_product_details,$sys_master_company;

	$db->query="select smr.relationship_id,smc.company_name[1] from $sys_master_relationship smr join  $sys_master_company smc on smc.company_id=smr.partner_id join $sys_company_product_details scpd on scpd.relationship_id=smr.relationship_id where scpd.activity_id in ('$activity_id') and smr.record_status='act'";
	$db->runQuery();
	$list=$db->returnArrays();
	return $list;
        }
function getRelationshipId($company_id)
	{
        global $db,$sys_master_relationship;
        $db->query="select relationship_id from $sys_master_relationship r where partner_id=$company_id;";
        $db->runQuery();
	$rel_id=$db->returnArrays();
	return $rel_id[0]["relationship_id"];
	}
function getSpecificationArray($product_category_id,$specification_name)
	{
	global $db,$sql,$sys_master_specifications,$sys_master_specification_type,$LC;
	$sql->table=$sys_master_specifications."_".$product_category_id." sms";
	$sql->column=array("sms.specification_id","sms.specification_value@$LC as specification_value");
	$sql->condition="smst.specification_type_desc[1]='$specification_name'";
	$sql->join_condition="INNER JOIN $sys_master_specification_type smst ON sms.specification_type_id=smst.specification_type_id";
	$sql->generateSelectQuery();
	$db->query=$sql->query;
	$db->runQuery();
	return $db->returnArrays();
	}
function trimValues(&$arrays)
        {
        foreach($arrays as $key=>$value)
                {
                if(is_array($value))
                        {
                        trimValues($value);
                        $arrays[$key]=$value;
                        }
                else
                        $arrays[$key]=trim($value);
                }
        }

// function addQuotes(&$arrays,$exclude_columns="")
//         {
//         foreach($arrays as $key=>$value)
//                 {
//                 if(is_array($value))
//                         {
//                         addQuotes($value,$exclude_columns);
//                         $arrays[$key]=$value;
//                         }
//                 else
//                         $arrays[$key]=($exclude_columns)?(in_array($key,$exclude_columns)?$value:"'".$value."'"):"'".$value."'";
//                 }
//         }

function validateArrayValues($arrays)
        {
        global $dv;
        foreach($arrays as $key=>$value)
                {
                $dv->validate($value);
                if($dv->errors)
                        {
                        $errors[$key] = $dv->errors;
                        unset($dv->errors);
                        }
                }
        return $errors;
        }

function checkArrayNotEmpty($arrays)
        {
        foreach($arrays as $key=>$value)
                {
                if(is_array($value))
                        {
                        checkArrayNotEmpty($value);
                        }
                else
                        {
                        if(trim($value)!="")
                                return true;
                        }
                }
        return false;
        }

function getFilledRows($array,$columns="")
        {
        $columns=($columns)?$columns:((is_array($array[0]))?array_keys($array[0]):"");
        $array=flipArrayKeys($array,$columns);
        foreach($array as $key=>$value)
                {
                if(checkArrayNotEmpty($value))
                        {
                        $new_array[$key]=$value;
                        }
                }
        return $new_array;
        }

function flipArrayKeys($array,$columns="")
        {
        if($array)
                {
                foreach($array as $key=>$value)
                        {
                        if(is_array($value))
                                {
                                foreach($value as $key1=>$value1)
                                        {
                                        if($columns)
                                                {
                                                foreach($columns as $column_name)
                                                        {
                                                        if($column_name==$key)
                                                                $new_array[$key1][$key]=$value1;
                                                        }
                                                }
                                        else
                                                {
                                                $new_array[$key1][$key]=$value1;
                                                }
                                        }
                                }
                        }
                }
        return $new_array;
        }

function getOrderRelationId($order_id)
	{
	global $db, $gen_order_commercial_details;

	$db->query = "select relationship_id from $gen_order_commercial_details where order_id = $order_id";
	$db->runQuery();
	$relation_array = $db->returnArrays();
	return $relation_array[0]["relationship_id"];
	}

///////////////////////////////////////////////////////////////////////////////
//
//        getShipmentCompanyId($shipment_id,$company_id)
//
//        arguments - 2
//                $shipment_id - unique id to identify the shipment
//                $company_id - member id of the company prefixed with the table name
//
//        action
//                fetches the partner id for the given shipment and returns it.
//
//        Returns
//                order id
//
//        created on 11/09/2003 by R.Lakshmi Narayanan
//
///////////////////////////////////////////////////////////////////////////////
function getShipmentCompanyId($shipment_id)
        {
        global $db;
        $table1="sal_shipment_commercial_details";
        $table2="sys_master_relationship";

        $db->query="select r.partner_id from $table1 sd, $table2 r where sd.relationship_id=r.relationship_id and sd.shipment_id=$shipment_id;";
	$db->runQuery();

        $partner_id_array=$db->returnArrays();
        $partner_id=$partner_id_array[0]["partner_id"];
        return $partner_id;
        }

function getShipmentAgentId($shipment_id,$company_id)
        {
        global $db;
        $table1="sal_shipment_commercial_details";
        $table2="sys_master_relationship";

        $db->query="select r.agent_id from $table1 sd, $table2 r where sd.relationship_id=r.relationship_id and sd.shipment_id=$shipment_id;";
        $db->runQuery();

        $agent_id_array=$db->returnArrays();
        return $agent_id_array[0]["agent_id"];
        }

function getBuyerList($link,$company_id="")
        {
        global $db;

        if(!$company_id)
                {
                $company_id=$_SESSION["gmember_id"];
                }

        if($company_id != $_SESSION["gmember_id"])
                {
                $conditions=" and r.agent_id=$_SESSION[gmember_id]";
                }

        $relationships="_$company_id"."relationships";
        $db->query="select r.partner_id, mm.company_name from $relationships r, member_product_details mpd, master_member mm
                                where r.relationship_id <> 10 and mpd.product_details_id=r.product_details_id and mpd.activity_id in ('buy')
                                and r.partner_id=mm.member_id $conditions order by mm.company_name";
        $db->runQuery();
        $buyer_list=$db->returnArrays();

        for ($i=0;$i<count($buyer_list);$i++)
                {
                $company_name=$buyer_list[$i]["company_name"];
                $partner_id=$buyer_list[$i]["partner_id"];
                $buyer_names[$i]["Buyer Name"]=returnLink($link,$company_name,array("company_id"=>"$company_id","partner_id"=>"$partner_id"));
                }
        return $buyer_names;
        }

function getSupplierList($link)
        {
        global $db;
        $partner_id=$_SESSION["gmember_id"];
        $db->query="select member_id,company_name from master_member where member_id in (select member_id from member_user_relation where user_id={$_SESSION[guser_id]});";
        $db->runQuery();
        $supplier_list=$db->returnArrays();
        for ($i=0;$i<count($supplier_list);$i++)
                {
                $company_name=$supplier_list[$i]["company_name"];
                $company_id=$supplier_list[$i]["member_id"];
                $supplier_names[$i]["Supplier Name"]=returnLink($link,$company_name,array("company_id"=>"$company_id","partner_id"=>"$partner_id"));
                }
        return $supplier_names;
        }

function getEnteredByUserId($mu_relation_id)
        {
        global $db;
        $db->query=generateSelectQuery("member_user_relation",array("user_id"=>"user_id"),array("mu_relation_id"=>"$mu_relation_id"));
        $db->runQuery();
        $mu_array=$db->returnArrays();
        return $mu_array[0]["user_id"];
        }


function getUserName($user_id)
        {
        global $db,$sql,$sys_master_user_table;
	$sql->table=$sys_master_user_table;
	$sql->column="login_name";
	$sql->condition="user_id=$user_id";
	$sql->generateSelectQuery();
        $db->query=$sql->query;
        $db->runQuery();
        $user_array=$db->returnArrays();
	$user_name=$user_array[0]["login_name"];
	return $user_name;
        }

///////////////////////////////////////////////////////////////////////////////
//
//        getUserDetails()
//
//        arguments - 1
//                $login_name - login name of the user
//
//        action
//                fetches the user details from the master user corresponding to
//        the given login and returns as an array.
//
//        Returns
//                array of user details
//
//        created on 26/07/2003 by R.Lakshmi Narayanan
//
///////////////////////////////////////////////////////////////////////////////
function getUserDetails($login_name)
        {
        global $db;
        $db->query=generateSelectQuery("master_user","",array("login_name"=>"$login_name"));
        $db->runQuery();
        $user_array=$db->returnArrays();
        return $user_array;
        }

///////////////////////////////////////////////////////////////////////////////
//
//        createUser()
//
//        arguments - 1
//                $user_details - array of user details
//
//        action
//                creates a new user by inserting the user details in the master
//        user table
//
//        Returns
//                nil
//
//        created on 26/07/2003 by R.Lakshmi Narayanan
//
///////////////////////////////////////////////////////////////////////////////
function createUser($user_details)
        {
        global $db;
        $db->query=generateInsertQuery("master_user",$user_details);
        $db->runQuery();
        }

///////////////////////////////////////////////////////////////////////////////
//
//        fetchGateDesc()
//
//        arguments - 3
//                $company_id - member id of the company
//                $gate_type  - type of gate
//                $gate_id        - gate id
//
//        action
//                fetches the gate_type_desc* from the member's specified master_gate_type**
//        and returns it
//
//        Returns
//                gate_type_desc
//
//        created on 30/10/2003 by R.Lakshmi Narayanan
//
//        *  (production_gate_desc, shipment_gate_desc, sample_gate_desc)
//        ** (master_production_gate, master_shipment_gate,master_sample_gate)
///////////////////////////////////////////////////////////////////////////////
function fetchGateDesc($company_id,$gate_type,$gate_id)
        {
        global $db;
        $table="_$company_id"."master_".$gate_type."_gate";
        $db->query=generateSelectQuery($table,array("$gate_type"."_gate_desc"=>"$gate_type"."_gate_desc"),array("$gate_type"."_gate_id"=>"$gate_id"));
        $db->runQuery();
        $gate_desc_array=$db->returnArrays();
        return $gate_desc_array[0]["$gate_type"."_gate_desc"];
        }

function getMemberUserRelationId($user_id,$member_id)
        {
        global $db;
        $db->query="select mu_relation_id from member_user_relation where member_id=$member_id and user_id=$user_id;";
        $db->runQuery();
        $mu_relation_array=$db->returnArrays();
        return $mu_relation_array[0]["mu_relation_id"];
        }

function getRelationCompanyId($relationship_id)
        {
        global $db,$sys_master_relationship;
        $db->query="select r.partner_id from $sys_master_relationship r where r.relationship_id=$relationship_id;";
        $db->runQuery();
        $partner_id_array=$db->returnArrays();
        return $partner_id_array[0]["partner_id"];
        }

function getRelationCompanyActivity($company_id,$relationship_id)
        {
        global $db;
        $relationships="_$company_id"."relationships";

        $db->query="select ma.activity_id, ma.activity_desc from $relationships r, member_product_details mpd, master_activity ma
                                        where mpd.activity_id=ma.activity_id and mpd.product_details_id=r.product_details_id and r.relationship_id=$relationship_id;";
        $db->runQuery();
        $activity_array=$db->returnArrays();
        return $activity_array;
        }

function getRelationId($company_id,$partner_id,$product_category_id,$activity_id)
        {
        global $db;
        $relationships="_$company_id"."relationships";

        $db->query="select r.relationship_id from $relationships r, member_product_details mpd where mpd.product_details_id=r.product_details_id and r.partner_id=$partner_id and mpd.product_category_id=$product_category_id and mpd.activity_id='$activity_id';";
        $db->runQuery();
        $relation_id_array=$db->returnArrays();
        return $relation_id_array[0]["relationship_id"];
        }

function getUomIdList($fields="",$condition="",$sorting="uom_desc")
        {
        global $db,$sql,$sys_master_uom;
	$sql->table=$sys_master_uom;
	$sql->column=$fields;
	$len_condition=count($condition);
	foreach($condition as $key=>$value)
		{
		$value = htmlentities(stripslashes($value));
		$uom_condition.=(!is_int($key))?$key."="."'$value' ":" $value ";
		if(--$len_condition!=0)
			$uom_condition.=" AND ";
		}
	$sql->condition=$uom_condition;
	$sql->order_by=$sorting;
	$sql->generateSelectQuery();
        $db->query=$sql->query;
        $db->runQuery();
        $uom_array=$db->returnArrays();
        return $uom_array;
        }

function getCurrencyList($product_category_id="")
        {
        global $db;
        $db->query=generateSelectQuery("master_currency","","","currency_name");
        $db->runQuery();
        $currency_array=$db->returnArrays();
        return $currency_array;
        }

/*****************************************************************************************
 Function Name                 : getPartners
 No. of Arguments        : 3 (2 optional)
 Arguments                : $company_id - searches the relationship table of this member
                         : $product_category_array - single dimensional array containing
                          product category ids
                          $product_activity_array - associative array containing
                          product_category_id as key and array of activity ids as values
 Action                        : fetches the relation partners of the given product category id
                           with the given activity ids.  When product category id is not specified
                          then it fetches all the partners of the given category
 Returns                : array of partners names
 Created By                : R.Lakshmi Narayanan
 Created On                : 19 April 2004
 Modified By                :
 Modified On                :
*****************************************************************************************/

function getPartners($company_id,$product_category_array="",$product_activity_array="")
        {
        global $db;
        $relationships="_$company_id"."relationships";
        $query="select  r.relationship_id, mm.company_name
                    from $relationships r, member_product_details mpd, master_member mm
                    where r.product_details_id=mpd.product_details_id and mm.member_id=r.partner_id ";

        if($product_category_array!="")
                {
                $condition=" and ";
                foreach($product_category_array as $product_category_id)
                        {
                        $condition.=" ( product_category_id=$product_category_id ";
                        if($product_activity_array[$product_category_id])
                                {
                                for($i=0;$i<count($product_activity_array[$product_category_id]);$i++)
                                        {
                                        $product_activity_array[$product_category_id][$i]="'".$product_activity_array[$product_category_id][$i]."'";
                                        }
                                $activity_ids=implode(",",$product_activity_array[$product_category_id]);
                                $condition.=" and activity_id in ($activity_ids)) ";
                                }
                        array_shift($product_category_array);
                        if(count($product_category_array)>0)
                                {
                                $condition.="union $query and";
                                }
                        }
                }
        $db->query=$query."$condition;";
        $db->runQuery();
        $partner_names=$db->returnArrays();
        return $partner_names;
        }

/*function addQuotes($arrays)
        {
        for($i=0;$i<count($arrays);$i++)
                {
                $new_arrays[$i]="'".$arrays[$i]."'";
                }
        return $new_arrays;
        }        */

function getPartnerNames($company_id,$product_activity_array="",$exclude_arrays="")
        {
        global $db;
        $relationships="_$company_id"."relationships";
        $query="select  r.relationship_id, mm.company_name
                    from $relationships r, member_product_details mpd, master_member mm
                    where r.product_details_id=mpd.product_details_id and mm.member_id=r.partner_id ";

        if($product_activity_array!="")
                {
                $condition=" and ";
                foreach($product_activity_array as $product_category_id => $activity_array)
                        {
                        $condition.=" mpd.product_category_id=$product_category_id ";
                        if($activity_array)
                                {
                                $activity_array=addQuotes($activity_array);
                                $activity_ids = implode(",",$activity_array);
                                $condition.=" and mpd.activity_id in ($activity_ids) ";
                                }
                        array_shift($product_activity_array);
                        if(count($product_activity_array)>0)
                                {
                                $condition.="union $query and";
                                }
                        }
                }

        if($exclude_arrays!="")
                {
                $exclude_ids = implode(",",$exclude_arrays);
                $condition.=" and r.relationship_id not in ($exclude_ids) ";
                }

        $db->query=$query."$condition;";
        $db->runQuery();

        $partner_names=$db->returnArrays();
        return $partner_names;
        }
//convert a linear two dimensional array to a 2 column two dimensional array
function formatSelectArray(&$constraint_array)
        {
        $i=0;
        foreach($constraint_array as $name => $value)
                {
                $new_constraint_array[$i]["value"]=$value;
                $new_constraint_array[$i]["name"]=$name;
                 $i++;
                }
        $constraint_array=$new_constraint_array;
        }
 /*****************************************************************************************
        Function Name         :getNewId
        No. of Arguments        :Nil
        Arguments                :Nil
        Action                        :takes the table name and column name as arguments and returns the maximum
                                value of the column - to be used in case of auto incremented columns
        Returns                        :maximum integer
        Created By                :Ma SivaKumar
        Created On                :10 August 2004
        *****************************************************************************************/

        function getNewId($table_name,$column_name)
                {
		global $db,$sql;
                $sql->query="select $column_name from $table_name order by $column_name desc limit 1;";
                $db->query=$sql->query;
		$db->runQuery();
                $id_array=$db->returnArrays();
                $Id=$id_array[0]["$column_name"];
                return $Id;
                }
//         function getFormattedDate($given_date,$format="dd/mm/yyyy",$separator="/")
//         {
//         // convert the string to date array format
//         switch ($format)
//                 {
//                 case "dd/mm/yyyy":
//                         list ($day, $month, $year) = explode ($separator, $given_date);
//                         break;
//                 case "mm/dd/yyyy":
//                         list ($month, $day, $year) = explode ($separator, $given_date);
//                         break;
//                 }
//         $date_array=array ($year, $month, $day);
//         //convert the date array to the string
//         $date_string=implode ('-', $date_array);
//         return $date_string;
//         }

function getEditDate($given_date)
        {
        // convert the date string  to array.
        $date_array=explode('-', $given_date);
        //  Calculate time stamp.
        $stamp=mktime(0,0,0,$date_array[1], $date_array[2], $date_array[0]);
        // retrieves the date from the timestamp.
        return (date ("d/m/Y", $stamp));
        }

function getCompanyName($company_id)
        {
        global $db,$LC;
        $db->query="select coalesce(company_name[$LC],company_name[1]) as company_name from sys_master_company where company_id=$company_id;";
        $db->runQuery();
        $arrays=$db->returnArrays();
        return $arrays[0]["company_name"];
        }

function getUomId($id,$company_id,$type="order")
        {
        global $db;
        $table="_$company_id".$type."_details";
        $db->query="select uom_id from $table where ".$type."_id=$id;";
        $db->runQuery();
        $arrays=$db->returnArrays();
        $uom_id=$arrays[0]["uom_id"];
        return $uom_id;
        }

function getCurrencyId($id,$company_id,$type="order")
        {
        global $db;
        $table="_$company_id".$type."_details";
        $db->query="select currency_id from $table where ".$type."_id=$id;";
        $db->runQuery();
        $arrays=$db->returnArrays();
        $currency_id=$arrays[0]["currency_id"];
        return $currency_id;
        }
function fetchNextGate($member_id, $gate_type, $gate_id)
        {
        global $db;
        $gate="$gate_type"."_gate_id";
        $db->query="select * from _".$member_id."master_".$gate_type."_gate order by ".$gate_type."_gate_id;";
        $db->runQuery();
        $arrays=$db->returnArrays();
        for ($i=0; $i < count ($arrays); $i++)
                {
                if ($arrays[$i][$gate] == $gate_id)
                       $next_gate=$arrays[$i+1][$gate];
                }
        if(!$next_gate)
                $next_gate=$arrays[$i-1][$gate];
        return $next_gate;
        }

function getUserIdList($company_id)
        {
        global $db;
        $member_id=$_SESSION["gmember_id"];
        $user_id=$_SESSION["guser_id"];

        $db->query="select user_id from member_user_relation where
                                user_id in (select mur.user_id from master_user mu, member_user_relation mur
                                where mur.member_id in ($company_id,$member_id) and mur.mu_relation_id=mu.primary_relation)
                                and member_id = $company_id and user_id <> $user_id;";
        $db->runQuery();
        $user_array=$db->returnArrays();
        if ($user_array)
                {
                for($i=0;$i<count($user_array);$i++)
                        $user_id_array[$i]=$user_array[$i]["user_id"];
                return $user_id_array;
                }
        }

function getUomConversions($from_uom,$to_uom="")
        {
        switch($from_uom)
                {
                case "sqft":
                 $conversion_value["sqft"]=1;
                 $conversion_value["sqmt"]=1/10.7639104;
                 $conversion_value["sqdm"]=9.290304;
                 break;
                case "sqmt":
                 $conversion_value["sqft"]=10.7639104;
                 $conversion_value["sqmt"]=1;
                 $conversion_value["sqdm"]=100;
                 break;
                case "sqdm":
                 $conversion_value["sqft"]=1/9.290304;
                 $conversion_value["sqmt"]=1/100;
                 $conversion_value["sqdm"]=1;
                 break;
                }
        if($to_uom)
                return $conversion_value[$to_uom];
        else
                return $conversion_value;
        }

function convertAmount($rupees,$currency_id="INR")
        {
        $number=number_format($rupees,2,'.','');
        $rupees=floor($number);
        $paise=number_format($number-$rupees,2,'.','')*100;
        $array[4]="Thousand";
        $array[5]="Thousand";
        $array[6]="Lakh";
        $array[7]="Lakhs";
        $array[8]="Crore";
        $array[9]="Crores";
        if($paise)
                {
                if($currency_id == "INR")
                        $paise_name="Paise";
                if($currency_id == "USD")
                        $paise_name="Cents";
                if(!$currency_id)
                        $paise_name="Units";
                $ps=" $paise_name ".amt($paise);
                }
        while($rupees>999)
                {
                $size=strlen($rupees);
                $tdigit=floor($rupees/pow(10,strlen($rupees)-(($size%2)+1)));
                $amount.=amt($tdigit)." ".$array[$size]." ";
                $rupees=ceil(substr($rupees,($size%2)+1));
                }
        $amount.=" ".amt($rupees);
        $amount=(trim($amount))?" $amount":"";
        $and=($amount&&$ps)?"and":"";
        $amount="$amount $and $ps Only";
        return $amount;
        }

function amt($rupees)
        {
        $num=array("","One","Two","Three","Four","Five","Six","Seven","Eight","Nine","Ten","Eleven","Twelve","Thirteen","Fourteen","Fifteen","Sixteen","Seventeen","Eighteen","Nineteen");
        $tnum=array("","","Twenty","Thirty","Forty","Fifty","Sixty","Seventy","Eighty","Ninety");
        while($rupees)
                {
                $rupees=ceil($rupees);
                $size=strlen($rupees);
                switch($size)
                        {
                        case 1:
                                $amount.=" ".$num[$rupees];
                                $rupees=0;
                                break;
                        case 2:
                                if($rupees<20)
                                        {
                                        $amount.=$num[$rupees];
                                        $rupees=0;
                                        }
                                else
                                        {
                                        $tens=floor($rupees/10);
                                        $amount.=$tnum[$tens];
                                        $rupees=substr($rupees,1);
                                        }
                                break;
                        case 3:
                                $hunds=floor($rupees/100);
                                $amount=$num[$hunds]." Hundred ";
                                $rupees=substr($rupees,1);
                                if($rupees!="00")
                                        $amount.=" and ";
                                break;
                        }
                }
        return $amount;
        }

/******************************************************************************
        Function Name    : convertDbArray2String
        No. of Arguments : 4 (2 optional)
                         : &$array - array of values passed by reference
                           $fields - array of fields to apply the conversion
                           $search_string  - string to be searched
                           $replace_string - string to be replaced
        Action                 : For each field in the given array searches for the
                           given string and replaces with the another string.
                           By default it replaces { } [ ]  with spaces.
        Returns                 : nothing
        Created on          : 21.04.2004
        Created by         : R.Lakshmi Narayanan
******************************************************************************/
function convertDbArray2String(&$array,$fields,$search_string="",$replace_string="")
        {
        foreach($fields as $field_name)
                {
                for($i=0;$i<count($array);$i++)
                        {
                        $array[$i][$field_name]=ereg_replace("[{|}]","",$array[$i][$field_name]);
                        }
                }
        }
function generateGroupArray($group_name, $group_order)
        {
        $group_array=array();
        if($group_name)
                {
                foreach($group_name as $index=>$group_value)
                        {
                        if($group_value)
                                {
                                $group_array[$group_value]=$group_order[$index];
                                }
                        }
                }
        return $group_array;
        }

function appendArrays($array1,$array2,$append_type="APPEND")
        {
        $source=($append_type=="APPEND")?$array1:$array2;
        $target=($append_type=="APPEND")?$array2:$array1;

        $target_count=count($target);
        if($target_count > 0)
                {
                for($i=0; $i<$target_count; $i++)
                        {
                        $index=count($source)-1;
                        if($source[$index])
                                {
                                foreach($source[$index] as $src_key=>$src_value)
                                        {
                                        $source[$index+1][$src_key]=(isset($target[$i][$src_key]))?$target[$i][$src_key]:" ";
                                        }
                                }
                        }
                }
        elseif($target_count == 0)
                {
                $index=count($source)-1;
                if($source[$index])
                        {
                        foreach($source[$index] as $src_key=>$src_value)
                                {
                                $source[$index+1][$src_key]="&nbsp;";
                                }
                        }
                }
        return $source;
        }

function array_duplicate($main_array,$fields)
        {
        $bool=true;
        $count=count($main_array);
        for($i=0;$i<$count;$i++)
                {
                for($j=$i+1;$j<$count;$j++)
                        {
                        foreach($fields as $key=>$value)
                                {
                                $bool=($bool && strcmp($main_array[$i][$value],$main_array[$j][$value])==0);
                                }
                        if($bool)
                                return $bool;
                        else
                                $bool=true;
                        }
                }
        return false;
        }

function assoc_to_num_array($array,$key_val_sep="=")
        {
        if($array)
                {
                foreach($array as $key=>$value)
                        {
                        $temp[]=$key.$key_val_sep.$value;
                        }
                }
        return $temp;
        }
function applyTax($value, $tax_detail)
        {
	global $db;
        $final_value=$value;
        $cnt=count($tax_detail);
        for($i=0;$i<$cnt; $i++)
                {
		if($tax_detail[$i]["tax_id"])
			{
			$db->query="select amtt.tax_type_id from acc_master_tax_type amtt join acc_master_tax amt on amt.tax_type_id=amtt.tax_type_id where amt.tax_id=".$tax_detail[$i]["tax_id"];
			$db->runQuery();
			$tax_type_id=$db->returnArrays();
			}
                switch ($tax_type_id[0]["tax_type_id"])
                        {
                        case 1:
                                $tax_amount[$i]=$tax_detail[$i]["rate"];
                                $final_value=$final_value+$tax_amount[$i];
                                break;
                        case 2:
                                $tax_amount[$i]=$final_value* ($tax_detail[$i]["rate"]/100);
                                $final_value=$final_value+$tax_amount[$i];
                                break;
                        case 3:
                                $tax_amount[$i]=$tax_detail[$i]["rate"];
                                $final_value=$final_value-$tax_amount[$i];
                                break;
                        case 4:
                                $tax_amount[$i]=$final_value* ($tax_detail[$i]["rate"]/100);
                                $final_value=$final_value-$tax_amount[$i];
                                break;
                        case 5:
                                $tax_amount[$i]=$tax_amount[$i-1] * ($tax_detail[$i]["rate"]/100);
                                $final_value=$final_value+$tax_amount[$i];
                                break;
                        }
                }
        return $final_value;
        }
/*************************************************************************************************************************************

        Function Name   : showTime

        Arguments       : time stamp from database ($dbtimestamp)

        Action          : retrieves the date from the timestamp and returns it.

        Returns         : date

        Modified on     : Sep 05, 2002

        Modified by     : S.Gnanavel

***************************************************************************************************************************************/

function showTime($dbtimestamp)
        {
        //take the first 19 characters of the timestamp returned from the database and creates the unix time stamp using strtotime function
        $timestamp=strtotime(substr($dbtimestamp,0,19));
        $time=date ("h:i a",$timestamp);
        return $time;
        }

function showDate($given_date,$format="d-M-Y")
	{
	$date_array=explode('-', $given_date);
	$stamp=mktime(0,0,0,$date_array[1], $date_array[2], $date_array[0]);
	return (date ($format, $stamp));
	}
function createColumnValueString($details_array)
	{
	if($details_array)
		{
		foreach($details_array as $key=>$value)
			{
			if(is_array($value))
				{
				foreach($value as $key1=>$value1)
					{
					$column_name.=$key1.",";
					$value_name.=$value1.",";
					}
				}
			}
		}
	return rtrim($column_name,",")."~".rtrim($value_name,",");

	}
function insertControl($array,$column_name,$type="text",$default_value="",$name_array="",$select_query="")
	{
		global $form,$db;
		if(is_array($array))
		{
			$count=0;
			foreach($array as $key=>$value)
			{
				foreach($value as $key1=>$value1)
				{
					if($key1=="$column_name")
					{
						if($default_value!="")
							$control_default_value=$default_value;
						else
							$control_default_value=$value1;

						$control_name=strtolower(str_replace(" ","_",$key1));

						if($name_array!="")
							$control_count=preg_replace('`,{}`',"_",$value[$name_array]);
						else
							$control_count=$count;
						if($type!="select")
						{
							if($type=="checkbox" && $default_value=="true")
								$value="checked";
							else
								$value="value";
							$form->properties = array("name"=>$control_name."[".$control_count."]","size"=>"8","type"=>"$type","$value"=>"$control_default_value");
							$array[$key][$key1]=$form->generateInputTag();
						}
						else
						{
							if($select_query)
							{
								$db->query="$select_query";
								$db->runQuery();
								$select_array=$db->returnArrays();
							}
							$control_name=$control_name."[".$control_count."]";
							$form->properties = array("name"=>$control_name);
							$select_default_value=$default_value[$control_count];
							$form->select_tag_properties = array("default"=>$select_default_value,"arrays"=>$select_array,"Select","restore_default"=>true);
							$array[$key]["$key1"] = $form->generateSelectTag();
						}

					}
				}
				++$count;
			}
		}

		return $array;
	}
	function applyLegend($array,$column1,$column2,$outputcolumn,$makezero=TRUE,$zerocolumn="")
	{
		global $report;
		if(is_array($array))
		{

			foreach($array as $key=>$value)
			{
				if($value[$column1]<=$value[$column2])
				{
					if($makezero&&$zerocolumn)
						$array[$key][$zerocolumn]=0;
					$array[$key]["$outputcolumn"]=$report->changeFont($value[$outputcolumn],"green");
				}
				else
				{
					$array[$key]["$outputcolumn"]=$report->changeFont($value[$outputcolumn],"red");
				}

			}
		}

		return $array;
	}

	function strtonum($str)
	{
		$str = preg_replace('`([^+\-*=/\(\)\d\^<>&|\.]*)`','',$str);
		if(empty($str))$str = '0';
		else eval("\$str = $str;");
		return $str;
	}

	function unsetColumn($form_array,$remove_form_elements=array())
	{
		if($remove_form_elements)
		{
			foreach($form_array as $key => $value)
			{
				$keys=array_diff(array_keys($form_array[$key]),$remove_form_elements);
				foreach($value as $key1 => $value1)
				{
					if(in_array($key1, $keys))
					{
						$form_array_new[$key][$key1]=$value1;
					}
				}
			}
			return $form_array_new;
		}
		else
		{
			return $form_array;
		}
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////
	// Created by G.M.Sundar
	// on 26/04/2009
	//Purpose : Used to Validate Page
	/////////////////////////////////////////////////////////////////////////////////////////////////

	function validateSession($type=1,$access="e")
		{
		global $page;
		if(!$_SESSION)
			{
			header("Location:".$page->header_path."infoarea/gloview-introduction.php");
			exit;
			}
	
		}
?>
