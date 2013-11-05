Drop table revisesd_order;
CREATE TABLE IF NOT EXISTS `revisesd_order` (
  `id_revisesd_order` int(50) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `customer_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `po_number` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `po_line` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `part_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `rev` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `navision_material` varchar(25) DEFAULT NULL,
  `part_description` varchar(25) DEFAULT NULL,
  `po_qty` int(50) DEFAULT NULL,
  `delivery_qty` int(50) DEFAULT NULL,
  `balance_qty` int(50) DEFAULT NULL,
  `po_delivery_date` date DEFAULT NULL,
  `project` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `material_dock_date` date DEFAULT NULL,
  `ge_dock_date` date DEFAULT NULL,
  PRIMARY KEY (`id_revisesd_order`),
  KEY `id_revisesd_order` (`id_revisesd_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

alter table revised_order 

CREATE TABLE IF NOT EXISTS `production_order` (
  `id_production_order` int(50) NOT NULL AUTO_INCREMENT,
  `status` int(50) DEFAULT NULL,
  `order_no` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `route_no` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  `qty` int(50) DEFAULT NULL,
  `external_doc` varchar(50) NOT NULL,
  PRIMARY KEY (`id_production_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2808 ;


CREATE TABLE IF NOT EXISTS `prod_order_line` (
  `id_prod_order_line` int(50) NOT NULL AUTO_INCREMENT,
  `status` int(50) NOT NULL,
  `prod_order_no` varchar(50) NOT NULL,
  `line_no` varchar(50) NOT NULL,
  `item_no` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `location_code` varchar(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `finished_qty` int(50) NOT NULL,
  `due_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `route_no` varchar(50) NOT NULL,
  `route_reference_no` varchar(50) NOT NULL,
  PRIMARY KEY (`id_prod_order_line`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

CREATE TABLE IF NOT EXISTS `prod_order_routing_line` (
  `id_prod_order_routing_line` int(50) NOT NULL AUTO_INCREMENT,
  `input_qty` int(50) NOT NULL,
  `status` int(50) NOT NULL,
  `prod_order_no` varchar(50) NOT NULL,
  `routing_no` varchar(50) NOT NULL,
  `operation_no` varchar(50) NOT NULL,
  `work_center_no` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `setup_time` float DEFAULT NULL,
  `run_time` float DEFAULT NULL,
  `wait_time` float DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id_prod_order_routing_line`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=257 ;



CREATE TABLE IF NOT EXISTS `pro_order_line` (
  `id_prod_order_line` int(50) NOT NULL AUTO_INCREMENT,
  `status` int(50) NOT NULL,
  `prod_order_no` int(50) NOT NULL,
  `line_no` int(50) NOT NULL,
  `item_no` int(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `location_code` int(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `finished_qty` int(50) NOT NULL,
  `due_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `route_no` int(50) NOT NULL,
  `route_reference_no` int(50) NOT NULL,
  PRIMARY KEY (`id_prod_order_line`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
