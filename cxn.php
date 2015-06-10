<?php
class cxn{
  protected $cxn;
  private $host = '';
  private $user = '';
  private $pass = '';
  private $db = '';
  
  function __construct(){
    $this->cxn = new mysqli($this->host, $this->user, $this->pass, $this->db);
  }
  
  function escape($value){
    return $this->cxn->escape_string($value);
  }
}
?>
