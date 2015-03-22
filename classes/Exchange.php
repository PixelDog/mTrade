<?php
class Exchange {

	protected $f3;
	protected $db;

	function __construct($f3) {
        $db=new DB\SQL(
            $f3->get("db_dns") . $f3->get("db_name"),
            $f3->get("db_user"),
            $f3->get("db_pass")
        );	
		$this->f3=$f3;
		$this->db=$db;
	}
	
    function ExchangeCurrency() {
                
        $exchange=new DB\SQL\Mapper($this->db,"trades");
		
		$exchangeData = $this->f3->get('POST[0]');
		if(!$exchangeData){
			return;
		}
		$obj = json_decode($exchangeData);
		if(!$obj){
			return;
		}
		
		// existing user check would be good
		/*
		$user=$this->db->exec(
			"SELECT * FROM users WHERE ID=?",
			$obj->userId
		); 
        if(!$user){
        	return;
        }
        */

		$exchange->userId=$obj->userId;
		$exchange->currencyFrom=$obj->currencyFrom;
		$exchange->currencyTo=$obj->currencyTo;
		$exchange->amountSell=$obj->amountSell;
		$exchange->amountBuy=$obj->amountBuy;
		$exchange->rate=$obj->rate;
		$exchange->timePlaced=$obj->timePlaced;
		$exchange->originatingCountry=$obj->originatingCountry;
		$exchange->save();

    }
    
	function Deny() {
		echo "Nothing to see here. What are you, some sort of hacker?<br>Stop poking around and do something useful with your life.<br>Make your Mother proud! ";
	}
    
}