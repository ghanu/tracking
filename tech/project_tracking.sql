DROP TABLE IF EXISTS `sales_order`;
CREATE TABLE IF NOT EXISTS `sales_order` (
  `id_sales_order` int(50) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `customer` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `po_number` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `po_line` int(50) DEFAULT NULL,
  `part_number` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `rev` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `nav_material` varchar(50) CHARACTER SET utf8 NOT NULL,
  `part_desc` varchar(50) CHARACTER SET utf8 NOT NULL,
  `part_qty` int(50) DEFAULT NULL,
  `delivery_qty` int(50) DEFAULT NULL,
  `balance_qty` int(50) DEFAULT NULL,
  `planned_delivery` int(50) DEFAULT NULL,
  `po_delivery_date` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `actual_mc` date DEFAULT NULL,
  `target_mc` date DEFAULT NULL,
  `ndt` int(50) DEFAULT NULL,
  `mc` int(50) DEFAULT NULL,
  `vam_top` int(50) DEFAULT NULL,
  `cladding` int(50) DEFAULT NULL,
  `phosphating` int(50) DEFAULT NULL,
  `painting` int(50) DEFAULT NULL,
  `shipping` int(50) DEFAULT NULL,
  `actual_finish` date DEFAULT NULL,
  `revision` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `remarks` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_sales_order`),
  UNIQUE KEY `order_no` (`order_no`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
  
DROP TABLE IF EXISTS `sales_order_tracking`;
CREATE TABLE IF NOT EXISTS `sales_order_tracking` (
  `id_order_tracking` int(50) NOT NULL AUTO_INCREMENT,
  `order_id` int(50) NOT NULL,
  `seq_no` int(50) NOT NULL,
  `operation_text` varchar(50) NOT NULL,
  `work_center` varchar(50) NOT NULL,
  `setup_time` float DEFAULT NULL,
  `run_time` float DEFAULT NULL,
  `working_hours` float DEFAULT NULL,
  `req_days` float DEFAULT NULL,
  `down_time` float DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  PRIMARY KEY (`id_order_tracking`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
  

  
  INSERT INTO `__dashboard_widget_relation` (`id`, `dashboard_id`, `widget_id`, `row`, `user_id`, `status`, `add_date`, `col`) VALUES
(2, 1, 2, 2, 1, '', NULL, 1),
(3, 1, 3, 3, 1, '', NULL, 1),
(4, 1, 4, 4, 1, '', NULL, 1);


INSERT INTO `__widgets` (`id`, `content`, `title`) VALUES

(2, 0x7b22776964676574223a2273747564656e74496e666f222c2274797065223a22706870222c22706172616d73223a22227d, 'second widget '),
(3, 0x7b22776964676574223a2273747564656e74496e666f222c2274797065223a22706870222c22706172616d73223a22227d, 'Third Widget'),
(4, 0x7b22776964676574223a2273747564656e74496e666f222c2274797065223a22706870222c22706172616d73223a22227d, 'Third Widget');

  http://mrmsb.com/mr_tracking/gbase/index.php?file=sales_orders&type=mobapi
  http://mrmsb.com/mr_tracking/gbase/index.php?file=login&type=mobapi&loginname=admin&password=admin123