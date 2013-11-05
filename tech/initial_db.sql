CREATE TABLE  `test`.`g_master_report` (
`iId` SERIAL NOT NULL ,
`vName` VARCHAR( 2000 ) NOT NULL ,
`tDescription` TEXT NOT NULL ,
`vtableName` VARCHAR( 2000 ) NOT NULL ,
`dAddedDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = MYISAM;

CREATE TABLE  `test`.`g_master_customization` (
`iId` SERIAL NOT NULL ,
`vName` VARCHAR( 2000 ) NOT NULL ,
`tDescription` TEXT NOT NULL ,
`dAddedDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
`iReportId` INT NOT NULL ,
`iMemberId` INT NOT NULL,
`vReportFormat` varchar(50) NOT NULL,
`bIsDefault` BOOL NOT NULL
) ENGINE = MYISAM ;

CREATE TABLE  `test`.`g_master_columns` (
`iId` SERIAL NOT NULL ,
`vDbColumnName` TEXT NOT NULL ,
`vScriptVariableName` VARCHAR( 2000 ) NOT NULL ,
`iReportId` INT NOT NULL ,
`vDataType` VARCHAR( 20 ) NOT NULL
) ENGINE = MYISAM ;

CREATE TABLE  `test`.`g_report_customizations` (
 `iId` SERIAL NOT NULL ,
`iCustomizationId` INT NOT NULL,
`vDisplayName` VARCHAR( 1000 ) NOT NULL ,
`vDataFormat` VARCHAR( 1000 ) NOT NULL ,
`vStyleDetails` VARCHAR( 1000 ) NOT NULL ,
`vMathFunction` VARCHAR( 50 ) NOT NULL ,
`iColumnId` INT NOT NULL ,
`bIsVisible` BOOL NOT NULL ,
`bIsGroup` BOOL NOT NULL ,
`bIsSort` BOOL NOT NULL
) ENGINE = MYISAM ;

CREATE TABLE  `test`.`g_customization_condition` (
`iId` SERIAL NOT NULL ,
`tCondition` TEXT NOT NULL ,
`iCustomizationId` INT NOT NULL
) ENGINE = MYISAM ;