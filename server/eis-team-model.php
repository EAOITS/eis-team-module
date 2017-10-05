<?php

  /*
* Project    : EIS Subscription Module
* EAO IT Services Pvt. Ltd. | www.eaoservices.com
* Copyright reserved @2017

* File Description :

* Created on : 3 Oct, 2017 | 12:38:33 PM
* Author     : Bilal Wani
* Email      : bilal.wani@eaoservices

*/
  
require_once 'eis-db.php';

/*
 * Table : eis-team
 * Column	Type	Null	Default	Comments
    id          int(11)	No 	 	 
    name	varchar(60)	No 	 	 
    designation	varchar(60)	No 	 	 
    img_url	varchar(250)	Yes 	NULL 	 
    style_line	varchar(80)	Yes 	NULL 	 
    status	tinyint(4)	No 	 	 
    Indexes

    Keyname	Type	Unique	Packed	Column	Cardinality	Collation	Null	Comment
    PRIMARY	BTREE	Yes	No	id	0	A	No	
 * 
 */

if ( !class_exists('EisTeamModel')) {
    class EisTeamModel extends EisSqlDb{
        private $m_table_name = 'eis-team';
                
        public function __construct($host, $user, $pwd, $dbname) {
            parent::__construct($host, $user, $pwd, $dbname);            
            
        }
        
        public function GetAllMembers(){
            $query = 'SELECT * from `' . $this->m_table_name . '`';
            $result = $this->ExecuteSelectQuery($query);
            return $result;
            
        }
        
        protected function GetDbLink(){
            
        }
    }
    
}