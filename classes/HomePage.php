<?php
class HomePage {

	protected $f3;
	protected $db;

	function __construct($f3) {
        $db=new DB\SQL(
            $f3->get('db_dns') . $f3->get('db_name'),
            $f3->get('db_user'),
            $f3->get('db_pass')
        );	
		$this->f3=$f3;
		$this->db=$db;
	}
	
    function ExchangeData() {

		$jsn="[";
		
		$trades=new \DB\SQL\Mapper($this->db,"trades");
		$trades->load('');
			while(!$trades->dry()) {
			$jsn .= json_encode($trades->cast()) .",";
			$trades->next();
		}
		$jsn=rtrim($jsn,',');
 		$jsn .=  "]";
 		echo $jsn;
 		
    }
    
    function display() {
    	
        $this->f3->set("name","The Exchange");
        
        // send some mock data
        // $this->f3->mock('POST /Exchange',array('{"userId": "134256", "currencyFrom": "EUR", "currencyTo": "GBP", "amountSell": 1000, "amountBuy": 747.10, "rate": 0.7471, "timePlaced" : "24-10-15 10:27:44", "originatingCountry" : "FR"}'));
		
        $template=new Template;
        echo $template->render('homepage.html');
        
    }
    
}