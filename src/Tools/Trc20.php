<?php
namespace Web3\Tools;

class Trc20 extends Contract{

  function __construct($tronApi,$trc20Abi,$credential=null){
    parent::__construct($tronApi,$trc20Abi,$credential);
  }

  function transfer($to,$value){
    return $this->send('transfer',$to,$value);
  }

  function transferFrom($from,$to,$value){
    return $this->send('transferFrom',$from,$to,$value);
  }

  function approve($spender,$value){
    return $this->send('approve',$spender,$value);
  }

  function allowance($owner,$spender){
    return $this->call('allowance',$owner,$spender);
  }

  function totalSupply(){
    $ret =  $this->call('totalSupply');
    return $ret[0];
  }

  function balanceOf($owner){
    $ret = $this->call('balanceOf',$owner);
    return $ret[0];
  }

  function name(){
    $ret = $this->call('name');
    return $ret[0];
  }

  function symbol(){
    $ret = $this->call('symbol');
    return $ret[0];
  }

  function decimals(){
    $ret = $this->call('decimals');
    return $ret[0];
  }

}
