<?php
class cxn{
  protected $cxn;
  private $host = '';
  private $user = '';
  private $pass = '';
  priavte $db = '';
  
  function __construct(){
    $this->cxn = new mysqli($this->host, $this->user, $this->pass, $this->db);
  }
  
  function escape($value){
    $value = $this->cxn->escape_string($value);
    return value;
  }
}
?>
