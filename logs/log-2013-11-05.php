<?php  if ( ! defined('AppRoot')) exit('No direct script access allowed'); ?>

DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=0
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=0
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=1
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=1
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=53
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=53
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=2
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=2
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=3
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=3
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=4
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=4
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=5
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=5
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=6
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=6
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=7
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=7
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=8
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=8
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=9
DEBUG - 2013-11-05 18:14:41 --> SQL : SELECT m.id,menu_name,url,display_icon,status,parent FROM  __menu m  join __user_menu_details umd on m.id=umd.menu_id  WHERE umd.user_id=1 AND parent=9
DEBUG - 2013-11-05 18:14:42 --> SQL : SELECT sales_line.document_no,sales_header.customer_name,sales_header.external_doc,sales_header.order_date,sales_header.due_date,sales_line.no,sales_line.description,sales_line.order_qty,sales_line.delivery_qty,sales_line.balance_qty,sales_line.qty_shipped,sales_line.shipment_date,sales_line.planned_shipment_date FROM  sales_line  INNER Join sales_header on sales_header.order_no =sales_line.document_no
			                      where sales_header.status=1 and sales_line.type not in(0) and sales_header.customer_name='VETCO GRAY PTE LTD'
								  group by id_sales_line
DEBUG - 2013-11-05 18:14:42 --> SQL : SELECT sales_line.document_no,sales_header.customer_name,sales_header.external_doc,sales_header.order_date,sales_header.due_date,sales_line.no,sales_line.description,sales_line.order_qty,sales_line.delivery_qty,sales_line.balance_qty,sales_line.qty_shipped,sales_line.shipment_date,sales_line.planned_shipment_date FROM  sales_line  INNER Join sales_header on sales_header.order_no =sales_line.document_no
			                      where sales_header.status=1 and sales_line.type not in(0) and sales_header.customer_name='VETCO GRAY PTE LTD'
								  group by id_sales_line
