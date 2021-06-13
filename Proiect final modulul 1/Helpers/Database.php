<?php

namespace Helpers;

class Database {
	
	const DB_HOST = 'localhost';
	const DB_PORT = '3306';	
	const DB_NAME = 'calculator_greutati';
	const DB_TYPE = 'mysql';
	
	const DB_USER = 'root';
	const DB_PASS = '';
	
	// mysql:dbname=test;host:localhost;port=3306
	
	const HOST_STR = self::DB_TYPE.':dbname='.self::DB_NAME.';host:'.self::DB_HOST.';port='.self::DB_PORT;
	
	const DB_OPTIONS = array(
		\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, 
		
		\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,	
	);
	
	private static $db_conn; 
	
	private function __construct() { } 
	
	public static function connect() {
		
		if (is_null(self::$db_conn)) {
		
			self::$db_conn = new \PDO(self::HOST_STR, self::DB_USER, self::DB_PASS, self::DB_OPTIONS); 
		
		}
		
		return self::$db_conn;
		
	}
	
}
