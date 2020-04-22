<?php
class db
{
    private $dbuser;
    private $dbname;
    private $dbhost;
    private $dbpass;
    private $dbhandler=NULL;
    private $debug;

    public function __construct($dbuser2,$dbname2,$dbhost2,$dbpass2)
    {
        $this->dbuser=$dbuser2;
        $this->dbpass=$dbpass2;
        $this->dbname=$dbname2;
        $this->dbpass=$dbpass2;
    }

    // kapcsolatfelepito metodus
    public function connect()
    {
        if (! is_null($this->dbhandler))
        {
            return 0;
        }
        else
        {
            $this->dbhandler=new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname.';charset=utf8',$this->dbuser,$this->dbpass);
            if( ! is_null($this->dbhandler))
            {
                return 1;
            }
            else
            {
                return 2;
            }
        }
    }
    public function query($utasitas)
    {
        $this->connect();
        $ret=$this->dbhandler->query($utasitas);
        return $ret;
    }
    public function disconnect()
    {
        $this->dbhandler=NULL;
        return 1; 
    }
    public function select($utasitas)
    {
        $visszater=$this->query($utasitas);
        while ($line=$visszater->fetch(PDO::FETCH_ASSOC))
        {
            $datas[]=$line;
        }
        return $datas;
    }
}

/*
public          publikus, bárhonnan hozzáférhetsz
protected       félig védett, objektum szinten nem hozzáférhető, de örökölhető
private         csak az adott osztály éri el

*/

?>
