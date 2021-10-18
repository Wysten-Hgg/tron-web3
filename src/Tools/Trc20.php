<?php
namespace Web3\Tools;

class Trc20 extends Contract{

  function __construct($tronApi,$credential=null){
    parent::__construct($tronApi,ABI_TRC20,$credential);
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

$erc20 = <<<WIZ
{
    "contractName": "TRC20",
    "abi": [
        {
            "inputs": [
                {
                    "internalType": "address",
                    "name": "manager",
                    "type": "address"
                }
            ],
            "stateMutability": "nonpayable",
            "type": "constructor"
        },
        {
            "anonymous": false,
            "inputs": [
                {
                    "indexed": true,
                    "internalType": "address",
                    "name": "owner",
                    "type": "address"
                },
                {
                    "indexed": true,
                    "internalType": "address",
                    "name": "spender",
                    "type": "address"
                },
                {
                    "indexed": false,
                    "internalType": "uint256",
                    "name": "value",
                    "type": "uint256"
                }
            ],
            "name": "Approval",
            "type": "event"
        },
        {
            "anonymous": false,
            "inputs": [
                {
                    "indexed": true,
                    "internalType": "address",
                    "name": "from",
                    "type": "address"
                },
                {
                    "indexed": true,
                    "internalType": "address",
                    "name": "to",
                    "type": "address"
                },
                {
                    "indexed": false,
                    "internalType": "uint256",
                    "name": "value",
                    "type": "uint256"
                }
            ],
            "name": "Transfer",
            "type": "event"
        },
        {
            "inputs": [],
            "name": "admin",
            "outputs": [
                {
                    "internalType": "address",
                    "name": "",
                    "type": "address"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "address",
                    "name": "owner",
                    "type": "address"
                },
                {
                    "internalType": "address",
                    "name": "spender",
                    "type": "address"
                }
            ],
            "name": "allowance",
            "outputs": [
                {
                    "internalType": "uint256",
                    "name": "",
                    "type": "uint256"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "address",
                    "name": "spender",
                    "type": "address"
                },
                {
                    "internalType": "uint256",
                    "name": "amount",
                    "type": "uint256"
                }
            ],
            "name": "approve",
            "outputs": [
                {
                    "internalType": "bool",
                    "name": "",
                    "type": "bool"
                }
            ],
            "stateMutability": "nonpayable",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "address",
                    "name": "account",
                    "type": "address"
                }
            ],
            "name": "balanceOf",
            "outputs": [
                {
                    "internalType": "uint256",
                    "name": "",
                    "type": "uint256"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [],
            "name": "decimals",
            "outputs": [
                {
                    "internalType": "uint8",
                    "name": "",
                    "type": "uint8"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "address",
                    "name": "spender",
                    "type": "address"
                },
                {
                    "internalType": "uint256",
                    "name": "subtractedValue",
                    "type": "uint256"
                }
            ],
            "name": "decreaseAllowance",
            "outputs": [
                {
                    "internalType": "bool",
                    "name": "",
                    "type": "bool"
                }
            ],
            "stateMutability": "nonpayable",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "address",
                    "name": "spender",
                    "type": "address"
                },
                {
                    "internalType": "uint256",
                    "name": "addedValue",
                    "type": "uint256"
                }
            ],
            "name": "increaseAllowance",
            "outputs": [
                {
                    "internalType": "bool",
                    "name": "",
                    "type": "bool"
                }
            ],
            "stateMutability": "nonpayable",
            "type": "function"
        },
        {
            "inputs": [],
            "name": "name",
            "outputs": [
                {
                    "internalType": "string",
                    "name": "",
                    "type": "string"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [],
            "name": "symbol",
            "outputs": [
                {
                    "internalType": "string",
                    "name": "",
                    "type": "string"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [],
            "name": "totalSupply",
            "outputs": [
                {
                    "internalType": "uint256",
                    "name": "",
                    "type": "uint256"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "address",
                    "name": "recipient",
                    "type": "address"
                },
                {
                    "internalType": "uint256",
                    "name": "amount",
                    "type": "uint256"
                }
            ],
            "name": "transfer",
            "outputs": [
                {
                    "internalType": "bool",
                    "name": "",
                    "type": "bool"
                }
            ],
            "stateMutability": "nonpayable",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "address",
                    "name": "sender",
                    "type": "address"
                },
                {
                    "internalType": "address",
                    "name": "recipient",
                    "type": "address"
                },
                {
                    "internalType": "uint256",
                    "name": "amount",
                    "type": "uint256"
                }
            ],
            "name": "transferFrom",
            "outputs": [
                {
                    "internalType": "bool",
                    "name": "",
                    "type": "bool"
                }
            ],
            "stateMutability": "nonpayable",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "address",
                    "name": "manager",
                    "type": "address"
                }
            ],
            "name": "changeOwner",
            "outputs": [],
            "stateMutability": "nonpayable",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "address",
                    "name": "account",
                    "type": "address"
                },
                {
                    "internalType": "uint256",
                    "name": "amount",
                    "type": "uint256"
                }
            ],
            "name": "mint",
            "outputs": [],
            "stateMutability": "nonpayable",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "address",
                    "name": "account",
                    "type": "address"
                },
                {
                    "internalType": "uint256",
                    "name": "amount",
                    "type": "uint256"
                }
            ],
            "name": "burn",
            "outputs": [],
            "stateMutability": "nonpayable",
            "type": "function"
        }
    ],
    "metadata": "{\"compiler\":{\"version\":\"0.8.0+commit.c7dfd78e\"},\"language\":\"Solidity\",\"output\":{\"abi\":[{\"inputs\":[{\"internalType\":\"address\",\"name\":\"manager\",\"type\":\"address\"}],\"stateMutability\":\"nonpayable\",\"type\":\"constructor\"},{\"anonymous\":false,\"inputs\":[{\"indexed\":true,\"internalType\":\"address\",\"name\":\"owner\",\"type\":\"address\"},{\"indexed\":true,\"internalType\":\"address\",\"name\":\"spender\",\"type\":\"address\"},{\"indexed\":false,\"internalType\":\"uint256\",\"name\":\"value\",\"type\":\"uint256\"}],\"name\":\"Approval\",\"type\":\"event\"},{\"anonymous\":false,\"inputs\":[{\"indexed\":true,\"internalType\":\"address\",\"name\":\"from\",\"type\":\"address\"},{\"indexed\":true,\"internalType\":\"address\",\"name\":\"to\",\"type\":\"address\"},{\"indexed\":false,\"internalType\":\"uint256\",\"name\":\"value\",\"type\":\"uint256\"}],\"name\":\"Transfer\",\"type\":\"event\"},{\"inputs\":[],\"name\":\"admin\",\"outputs\":[{\"internalType\":\"address\",\"name\":\"\",\"type\":\"address\"}],\"stateMutability\":\"view\",\"type\":\"function\"},{\"inputs\":[{\"internalType\":\"address\",\"name\":\"owner\",\"type\":\"address\"},{\"internalType\":\"address\",\"name\":\"spender\",\"type\":\"address\"}],\"name\":\"allowance\",\"outputs\":[{\"internalType\":\"uint256\",\"name\":\"\",\"type\":\"uint256\"}],\"stateMutability\":\"view\",\"type\":\"function\"},{\"inputs\":[{\"internalType\":\"address\",\"name\":\"spender\",\"type\":\"address\"},{\"internalType\":\"uint256\",\"name\":\"amount\",\"type\":\"uint256\"}],\"name\":\"approve\",\"outputs\":[{\"internalType\":\"bool\",\"name\":\"\",\"type\":\"bool\"}],\"stateMutability\":\"nonpayable\",\"type\":\"function\"},{\"inputs\":[{\"internalType\":\"address\",\"name\":\"account\",\"type\":\"address\"}],\"name\":\"balanceOf\",\"outputs\":[{\"internalType\":\"uint256\",\"name\":\"\",\"type\":\"uint256\"}],\"stateMutability\":\"view\",\"type\":\"function\"},{\"inputs\":[{\"internalType\":\"address\",\"name\":\"account\",\"type\":\"address\"},{\"internalType\":\"uint256\",\"name\":\"amount\",\"type\":\"uint256\"}],\"name\":\"burn\",\"outputs\":[],\"stateMutability\":\"nonpayable\",\"type\":\"function\"},{\"inputs\":[{\"internalType\":\"address\",\"name\":\"manager\",\"type\":\"address\"}],\"name\":\"changeOwner\",\"outputs\":[],\"stateMutability\":\"nonpayable\",\"type\":\"function\"},{\"inputs\":[],\"name\":\"decimals\",\"outputs\":[{\"internalType\":\"uint8\",\"name\":\"\",\"type\":\"uint8\"}],\"stateMutability\":\"view\",\"type\":\"function\"},{\"inputs\":[{\"internalType\":\"address\",\"name\":\"spender\",\"type\":\"address\"},{\"internalType\":\"uint256\",\"name\":\"subtractedValue\",\"type\":\"uint256\"}],\"name\":\"decreaseAllowance\",\"outputs\":[{\"internalType\":\"bool\",\"name\":\"\",\"type\":\"bool\"}],\"stateMutability\":\"nonpayable\",\"type\":\"function\"},{\"inputs\":[{\"internalType\":\"address\",\"name\":\"spender\",\"type\":\"address\"},{\"internalType\":\"uint256\",\"name\":\"addedValue\",\"type\":\"uint256\"}],\"name\":\"increaseAllowance\",\"outputs\":[{\"internalType\":\"bool\",\"name\":\"\",\"type\":\"bool\"}],\"stateMutability\":\"nonpayable\",\"type\":\"function\"},{\"inputs\":[{\"internalType\":\"address\",\"name\":\"account\",\"type\":\"address\"},{\"internalType\":\"uint256\",\"name\":\"amount\",\"type\":\"uint256\"}],\"name\":\"mint\",\"outputs\":[],\"stateMutability\":\"nonpayable\",\"type\":\"function\"},{\"inputs\":[],\"name\":\"name\",\"outputs\":[{\"internalType\":\"string\",\"name\":\"\",\"type\":\"string\"}],\"stateMutability\":\"view\",\"type\":\"function\"},{\"inputs\":[],\"name\":\"symbol\",\"outputs\":[{\"internalType\":\"string\",\"name\":\"\",\"type\":\"string\"}],\"stateMutability\":\"view\",\"type\":\"function\"},{\"inputs\":[],\"name\":\"totalSupply\",\"outputs\":[{\"internalType\":\"uint256\",\"name\":\"\",\"type\":\"uint256\"}],\"stateMutability\":\"view\",\"type\":\"function\"},{\"inputs\":[{\"internalType\":\"address\",\"name\":\"recipient\",\"type\":\"address\"},{\"internalType\":\"uint256\",\"name\":\"amount\",\"type\":\"uint256\"}],\"name\":\"transfer\",\"outputs\":[{\"internalType\":\"bool\",\"name\":\"\",\"type\":\"bool\"}],\"stateMutability\":\"nonpayable\",\"type\":\"function\"},{\"inputs\":[{\"internalType\":\"address\",\"name\":\"sender\",\"type\":\"address\"},{\"internalType\":\"address\",\"name\":\"recipient\",\"type\":\"address\"},{\"internalType\":\"uint256\",\"name\":\"amount\",\"type\":\"uint256\"}],\"name\":\"transferFrom\",\"outputs\":[{\"internalType\":\"bool\",\"name\":\"\",\"type\":\"bool\"}],\"stateMutability\":\"nonpayable\",\"type\":\"function\"}],\"devdoc\":{\"kind\":\"dev\",\"methods\":{\"allowance(address,address)\":{\"details\":\"See {IERC20-allowance}.\"},\"approve(address,uint256)\":{\"details\":\"See {IERC20-approve}. Requirements: - `spender` cannot be the zero address.\"},\"balanceOf(address)\":{\"details\":\"See {IERC20-balanceOf}.\"},\"decimals()\":{\"details\":\"Returns the number of decimals used to get its user representation. For example, if `decimals` equals `2`, a balance of `505` tokens should be displayed to a user as `5,05` (`505 / 10 ** 2`). Tokens usually opt for a value of 18, imitating the relationship between Ether and Wei. This is the value {ERC20} uses, unless this function is overridden; NOTE: This information is only used for _display_ purposes: it in no way affects any of the arithmetic of the contract, including {IERC20-balanceOf} and {IERC20-transfer}.\"},\"decreaseAllowance(address,uint256)\":{\"details\":\"Atomically decreases the allowance granted to `spender` by the caller. This is an alternative to {approve} that can be used as a mitigation for problems described in {IERC20-approve}. Emits an {Approval} event indicating the updated allowance. Requirements: - `spender` cannot be the zero address. - `spender` must have allowance for the caller of at least `subtractedValue`.\"},\"increaseAllowance(address,uint256)\":{\"details\":\"Atomically increases the allowance granted to `spender` by the caller. This is an alternative to {approve} that can be used as a mitigation for problems described in {IERC20-approve}. Emits an {Approval} event indicating the updated allowance. Requirements: - `spender` cannot be the zero address.\"},\"name()\":{\"details\":\"Returns the name of the token.\"},\"symbol()\":{\"details\":\"Returns the symbol of the token, usually a shorter version of the name.\"},\"totalSupply()\":{\"details\":\"See {IERC20-totalSupply}.\"},\"transfer(address,uint256)\":{\"details\":\"See {IERC20-transfer}. Requirements: - `recipient` cannot be the zero address. - the caller must have a balance of at least `amount`.\"},\"transferFrom(address,address,uint256)\":{\"details\":\"See {IERC20-transferFrom}. Emits an {Approval} event indicating the updated allowance. This is not required by the EIP. See the note at the beginning of {ERC20}. Requirements: - `sender` and `recipient` cannot be the zero address. - `sender` must have a balance of at least `amount`. - the caller must have allowance for ``sender``'s tokens of at least `amount`.\"}},\"version\":1},\"userdoc\":{\"kind\":\"user\",\"methods\":{},\"version\":1}},\"settings\":{\"compilationTarget\":{\"/D/project/lianqun/RainbowDao-protocol/contracts/token20/RBB.sol\":\"RBB\"},\"evmVersion\":\"istanbul\",\"libraries\":{},\"metadata\":{\"bytecodeHash\":\"ipfs\"},\"optimizer\":{\"enabled\":true,\"runs\":200},\"remappings\":[]},\"sources\":{\"/D/project/lianqun/RainbowDao-protocol/contracts/token20/RBB.sol\":{\"keccak256\":\"0x3f999a75ba25b50c38e8897507a70b36f73e954e5ba62e3f2e904f17ccaa34c6\",\"license\":\"MIT\",\"urls\":[\"bzz-raw://d5efa2348bafd5e79cf0982c6261f30be296e8dbdc1ad9b6f5f1e24117b8e6f7\",\"dweb:/ipfs/QmWxhjxkC7jKNQiwBE5qNfGFZe2A4FE9JxN9Cr3ArBr1gP\"]},\"@openzeppelin/contracts/token/ERC20/ERC20.sol\":{\"keccak256\":\"0x418cfe64226a974419f8ab7287ad4bb413156a4d7af8ab5d9bcaa5678d1a2f22\",\"license\":\"MIT\",\"urls\":[\"bzz-raw://9f65118c99d5d6cfe602720418b8551c2da6c3de650e61c5231b0be4396aae0d\",\"dweb:/ipfs/QmdLmkRHJhEifzzDjF44MHXcQx2SXc5EzhpHzN2z1vUq8H\"]},\"@openzeppelin/contracts/token/ERC20/IERC20.sol\":{\"keccak256\":\"0x027b891937d20ccf213fdb9c31531574256de774bda99d3a70ecef6e1913ed2a\",\"license\":\"MIT\",\"urls\":[\"bzz-raw://087318b21c528119f649899f5b5580566dd8d7b0303d4904bd0e8580c3545f14\",\"dweb:/ipfs/Qmbn5Mj7aUn8hJuQ8VrQjjEXRsXyJKykgnjR9p4C3nfLtL\"]},\"@openzeppelin/contracts/token/ERC20/extensions/IERC20Metadata.sol\":{\"keccak256\":\"0x83fe24f5c04a56091e50f4a345ff504c8bff658a76d4c43b16878c8f940c53b2\",\"license\":\"MIT\",\"urls\":[\"bzz-raw://d4c3df1a7ca104b633a7d81c6c6f5192367d150cd5a32cba81f7f27012729013\",\"dweb:/ipfs/QmSim72e3ZVsfgZt8UceCvbiSuMRHR6WDsiamqNzZahGSY\"]},\"@openzeppelin/contracts/utils/Context.sol\":{\"keccak256\":\"0x95098bd1d9c8dec4d80d3dedb88a0d949fa0d740ee99f2aa466bc308216ca6d5\",\"license\":\"MIT\",\"urls\":[\"bzz-raw://7fec968dcd68e13961521fa3c7dd87baecad91a2653b19240e81f21cc4f3ba85\",\"dweb:/ipfs/QmaXtsYt4Mphm8XHNUfk2me1cF3ssS2SqDBNFpYAzMjomC\"]}},\"version\":1}",
    "bytecode": "0x60806040523480156200001157600080fd5b5060405162000f7b38038062000f7b833981016040819052620000349162000173565b6040518060400160405280600c81526020016b14985a5b989bddc8109bdb9960a21b8152506040518060400160405280600381526020016229212160e91b81525081600390805190602001906200008d929190620000cd565b508051620000a3906004906020840190620000cd565b5050600580546001600160a01b0319166001600160a01b03939093169290921790915550620001e0565b828054620000db90620001a3565b90600052602060002090601f016020900481019282620000ff57600085556200014a565b82601f106200011a57805160ff19168380011785556200014a565b828001600101855582156200014a579182015b828111156200014a5782518255916020019190600101906200012d565b50620001589291506200015c565b5090565b5b808211156200015857600081556001016200015d565b60006020828403121562000185578081fd5b81516001600160a01b03811681146200019c578182fd5b9392505050565b600281046001821680620001b857607f821691505b60208210811415620001da57634e487b7160e01b600052602260045260246000fd5b50919050565b610d8b80620001f06000396000f3fe608060405234801561001057600080fd5b50600436106100f55760003560e01c806370a0823111610097578063a6f9dae111610066578063a6f9dae1146101de578063a9059cbb146101f1578063dd62ed3e14610204578063f851a44014610217576100f5565b806370a082311461019d57806395d89b41146101b05780639dc29fac146101b8578063a457c2d7146101cb576100f5565b806323b872dd116100d357806323b872dd1461014d578063313ce56714610160578063395093511461017557806340c10f1914610188576100f5565b806306fdde03146100fa578063095ea7b31461011857806318160ddd14610138575b600080fd5b61010261022c565b60405161010f91906109d0565b60405180910390f35b61012b610126366004610988565b6102be565b60405161010f91906109c5565b6101406102db565b60405161010f9190610cbe565b61012b61015b36600461094d565b6102e1565b61016861037a565b60405161010f9190610cc7565b61012b610183366004610988565b61037f565b61019b610196366004610988565b6103d3565b005b6101406101ab3660046108fa565b6103f8565b610102610417565b61019b6101c6366004610988565b610426565b61012b6101d9366004610988565b610447565b61019b6101ec3660046108fa565b6104c0565b61012b6101ff366004610988565b6104f9565b61014061021236600461091b565b61050d565b61021f610538565b60405161010f91906109b1565b60606003805461023b90610d04565b80601f016020809104026020016040519081016040528092919081815260200182805461026790610d04565b80156102b45780601f10610289576101008083540402835291602001916102b4565b820191906000526020600020905b81548152906001019060200180831161029757829003601f168201915b5050505050905090565b60006102d26102cb610547565b848461054b565b50600192915050565b60025490565b60006102ee8484846105ff565b6001600160a01b03841660009081526001602052604081208161030f610547565b6001600160a01b03166001600160a01b031681526020019081526020016000205490508281101561035b5760405162461bcd60e51b815260040161035290610b30565b60405180910390fd5b61036f85610367610547565b85840361054b565b506001949350505050565b601290565b60006102d261038c610547565b84846001600061039a610547565b6001600160a01b03908116825260208083019390935260409182016000908120918b16815292529020546103ce9190610cd5565b61054b565b6005546001600160a01b031633146103ea57600080fd5b6103f48282610729565b5050565b6001600160a01b0381166000908152602081905260409020545b919050565b60606004805461023b90610d04565b6005546001600160a01b0316331461043d57600080fd5b6103f482826107f1565b60008060016000610456610547565b6001600160a01b03908116825260208083019390935260409182016000908120918816815292529020549050828110156104a25760405162461bcd60e51b815260040161035290610c42565b6104b66104ad610547565b8585840361054b565b5060019392505050565b6005546001600160a01b031633146104d757600080fd5b600580546001600160a01b0319166001600160a01b0392909216919091179055565b60006102d2610506610547565b84846105ff565b6001600160a01b03918216600090815260016020908152604080832093909416825291909152205490565b6005546001600160a01b031681565b3390565b6001600160a01b0383166105715760405162461bcd60e51b815260040161035290610bfe565b6001600160a01b0382166105975760405162461bcd60e51b815260040161035290610aa8565b6001600160a01b0380841660008181526001602090815260408083209487168084529490915290819020849055517f8c5be1e5ebec7d5bd14f71427d1e84f3dd0314c0f7b2291e5b200ac8c7c3b925906105f2908590610cbe565b60405180910390a3505050565b6001600160a01b0383166106255760405162461bcd60e51b815260040161035290610bb9565b6001600160a01b03821661064b5760405162461bcd60e51b815260040161035290610a23565b6106568383836108de565b6001600160a01b0383166000908152602081905260409020548181101561068f5760405162461bcd60e51b815260040161035290610aea565b6001600160a01b038085166000908152602081905260408082208585039055918516815290812080548492906106c6908490610cd5565b92505081905550826001600160a01b0316846001600160a01b03167fddf252ad1be2c89b69c2b068fc378daa952ba7f163c4a11628f55a4df523b3ef846040516107109190610cbe565b60405180910390a36107238484846108de565b50505050565b6001600160a01b03821661074f5760405162461bcd60e51b815260040161035290610c87565b61075b600083836108de565b806002600082825461076d9190610cd5565b90915550506001600160a01b0382166000908152602081905260408120805483929061079a908490610cd5565b90915550506040516001600160a01b038316906000907fddf252ad1be2c89b69c2b068fc378daa952ba7f163c4a11628f55a4df523b3ef906107dd908590610cbe565b60405180910390a36103f4600083836108de565b6001600160a01b0382166108175760405162461bcd60e51b815260040161035290610b78565b610823826000836108de565b6001600160a01b0382166000908152602081905260409020548181101561085c5760405162461bcd60e51b815260040161035290610a66565b6001600160a01b038316600090815260208190526040812083830390556002805484929061088b908490610ced565b90915550506040516000906001600160a01b038516907fddf252ad1be2c89b69c2b068fc378daa952ba7f163c4a11628f55a4df523b3ef906108ce908690610cbe565b60405180910390a36108de836000845b505050565b80356001600160a01b038116811461041257600080fd5b60006020828403121561090b578081fd5b610914826108e3565b9392505050565b6000806040838503121561092d578081fd5b610936836108e3565b9150610944602084016108e3565b90509250929050565b600080600060608486031215610961578081fd5b61096a846108e3565b9250610978602085016108e3565b9150604084013590509250925092565b6000806040838503121561099a578182fd5b6109a3836108e3565b946020939093013593505050565b6001600160a01b0391909116815260200190565b901515815260200190565b6000602080835283518082850152825b818110156109fc578581018301518582016040015282016109e0565b81811115610a0d5783604083870101525b50601f01601f1916929092016040019392505050565b60208082526023908201527f45524332303a207472616e7366657220746f20746865207a65726f206164647260408201526265737360e81b606082015260800190565b60208082526022908201527f45524332303a206275726e20616d6f756e7420657863656564732062616c616e604082015261636560f01b606082015260800190565b60208082526022908201527f45524332303a20617070726f766520746f20746865207a65726f206164647265604082015261737360f01b606082015260800190565b60208082526026908201527f45524332303a207472616e7366657220616d6f756e7420657863656564732062604082015265616c616e636560d01b606082015260800190565b60208082526028908201527f45524332303a207472616e7366657220616d6f756e74206578636565647320616040820152676c6c6f77616e636560c01b606082015260800190565b60208082526021908201527f45524332303a206275726e2066726f6d20746865207a65726f206164647265736040820152607360f81b606082015260800190565b60208082526025908201527f45524332303a207472616e736665722066726f6d20746865207a65726f206164604082015264647265737360d81b606082015260800190565b60208082526024908201527f45524332303a20617070726f76652066726f6d20746865207a65726f206164646040820152637265737360e01b606082015260800190565b60208082526025908201527f45524332303a2064656372656173656420616c6c6f77616e63652062656c6f77604082015264207a65726f60d81b606082015260800190565b6020808252601f908201527f45524332303a206d696e7420746f20746865207a65726f206164647265737300604082015260600190565b90815260200190565b60ff91909116815260200190565b60008219821115610ce857610ce8610d3f565b500190565b600082821015610cff57610cff610d3f565b500390565b600281046001821680610d1857607f821691505b60208210811415610d3957634e487b7160e01b600052602260045260246000fd5b50919050565b634e487b7160e01b600052601160045260246000fdfea2646970667358221220828a4f34b90a804f06507dd243f21262a16a1446ec616471bf57d50f0805d3d464736f6c63430008000033",
    "deployedBytecode": "0x608060405234801561001057600080fd5b50600436106100f55760003560e01c806370a0823111610097578063a6f9dae111610066578063a6f9dae1146101de578063a9059cbb146101f1578063dd62ed3e14610204578063f851a44014610217576100f5565b806370a082311461019d57806395d89b41146101b05780639dc29fac146101b8578063a457c2d7146101cb576100f5565b806323b872dd116100d357806323b872dd1461014d578063313ce56714610160578063395093511461017557806340c10f1914610188576100f5565b806306fdde03146100fa578063095ea7b31461011857806318160ddd14610138575b600080fd5b61010261022c565b60405161010f91906109d0565b60405180910390f35b61012b610126366004610988565b6102be565b60405161010f91906109c5565b6101406102db565b60405161010f9190610cbe565b61012b61015b36600461094d565b6102e1565b61016861037a565b60405161010f9190610cc7565b61012b610183366004610988565b61037f565b61019b610196366004610988565b6103d3565b005b6101406101ab3660046108fa565b6103f8565b610102610417565b61019b6101c6366004610988565b610426565b61012b6101d9366004610988565b610447565b61019b6101ec3660046108fa565b6104c0565b61012b6101ff366004610988565b6104f9565b61014061021236600461091b565b61050d565b61021f610538565b60405161010f91906109b1565b60606003805461023b90610d04565b80601f016020809104026020016040519081016040528092919081815260200182805461026790610d04565b80156102b45780601f10610289576101008083540402835291602001916102b4565b820191906000526020600020905b81548152906001019060200180831161029757829003601f168201915b5050505050905090565b60006102d26102cb610547565b848461054b565b50600192915050565b60025490565b60006102ee8484846105ff565b6001600160a01b03841660009081526001602052604081208161030f610547565b6001600160a01b03166001600160a01b031681526020019081526020016000205490508281101561035b5760405162461bcd60e51b815260040161035290610b30565b60405180910390fd5b61036f85610367610547565b85840361054b565b506001949350505050565b601290565b60006102d261038c610547565b84846001600061039a610547565b6001600160a01b03908116825260208083019390935260409182016000908120918b16815292529020546103ce9190610cd5565b61054b565b6005546001600160a01b031633146103ea57600080fd5b6103f48282610729565b5050565b6001600160a01b0381166000908152602081905260409020545b919050565b60606004805461023b90610d04565b6005546001600160a01b0316331461043d57600080fd5b6103f482826107f1565b60008060016000610456610547565b6001600160a01b03908116825260208083019390935260409182016000908120918816815292529020549050828110156104a25760405162461bcd60e51b815260040161035290610c42565b6104b66104ad610547565b8585840361054b565b5060019392505050565b6005546001600160a01b031633146104d757600080fd5b600580546001600160a01b0319166001600160a01b0392909216919091179055565b60006102d2610506610547565b84846105ff565b6001600160a01b03918216600090815260016020908152604080832093909416825291909152205490565b6005546001600160a01b031681565b3390565b6001600160a01b0383166105715760405162461bcd60e51b815260040161035290610bfe565b6001600160a01b0382166105975760405162461bcd60e51b815260040161035290610aa8565b6001600160a01b0380841660008181526001602090815260408083209487168084529490915290819020849055517f8c5be1e5ebec7d5bd14f71427d1e84f3dd0314c0f7b2291e5b200ac8c7c3b925906105f2908590610cbe565b60405180910390a3505050565b6001600160a01b0383166106255760405162461bcd60e51b815260040161035290610bb9565b6001600160a01b03821661064b5760405162461bcd60e51b815260040161035290610a23565b6106568383836108de565b6001600160a01b0383166000908152602081905260409020548181101561068f5760405162461bcd60e51b815260040161035290610aea565b6001600160a01b038085166000908152602081905260408082208585039055918516815290812080548492906106c6908490610cd5565b92505081905550826001600160a01b0316846001600160a01b03167fddf252ad1be2c89b69c2b068fc378daa952ba7f163c4a11628f55a4df523b3ef846040516107109190610cbe565b60405180910390a36107238484846108de565b50505050565b6001600160a01b03821661074f5760405162461bcd60e51b815260040161035290610c87565b61075b600083836108de565b806002600082825461076d9190610cd5565b90915550506001600160a01b0382166000908152602081905260408120805483929061079a908490610cd5565b90915550506040516001600160a01b038316906000907fddf252ad1be2c89b69c2b068fc378daa952ba7f163c4a11628f55a4df523b3ef906107dd908590610cbe565b60405180910390a36103f4600083836108de565b6001600160a01b0382166108175760405162461bcd60e51b815260040161035290610b78565b610823826000836108de565b6001600160a01b0382166000908152602081905260409020548181101561085c5760405162461bcd60e51b815260040161035290610a66565b6001600160a01b038316600090815260208190526040812083830390556002805484929061088b908490610ced565b90915550506040516000906001600160a01b038516907fddf252ad1be2c89b69c2b068fc378daa952ba7f163c4a11628f55a4df523b3ef906108ce908690610cbe565b60405180910390a36108de836000845b505050565b80356001600160a01b038116811461041257600080fd5b60006020828403121561090b578081fd5b610914826108e3565b9392505050565b6000806040838503121561092d578081fd5b610936836108e3565b9150610944602084016108e3565b90509250929050565b600080600060608486031215610961578081fd5b61096a846108e3565b9250610978602085016108e3565b9150604084013590509250925092565b6000806040838503121561099a578182fd5b6109a3836108e3565b946020939093013593505050565b6001600160a01b0391909116815260200190565b901515815260200190565b6000602080835283518082850152825b818110156109fc578581018301518582016040015282016109e0565b81811115610a0d5783604083870101525b50601f01601f1916929092016040019392505050565b60208082526023908201527f45524332303a207472616e7366657220746f20746865207a65726f206164647260408201526265737360e81b606082015260800190565b60208082526022908201527f45524332303a206275726e20616d6f756e7420657863656564732062616c616e604082015261636560f01b606082015260800190565b60208082526022908201527f45524332303a20617070726f766520746f20746865207a65726f206164647265604082015261737360f01b606082015260800190565b60208082526026908201527f45524332303a207472616e7366657220616d6f756e7420657863656564732062604082015265616c616e636560d01b606082015260800190565b60208082526028908201527f45524332303a207472616e7366657220616d6f756e74206578636565647320616040820152676c6c6f77616e636560c01b606082015260800190565b60208082526021908201527f45524332303a206275726e2066726f6d20746865207a65726f206164647265736040820152607360f81b606082015260800190565b60208082526025908201527f45524332303a207472616e736665722066726f6d20746865207a65726f206164604082015264647265737360d81b606082015260800190565b60208082526024908201527f45524332303a20617070726f76652066726f6d20746865207a65726f206164646040820152637265737360e01b606082015260800190565b60208082526025908201527f45524332303a2064656372656173656420616c6c6f77616e63652062656c6f77604082015264207a65726f60d81b606082015260800190565b6020808252601f908201527f45524332303a206d696e7420746f20746865207a65726f206164647265737300604082015260600190565b90815260200190565b60ff91909116815260200190565b60008219821115610ce857610ce8610d3f565b500190565b600082821015610cff57610cff610d3f565b500390565b600281046001821680610d1857607f821691505b60208210811415610d3957634e487b7160e01b600052602260045260246000fd5b50919050565b634e487b7160e01b600052601160045260246000fdfea2646970667358221220828a4f34b90a804f06507dd243f21262a16a1446ec616471bf57d50f0805d3d464736f6c63430008000033",
    "immutableReferences": {},
    "generatedSources": [
        {
            "ast": {
                "nodeType": "YulBlock",
                "src": "0:711:146",
                "statements": [
                    {
                        "nodeType": "YulBlock",
                        "src": "6:3:146",
                        "statements": []
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "95:229:146",
                            "statements": [
                                {
                                    "body": {
                                        "nodeType": "YulBlock",
                                        "src": "141:26:146",
                                        "statements": [
                                            {
                                                "expression": {
                                                    "arguments": [
                                                        {
                                                            "name": "value0",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "150:6:146"
                                                        },
                                                        {
                                                            "name": "value0",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "158:6:146"
                                                        }
                                                    ],
                                                    "functionName": {
                                                        "name": "revert",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "143:6:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "143:22:146"
                                                },
                                                "nodeType": "YulExpressionStatement",
                                                "src": "143:22:146"
                                            }
                                        ]
                                    },
                                    "condition": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "dataEnd",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "116:7:146"
                                                    },
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "125:9:146"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "sub",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "112:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "112:23:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "137:2:146",
                                                "type": "",
                                                "value": "32"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "slt",
                                            "nodeType": "YulIdentifier",
                                            "src": "108:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "108:32:146"
                                    },
                                    "nodeType": "YulIf",
                                    "src": "105:2:146"
                                },
                                {
                                    "nodeType": "YulVariableDeclaration",
                                    "src": "176:29:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "195:9:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mload",
                                            "nodeType": "YulIdentifier",
                                            "src": "189:5:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "189:16:146"
                                    },
                                    "variables": [
                                        {
                                            "name": "value",
                                            "nodeType": "YulTypedName",
                                            "src": "180:5:146",
                                            "type": ""
                                        }
                                    ]
                                },
                                {
                                    "body": {
                                        "nodeType": "YulBlock",
                                        "src": "268:26:146",
                                        "statements": [
                                            {
                                                "expression": {
                                                    "arguments": [
                                                        {
                                                            "name": "value0",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "277:6:146"
                                                        },
                                                        {
                                                            "name": "value0",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "285:6:146"
                                                        }
                                                    ],
                                                    "functionName": {
                                                        "name": "revert",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "270:6:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "270:22:146"
                                                },
                                                "nodeType": "YulExpressionStatement",
                                                "src": "270:22:146"
                                            }
                                        ]
                                    },
                                    "condition": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "value",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "227:5:146"
                                                    },
                                                    {
                                                        "arguments": [
                                                            {
                                                                "name": "value",
                                                                "nodeType": "YulIdentifier",
                                                                "src": "238:5:146"
                                                            },
                                                            {
                                                                "arguments": [
                                                                    {
                                                                        "arguments": [
                                                                            {
                                                                                "kind": "number",
                                                                                "nodeType": "YulLiteral",
                                                                                "src": "253:3:146",
                                                                                "type": "",
                                                                                "value": "160"
                                                                            },
                                                                            {
                                                                                "kind": "number",
                                                                                "nodeType": "YulLiteral",
                                                                                "src": "258:1:146",
                                                                                "type": "",
                                                                                "value": "1"
                                                                            }
                                                                        ],
                                                                        "functionName": {
                                                                            "name": "shl",
                                                                            "nodeType": "YulIdentifier",
                                                                            "src": "249:3:146"
                                                                        },
                                                                        "nodeType": "YulFunctionCall",
                                                                        "src": "249:11:146"
                                                                    },
                                                                    {
                                                                        "kind": "number",
                                                                        "nodeType": "YulLiteral",
                                                                        "src": "262:1:146",
                                                                        "type": "",
                                                                        "value": "1"
                                                                    }
                                                                ],
                                                                "functionName": {
                                                                    "name": "sub",
                                                                    "nodeType": "YulIdentifier",
                                                                    "src": "245:3:146"
                                                                },
                                                                "nodeType": "YulFunctionCall",
                                                                "src": "245:19:146"
                                                            }
                                                        ],
                                                        "functionName": {
                                                            "name": "and",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "234:3:146"
                                                        },
                                                        "nodeType": "YulFunctionCall",
                                                        "src": "234:31:146"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "eq",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "224:2:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "224:42:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "iszero",
                                            "nodeType": "YulIdentifier",
                                            "src": "217:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "217:50:146"
                                    },
                                    "nodeType": "YulIf",
                                    "src": "214:2:146"
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "303:15:146",
                                    "value": {
                                        "name": "value",
                                        "nodeType": "YulIdentifier",
                                        "src": "313:5:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "value0",
                                            "nodeType": "YulIdentifier",
                                            "src": "303:6:146"
                                        }
                                    ]
                                }
                            ]
                        },
                        "name": "abi_decode_tuple_t_address_fromMemory",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "61:9:146",
                                "type": ""
                            },
                            {
                                "name": "dataEnd",
                                "nodeType": "YulTypedName",
                                "src": "72:7:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "value0",
                                "nodeType": "YulTypedName",
                                "src": "84:6:146",
                                "type": ""
                            }
                        ],
                        "src": "14:310:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "384:325:146",
                            "statements": [
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "394:22:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "data",
                                                "nodeType": "YulIdentifier",
                                                "src": "408:4:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "414:1:146",
                                                "type": "",
                                                "value": "2"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "div",
                                            "nodeType": "YulIdentifier",
                                            "src": "404:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "404:12:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "length",
                                            "nodeType": "YulIdentifier",
                                            "src": "394:6:146"
                                        }
                                    ]
                                },
                                {
                                    "nodeType": "YulVariableDeclaration",
                                    "src": "425:38:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "data",
                                                "nodeType": "YulIdentifier",
                                                "src": "455:4:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "461:1:146",
                                                "type": "",
                                                "value": "1"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "and",
                                            "nodeType": "YulIdentifier",
                                            "src": "451:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "451:12:146"
                                    },
                                    "variables": [
                                        {
                                            "name": "outOfPlaceEncoding",
                                            "nodeType": "YulTypedName",
                                            "src": "429:18:146",
                                            "type": ""
                                        }
                                    ]
                                },
                                {
                                    "body": {
                                        "nodeType": "YulBlock",
                                        "src": "502:31:146",
                                        "statements": [
                                            {
                                                "nodeType": "YulAssignment",
                                                "src": "504:27:146",
                                                "value": {
                                                    "arguments": [
                                                        {
                                                            "name": "length",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "518:6:146"
                                                        },
                                                        {
                                                            "kind": "number",
                                                            "nodeType": "YulLiteral",
                                                            "src": "526:4:146",
                                                            "type": "",
                                                            "value": "0x7f"
                                                        }
                                                    ],
                                                    "functionName": {
                                                        "name": "and",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "514:3:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "514:17:146"
                                                },
                                                "variableNames": [
                                                    {
                                                        "name": "length",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "504:6:146"
                                                    }
                                                ]
                                            }
                                        ]
                                    },
                                    "condition": {
                                        "arguments": [
                                            {
                                                "name": "outOfPlaceEncoding",
                                                "nodeType": "YulIdentifier",
                                                "src": "482:18:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "iszero",
                                            "nodeType": "YulIdentifier",
                                            "src": "475:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "475:26:146"
                                    },
                                    "nodeType": "YulIf",
                                    "src": "472:2:146"
                                },
                                {
                                    "body": {
                                        "nodeType": "YulBlock",
                                        "src": "592:111:146",
                                        "statements": [
                                            {
                                                "expression": {
                                                    "arguments": [
                                                        {
                                                            "kind": "number",
                                                            "nodeType": "YulLiteral",
                                                            "src": "613:1:146",
                                                            "type": "",
                                                            "value": "0"
                                                        },
                                                        {
                                                            "arguments": [
                                                                {
                                                                    "kind": "number",
                                                                    "nodeType": "YulLiteral",
                                                                    "src": "620:3:146",
                                                                    "type": "",
                                                                    "value": "224"
                                                                },
                                                                {
                                                                    "kind": "number",
                                                                    "nodeType": "YulLiteral",
                                                                    "src": "625:10:146",
                                                                    "type": "",
                                                                    "value": "0x4e487b71"
                                                                }
                                                            ],
                                                            "functionName": {
                                                                "name": "shl",
                                                                "nodeType": "YulIdentifier",
                                                                "src": "616:3:146"
                                                            },
                                                            "nodeType": "YulFunctionCall",
                                                            "src": "616:20:146"
                                                        }
                                                    ],
                                                    "functionName": {
                                                        "name": "mstore",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "606:6:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "606:31:146"
                                                },
                                                "nodeType": "YulExpressionStatement",
                                                "src": "606:31:146"
                                            },
                                            {
                                                "expression": {
                                                    "arguments": [
                                                        {
                                                            "kind": "number",
                                                            "nodeType": "YulLiteral",
                                                            "src": "657:1:146",
                                                            "type": "",
                                                            "value": "4"
                                                        },
                                                        {
                                                            "kind": "number",
                                                            "nodeType": "YulLiteral",
                                                            "src": "660:4:146",
                                                            "type": "",
                                                            "value": "0x22"
                                                        }
                                                    ],
                                                    "functionName": {
                                                        "name": "mstore",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "650:6:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "650:15:146"
                                                },
                                                "nodeType": "YulExpressionStatement",
                                                "src": "650:15:146"
                                            },
                                            {
                                                "expression": {
                                                    "arguments": [
                                                        {
                                                            "kind": "number",
                                                            "nodeType": "YulLiteral",
                                                            "src": "685:1:146",
                                                            "type": "",
                                                            "value": "0"
                                                        },
                                                        {
                                                            "kind": "number",
                                                            "nodeType": "YulLiteral",
                                                            "src": "688:4:146",
                                                            "type": "",
                                                            "value": "0x24"
                                                        }
                                                    ],
                                                    "functionName": {
                                                        "name": "revert",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "678:6:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "678:15:146"
                                                },
                                                "nodeType": "YulExpressionStatement",
                                                "src": "678:15:146"
                                            }
                                        ]
                                    },
                                    "condition": {
                                        "arguments": [
                                            {
                                                "name": "outOfPlaceEncoding",
                                                "nodeType": "YulIdentifier",
                                                "src": "548:18:146"
                                            },
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "length",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "571:6:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "579:2:146",
                                                        "type": "",
                                                        "value": "32"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "lt",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "568:2:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "568:14:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "eq",
                                            "nodeType": "YulIdentifier",
                                            "src": "545:2:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "545:38:146"
                                    },
                                    "nodeType": "YulIf",
                                    "src": "542:2:146"
                                }
                            ]
                        },
                        "name": "extract_byte_array_length",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "data",
                                "nodeType": "YulTypedName",
                                "src": "364:4:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "length",
                                "nodeType": "YulTypedName",
                                "src": "373:6:146",
                                "type": ""
                            }
                        ],
                        "src": "329:380:146"
                    }
                ]
            },
            "contents": "{\n    { }\n    function abi_decode_tuple_t_address_fromMemory(headStart, dataEnd) -> value0\n    {\n        if slt(sub(dataEnd, headStart), 32) { revert(value0, value0) }\n        let value := mload(headStart)\n        if iszero(eq(value, and(value, sub(shl(160, 1), 1)))) { revert(value0, value0) }\n        value0 := value\n    }\n    function extract_byte_array_length(data) -> length\n    {\n        length := div(data, 2)\n        let outOfPlaceEncoding := and(data, 1)\n        if iszero(outOfPlaceEncoding) { length := and(length, 0x7f) }\n        if eq(outOfPlaceEncoding, lt(length, 32))\n        {\n            mstore(0, shl(224, 0x4e487b71))\n            mstore(4, 0x22)\n            revert(0, 0x24)\n        }\n    }\n}",
            "id": 146,
            "language": "Yul",
            "name": "#utility.yul"
        }
    ],
    "deployedGeneratedSources": [
        {
            "ast": {
                "nodeType": "YulBlock",
                "src": "0:7455:146",
                "statements": [
                    {
                        "nodeType": "YulBlock",
                        "src": "6:3:146",
                        "statements": []
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "65:124:146",
                            "statements": [
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "75:29:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "offset",
                                                "nodeType": "YulIdentifier",
                                                "src": "97:6:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "calldataload",
                                            "nodeType": "YulIdentifier",
                                            "src": "84:12:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "84:20:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "value",
                                            "nodeType": "YulIdentifier",
                                            "src": "75:5:146"
                                        }
                                    ]
                                },
                                {
                                    "body": {
                                        "nodeType": "YulBlock",
                                        "src": "167:16:146",
                                        "statements": [
                                            {
                                                "expression": {
                                                    "arguments": [
                                                        {
                                                            "kind": "number",
                                                            "nodeType": "YulLiteral",
                                                            "src": "176:1:146",
                                                            "type": "",
                                                            "value": "0"
                                                        },
                                                        {
                                                            "kind": "number",
                                                            "nodeType": "YulLiteral",
                                                            "src": "179:1:146",
                                                            "type": "",
                                                            "value": "0"
                                                        }
                                                    ],
                                                    "functionName": {
                                                        "name": "revert",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "169:6:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "169:12:146"
                                                },
                                                "nodeType": "YulExpressionStatement",
                                                "src": "169:12:146"
                                            }
                                        ]
                                    },
                                    "condition": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "value",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "126:5:146"
                                                    },
                                                    {
                                                        "arguments": [
                                                            {
                                                                "name": "value",
                                                                "nodeType": "YulIdentifier",
                                                                "src": "137:5:146"
                                                            },
                                                            {
                                                                "arguments": [
                                                                    {
                                                                        "arguments": [
                                                                            {
                                                                                "kind": "number",
                                                                                "nodeType": "YulLiteral",
                                                                                "src": "152:3:146",
                                                                                "type": "",
                                                                                "value": "160"
                                                                            },
                                                                            {
                                                                                "kind": "number",
                                                                                "nodeType": "YulLiteral",
                                                                                "src": "157:1:146",
                                                                                "type": "",
                                                                                "value": "1"
                                                                            }
                                                                        ],
                                                                        "functionName": {
                                                                            "name": "shl",
                                                                            "nodeType": "YulIdentifier",
                                                                            "src": "148:3:146"
                                                                        },
                                                                        "nodeType": "YulFunctionCall",
                                                                        "src": "148:11:146"
                                                                    },
                                                                    {
                                                                        "kind": "number",
                                                                        "nodeType": "YulLiteral",
                                                                        "src": "161:1:146",
                                                                        "type": "",
                                                                        "value": "1"
                                                                    }
                                                                ],
                                                                "functionName": {
                                                                    "name": "sub",
                                                                    "nodeType": "YulIdentifier",
                                                                    "src": "144:3:146"
                                                                },
                                                                "nodeType": "YulFunctionCall",
                                                                "src": "144:19:146"
                                                            }
                                                        ],
                                                        "functionName": {
                                                            "name": "and",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "133:3:146"
                                                        },
                                                        "nodeType": "YulFunctionCall",
                                                        "src": "133:31:146"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "eq",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "123:2:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "123:42:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "iszero",
                                            "nodeType": "YulIdentifier",
                                            "src": "116:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "116:50:146"
                                    },
                                    "nodeType": "YulIf",
                                    "src": "113:2:146"
                                }
                            ]
                        },
                        "name": "abi_decode_t_address",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "offset",
                                "nodeType": "YulTypedName",
                                "src": "44:6:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "value",
                                "nodeType": "YulTypedName",
                                "src": "55:5:146",
                                "type": ""
                            }
                        ],
                        "src": "14:175:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "264:128:146",
                            "statements": [
                                {
                                    "body": {
                                        "nodeType": "YulBlock",
                                        "src": "310:26:146",
                                        "statements": [
                                            {
                                                "expression": {
                                                    "arguments": [
                                                        {
                                                            "name": "value0",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "319:6:146"
                                                        },
                                                        {
                                                            "name": "value0",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "327:6:146"
                                                        }
                                                    ],
                                                    "functionName": {
                                                        "name": "revert",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "312:6:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "312:22:146"
                                                },
                                                "nodeType": "YulExpressionStatement",
                                                "src": "312:22:146"
                                            }
                                        ]
                                    },
                                    "condition": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "dataEnd",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "285:7:146"
                                                    },
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "294:9:146"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "sub",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "281:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "281:23:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "306:2:146",
                                                "type": "",
                                                "value": "32"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "slt",
                                            "nodeType": "YulIdentifier",
                                            "src": "277:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "277:32:146"
                                    },
                                    "nodeType": "YulIf",
                                    "src": "274:2:146"
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "345:41:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "376:9:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "abi_decode_t_address",
                                            "nodeType": "YulIdentifier",
                                            "src": "355:20:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "355:31:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "value0",
                                            "nodeType": "YulIdentifier",
                                            "src": "345:6:146"
                                        }
                                    ]
                                }
                            ]
                        },
                        "name": "abi_decode_tuple_t_address",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "230:9:146",
                                "type": ""
                            },
                            {
                                "name": "dataEnd",
                                "nodeType": "YulTypedName",
                                "src": "241:7:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "value0",
                                "nodeType": "YulTypedName",
                                "src": "253:6:146",
                                "type": ""
                            }
                        ],
                        "src": "194:198:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "484:187:146",
                            "statements": [
                                {
                                    "body": {
                                        "nodeType": "YulBlock",
                                        "src": "530:26:146",
                                        "statements": [
                                            {
                                                "expression": {
                                                    "arguments": [
                                                        {
                                                            "name": "value1",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "539:6:146"
                                                        },
                                                        {
                                                            "name": "value1",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "547:6:146"
                                                        }
                                                    ],
                                                    "functionName": {
                                                        "name": "revert",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "532:6:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "532:22:146"
                                                },
                                                "nodeType": "YulExpressionStatement",
                                                "src": "532:22:146"
                                            }
                                        ]
                                    },
                                    "condition": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "dataEnd",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "505:7:146"
                                                    },
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "514:9:146"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "sub",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "501:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "501:23:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "526:2:146",
                                                "type": "",
                                                "value": "64"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "slt",
                                            "nodeType": "YulIdentifier",
                                            "src": "497:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "497:32:146"
                                    },
                                    "nodeType": "YulIf",
                                    "src": "494:2:146"
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "565:41:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "596:9:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "abi_decode_t_address",
                                            "nodeType": "YulIdentifier",
                                            "src": "575:20:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "575:31:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "value0",
                                            "nodeType": "YulIdentifier",
                                            "src": "565:6:146"
                                        }
                                    ]
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "615:50:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "650:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "661:2:146",
                                                        "type": "",
                                                        "value": "32"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "646:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "646:18:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "abi_decode_t_address",
                                            "nodeType": "YulIdentifier",
                                            "src": "625:20:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "625:40:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "value1",
                                            "nodeType": "YulIdentifier",
                                            "src": "615:6:146"
                                        }
                                    ]
                                }
                            ]
                        },
                        "name": "abi_decode_tuple_t_addresst_address",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "442:9:146",
                                "type": ""
                            },
                            {
                                "name": "dataEnd",
                                "nodeType": "YulTypedName",
                                "src": "453:7:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "value0",
                                "nodeType": "YulTypedName",
                                "src": "465:6:146",
                                "type": ""
                            },
                            {
                                "name": "value1",
                                "nodeType": "YulTypedName",
                                "src": "473:6:146",
                                "type": ""
                            }
                        ],
                        "src": "397:274:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "780:238:146",
                            "statements": [
                                {
                                    "body": {
                                        "nodeType": "YulBlock",
                                        "src": "826:26:146",
                                        "statements": [
                                            {
                                                "expression": {
                                                    "arguments": [
                                                        {
                                                            "name": "value2",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "835:6:146"
                                                        },
                                                        {
                                                            "name": "value2",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "843:6:146"
                                                        }
                                                    ],
                                                    "functionName": {
                                                        "name": "revert",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "828:6:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "828:22:146"
                                                },
                                                "nodeType": "YulExpressionStatement",
                                                "src": "828:22:146"
                                            }
                                        ]
                                    },
                                    "condition": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "dataEnd",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "801:7:146"
                                                    },
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "810:9:146"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "sub",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "797:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "797:23:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "822:2:146",
                                                "type": "",
                                                "value": "96"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "slt",
                                            "nodeType": "YulIdentifier",
                                            "src": "793:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "793:32:146"
                                    },
                                    "nodeType": "YulIf",
                                    "src": "790:2:146"
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "861:41:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "892:9:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "abi_decode_t_address",
                                            "nodeType": "YulIdentifier",
                                            "src": "871:20:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "871:31:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "value0",
                                            "nodeType": "YulIdentifier",
                                            "src": "861:6:146"
                                        }
                                    ]
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "911:50:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "946:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "957:2:146",
                                                        "type": "",
                                                        "value": "32"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "942:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "942:18:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "abi_decode_t_address",
                                            "nodeType": "YulIdentifier",
                                            "src": "921:20:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "921:40:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "value1",
                                            "nodeType": "YulIdentifier",
                                            "src": "911:6:146"
                                        }
                                    ]
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "970:42:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "997:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "1008:2:146",
                                                        "type": "",
                                                        "value": "64"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "993:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "993:18:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "calldataload",
                                            "nodeType": "YulIdentifier",
                                            "src": "980:12:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "980:32:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "value2",
                                            "nodeType": "YulIdentifier",
                                            "src": "970:6:146"
                                        }
                                    ]
                                }
                            ]
                        },
                        "name": "abi_decode_tuple_t_addresst_addresst_uint256",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "730:9:146",
                                "type": ""
                            },
                            {
                                "name": "dataEnd",
                                "nodeType": "YulTypedName",
                                "src": "741:7:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "value0",
                                "nodeType": "YulTypedName",
                                "src": "753:6:146",
                                "type": ""
                            },
                            {
                                "name": "value1",
                                "nodeType": "YulTypedName",
                                "src": "761:6:146",
                                "type": ""
                            },
                            {
                                "name": "value2",
                                "nodeType": "YulTypedName",
                                "src": "769:6:146",
                                "type": ""
                            }
                        ],
                        "src": "676:342:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "1110:179:146",
                            "statements": [
                                {
                                    "body": {
                                        "nodeType": "YulBlock",
                                        "src": "1156:26:146",
                                        "statements": [
                                            {
                                                "expression": {
                                                    "arguments": [
                                                        {
                                                            "name": "value0",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "1165:6:146"
                                                        },
                                                        {
                                                            "name": "value0",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "1173:6:146"
                                                        }
                                                    ],
                                                    "functionName": {
                                                        "name": "revert",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "1158:6:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "1158:22:146"
                                                },
                                                "nodeType": "YulExpressionStatement",
                                                "src": "1158:22:146"
                                            }
                                        ]
                                    },
                                    "condition": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "dataEnd",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "1131:7:146"
                                                    },
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "1140:9:146"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "sub",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "1127:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "1127:23:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "1152:2:146",
                                                "type": "",
                                                "value": "64"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "slt",
                                            "nodeType": "YulIdentifier",
                                            "src": "1123:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "1123:32:146"
                                    },
                                    "nodeType": "YulIf",
                                    "src": "1120:2:146"
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "1191:41:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "1222:9:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "abi_decode_t_address",
                                            "nodeType": "YulIdentifier",
                                            "src": "1201:20:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "1201:31:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "value0",
                                            "nodeType": "YulIdentifier",
                                            "src": "1191:6:146"
                                        }
                                    ]
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "1241:42:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "1268:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "1279:2:146",
                                                        "type": "",
                                                        "value": "32"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "1264:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "1264:18:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "calldataload",
                                            "nodeType": "YulIdentifier",
                                            "src": "1251:12:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "1251:32:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "value1",
                                            "nodeType": "YulIdentifier",
                                            "src": "1241:6:146"
                                        }
                                    ]
                                }
                            ]
                        },
                        "name": "abi_decode_tuple_t_addresst_uint256",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "1068:9:146",
                                "type": ""
                            },
                            {
                                "name": "dataEnd",
                                "nodeType": "YulTypedName",
                                "src": "1079:7:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "value0",
                                "nodeType": "YulTypedName",
                                "src": "1091:6:146",
                                "type": ""
                            },
                            {
                                "name": "value1",
                                "nodeType": "YulTypedName",
                                "src": "1099:6:146",
                                "type": ""
                            }
                        ],
                        "src": "1023:266:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "1395:102:146",
                            "statements": [
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "1405:26:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "1417:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "1428:2:146",
                                                "type": "",
                                                "value": "32"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "add",
                                            "nodeType": "YulIdentifier",
                                            "src": "1413:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "1413:18:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "tail",
                                            "nodeType": "YulIdentifier",
                                            "src": "1405:4:146"
                                        }
                                    ]
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "1447:9:146"
                                            },
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "value0",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "1462:6:146"
                                                    },
                                                    {
                                                        "arguments": [
                                                            {
                                                                "arguments": [
                                                                    {
                                                                        "kind": "number",
                                                                        "nodeType": "YulLiteral",
                                                                        "src": "1478:3:146",
                                                                        "type": "",
                                                                        "value": "160"
                                                                    },
                                                                    {
                                                                        "kind": "number",
                                                                        "nodeType": "YulLiteral",
                                                                        "src": "1483:1:146",
                                                                        "type": "",
                                                                        "value": "1"
                                                                    }
                                                                ],
                                                                "functionName": {
                                                                    "name": "shl",
                                                                    "nodeType": "YulIdentifier",
                                                                    "src": "1474:3:146"
                                                                },
                                                                "nodeType": "YulFunctionCall",
                                                                "src": "1474:11:146"
                                                            },
                                                            {
                                                                "kind": "number",
                                                                "nodeType": "YulLiteral",
                                                                "src": "1487:1:146",
                                                                "type": "",
                                                                "value": "1"
                                                            }
                                                        ],
                                                        "functionName": {
                                                            "name": "sub",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "1470:3:146"
                                                        },
                                                        "nodeType": "YulFunctionCall",
                                                        "src": "1470:19:146"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "and",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "1458:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "1458:32:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "1440:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "1440:51:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "1440:51:146"
                                }
                            ]
                        },
                        "name": "abi_encode_tuple_t_address__to_t_address__fromStack_reversed",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "1364:9:146",
                                "type": ""
                            },
                            {
                                "name": "value0",
                                "nodeType": "YulTypedName",
                                "src": "1375:6:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "tail",
                                "nodeType": "YulTypedName",
                                "src": "1386:4:146",
                                "type": ""
                            }
                        ],
                        "src": "1294:203:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "1597:92:146",
                            "statements": [
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "1607:26:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "1619:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "1630:2:146",
                                                "type": "",
                                                "value": "32"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "add",
                                            "nodeType": "YulIdentifier",
                                            "src": "1615:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "1615:18:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "tail",
                                            "nodeType": "YulIdentifier",
                                            "src": "1607:4:146"
                                        }
                                    ]
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "1649:9:146"
                                            },
                                            {
                                                "arguments": [
                                                    {
                                                        "arguments": [
                                                            {
                                                                "name": "value0",
                                                                "nodeType": "YulIdentifier",
                                                                "src": "1674:6:146"
                                                            }
                                                        ],
                                                        "functionName": {
                                                            "name": "iszero",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "1667:6:146"
                                                        },
                                                        "nodeType": "YulFunctionCall",
                                                        "src": "1667:14:146"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "iszero",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "1660:6:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "1660:22:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "1642:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "1642:41:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "1642:41:146"
                                }
                            ]
                        },
                        "name": "abi_encode_tuple_t_bool__to_t_bool__fromStack_reversed",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "1566:9:146",
                                "type": ""
                            },
                            {
                                "name": "value0",
                                "nodeType": "YulTypedName",
                                "src": "1577:6:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "tail",
                                "nodeType": "YulTypedName",
                                "src": "1588:4:146",
                                "type": ""
                            }
                        ],
                        "src": "1502:187:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "1815:482:146",
                            "statements": [
                                {
                                    "nodeType": "YulVariableDeclaration",
                                    "src": "1825:12:146",
                                    "value": {
                                        "kind": "number",
                                        "nodeType": "YulLiteral",
                                        "src": "1835:2:146",
                                        "type": "",
                                        "value": "32"
                                    },
                                    "variables": [
                                        {
                                            "name": "_1",
                                            "nodeType": "YulTypedName",
                                            "src": "1829:2:146",
                                            "type": ""
                                        }
                                    ]
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "1853:9:146"
                                            },
                                            {
                                                "name": "_1",
                                                "nodeType": "YulIdentifier",
                                                "src": "1864:2:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "1846:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "1846:21:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "1846:21:146"
                                },
                                {
                                    "nodeType": "YulVariableDeclaration",
                                    "src": "1876:27:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "value0",
                                                "nodeType": "YulIdentifier",
                                                "src": "1896:6:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mload",
                                            "nodeType": "YulIdentifier",
                                            "src": "1890:5:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "1890:13:146"
                                    },
                                    "variables": [
                                        {
                                            "name": "length",
                                            "nodeType": "YulTypedName",
                                            "src": "1880:6:146",
                                            "type": ""
                                        }
                                    ]
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "1923:9:146"
                                                    },
                                                    {
                                                        "name": "_1",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "1934:2:146"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "1919:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "1919:18:146"
                                            },
                                            {
                                                "name": "length",
                                                "nodeType": "YulIdentifier",
                                                "src": "1939:6:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "1912:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "1912:34:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "1912:34:146"
                                },
                                {
                                    "nodeType": "YulVariableDeclaration",
                                    "src": "1955:13:146",
                                    "value": {
                                        "name": "tail",
                                        "nodeType": "YulIdentifier",
                                        "src": "1964:4:146"
                                    },
                                    "variables": [
                                        {
                                            "name": "i",
                                            "nodeType": "YulTypedName",
                                            "src": "1959:1:146",
                                            "type": ""
                                        }
                                    ]
                                },
                                {
                                    "body": {
                                        "nodeType": "YulBlock",
                                        "src": "2027:90:146",
                                        "statements": [
                                            {
                                                "expression": {
                                                    "arguments": [
                                                        {
                                                            "arguments": [
                                                                {
                                                                    "arguments": [
                                                                        {
                                                                            "name": "headStart",
                                                                            "nodeType": "YulIdentifier",
                                                                            "src": "2056:9:146"
                                                                        },
                                                                        {
                                                                            "name": "i",
                                                                            "nodeType": "YulIdentifier",
                                                                            "src": "2067:1:146"
                                                                        }
                                                                    ],
                                                                    "functionName": {
                                                                        "name": "add",
                                                                        "nodeType": "YulIdentifier",
                                                                        "src": "2052:3:146"
                                                                    },
                                                                    "nodeType": "YulFunctionCall",
                                                                    "src": "2052:17:146"
                                                                },
                                                                {
                                                                    "kind": "number",
                                                                    "nodeType": "YulLiteral",
                                                                    "src": "2071:2:146",
                                                                    "type": "",
                                                                    "value": "64"
                                                                }
                                                            ],
                                                            "functionName": {
                                                                "name": "add",
                                                                "nodeType": "YulIdentifier",
                                                                "src": "2048:3:146"
                                                            },
                                                            "nodeType": "YulFunctionCall",
                                                            "src": "2048:26:146"
                                                        },
                                                        {
                                                            "arguments": [
                                                                {
                                                                    "arguments": [
                                                                        {
                                                                            "arguments": [
                                                                                {
                                                                                    "name": "value0",
                                                                                    "nodeType": "YulIdentifier",
                                                                                    "src": "2090:6:146"
                                                                                },
                                                                                {
                                                                                    "name": "i",
                                                                                    "nodeType": "YulIdentifier",
                                                                                    "src": "2098:1:146"
                                                                                }
                                                                            ],
                                                                            "functionName": {
                                                                                "name": "add",
                                                                                "nodeType": "YulIdentifier",
                                                                                "src": "2086:3:146"
                                                                            },
                                                                            "nodeType": "YulFunctionCall",
                                                                            "src": "2086:14:146"
                                                                        },
                                                                        {
                                                                            "name": "_1",
                                                                            "nodeType": "YulIdentifier",
                                                                            "src": "2102:2:146"
                                                                        }
                                                                    ],
                                                                    "functionName": {
                                                                        "name": "add",
                                                                        "nodeType": "YulIdentifier",
                                                                        "src": "2082:3:146"
                                                                    },
                                                                    "nodeType": "YulFunctionCall",
                                                                    "src": "2082:23:146"
                                                                }
                                                            ],
                                                            "functionName": {
                                                                "name": "mload",
                                                                "nodeType": "YulIdentifier",
                                                                "src": "2076:5:146"
                                                            },
                                                            "nodeType": "YulFunctionCall",
                                                            "src": "2076:30:146"
                                                        }
                                                    ],
                                                    "functionName": {
                                                        "name": "mstore",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "2041:6:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "2041:66:146"
                                                },
                                                "nodeType": "YulExpressionStatement",
                                                "src": "2041:66:146"
                                            }
                                        ]
                                    },
                                    "condition": {
                                        "arguments": [
                                            {
                                                "name": "i",
                                                "nodeType": "YulIdentifier",
                                                "src": "1988:1:146"
                                            },
                                            {
                                                "name": "length",
                                                "nodeType": "YulIdentifier",
                                                "src": "1991:6:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "lt",
                                            "nodeType": "YulIdentifier",
                                            "src": "1985:2:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "1985:13:146"
                                    },
                                    "nodeType": "YulForLoop",
                                    "post": {
                                        "nodeType": "YulBlock",
                                        "src": "1999:19:146",
                                        "statements": [
                                            {
                                                "nodeType": "YulAssignment",
                                                "src": "2001:15:146",
                                                "value": {
                                                    "arguments": [
                                                        {
                                                            "name": "i",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "2010:1:146"
                                                        },
                                                        {
                                                            "name": "_1",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "2013:2:146"
                                                        }
                                                    ],
                                                    "functionName": {
                                                        "name": "add",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "2006:3:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "2006:10:146"
                                                },
                                                "variableNames": [
                                                    {
                                                        "name": "i",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "2001:1:146"
                                                    }
                                                ]
                                            }
                                        ]
                                    },
                                    "pre": {
                                        "nodeType": "YulBlock",
                                        "src": "1981:3:146",
                                        "statements": []
                                    },
                                    "src": "1977:140:146"
                                },
                                {
                                    "body": {
                                        "nodeType": "YulBlock",
                                        "src": "2151:69:146",
                                        "statements": [
                                            {
                                                "expression": {
                                                    "arguments": [
                                                        {
                                                            "arguments": [
                                                                {
                                                                    "arguments": [
                                                                        {
                                                                            "name": "headStart",
                                                                            "nodeType": "YulIdentifier",
                                                                            "src": "2180:9:146"
                                                                        },
                                                                        {
                                                                            "name": "length",
                                                                            "nodeType": "YulIdentifier",
                                                                            "src": "2191:6:146"
                                                                        }
                                                                    ],
                                                                    "functionName": {
                                                                        "name": "add",
                                                                        "nodeType": "YulIdentifier",
                                                                        "src": "2176:3:146"
                                                                    },
                                                                    "nodeType": "YulFunctionCall",
                                                                    "src": "2176:22:146"
                                                                },
                                                                {
                                                                    "kind": "number",
                                                                    "nodeType": "YulLiteral",
                                                                    "src": "2200:2:146",
                                                                    "type": "",
                                                                    "value": "64"
                                                                }
                                                            ],
                                                            "functionName": {
                                                                "name": "add",
                                                                "nodeType": "YulIdentifier",
                                                                "src": "2172:3:146"
                                                            },
                                                            "nodeType": "YulFunctionCall",
                                                            "src": "2172:31:146"
                                                        },
                                                        {
                                                            "name": "tail",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "2205:4:146"
                                                        }
                                                    ],
                                                    "functionName": {
                                                        "name": "mstore",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "2165:6:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "2165:45:146"
                                                },
                                                "nodeType": "YulExpressionStatement",
                                                "src": "2165:45:146"
                                            }
                                        ]
                                    },
                                    "condition": {
                                        "arguments": [
                                            {
                                                "name": "i",
                                                "nodeType": "YulIdentifier",
                                                "src": "2132:1:146"
                                            },
                                            {
                                                "name": "length",
                                                "nodeType": "YulIdentifier",
                                                "src": "2135:6:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "gt",
                                            "nodeType": "YulIdentifier",
                                            "src": "2129:2:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "2129:13:146"
                                    },
                                    "nodeType": "YulIf",
                                    "src": "2126:2:146"
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "2229:62:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "2245:9:146"
                                                    },
                                                    {
                                                        "arguments": [
                                                            {
                                                                "arguments": [
                                                                    {
                                                                        "name": "length",
                                                                        "nodeType": "YulIdentifier",
                                                                        "src": "2264:6:146"
                                                                    },
                                                                    {
                                                                        "kind": "number",
                                                                        "nodeType": "YulLiteral",
                                                                        "src": "2272:2:146",
                                                                        "type": "",
                                                                        "value": "31"
                                                                    }
                                                                ],
                                                                "functionName": {
                                                                    "name": "add",
                                                                    "nodeType": "YulIdentifier",
                                                                    "src": "2260:3:146"
                                                                },
                                                                "nodeType": "YulFunctionCall",
                                                                "src": "2260:15:146"
                                                            },
                                                            {
                                                                "arguments": [
                                                                    {
                                                                        "kind": "number",
                                                                        "nodeType": "YulLiteral",
                                                                        "src": "2281:2:146",
                                                                        "type": "",
                                                                        "value": "31"
                                                                    }
                                                                ],
                                                                "functionName": {
                                                                    "name": "not",
                                                                    "nodeType": "YulIdentifier",
                                                                    "src": "2277:3:146"
                                                                },
                                                                "nodeType": "YulFunctionCall",
                                                                "src": "2277:7:146"
                                                            }
                                                        ],
                                                        "functionName": {
                                                            "name": "and",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "2256:3:146"
                                                        },
                                                        "nodeType": "YulFunctionCall",
                                                        "src": "2256:29:146"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "2241:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "2241:45:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "2288:2:146",
                                                "type": "",
                                                "value": "64"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "add",
                                            "nodeType": "YulIdentifier",
                                            "src": "2237:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "2237:54:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "tail",
                                            "nodeType": "YulIdentifier",
                                            "src": "2229:4:146"
                                        }
                                    ]
                                }
                            ]
                        },
                        "name": "abi_encode_tuple_t_string_memory_ptr__to_t_string_memory_ptr__fromStack_reversed",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "1784:9:146",
                                "type": ""
                            },
                            {
                                "name": "value0",
                                "nodeType": "YulTypedName",
                                "src": "1795:6:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "tail",
                                "nodeType": "YulTypedName",
                                "src": "1806:4:146",
                                "type": ""
                            }
                        ],
                        "src": "1694:603:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "2476:225:146",
                            "statements": [
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "2493:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "2504:2:146",
                                                "type": "",
                                                "value": "32"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "2486:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "2486:21:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "2486:21:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "2527:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "2538:2:146",
                                                        "type": "",
                                                        "value": "32"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "2523:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "2523:18:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "2543:2:146",
                                                "type": "",
                                                "value": "35"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "2516:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "2516:30:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "2516:30:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "2566:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "2577:2:146",
                                                        "type": "",
                                                        "value": "64"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "2562:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "2562:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "2582:34:146",
                                                "type": "",
                                                "value": "ERC20: transfer to the zero addr"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "2555:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "2555:62:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "2555:62:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "2637:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "2648:2:146",
                                                        "type": "",
                                                        "value": "96"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "2633:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "2633:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "2653:5:146",
                                                "type": "",
                                                "value": "ess"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "2626:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "2626:33:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "2626:33:146"
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "2668:27:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "2680:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "2691:3:146",
                                                "type": "",
                                                "value": "128"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "add",
                                            "nodeType": "YulIdentifier",
                                            "src": "2676:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "2676:19:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "tail",
                                            "nodeType": "YulIdentifier",
                                            "src": "2668:4:146"
                                        }
                                    ]
                                }
                            ]
                        },
                        "name": "abi_encode_tuple_t_stringliteral_0557e210f7a69a685100a7e4e3d0a7024c546085cee28910fd17d0b081d9516f__to_t_string_memory_ptr__fromStack_reversed",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "2453:9:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "tail",
                                "nodeType": "YulTypedName",
                                "src": "2467:4:146",
                                "type": ""
                            }
                        ],
                        "src": "2302:399:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "2880:224:146",
                            "statements": [
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "2897:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "2908:2:146",
                                                "type": "",
                                                "value": "32"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "2890:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "2890:21:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "2890:21:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "2931:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "2942:2:146",
                                                        "type": "",
                                                        "value": "32"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "2927:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "2927:18:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "2947:2:146",
                                                "type": "",
                                                "value": "34"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "2920:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "2920:30:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "2920:30:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "2970:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "2981:2:146",
                                                        "type": "",
                                                        "value": "64"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "2966:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "2966:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "2986:34:146",
                                                "type": "",
                                                "value": "ERC20: burn amount exceeds balan"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "2959:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "2959:62:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "2959:62:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "3041:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "3052:2:146",
                                                        "type": "",
                                                        "value": "96"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "3037:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "3037:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "3057:4:146",
                                                "type": "",
                                                "value": "ce"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "3030:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "3030:32:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "3030:32:146"
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "3071:27:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "3083:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "3094:3:146",
                                                "type": "",
                                                "value": "128"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "add",
                                            "nodeType": "YulIdentifier",
                                            "src": "3079:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "3079:19:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "tail",
                                            "nodeType": "YulIdentifier",
                                            "src": "3071:4:146"
                                        }
                                    ]
                                }
                            ]
                        },
                        "name": "abi_encode_tuple_t_stringliteral_149b126e7125232b4200af45303d04fba8b74653b1a295a6a561a528c33fefdd__to_t_string_memory_ptr__fromStack_reversed",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "2857:9:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "tail",
                                "nodeType": "YulTypedName",
                                "src": "2871:4:146",
                                "type": ""
                            }
                        ],
                        "src": "2706:398:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "3283:224:146",
                            "statements": [
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "3300:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "3311:2:146",
                                                "type": "",
                                                "value": "32"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "3293:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "3293:21:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "3293:21:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "3334:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "3345:2:146",
                                                        "type": "",
                                                        "value": "32"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "3330:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "3330:18:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "3350:2:146",
                                                "type": "",
                                                "value": "34"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "3323:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "3323:30:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "3323:30:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "3373:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "3384:2:146",
                                                        "type": "",
                                                        "value": "64"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "3369:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "3369:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "3389:34:146",
                                                "type": "",
                                                "value": "ERC20: approve to the zero addre"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "3362:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "3362:62:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "3362:62:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "3444:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "3455:2:146",
                                                        "type": "",
                                                        "value": "96"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "3440:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "3440:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "3460:4:146",
                                                "type": "",
                                                "value": "ss"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "3433:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "3433:32:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "3433:32:146"
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "3474:27:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "3486:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "3497:3:146",
                                                "type": "",
                                                "value": "128"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "add",
                                            "nodeType": "YulIdentifier",
                                            "src": "3482:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "3482:19:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "tail",
                                            "nodeType": "YulIdentifier",
                                            "src": "3474:4:146"
                                        }
                                    ]
                                }
                            ]
                        },
                        "name": "abi_encode_tuple_t_stringliteral_24883cc5fe64ace9d0df1893501ecb93c77180f0ff69cca79affb3c316dc8029__to_t_string_memory_ptr__fromStack_reversed",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "3260:9:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "tail",
                                "nodeType": "YulTypedName",
                                "src": "3274:4:146",
                                "type": ""
                            }
                        ],
                        "src": "3109:398:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "3686:228:146",
                            "statements": [
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "3703:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "3714:2:146",
                                                "type": "",
                                                "value": "32"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "3696:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "3696:21:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "3696:21:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "3737:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "3748:2:146",
                                                        "type": "",
                                                        "value": "32"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "3733:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "3733:18:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "3753:2:146",
                                                "type": "",
                                                "value": "38"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "3726:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "3726:30:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "3726:30:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "3776:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "3787:2:146",
                                                        "type": "",
                                                        "value": "64"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "3772:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "3772:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "3792:34:146",
                                                "type": "",
                                                "value": "ERC20: transfer amount exceeds b"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "3765:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "3765:62:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "3765:62:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "3847:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "3858:2:146",
                                                        "type": "",
                                                        "value": "96"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "3843:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "3843:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "3863:8:146",
                                                "type": "",
                                                "value": "alance"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "3836:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "3836:36:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "3836:36:146"
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "3881:27:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "3893:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "3904:3:146",
                                                "type": "",
                                                "value": "128"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "add",
                                            "nodeType": "YulIdentifier",
                                            "src": "3889:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "3889:19:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "tail",
                                            "nodeType": "YulIdentifier",
                                            "src": "3881:4:146"
                                        }
                                    ]
                                }
                            ]
                        },
                        "name": "abi_encode_tuple_t_stringliteral_4107e8a8b9e94bf8ff83080ddec1c0bffe897ebc2241b89d44f66b3d274088b6__to_t_string_memory_ptr__fromStack_reversed",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "3663:9:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "tail",
                                "nodeType": "YulTypedName",
                                "src": "3677:4:146",
                                "type": ""
                            }
                        ],
                        "src": "3512:402:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "4093:230:146",
                            "statements": [
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "4110:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "4121:2:146",
                                                "type": "",
                                                "value": "32"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "4103:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "4103:21:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "4103:21:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "4144:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "4155:2:146",
                                                        "type": "",
                                                        "value": "32"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "4140:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "4140:18:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "4160:2:146",
                                                "type": "",
                                                "value": "40"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "4133:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "4133:30:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "4133:30:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "4183:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "4194:2:146",
                                                        "type": "",
                                                        "value": "64"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "4179:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "4179:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "4199:34:146",
                                                "type": "",
                                                "value": "ERC20: transfer amount exceeds a"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "4172:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "4172:62:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "4172:62:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "4254:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "4265:2:146",
                                                        "type": "",
                                                        "value": "96"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "4250:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "4250:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "4270:10:146",
                                                "type": "",
                                                "value": "llowance"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "4243:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "4243:38:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "4243:38:146"
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "4290:27:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "4302:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "4313:3:146",
                                                "type": "",
                                                "value": "128"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "add",
                                            "nodeType": "YulIdentifier",
                                            "src": "4298:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "4298:19:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "tail",
                                            "nodeType": "YulIdentifier",
                                            "src": "4290:4:146"
                                        }
                                    ]
                                }
                            ]
                        },
                        "name": "abi_encode_tuple_t_stringliteral_974d1b4421da69cc60b481194f0dad36a5bb4e23da810da7a7fb30cdba178330__to_t_string_memory_ptr__fromStack_reversed",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "4070:9:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "tail",
                                "nodeType": "YulTypedName",
                                "src": "4084:4:146",
                                "type": ""
                            }
                        ],
                        "src": "3919:404:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "4502:223:146",
                            "statements": [
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "4519:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "4530:2:146",
                                                "type": "",
                                                "value": "32"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "4512:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "4512:21:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "4512:21:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "4553:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "4564:2:146",
                                                        "type": "",
                                                        "value": "32"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "4549:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "4549:18:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "4569:2:146",
                                                "type": "",
                                                "value": "33"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "4542:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "4542:30:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "4542:30:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "4592:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "4603:2:146",
                                                        "type": "",
                                                        "value": "64"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "4588:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "4588:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "4608:34:146",
                                                "type": "",
                                                "value": "ERC20: burn from the zero addres"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "4581:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "4581:62:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "4581:62:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "4663:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "4674:2:146",
                                                        "type": "",
                                                        "value": "96"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "4659:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "4659:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "4679:3:146",
                                                "type": "",
                                                "value": "s"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "4652:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "4652:31:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "4652:31:146"
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "4692:27:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "4704:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "4715:3:146",
                                                "type": "",
                                                "value": "128"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "add",
                                            "nodeType": "YulIdentifier",
                                            "src": "4700:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "4700:19:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "tail",
                                            "nodeType": "YulIdentifier",
                                            "src": "4692:4:146"
                                        }
                                    ]
                                }
                            ]
                        },
                        "name": "abi_encode_tuple_t_stringliteral_b16788493b576042bb52c50ed56189e0b250db113c7bfb1c3897d25cf9632d7f__to_t_string_memory_ptr__fromStack_reversed",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "4479:9:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "tail",
                                "nodeType": "YulTypedName",
                                "src": "4493:4:146",
                                "type": ""
                            }
                        ],
                        "src": "4328:397:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "4904:227:146",
                            "statements": [
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "4921:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "4932:2:146",
                                                "type": "",
                                                "value": "32"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "4914:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "4914:21:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "4914:21:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "4955:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "4966:2:146",
                                                        "type": "",
                                                        "value": "32"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "4951:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "4951:18:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "4971:2:146",
                                                "type": "",
                                                "value": "37"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "4944:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "4944:30:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "4944:30:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "4994:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "5005:2:146",
                                                        "type": "",
                                                        "value": "64"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "4990:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "4990:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "5010:34:146",
                                                "type": "",
                                                "value": "ERC20: transfer from the zero ad"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "4983:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "4983:62:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "4983:62:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "5065:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "5076:2:146",
                                                        "type": "",
                                                        "value": "96"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "5061:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "5061:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "5081:7:146",
                                                "type": "",
                                                "value": "dress"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "5054:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "5054:35:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "5054:35:146"
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "5098:27:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "5110:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "5121:3:146",
                                                "type": "",
                                                "value": "128"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "add",
                                            "nodeType": "YulIdentifier",
                                            "src": "5106:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "5106:19:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "tail",
                                            "nodeType": "YulIdentifier",
                                            "src": "5098:4:146"
                                        }
                                    ]
                                }
                            ]
                        },
                        "name": "abi_encode_tuple_t_stringliteral_baecc556b46f4ed0f2b4cb599d60785ac8563dd2dc0a5bf12edea1c39e5e1fea__to_t_string_memory_ptr__fromStack_reversed",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "4881:9:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "tail",
                                "nodeType": "YulTypedName",
                                "src": "4895:4:146",
                                "type": ""
                            }
                        ],
                        "src": "4730:401:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "5310:226:146",
                            "statements": [
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "5327:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "5338:2:146",
                                                "type": "",
                                                "value": "32"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "5320:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "5320:21:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "5320:21:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "5361:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "5372:2:146",
                                                        "type": "",
                                                        "value": "32"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "5357:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "5357:18:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "5377:2:146",
                                                "type": "",
                                                "value": "36"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "5350:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "5350:30:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "5350:30:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "5400:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "5411:2:146",
                                                        "type": "",
                                                        "value": "64"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "5396:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "5396:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "5416:34:146",
                                                "type": "",
                                                "value": "ERC20: approve from the zero add"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "5389:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "5389:62:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "5389:62:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "5471:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "5482:2:146",
                                                        "type": "",
                                                        "value": "96"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "5467:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "5467:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "5487:6:146",
                                                "type": "",
                                                "value": "ress"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "5460:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "5460:34:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "5460:34:146"
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "5503:27:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "5515:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "5526:3:146",
                                                "type": "",
                                                "value": "128"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "add",
                                            "nodeType": "YulIdentifier",
                                            "src": "5511:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "5511:19:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "tail",
                                            "nodeType": "YulIdentifier",
                                            "src": "5503:4:146"
                                        }
                                    ]
                                }
                            ]
                        },
                        "name": "abi_encode_tuple_t_stringliteral_c953f4879035ed60e766b34720f656aab5c697b141d924c283124ecedb91c208__to_t_string_memory_ptr__fromStack_reversed",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "5287:9:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "tail",
                                "nodeType": "YulTypedName",
                                "src": "5301:4:146",
                                "type": ""
                            }
                        ],
                        "src": "5136:400:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "5715:227:146",
                            "statements": [
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "5732:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "5743:2:146",
                                                "type": "",
                                                "value": "32"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "5725:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "5725:21:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "5725:21:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "5766:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "5777:2:146",
                                                        "type": "",
                                                        "value": "32"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "5762:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "5762:18:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "5782:2:146",
                                                "type": "",
                                                "value": "37"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "5755:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "5755:30:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "5755:30:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "5805:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "5816:2:146",
                                                        "type": "",
                                                        "value": "64"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "5801:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "5801:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "5821:34:146",
                                                "type": "",
                                                "value": "ERC20: decreased allowance below"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "5794:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "5794:62:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "5794:62:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "5876:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "5887:2:146",
                                                        "type": "",
                                                        "value": "96"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "5872:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "5872:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "5892:7:146",
                                                "type": "",
                                                "value": " zero"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "5865:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "5865:35:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "5865:35:146"
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "5909:27:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "5921:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "5932:3:146",
                                                "type": "",
                                                "value": "128"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "add",
                                            "nodeType": "YulIdentifier",
                                            "src": "5917:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "5917:19:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "tail",
                                            "nodeType": "YulIdentifier",
                                            "src": "5909:4:146"
                                        }
                                    ]
                                }
                            ]
                        },
                        "name": "abi_encode_tuple_t_stringliteral_f8b476f7d28209d77d4a4ac1fe36b9f8259aa1bb6bddfa6e89de7e51615cf8a8__to_t_string_memory_ptr__fromStack_reversed",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "5692:9:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "tail",
                                "nodeType": "YulTypedName",
                                "src": "5706:4:146",
                                "type": ""
                            }
                        ],
                        "src": "5541:401:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "6121:181:146",
                            "statements": [
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "6138:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "6149:2:146",
                                                "type": "",
                                                "value": "32"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "6131:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "6131:21:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "6131:21:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "6172:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "6183:2:146",
                                                        "type": "",
                                                        "value": "32"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "6168:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "6168:18:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "6188:2:146",
                                                "type": "",
                                                "value": "31"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "6161:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "6161:30:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "6161:30:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "headStart",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "6211:9:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "6222:2:146",
                                                        "type": "",
                                                        "value": "64"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "add",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "6207:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "6207:18:146"
                                            },
                                            {
                                                "kind": "string",
                                                "nodeType": "YulLiteral",
                                                "src": "6227:33:146",
                                                "type": "",
                                                "value": "ERC20: mint to the zero address"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "6200:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "6200:61:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "6200:61:146"
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "6270:26:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "6282:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "6293:2:146",
                                                "type": "",
                                                "value": "96"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "add",
                                            "nodeType": "YulIdentifier",
                                            "src": "6278:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "6278:18:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "tail",
                                            "nodeType": "YulIdentifier",
                                            "src": "6270:4:146"
                                        }
                                    ]
                                }
                            ]
                        },
                        "name": "abi_encode_tuple_t_stringliteral_fc0b381caf0a47702017f3c4b358ebe3d3aff6c60ce819a8bf3ef5a95d4f202e__to_t_string_memory_ptr__fromStack_reversed",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "6098:9:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "tail",
                                "nodeType": "YulTypedName",
                                "src": "6112:4:146",
                                "type": ""
                            }
                        ],
                        "src": "5947:355:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "6408:76:146",
                            "statements": [
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "6418:26:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "6430:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "6441:2:146",
                                                "type": "",
                                                "value": "32"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "add",
                                            "nodeType": "YulIdentifier",
                                            "src": "6426:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "6426:18:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "tail",
                                            "nodeType": "YulIdentifier",
                                            "src": "6418:4:146"
                                        }
                                    ]
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "6460:9:146"
                                            },
                                            {
                                                "name": "value0",
                                                "nodeType": "YulIdentifier",
                                                "src": "6471:6:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "6453:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "6453:25:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "6453:25:146"
                                }
                            ]
                        },
                        "name": "abi_encode_tuple_t_uint256__to_t_uint256__fromStack_reversed",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "6377:9:146",
                                "type": ""
                            },
                            {
                                "name": "value0",
                                "nodeType": "YulTypedName",
                                "src": "6388:6:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "tail",
                                "nodeType": "YulTypedName",
                                "src": "6399:4:146",
                                "type": ""
                            }
                        ],
                        "src": "6307:177:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "6586:87:146",
                            "statements": [
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "6596:26:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "6608:9:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "6619:2:146",
                                                "type": "",
                                                "value": "32"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "add",
                                            "nodeType": "YulIdentifier",
                                            "src": "6604:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "6604:18:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "tail",
                                            "nodeType": "YulIdentifier",
                                            "src": "6596:4:146"
                                        }
                                    ]
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "name": "headStart",
                                                "nodeType": "YulIdentifier",
                                                "src": "6638:9:146"
                                            },
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "value0",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "6653:6:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "6661:4:146",
                                                        "type": "",
                                                        "value": "0xff"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "and",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "6649:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "6649:17:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "6631:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "6631:36:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "6631:36:146"
                                }
                            ]
                        },
                        "name": "abi_encode_tuple_t_uint8__to_t_uint8__fromStack_reversed",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "headStart",
                                "nodeType": "YulTypedName",
                                "src": "6555:9:146",
                                "type": ""
                            },
                            {
                                "name": "value0",
                                "nodeType": "YulTypedName",
                                "src": "6566:6:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "tail",
                                "nodeType": "YulTypedName",
                                "src": "6577:4:146",
                                "type": ""
                            }
                        ],
                        "src": "6489:184:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "6726:80:146",
                            "statements": [
                                {
                                    "body": {
                                        "nodeType": "YulBlock",
                                        "src": "6753:22:146",
                                        "statements": [
                                            {
                                                "expression": {
                                                    "arguments": [],
                                                    "functionName": {
                                                        "name": "panic_error_0x11",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "6755:16:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "6755:18:146"
                                                },
                                                "nodeType": "YulExpressionStatement",
                                                "src": "6755:18:146"
                                            }
                                        ]
                                    },
                                    "condition": {
                                        "arguments": [
                                            {
                                                "name": "x",
                                                "nodeType": "YulIdentifier",
                                                "src": "6742:1:146"
                                            },
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "y",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "6749:1:146"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "not",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "6745:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "6745:6:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "gt",
                                            "nodeType": "YulIdentifier",
                                            "src": "6739:2:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "6739:13:146"
                                    },
                                    "nodeType": "YulIf",
                                    "src": "6736:2:146"
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "6784:16:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "x",
                                                "nodeType": "YulIdentifier",
                                                "src": "6795:1:146"
                                            },
                                            {
                                                "name": "y",
                                                "nodeType": "YulIdentifier",
                                                "src": "6798:1:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "add",
                                            "nodeType": "YulIdentifier",
                                            "src": "6791:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "6791:9:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "sum",
                                            "nodeType": "YulIdentifier",
                                            "src": "6784:3:146"
                                        }
                                    ]
                                }
                            ]
                        },
                        "name": "checked_add_t_uint256",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "x",
                                "nodeType": "YulTypedName",
                                "src": "6709:1:146",
                                "type": ""
                            },
                            {
                                "name": "y",
                                "nodeType": "YulTypedName",
                                "src": "6712:1:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "sum",
                                "nodeType": "YulTypedName",
                                "src": "6718:3:146",
                                "type": ""
                            }
                        ],
                        "src": "6678:128:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "6860:76:146",
                            "statements": [
                                {
                                    "body": {
                                        "nodeType": "YulBlock",
                                        "src": "6882:22:146",
                                        "statements": [
                                            {
                                                "expression": {
                                                    "arguments": [],
                                                    "functionName": {
                                                        "name": "panic_error_0x11",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "6884:16:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "6884:18:146"
                                                },
                                                "nodeType": "YulExpressionStatement",
                                                "src": "6884:18:146"
                                            }
                                        ]
                                    },
                                    "condition": {
                                        "arguments": [
                                            {
                                                "name": "x",
                                                "nodeType": "YulIdentifier",
                                                "src": "6876:1:146"
                                            },
                                            {
                                                "name": "y",
                                                "nodeType": "YulIdentifier",
                                                "src": "6879:1:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "lt",
                                            "nodeType": "YulIdentifier",
                                            "src": "6873:2:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "6873:8:146"
                                    },
                                    "nodeType": "YulIf",
                                    "src": "6870:2:146"
                                },
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "6913:17:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "x",
                                                "nodeType": "YulIdentifier",
                                                "src": "6925:1:146"
                                            },
                                            {
                                                "name": "y",
                                                "nodeType": "YulIdentifier",
                                                "src": "6928:1:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "sub",
                                            "nodeType": "YulIdentifier",
                                            "src": "6921:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "6921:9:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "diff",
                                            "nodeType": "YulIdentifier",
                                            "src": "6913:4:146"
                                        }
                                    ]
                                }
                            ]
                        },
                        "name": "checked_sub_t_uint256",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "x",
                                "nodeType": "YulTypedName",
                                "src": "6842:1:146",
                                "type": ""
                            },
                            {
                                "name": "y",
                                "nodeType": "YulTypedName",
                                "src": "6845:1:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "diff",
                                "nodeType": "YulTypedName",
                                "src": "6851:4:146",
                                "type": ""
                            }
                        ],
                        "src": "6811:125:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "6996:325:146",
                            "statements": [
                                {
                                    "nodeType": "YulAssignment",
                                    "src": "7006:22:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "data",
                                                "nodeType": "YulIdentifier",
                                                "src": "7020:4:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "7026:1:146",
                                                "type": "",
                                                "value": "2"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "div",
                                            "nodeType": "YulIdentifier",
                                            "src": "7016:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "7016:12:146"
                                    },
                                    "variableNames": [
                                        {
                                            "name": "length",
                                            "nodeType": "YulIdentifier",
                                            "src": "7006:6:146"
                                        }
                                    ]
                                },
                                {
                                    "nodeType": "YulVariableDeclaration",
                                    "src": "7037:38:146",
                                    "value": {
                                        "arguments": [
                                            {
                                                "name": "data",
                                                "nodeType": "YulIdentifier",
                                                "src": "7067:4:146"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "7073:1:146",
                                                "type": "",
                                                "value": "1"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "and",
                                            "nodeType": "YulIdentifier",
                                            "src": "7063:3:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "7063:12:146"
                                    },
                                    "variables": [
                                        {
                                            "name": "outOfPlaceEncoding",
                                            "nodeType": "YulTypedName",
                                            "src": "7041:18:146",
                                            "type": ""
                                        }
                                    ]
                                },
                                {
                                    "body": {
                                        "nodeType": "YulBlock",
                                        "src": "7114:31:146",
                                        "statements": [
                                            {
                                                "nodeType": "YulAssignment",
                                                "src": "7116:27:146",
                                                "value": {
                                                    "arguments": [
                                                        {
                                                            "name": "length",
                                                            "nodeType": "YulIdentifier",
                                                            "src": "7130:6:146"
                                                        },
                                                        {
                                                            "kind": "number",
                                                            "nodeType": "YulLiteral",
                                                            "src": "7138:4:146",
                                                            "type": "",
                                                            "value": "0x7f"
                                                        }
                                                    ],
                                                    "functionName": {
                                                        "name": "and",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "7126:3:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "7126:17:146"
                                                },
                                                "variableNames": [
                                                    {
                                                        "name": "length",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "7116:6:146"
                                                    }
                                                ]
                                            }
                                        ]
                                    },
                                    "condition": {
                                        "arguments": [
                                            {
                                                "name": "outOfPlaceEncoding",
                                                "nodeType": "YulIdentifier",
                                                "src": "7094:18:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "iszero",
                                            "nodeType": "YulIdentifier",
                                            "src": "7087:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "7087:26:146"
                                    },
                                    "nodeType": "YulIf",
                                    "src": "7084:2:146"
                                },
                                {
                                    "body": {
                                        "nodeType": "YulBlock",
                                        "src": "7204:111:146",
                                        "statements": [
                                            {
                                                "expression": {
                                                    "arguments": [
                                                        {
                                                            "kind": "number",
                                                            "nodeType": "YulLiteral",
                                                            "src": "7225:1:146",
                                                            "type": "",
                                                            "value": "0"
                                                        },
                                                        {
                                                            "arguments": [
                                                                {
                                                                    "kind": "number",
                                                                    "nodeType": "YulLiteral",
                                                                    "src": "7232:3:146",
                                                                    "type": "",
                                                                    "value": "224"
                                                                },
                                                                {
                                                                    "kind": "number",
                                                                    "nodeType": "YulLiteral",
                                                                    "src": "7237:10:146",
                                                                    "type": "",
                                                                    "value": "0x4e487b71"
                                                                }
                                                            ],
                                                            "functionName": {
                                                                "name": "shl",
                                                                "nodeType": "YulIdentifier",
                                                                "src": "7228:3:146"
                                                            },
                                                            "nodeType": "YulFunctionCall",
                                                            "src": "7228:20:146"
                                                        }
                                                    ],
                                                    "functionName": {
                                                        "name": "mstore",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "7218:6:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "7218:31:146"
                                                },
                                                "nodeType": "YulExpressionStatement",
                                                "src": "7218:31:146"
                                            },
                                            {
                                                "expression": {
                                                    "arguments": [
                                                        {
                                                            "kind": "number",
                                                            "nodeType": "YulLiteral",
                                                            "src": "7269:1:146",
                                                            "type": "",
                                                            "value": "4"
                                                        },
                                                        {
                                                            "kind": "number",
                                                            "nodeType": "YulLiteral",
                                                            "src": "7272:4:146",
                                                            "type": "",
                                                            "value": "0x22"
                                                        }
                                                    ],
                                                    "functionName": {
                                                        "name": "mstore",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "7262:6:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "7262:15:146"
                                                },
                                                "nodeType": "YulExpressionStatement",
                                                "src": "7262:15:146"
                                            },
                                            {
                                                "expression": {
                                                    "arguments": [
                                                        {
                                                            "kind": "number",
                                                            "nodeType": "YulLiteral",
                                                            "src": "7297:1:146",
                                                            "type": "",
                                                            "value": "0"
                                                        },
                                                        {
                                                            "kind": "number",
                                                            "nodeType": "YulLiteral",
                                                            "src": "7300:4:146",
                                                            "type": "",
                                                            "value": "0x24"
                                                        }
                                                    ],
                                                    "functionName": {
                                                        "name": "revert",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "7290:6:146"
                                                    },
                                                    "nodeType": "YulFunctionCall",
                                                    "src": "7290:15:146"
                                                },
                                                "nodeType": "YulExpressionStatement",
                                                "src": "7290:15:146"
                                            }
                                        ]
                                    },
                                    "condition": {
                                        "arguments": [
                                            {
                                                "name": "outOfPlaceEncoding",
                                                "nodeType": "YulIdentifier",
                                                "src": "7160:18:146"
                                            },
                                            {
                                                "arguments": [
                                                    {
                                                        "name": "length",
                                                        "nodeType": "YulIdentifier",
                                                        "src": "7183:6:146"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "7191:2:146",
                                                        "type": "",
                                                        "value": "32"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "lt",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "7180:2:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "7180:14:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "eq",
                                            "nodeType": "YulIdentifier",
                                            "src": "7157:2:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "7157:38:146"
                                    },
                                    "nodeType": "YulIf",
                                    "src": "7154:2:146"
                                }
                            ]
                        },
                        "name": "extract_byte_array_length",
                        "nodeType": "YulFunctionDefinition",
                        "parameters": [
                            {
                                "name": "data",
                                "nodeType": "YulTypedName",
                                "src": "6976:4:146",
                                "type": ""
                            }
                        ],
                        "returnVariables": [
                            {
                                "name": "length",
                                "nodeType": "YulTypedName",
                                "src": "6985:6:146",
                                "type": ""
                            }
                        ],
                        "src": "6941:380:146"
                    },
                    {
                        "body": {
                            "nodeType": "YulBlock",
                            "src": "7358:95:146",
                            "statements": [
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "7375:1:146",
                                                "type": "",
                                                "value": "0"
                                            },
                                            {
                                                "arguments": [
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "7382:3:146",
                                                        "type": "",
                                                        "value": "224"
                                                    },
                                                    {
                                                        "kind": "number",
                                                        "nodeType": "YulLiteral",
                                                        "src": "7387:10:146",
                                                        "type": "",
                                                        "value": "0x4e487b71"
                                                    }
                                                ],
                                                "functionName": {
                                                    "name": "shl",
                                                    "nodeType": "YulIdentifier",
                                                    "src": "7378:3:146"
                                                },
                                                "nodeType": "YulFunctionCall",
                                                "src": "7378:20:146"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "7368:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "7368:31:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "7368:31:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "7415:1:146",
                                                "type": "",
                                                "value": "4"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "7418:4:146",
                                                "type": "",
                                                "value": "0x11"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "mstore",
                                            "nodeType": "YulIdentifier",
                                            "src": "7408:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "7408:15:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "7408:15:146"
                                },
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "7439:1:146",
                                                "type": "",
                                                "value": "0"
                                            },
                                            {
                                                "kind": "number",
                                                "nodeType": "YulLiteral",
                                                "src": "7442:4:146",
                                                "type": "",
                                                "value": "0x24"
                                            }
                                        ],
                                        "functionName": {
                                            "name": "revert",
                                            "nodeType": "YulIdentifier",
                                            "src": "7432:6:146"
                                        },
                                        "nodeType": "YulFunctionCall",
                                        "src": "7432:15:146"
                                    },
                                    "nodeType": "YulExpressionStatement",
                                    "src": "7432:15:146"
                                }
                            ]
                        },
                        "name": "panic_error_0x11",
                        "nodeType": "YulFunctionDefinition",
                        "src": "7326:127:146"
                    }
                ]
            },
            "contents": "{\n    { }\n    function abi_decode_t_address(offset) -> value\n    {\n        value := calldataload(offset)\n        if iszero(eq(value, and(value, sub(shl(160, 1), 1)))) { revert(0, 0) }\n    }\n    function abi_decode_tuple_t_address(headStart, dataEnd) -> value0\n    {\n        if slt(sub(dataEnd, headStart), 32) { revert(value0, value0) }\n        value0 := abi_decode_t_address(headStart)\n    }\n    function abi_decode_tuple_t_addresst_address(headStart, dataEnd) -> value0, value1\n    {\n        if slt(sub(dataEnd, headStart), 64) { revert(value1, value1) }\n        value0 := abi_decode_t_address(headStart)\n        value1 := abi_decode_t_address(add(headStart, 32))\n    }\n    function abi_decode_tuple_t_addresst_addresst_uint256(headStart, dataEnd) -> value0, value1, value2\n    {\n        if slt(sub(dataEnd, headStart), 96) { revert(value2, value2) }\n        value0 := abi_decode_t_address(headStart)\n        value1 := abi_decode_t_address(add(headStart, 32))\n        value2 := calldataload(add(headStart, 64))\n    }\n    function abi_decode_tuple_t_addresst_uint256(headStart, dataEnd) -> value0, value1\n    {\n        if slt(sub(dataEnd, headStart), 64) { revert(value0, value0) }\n        value0 := abi_decode_t_address(headStart)\n        value1 := calldataload(add(headStart, 32))\n    }\n    function abi_encode_tuple_t_address__to_t_address__fromStack_reversed(headStart, value0) -> tail\n    {\n        tail := add(headStart, 32)\n        mstore(headStart, and(value0, sub(shl(160, 1), 1)))\n    }\n    function abi_encode_tuple_t_bool__to_t_bool__fromStack_reversed(headStart, value0) -> tail\n    {\n        tail := add(headStart, 32)\n        mstore(headStart, iszero(iszero(value0)))\n    }\n    function abi_encode_tuple_t_string_memory_ptr__to_t_string_memory_ptr__fromStack_reversed(headStart, value0) -> tail\n    {\n        let _1 := 32\n        mstore(headStart, _1)\n        let length := mload(value0)\n        mstore(add(headStart, _1), length)\n        let i := tail\n        for { } lt(i, length) { i := add(i, _1) }\n        {\n            mstore(add(add(headStart, i), 64), mload(add(add(value0, i), _1)))\n        }\n        if gt(i, length)\n        {\n            mstore(add(add(headStart, length), 64), tail)\n        }\n        tail := add(add(headStart, and(add(length, 31), not(31))), 64)\n    }\n    function abi_encode_tuple_t_stringliteral_0557e210f7a69a685100a7e4e3d0a7024c546085cee28910fd17d0b081d9516f__to_t_string_memory_ptr__fromStack_reversed(headStart) -> tail\n    {\n        mstore(headStart, 32)\n        mstore(add(headStart, 32), 35)\n        mstore(add(headStart, 64), \"ERC20: transfer to the zero addr\")\n        mstore(add(headStart, 96), \"ess\")\n        tail := add(headStart, 128)\n    }\n    function abi_encode_tuple_t_stringliteral_149b126e7125232b4200af45303d04fba8b74653b1a295a6a561a528c33fefdd__to_t_string_memory_ptr__fromStack_reversed(headStart) -> tail\n    {\n        mstore(headStart, 32)\n        mstore(add(headStart, 32), 34)\n        mstore(add(headStart, 64), \"ERC20: burn amount exceeds balan\")\n        mstore(add(headStart, 96), \"ce\")\n        tail := add(headStart, 128)\n    }\n    function abi_encode_tuple_t_stringliteral_24883cc5fe64ace9d0df1893501ecb93c77180f0ff69cca79affb3c316dc8029__to_t_string_memory_ptr__fromStack_reversed(headStart) -> tail\n    {\n        mstore(headStart, 32)\n        mstore(add(headStart, 32), 34)\n        mstore(add(headStart, 64), \"ERC20: approve to the zero addre\")\n        mstore(add(headStart, 96), \"ss\")\n        tail := add(headStart, 128)\n    }\n    function abi_encode_tuple_t_stringliteral_4107e8a8b9e94bf8ff83080ddec1c0bffe897ebc2241b89d44f66b3d274088b6__to_t_string_memory_ptr__fromStack_reversed(headStart) -> tail\n    {\n        mstore(headStart, 32)\n        mstore(add(headStart, 32), 38)\n        mstore(add(headStart, 64), \"ERC20: transfer amount exceeds b\")\n        mstore(add(headStart, 96), \"alance\")\n        tail := add(headStart, 128)\n    }\n    function abi_encode_tuple_t_stringliteral_974d1b4421da69cc60b481194f0dad36a5bb4e23da810da7a7fb30cdba178330__to_t_string_memory_ptr__fromStack_reversed(headStart) -> tail\n    {\n        mstore(headStart, 32)\n        mstore(add(headStart, 32), 40)\n        mstore(add(headStart, 64), \"ERC20: transfer amount exceeds a\")\n        mstore(add(headStart, 96), \"llowance\")\n        tail := add(headStart, 128)\n    }\n    function abi_encode_tuple_t_stringliteral_b16788493b576042bb52c50ed56189e0b250db113c7bfb1c3897d25cf9632d7f__to_t_string_memory_ptr__fromStack_reversed(headStart) -> tail\n    {\n        mstore(headStart, 32)\n        mstore(add(headStart, 32), 33)\n        mstore(add(headStart, 64), \"ERC20: burn from the zero addres\")\n        mstore(add(headStart, 96), \"s\")\n        tail := add(headStart, 128)\n    }\n    function abi_encode_tuple_t_stringliteral_baecc556b46f4ed0f2b4cb599d60785ac8563dd2dc0a5bf12edea1c39e5e1fea__to_t_string_memory_ptr__fromStack_reversed(headStart) -> tail\n    {\n        mstore(headStart, 32)\n        mstore(add(headStart, 32), 37)\n        mstore(add(headStart, 64), \"ERC20: transfer from the zero ad\")\n        mstore(add(headStart, 96), \"dress\")\n        tail := add(headStart, 128)\n    }\n    function abi_encode_tuple_t_stringliteral_c953f4879035ed60e766b34720f656aab5c697b141d924c283124ecedb91c208__to_t_string_memory_ptr__fromStack_reversed(headStart) -> tail\n    {\n        mstore(headStart, 32)\n        mstore(add(headStart, 32), 36)\n        mstore(add(headStart, 64), \"ERC20: approve from the zero add\")\n        mstore(add(headStart, 96), \"ress\")\n        tail := add(headStart, 128)\n    }\n    function abi_encode_tuple_t_stringliteral_f8b476f7d28209d77d4a4ac1fe36b9f8259aa1bb6bddfa6e89de7e51615cf8a8__to_t_string_memory_ptr__fromStack_reversed(headStart) -> tail\n    {\n        mstore(headStart, 32)\n        mstore(add(headStart, 32), 37)\n        mstore(add(headStart, 64), \"ERC20: decreased allowance below\")\n        mstore(add(headStart, 96), \" zero\")\n        tail := add(headStart, 128)\n    }\n    function abi_encode_tuple_t_stringliteral_fc0b381caf0a47702017f3c4b358ebe3d3aff6c60ce819a8bf3ef5a95d4f202e__to_t_string_memory_ptr__fromStack_reversed(headStart) -> tail\n    {\n        mstore(headStart, 32)\n        mstore(add(headStart, 32), 31)\n        mstore(add(headStart, 64), \"ERC20: mint to the zero address\")\n        tail := add(headStart, 96)\n    }\n    function abi_encode_tuple_t_uint256__to_t_uint256__fromStack_reversed(headStart, value0) -> tail\n    {\n        tail := add(headStart, 32)\n        mstore(headStart, value0)\n    }\n    function abi_encode_tuple_t_uint8__to_t_uint8__fromStack_reversed(headStart, value0) -> tail\n    {\n        tail := add(headStart, 32)\n        mstore(headStart, and(value0, 0xff))\n    }\n    function checked_add_t_uint256(x, y) -> sum\n    {\n        if gt(x, not(y)) { panic_error_0x11() }\n        sum := add(x, y)\n    }\n    function checked_sub_t_uint256(x, y) -> diff\n    {\n        if lt(x, y) { panic_error_0x11() }\n        diff := sub(x, y)\n    }\n    function extract_byte_array_length(data) -> length\n    {\n        length := div(data, 2)\n        let outOfPlaceEncoding := and(data, 1)\n        if iszero(outOfPlaceEncoding) { length := and(length, 0x7f) }\n        if eq(outOfPlaceEncoding, lt(length, 32))\n        {\n            mstore(0, shl(224, 0x4e487b71))\n            mstore(4, 0x22)\n            revert(0, 0x24)\n        }\n    }\n    function panic_error_0x11()\n    {\n        mstore(0, shl(224, 0x4e487b71))\n        mstore(4, 0x11)\n        revert(0, 0x24)\n    }\n}",
            "id": 146,
            "language": "Yul",
            "name": "#utility.yul"
        }
    ],
    "sourceMap": "117:567:122:-:0;;;172:98;;;;;;;;;;;;;;;;;;;;;;;;;;;;:::i;:::-;1896:113:135;;;;;;;;;;;;;-1:-1:-1;;;1896:113:135;;;;;;;;;;;;;;;;-1:-1:-1;;;1896:113:135;;;1970:5;1962;:13;;;;;;;;;;;;:::i;:::-;-1:-1:-1;1985:17:135;;;;:7;;:17;;;;;:::i;:::-;-1:-1:-1;;247:5:122::1;:15:::0;;-1:-1:-1;;;;;;247:15:122::1;-1:-1:-1::0;;;;;247:15:122;;;::::1;::::0;;;::::1;::::0;;;-1:-1:-1;117:567:122;;;;;;;;;:::i;:::-;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;-1:-1:-1;117:567:122;;;-1:-1:-1;117:567:122;:::i;:::-;;;:::o;:::-;;;;;;;;;;;;;;;14:310:146;;137:2;125:9;116:7;112:23;108:32;105:2;;;158:6;150;143:22;105:2;189:16;;-1:-1:-1;;;;;234:31:146;;224:42;;214:2;;285:6;277;270:22;214:2;313:5;95:229;-1:-1:-1;;;95:229:146:o;329:380::-;414:1;404:12;;461:1;451:12;;;472:2;;526:4;518:6;514:17;504:27;;472:2;579;571:6;568:14;548:18;545:38;542:2;;;625:10;620:3;616:20;613:1;606:31;660:4;657:1;650:15;688:4;685:1;678:15;542:2;;384:325;;;:::o;:::-;117:567:122;;;;;;",
    "deployedSourceMap": "117:567:122:-:0;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;2074:98:135;;;:::i;:::-;;;;;;;:::i;:::-;;;;;;;;4171:166;;;;;;:::i;:::-;;:::i;:::-;;;;;;;:::i;3162:106::-;;;:::i;:::-;;;;;;;:::i;4804:478::-;;;;;;:::i;:::-;;:::i;3011:91::-;;;:::i;:::-;;;;;;;:::i;5677:212::-;;;;;;:::i;:::-;;:::i;464:106:122:-;;;;;;:::i;:::-;;:::i;:::-;;3326:125:135;;;;;;:::i;:::-;;:::i;2285:102::-;;;:::i;576:105:122:-;;;;;;:::i;:::-;;:::i;6376:405:135:-;;;;;;:::i;:::-;;:::i;368:90:122:-;;;;;;:::i;:::-;;:::i;3654:172:135:-;;;;;;:::i;:::-;;:::i;3884:149::-;;;;;;:::i;:::-;;:::i;145:20:122:-;;;:::i;:::-;;;;;;;:::i;2074:98:135:-;2128:13;2160:5;2153:12;;;;;:::i;:::-;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;:::i;:::-;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;2074:98;:::o;4171:166::-;4254:4;4270:39;4279:12;:10;:12::i;:::-;4293:7;4302:6;4270:8;:39::i;:::-;-1:-1:-1;4326:4:135;4171:166;;;;:::o;3162:106::-;3249:12;;3162:106;:::o;4804:478::-;4940:4;4956:36;4966:6;4974:9;4985:6;4956:9;:36::i;:::-;-1:-1:-1;;;;;5030:19:135;;5003:24;5030:19;;;:11;:19;;;;;5003:24;5050:12;:10;:12::i;:::-;-1:-1:-1;;;;;5030:33:135;-1:-1:-1;;;;;5030:33:135;;;;;;;;;;;;;5003:60;;5101:6;5081:16;:26;;5073:79;;;;-1:-1:-1;;;5073:79:135;;;;;;;:::i;:::-;;;;;;;;;5186:57;5195:6;5203:12;:10;:12::i;:::-;5236:6;5217:16;:25;5186:8;:57::i;:::-;-1:-1:-1;5271:4:135;;4804:478;-1:-1:-1;;;;4804:478:135:o;3011:91::-;3093:2;3011:91;:::o;5677:212::-;5765:4;5781:80;5790:12;:10;:12::i;:::-;5804:7;5850:10;5813:11;:25;5825:12;:10;:12::i;:::-;-1:-1:-1;;;;;5813:25:135;;;;;;;;;;;;;;;;;-1:-1:-1;5813:25:135;;;:34;;;;;;;;;;:47;;;;:::i;:::-;5781:8;:80::i;464:106:122:-;330:5;;-1:-1:-1;;;;;330:5:122;316:10;:19;308:28;;;;;;540:22:::1;546:7;555:6;540:5;:22::i;:::-;464:106:::0;;:::o;3326:125:135:-;-1:-1:-1;;;;;3426:18:135;;3400:7;3426:18;;;;;;;;;;;3326:125;;;;:::o;2285:102::-;2341:13;2373:7;2366:14;;;;;:::i;576:105:122:-;330:5;;-1:-1:-1;;;;;330:5:122;316:10;:19;308:28;;;;;;651:22:::1;657:7;666:6;651:5;:22::i;6376:405:135:-:0;6469:4;6485:24;6512:11;:25;6524:12;:10;:12::i;:::-;-1:-1:-1;;;;;6512:25:135;;;;;;;;;;;;;;;;;-1:-1:-1;6512:25:135;;;:34;;;;;;;;;;;-1:-1:-1;6564:35:135;;;;6556:85;;;;-1:-1:-1;;;6556:85:135;;;;;;;:::i;:::-;6675:67;6684:12;:10;:12::i;:::-;6698:7;6726:15;6707:16;:34;6675:8;:67::i;:::-;-1:-1:-1;6770:4:135;;6376:405;-1:-1:-1;;;6376:405:135:o;368:90:122:-;330:5;;-1:-1:-1;;;;;330:5:122;316:10;:19;308:28;;;;;;435:5:::1;:15:::0;;-1:-1:-1;;;;;;435:15:122::1;-1:-1:-1::0;;;;;435:15:122;;;::::1;::::0;;;::::1;::::0;;368:90::o;3654:172:135:-;3740:4;3756:42;3766:12;:10;:12::i;:::-;3780:9;3791:6;3756:9;:42::i;3884:149::-;-1:-1:-1;;;;;3999:18:135;;;3973:7;3999:18;;;:11;:18;;;;;;;;:27;;;;;;;;;;;;;3884:149::o;145:20:122:-;;;-1:-1:-1;;;;;145:20:122;;:::o;586:96:139:-;665:10;586:96;:::o;9952:370:135:-;-1:-1:-1;;;;;10083:19:135;;10075:68;;;;-1:-1:-1;;;10075:68:135;;;;;;;:::i;:::-;-1:-1:-1;;;;;10161:21:135;;10153:68;;;;-1:-1:-1;;;10153:68:135;;;;;;;:::i;:::-;-1:-1:-1;;;;;10232:18:135;;;;;;;:11;:18;;;;;;;;:27;;;;;;;;;;;;;;:36;;;10283:32;;;;;10262:6;;10283:32;:::i;:::-;;;;;;;;9952:370;;;:::o;7255:713::-;-1:-1:-1;;;;;7390:20:135;;7382:70;;;;-1:-1:-1;;;7382:70:135;;;;;;;:::i;:::-;-1:-1:-1;;;;;7470:23:135;;7462:71;;;;-1:-1:-1;;;7462:71:135;;;;;;;:::i;:::-;7544:47;7565:6;7573:9;7584:6;7544:20;:47::i;:::-;-1:-1:-1;;;;;7626:17:135;;7602:21;7626:17;;;;;;;;;;;7661:23;;;;7653:74;;;;-1:-1:-1;;;7653:74:135;;;;;;;:::i;:::-;-1:-1:-1;;;;;7761:17:135;;;:9;:17;;;;;;;;;;;7781:22;;;7761:42;;7823:20;;;;;;;;:30;;7797:6;;7761:9;7823:30;;7797:6;;7823:30;:::i;:::-;;;;;;;;7886:9;-1:-1:-1;;;;;7869:35:135;7878:6;-1:-1:-1;;;;;7869:35:135;;7897:6;7869:35;;;;;;:::i;:::-;;;;;;;;7915:46;7935:6;7943:9;7954:6;7915:19;:46::i;:::-;7255:713;;;;:::o;8244:389::-;-1:-1:-1;;;;;8327:21:135;;8319:65;;;;-1:-1:-1;;;8319:65:135;;;;;;;:::i;:::-;8395:49;8424:1;8428:7;8437:6;8395:20;:49::i;:::-;8471:6;8455:12;;:22;;;;;;;:::i;:::-;;;;-1:-1:-1;;;;;;;8487:18:135;;:9;:18;;;;;;;;;;:28;;8509:6;;8487:9;:28;;8509:6;;8487:28;:::i;:::-;;;;-1:-1:-1;;8530:37:135;;-1:-1:-1;;;;;8530:37:135;;;8547:1;;8530:37;;;;8560:6;;8530:37;:::i;:::-;;;;;;;;8578:48;8606:1;8610:7;8619:6;8578:19;:48::i;8953:576::-;-1:-1:-1;;;;;9036:21:135;;9028:67;;;;-1:-1:-1;;;9028:67:135;;;;;;;:::i;:::-;9106:49;9127:7;9144:1;9148:6;9106:20;:49::i;:::-;-1:-1:-1;;;;;9191:18:135;;9166:22;9191:18;;;;;;;;;;;9227:24;;;;9219:71;;;;-1:-1:-1;;;9219:71:135;;;;;;;:::i;:::-;-1:-1:-1;;;;;9324:18:135;;:9;:18;;;;;;;;;;9345:23;;;9324:44;;9388:12;:22;;9362:6;;9324:9;9388:22;;9362:6;;9388:22;:::i;:::-;;;;-1:-1:-1;;9426:37:135;;9452:1;;-1:-1:-1;;;;;9426:37:135;;;;;;;9456:6;;9426:37;:::i;:::-;;;;;;;;9474:48;9494:7;9511:1;9515:6;9474:48;8953:576;;;:::o;14:175:146:-;84:20;;-1:-1:-1;;;;;133:31:146;;123:42;;113:2;;179:1;176;169:12;194:198;;306:2;294:9;285:7;281:23;277:32;274:2;;;327:6;319;312:22;274:2;355:31;376:9;355:31;:::i;:::-;345:41;264:128;-1:-1:-1;;;264:128:146:o;397:274::-;;;526:2;514:9;505:7;501:23;497:32;494:2;;;547:6;539;532:22;494:2;575:31;596:9;575:31;:::i;:::-;565:41;;625:40;661:2;650:9;646:18;625:40;:::i;:::-;615:50;;484:187;;;;;:::o;676:342::-;;;;822:2;810:9;801:7;797:23;793:32;790:2;;;843:6;835;828:22;790:2;871:31;892:9;871:31;:::i;:::-;861:41;;921:40;957:2;946:9;942:18;921:40;:::i;:::-;911:50;;1008:2;997:9;993:18;980:32;970:42;;780:238;;;;;:::o;1023:266::-;;;1152:2;1140:9;1131:7;1127:23;1123:32;1120:2;;;1173:6;1165;1158:22;1120:2;1201:31;1222:9;1201:31;:::i;:::-;1191:41;1279:2;1264:18;;;;1251:32;;-1:-1:-1;;;1110:179:146:o;1294:203::-;-1:-1:-1;;;;;1458:32:146;;;;1440:51;;1428:2;1413:18;;1395:102::o;1502:187::-;1667:14;;1660:22;1642:41;;1630:2;1615:18;;1597:92::o;1694:603::-;;1835:2;1864;1853:9;1846:21;1896:6;1890:13;1939:6;1934:2;1923:9;1919:18;1912:34;1964:4;1977:140;1991:6;1988:1;1985:13;1977:140;;;2086:14;;;2082:23;;2076:30;2052:17;;;2071:2;2048:26;2041:66;2006:10;;1977:140;;;2135:6;2132:1;2129:13;2126:2;;;2205:4;2200:2;2191:6;2180:9;2176:22;2172:31;2165:45;2126:2;-1:-1:-1;2281:2:146;2260:15;-1:-1:-1;;2256:29:146;2241:45;;;;2288:2;2237:54;;1815:482;-1:-1:-1;;;1815:482:146:o;2302:399::-;2504:2;2486:21;;;2543:2;2523:18;;;2516:30;2582:34;2577:2;2562:18;;2555:62;-1:-1:-1;;;2648:2:146;2633:18;;2626:33;2691:3;2676:19;;2476:225::o;2706:398::-;2908:2;2890:21;;;2947:2;2927:18;;;2920:30;2986:34;2981:2;2966:18;;2959:62;-1:-1:-1;;;3052:2:146;3037:18;;3030:32;3094:3;3079:19;;2880:224::o;3109:398::-;3311:2;3293:21;;;3350:2;3330:18;;;3323:30;3389:34;3384:2;3369:18;;3362:62;-1:-1:-1;;;3455:2:146;3440:18;;3433:32;3497:3;3482:19;;3283:224::o;3512:402::-;3714:2;3696:21;;;3753:2;3733:18;;;3726:30;3792:34;3787:2;3772:18;;3765:62;-1:-1:-1;;;3858:2:146;3843:18;;3836:36;3904:3;3889:19;;3686:228::o;3919:404::-;4121:2;4103:21;;;4160:2;4140:18;;;4133:30;4199:34;4194:2;4179:18;;4172:62;-1:-1:-1;;;4265:2:146;4250:18;;4243:38;4313:3;4298:19;;4093:230::o;4328:397::-;4530:2;4512:21;;;4569:2;4549:18;;;4542:30;4608:34;4603:2;4588:18;;4581:62;-1:-1:-1;;;4674:2:146;4659:18;;4652:31;4715:3;4700:19;;4502:223::o;4730:401::-;4932:2;4914:21;;;4971:2;4951:18;;;4944:30;5010:34;5005:2;4990:18;;4983:62;-1:-1:-1;;;5076:2:146;5061:18;;5054:35;5121:3;5106:19;;4904:227::o;5136:400::-;5338:2;5320:21;;;5377:2;5357:18;;;5350:30;5416:34;5411:2;5396:18;;5389:62;-1:-1:-1;;;5482:2:146;5467:18;;5460:34;5526:3;5511:19;;5310:226::o;5541:401::-;5743:2;5725:21;;;5782:2;5762:18;;;5755:30;5821:34;5816:2;5801:18;;5794:62;-1:-1:-1;;;5887:2:146;5872:18;;5865:35;5932:3;5917:19;;5715:227::o;5947:355::-;6149:2;6131:21;;;6188:2;6168:18;;;6161:30;6227:33;6222:2;6207:18;;6200:61;6293:2;6278:18;;6121:181::o;6307:177::-;6453:25;;;6441:2;6426:18;;6408:76::o;6489:184::-;6661:4;6649:17;;;;6631:36;;6619:2;6604:18;;6586:87::o;6678:128::-;;6749:1;6745:6;6742:1;6739:13;6736:2;;;6755:18;;:::i;:::-;-1:-1:-1;6791:9:146;;6726:80::o;6811:125::-;;6879:1;6876;6873:8;6870:2;;;6884:18;;:::i;:::-;-1:-1:-1;6921:9:146;;6860:76::o;6941:380::-;7026:1;7016:12;;7073:1;7063:12;;;7084:2;;7138:4;7130:6;7126:17;7116:27;;7084:2;7191;7183:6;7180:14;7160:18;7157:38;7154:2;;;7237:10;7232:3;7228:20;7225:1;7218:31;7272:4;7269:1;7262:15;7300:4;7297:1;7290:15;7154:2;;6996:325;;;:::o;7326:127::-;7387:10;7382:3;7378:20;7375:1;7368:31;7418:4;7415:1;7408:15;7442:4;7439:1;7432:15",
    "source": "// SPDX-License-Identifier: MIT\r\npragma solidity ^0.8.0;\r\nimport \"@openzeppelin/contracts/token/ERC20/ERC20.sol\";\r\n\r\ncontract RBB is ERC20{\r\n    address public admin;\r\n    constructor(address manager) public ERC20(\"Rainbow Bond\", \"RBB\") {\r\n       admin = manager;\r\n    }\r\n    modifier  _isOwner() {\r\n        require(msg.sender == admin);\r\n        _;\r\n    }\r\n    \r\n    function changeOwner(address manager) external _isOwner {\r\n        admin = manager;\r\n    }\r\n    function mint(address account, uint256 amount) external _isOwner {\r\n        _mint(account, amount);\r\n    }\r\n    function burn(address account, uint256 amount) external _isOwner{\r\n        _burn(account, amount);\r\n    }\r\n}",
    "sourcePath": "D:/project/lianqun/RainbowDao-protocol/contracts/token20/RBB.sol",
    "ast": {
        "absolutePath": "/D/project/lianqun/RainbowDao-protocol/contracts/token20/RBB.sol",
        "exportedSymbols": {
            "Context": [
                21098
            ],
            "ERC20": [
                20678
            ],
            "IERC20": [
                20756
            ],
            "IERC20Metadata": [
                20781
            ],
            "RBB": [
                17158
            ]
        },
        "id": 17159,
        "license": "MIT",
        "nodeType": "SourceUnit",
        "nodes": [
            {
                "id": 17085,
                "literals": [
                    "solidity",
                    "^",
                    "0.8",
                    ".0"
                ],
                "nodeType": "PragmaDirective",
                "src": "33:23:122"
            },
            {
                "absolutePath": "@openzeppelin/contracts/token/ERC20/ERC20.sol",
                "file": "@openzeppelin/contracts/token/ERC20/ERC20.sol",
                "id": 17086,
                "nodeType": "ImportDirective",
                "scope": 17159,
                "sourceUnit": 20679,
                "src": "58:55:122",
                "symbolAliases": [],
                "unitAlias": ""
            },
            {
                "abstract": false,
                "baseContracts": [
                    {
                        "baseName": {
                            "id": 17087,
                            "name": "ERC20",
                            "nodeType": "IdentifierPath",
                            "referencedDeclaration": 20678,
                            "src": "133:5:122"
                        },
                        "id": 17088,
                        "nodeType": "InheritanceSpecifier",
                        "src": "133:5:122"
                    }
                ],
                "contractDependencies": [
                    20678,
                    20756,
                    20781,
                    21098
                ],
                "contractKind": "contract",
                "fullyImplemented": true,
                "id": 17158,
                "linearizedBaseContracts": [
                    17158,
                    20678,
                    20781,
                    20756,
                    21098
                ],
                "name": "RBB",
                "nodeType": "ContractDefinition",
                "nodes": [
                    {
                        "constant": false,
                        "functionSelector": "f851a440",
                        "id": 17090,
                        "mutability": "mutable",
                        "name": "admin",
                        "nodeType": "VariableDeclaration",
                        "scope": 17158,
                        "src": "145:20:122",
                        "stateVariable": true,
                        "storageLocation": "default",
                        "typeDescriptions": {
                            "typeIdentifier": "t_address",
                            "typeString": "address"
                        },
                        "typeName": {
                            "id": 17089,
                            "name": "address",
                            "nodeType": "ElementaryTypeName",
                            "src": "145:7:122",
                            "stateMutability": "nonpayable",
                            "typeDescriptions": {
                                "typeIdentifier": "t_address",
                                "typeString": "address"
                            }
                        },
                        "visibility": "public"
                    },
                    {
                        "body": {
                            "id": 17103,
                            "nodeType": "Block",
                            "src": "237:33:122",
                            "statements": [
                                {
                                    "expression": {
                                        "id": 17101,
                                        "isConstant": false,
                                        "isLValue": false,
                                        "isPure": false,
                                        "lValueRequested": false,
                                        "leftHandSide": {
                                            "id": 17099,
                                            "name": "admin",
                                            "nodeType": "Identifier",
                                            "overloadedDeclarations": [],
                                            "referencedDeclaration": 17090,
                                            "src": "247:5:122",
                                            "typeDescriptions": {
                                                "typeIdentifier": "t_address",
                                                "typeString": "address"
                                            }
                                        },
                                        "nodeType": "Assignment",
                                        "operator": "=",
                                        "rightHandSide": {
                                            "id": 17100,
                                            "name": "manager",
                                            "nodeType": "Identifier",
                                            "overloadedDeclarations": [],
                                            "referencedDeclaration": 17092,
                                            "src": "255:7:122",
                                            "typeDescriptions": {
                                                "typeIdentifier": "t_address",
                                                "typeString": "address"
                                            }
                                        },
                                        "src": "247:15:122",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_address",
                                            "typeString": "address"
                                        }
                                    },
                                    "id": 17102,
                                    "nodeType": "ExpressionStatement",
                                    "src": "247:15:122"
                                }
                            ]
                        },
                        "id": 17104,
                        "implemented": true,
                        "kind": "constructor",
                        "modifiers": [
                            {
                                "arguments": [
                                    {
                                        "hexValue": "5261696e626f7720426f6e64",
                                        "id": 17095,
                                        "isConstant": false,
                                        "isLValue": false,
                                        "isPure": true,
                                        "kind": "string",
                                        "lValueRequested": false,
                                        "nodeType": "Literal",
                                        "src": "214:14:122",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_stringliteral_f565288d5175c1076c4b1bc8d212ef171096bf86f7b15e0726756475b44f4788",
                                            "typeString": "literal_string \"Rainbow Bond\""
                                        },
                                        "value": "Rainbow Bond"
                                    },
                                    {
                                        "hexValue": "524242",
                                        "id": 17096,
                                        "isConstant": false,
                                        "isLValue": false,
                                        "isPure": true,
                                        "kind": "string",
                                        "lValueRequested": false,
                                        "nodeType": "Literal",
                                        "src": "230:5:122",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_stringliteral_0c12539b5eb00159ed82275ae2ccd3d656c9cb33664f2dd13923009970944c14",
                                            "typeString": "literal_string \"RBB\""
                                        },
                                        "value": "RBB"
                                    }
                                ],
                                "id": 17097,
                                "modifierName": {
                                    "id": 17094,
                                    "name": "ERC20",
                                    "nodeType": "IdentifierPath",
                                    "referencedDeclaration": 20678,
                                    "src": "208:5:122"
                                },
                                "nodeType": "ModifierInvocation",
                                "src": "208:28:122"
                            }
                        ],
                        "name": "",
                        "nodeType": "FunctionDefinition",
                        "parameters": {
                            "id": 17093,
                            "nodeType": "ParameterList",
                            "parameters": [
                                {
                                    "constant": false,
                                    "id": 17092,
                                    "mutability": "mutable",
                                    "name": "manager",
                                    "nodeType": "VariableDeclaration",
                                    "scope": 17104,
                                    "src": "184:15:122",
                                    "stateVariable": false,
                                    "storageLocation": "default",
                                    "typeDescriptions": {
                                        "typeIdentifier": "t_address",
                                        "typeString": "address"
                                    },
                                    "typeName": {
                                        "id": 17091,
                                        "name": "address",
                                        "nodeType": "ElementaryTypeName",
                                        "src": "184:7:122",
                                        "stateMutability": "nonpayable",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_address",
                                            "typeString": "address"
                                        }
                                    },
                                    "visibility": "internal"
                                }
                            ],
                            "src": "183:17:122"
                        },
                        "returnParameters": {
                            "id": 17098,
                            "nodeType": "ParameterList",
                            "parameters": [],
                            "src": "237:0:122"
                        },
                        "scope": 17158,
                        "src": "172:98:122",
                        "stateMutability": "nonpayable",
                        "virtual": false,
                        "visibility": "public"
                    },
                    {
                        "body": {
                            "id": 17114,
                            "nodeType": "Block",
                            "src": "297:59:122",
                            "statements": [
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "commonType": {
                                                    "typeIdentifier": "t_address",
                                                    "typeString": "address"
                                                },
                                                "id": 17110,
                                                "isConstant": false,
                                                "isLValue": false,
                                                "isPure": false,
                                                "lValueRequested": false,
                                                "leftExpression": {
                                                    "expression": {
                                                        "id": 17107,
                                                        "name": "msg",
                                                        "nodeType": "Identifier",
                                                        "overloadedDeclarations": [],
                                                        "referencedDeclaration": 4294967281,
                                                        "src": "316:3:122",
                                                        "typeDescriptions": {
                                                            "typeIdentifier": "t_magic_message",
                                                            "typeString": "msg"
                                                        }
                                                    },
                                                    "id": 17108,
                                                    "isConstant": false,
                                                    "isLValue": false,
                                                    "isPure": false,
                                                    "lValueRequested": false,
                                                    "memberName": "sender",
                                                    "nodeType": "MemberAccess",
                                                    "src": "316:10:122",
                                                    "typeDescriptions": {
                                                        "typeIdentifier": "t_address",
                                                        "typeString": "address"
                                                    }
                                                },
                                                "nodeType": "BinaryOperation",
                                                "operator": "==",
                                                "rightExpression": {
                                                    "id": 17109,
                                                    "name": "admin",
                                                    "nodeType": "Identifier",
                                                    "overloadedDeclarations": [],
                                                    "referencedDeclaration": 17090,
                                                    "src": "330:5:122",
                                                    "typeDescriptions": {
                                                        "typeIdentifier": "t_address",
                                                        "typeString": "address"
                                                    }
                                                },
                                                "src": "316:19:122",
                                                "typeDescriptions": {
                                                    "typeIdentifier": "t_bool",
                                                    "typeString": "bool"
                                                }
                                            }
                                        ],
                                        "expression": {
                                            "argumentTypes": [
                                                {
                                                    "typeIdentifier": "t_bool",
                                                    "typeString": "bool"
                                                }
                                            ],
                                            "id": 17106,
                                            "name": "require",
                                            "nodeType": "Identifier",
                                            "overloadedDeclarations": [
                                                4294967278,
                                                4294967278
                                            ],
                                            "referencedDeclaration": 4294967278,
                                            "src": "308:7:122",
                                            "typeDescriptions": {
                                                "typeIdentifier": "t_function_require_pure$_t_bool_$returns$__$",
                                                "typeString": "function (bool) pure"
                                            }
                                        },
                                        "id": 17111,
                                        "isConstant": false,
                                        "isLValue": false,
                                        "isPure": false,
                                        "kind": "functionCall",
                                        "lValueRequested": false,
                                        "names": [],
                                        "nodeType": "FunctionCall",
                                        "src": "308:28:122",
                                        "tryCall": false,
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_tuple$__$",
                                            "typeString": "tuple()"
                                        }
                                    },
                                    "id": 17112,
                                    "nodeType": "ExpressionStatement",
                                    "src": "308:28:122"
                                },
                                {
                                    "id": 17113,
                                    "nodeType": "PlaceholderStatement",
                                    "src": "347:1:122"
                                }
                            ]
                        },
                        "id": 17115,
                        "name": "_isOwner",
                        "nodeType": "ModifierDefinition",
                        "parameters": {
                            "id": 17105,
                            "nodeType": "ParameterList",
                            "parameters": [],
                            "src": "294:2:122"
                        },
                        "src": "276:80:122",
                        "virtual": false,
                        "visibility": "internal"
                    },
                    {
                        "body": {
                            "id": 17126,
                            "nodeType": "Block",
                            "src": "424:34:122",
                            "statements": [
                                {
                                    "expression": {
                                        "id": 17124,
                                        "isConstant": false,
                                        "isLValue": false,
                                        "isPure": false,
                                        "lValueRequested": false,
                                        "leftHandSide": {
                                            "id": 17122,
                                            "name": "admin",
                                            "nodeType": "Identifier",
                                            "overloadedDeclarations": [],
                                            "referencedDeclaration": 17090,
                                            "src": "435:5:122",
                                            "typeDescriptions": {
                                                "typeIdentifier": "t_address",
                                                "typeString": "address"
                                            }
                                        },
                                        "nodeType": "Assignment",
                                        "operator": "=",
                                        "rightHandSide": {
                                            "id": 17123,
                                            "name": "manager",
                                            "nodeType": "Identifier",
                                            "overloadedDeclarations": [],
                                            "referencedDeclaration": 17117,
                                            "src": "443:7:122",
                                            "typeDescriptions": {
                                                "typeIdentifier": "t_address",
                                                "typeString": "address"
                                            }
                                        },
                                        "src": "435:15:122",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_address",
                                            "typeString": "address"
                                        }
                                    },
                                    "id": 17125,
                                    "nodeType": "ExpressionStatement",
                                    "src": "435:15:122"
                                }
                            ]
                        },
                        "functionSelector": "a6f9dae1",
                        "id": 17127,
                        "implemented": true,
                        "kind": "function",
                        "modifiers": [
                            {
                                "id": 17120,
                                "modifierName": {
                                    "id": 17119,
                                    "name": "_isOwner",
                                    "nodeType": "IdentifierPath",
                                    "referencedDeclaration": 17115,
                                    "src": "415:8:122"
                                },
                                "nodeType": "ModifierInvocation",
                                "src": "415:8:122"
                            }
                        ],
                        "name": "changeOwner",
                        "nodeType": "FunctionDefinition",
                        "parameters": {
                            "id": 17118,
                            "nodeType": "ParameterList",
                            "parameters": [
                                {
                                    "constant": false,
                                    "id": 17117,
                                    "mutability": "mutable",
                                    "name": "manager",
                                    "nodeType": "VariableDeclaration",
                                    "scope": 17127,
                                    "src": "389:15:122",
                                    "stateVariable": false,
                                    "storageLocation": "default",
                                    "typeDescriptions": {
                                        "typeIdentifier": "t_address",
                                        "typeString": "address"
                                    },
                                    "typeName": {
                                        "id": 17116,
                                        "name": "address",
                                        "nodeType": "ElementaryTypeName",
                                        "src": "389:7:122",
                                        "stateMutability": "nonpayable",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_address",
                                            "typeString": "address"
                                        }
                                    },
                                    "visibility": "internal"
                                }
                            ],
                            "src": "388:17:122"
                        },
                        "returnParameters": {
                            "id": 17121,
                            "nodeType": "ParameterList",
                            "parameters": [],
                            "src": "424:0:122"
                        },
                        "scope": 17158,
                        "src": "368:90:122",
                        "stateMutability": "nonpayable",
                        "virtual": false,
                        "visibility": "external"
                    },
                    {
                        "body": {
                            "id": 17141,
                            "nodeType": "Block",
                            "src": "529:41:122",
                            "statements": [
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "id": 17137,
                                                "name": "account",
                                                "nodeType": "Identifier",
                                                "overloadedDeclarations": [],
                                                "referencedDeclaration": 17129,
                                                "src": "546:7:122",
                                                "typeDescriptions": {
                                                    "typeIdentifier": "t_address",
                                                    "typeString": "address"
                                                }
                                            },
                                            {
                                                "id": 17138,
                                                "name": "amount",
                                                "nodeType": "Identifier",
                                                "overloadedDeclarations": [],
                                                "referencedDeclaration": 17131,
                                                "src": "555:6:122",
                                                "typeDescriptions": {
                                                    "typeIdentifier": "t_uint256",
                                                    "typeString": "uint256"
                                                }
                                            }
                                        ],
                                        "expression": {
                                            "argumentTypes": [
                                                {
                                                    "typeIdentifier": "t_address",
                                                    "typeString": "address"
                                                },
                                                {
                                                    "typeIdentifier": "t_uint256",
                                                    "typeString": "uint256"
                                                }
                                            ],
                                            "id": 17136,
                                            "name": "_mint",
                                            "nodeType": "Identifier",
                                            "overloadedDeclarations": [],
                                            "referencedDeclaration": 20538,
                                            "src": "540:5:122",
                                            "typeDescriptions": {
                                                "typeIdentifier": "t_function_internal_nonpayable$_t_address_$_t_uint256_$returns$__$",
                                                "typeString": "function (address,uint256)"
                                            }
                                        },
                                        "id": 17139,
                                        "isConstant": false,
                                        "isLValue": false,
                                        "isPure": false,
                                        "kind": "functionCall",
                                        "lValueRequested": false,
                                        "names": [],
                                        "nodeType": "FunctionCall",
                                        "src": "540:22:122",
                                        "tryCall": false,
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_tuple$__$",
                                            "typeString": "tuple()"
                                        }
                                    },
                                    "id": 17140,
                                    "nodeType": "ExpressionStatement",
                                    "src": "540:22:122"
                                }
                            ]
                        },
                        "functionSelector": "40c10f19",
                        "id": 17142,
                        "implemented": true,
                        "kind": "function",
                        "modifiers": [
                            {
                                "id": 17134,
                                "modifierName": {
                                    "id": 17133,
                                    "name": "_isOwner",
                                    "nodeType": "IdentifierPath",
                                    "referencedDeclaration": 17115,
                                    "src": "520:8:122"
                                },
                                "nodeType": "ModifierInvocation",
                                "src": "520:8:122"
                            }
                        ],
                        "name": "mint",
                        "nodeType": "FunctionDefinition",
                        "parameters": {
                            "id": 17132,
                            "nodeType": "ParameterList",
                            "parameters": [
                                {
                                    "constant": false,
                                    "id": 17129,
                                    "mutability": "mutable",
                                    "name": "account",
                                    "nodeType": "VariableDeclaration",
                                    "scope": 17142,
                                    "src": "478:15:122",
                                    "stateVariable": false,
                                    "storageLocation": "default",
                                    "typeDescriptions": {
                                        "typeIdentifier": "t_address",
                                        "typeString": "address"
                                    },
                                    "typeName": {
                                        "id": 17128,
                                        "name": "address",
                                        "nodeType": "ElementaryTypeName",
                                        "src": "478:7:122",
                                        "stateMutability": "nonpayable",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_address",
                                            "typeString": "address"
                                        }
                                    },
                                    "visibility": "internal"
                                },
                                {
                                    "constant": false,
                                    "id": 17131,
                                    "mutability": "mutable",
                                    "name": "amount",
                                    "nodeType": "VariableDeclaration",
                                    "scope": 17142,
                                    "src": "495:14:122",
                                    "stateVariable": false,
                                    "storageLocation": "default",
                                    "typeDescriptions": {
                                        "typeIdentifier": "t_uint256",
                                        "typeString": "uint256"
                                    },
                                    "typeName": {
                                        "id": 17130,
                                        "name": "uint256",
                                        "nodeType": "ElementaryTypeName",
                                        "src": "495:7:122",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_uint256",
                                            "typeString": "uint256"
                                        }
                                    },
                                    "visibility": "internal"
                                }
                            ],
                            "src": "477:33:122"
                        },
                        "returnParameters": {
                            "id": 17135,
                            "nodeType": "ParameterList",
                            "parameters": [],
                            "src": "529:0:122"
                        },
                        "scope": 17158,
                        "src": "464:106:122",
                        "stateMutability": "nonpayable",
                        "virtual": false,
                        "visibility": "external"
                    },
                    {
                        "body": {
                            "id": 17156,
                            "nodeType": "Block",
                            "src": "640:41:122",
                            "statements": [
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "id": 17152,
                                                "name": "account",
                                                "nodeType": "Identifier",
                                                "overloadedDeclarations": [],
                                                "referencedDeclaration": 17144,
                                                "src": "657:7:122",
                                                "typeDescriptions": {
                                                    "typeIdentifier": "t_address",
                                                    "typeString": "address"
                                                }
                                            },
                                            {
                                                "id": 17153,
                                                "name": "amount",
                                                "nodeType": "Identifier",
                                                "overloadedDeclarations": [],
                                                "referencedDeclaration": 17146,
                                                "src": "666:6:122",
                                                "typeDescriptions": {
                                                    "typeIdentifier": "t_uint256",
                                                    "typeString": "uint256"
                                                }
                                            }
                                        ],
                                        "expression": {
                                            "argumentTypes": [
                                                {
                                                    "typeIdentifier": "t_address",
                                                    "typeString": "address"
                                                },
                                                {
                                                    "typeIdentifier": "t_uint256",
                                                    "typeString": "uint256"
                                                }
                                            ],
                                            "id": 17151,
                                            "name": "_burn",
                                            "nodeType": "Identifier",
                                            "overloadedDeclarations": [],
                                            "referencedDeclaration": 20610,
                                            "src": "651:5:122",
                                            "typeDescriptions": {
                                                "typeIdentifier": "t_function_internal_nonpayable$_t_address_$_t_uint256_$returns$__$",
                                                "typeString": "function (address,uint256)"
                                            }
                                        },
                                        "id": 17154,
                                        "isConstant": false,
                                        "isLValue": false,
                                        "isPure": false,
                                        "kind": "functionCall",
                                        "lValueRequested": false,
                                        "names": [],
                                        "nodeType": "FunctionCall",
                                        "src": "651:22:122",
                                        "tryCall": false,
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_tuple$__$",
                                            "typeString": "tuple()"
                                        }
                                    },
                                    "id": 17155,
                                    "nodeType": "ExpressionStatement",
                                    "src": "651:22:122"
                                }
                            ]
                        },
                        "functionSelector": "9dc29fac",
                        "id": 17157,
                        "implemented": true,
                        "kind": "function",
                        "modifiers": [
                            {
                                "id": 17149,
                                "modifierName": {
                                    "id": 17148,
                                    "name": "_isOwner",
                                    "nodeType": "IdentifierPath",
                                    "referencedDeclaration": 17115,
                                    "src": "632:8:122"
                                },
                                "nodeType": "ModifierInvocation",
                                "src": "632:8:122"
                            }
                        ],
                        "name": "burn",
                        "nodeType": "FunctionDefinition",
                        "parameters": {
                            "id": 17147,
                            "nodeType": "ParameterList",
                            "parameters": [
                                {
                                    "constant": false,
                                    "id": 17144,
                                    "mutability": "mutable",
                                    "name": "account",
                                    "nodeType": "VariableDeclaration",
                                    "scope": 17157,
                                    "src": "590:15:122",
                                    "stateVariable": false,
                                    "storageLocation": "default",
                                    "typeDescriptions": {
                                        "typeIdentifier": "t_address",
                                        "typeString": "address"
                                    },
                                    "typeName": {
                                        "id": 17143,
                                        "name": "address",
                                        "nodeType": "ElementaryTypeName",
                                        "src": "590:7:122",
                                        "stateMutability": "nonpayable",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_address",
                                            "typeString": "address"
                                        }
                                    },
                                    "visibility": "internal"
                                },
                                {
                                    "constant": false,
                                    "id": 17146,
                                    "mutability": "mutable",
                                    "name": "amount",
                                    "nodeType": "VariableDeclaration",
                                    "scope": 17157,
                                    "src": "607:14:122",
                                    "stateVariable": false,
                                    "storageLocation": "default",
                                    "typeDescriptions": {
                                        "typeIdentifier": "t_uint256",
                                        "typeString": "uint256"
                                    },
                                    "typeName": {
                                        "id": 17145,
                                        "name": "uint256",
                                        "nodeType": "ElementaryTypeName",
                                        "src": "607:7:122",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_uint256",
                                            "typeString": "uint256"
                                        }
                                    },
                                    "visibility": "internal"
                                }
                            ],
                            "src": "589:33:122"
                        },
                        "returnParameters": {
                            "id": 17150,
                            "nodeType": "ParameterList",
                            "parameters": [],
                            "src": "640:0:122"
                        },
                        "scope": 17158,
                        "src": "576:105:122",
                        "stateMutability": "nonpayable",
                        "virtual": false,
                        "visibility": "external"
                    }
                ],
                "scope": 17159,
                "src": "117:567:122"
            }
        ],
        "src": "33:651:122"
    },
    "legacyAST": {
        "absolutePath": "/D/project/lianqun/RainbowDao-protocol/contracts/token20/RBB.sol",
        "exportedSymbols": {
            "Context": [
                21098
            ],
            "ERC20": [
                20678
            ],
            "IERC20": [
                20756
            ],
            "IERC20Metadata": [
                20781
            ],
            "RBB": [
                17158
            ]
        },
        "id": 17159,
        "license": "MIT",
        "nodeType": "SourceUnit",
        "nodes": [
            {
                "id": 17085,
                "literals": [
                    "solidity",
                    "^",
                    "0.8",
                    ".0"
                ],
                "nodeType": "PragmaDirective",
                "src": "33:23:122"
            },
            {
                "absolutePath": "@openzeppelin/contracts/token/ERC20/ERC20.sol",
                "file": "@openzeppelin/contracts/token/ERC20/ERC20.sol",
                "id": 17086,
                "nodeType": "ImportDirective",
                "scope": 17159,
                "sourceUnit": 20679,
                "src": "58:55:122",
                "symbolAliases": [],
                "unitAlias": ""
            },
            {
                "abstract": false,
                "baseContracts": [
                    {
                        "baseName": {
                            "id": 17087,
                            "name": "ERC20",
                            "nodeType": "IdentifierPath",
                            "referencedDeclaration": 20678,
                            "src": "133:5:122"
                        },
                        "id": 17088,
                        "nodeType": "InheritanceSpecifier",
                        "src": "133:5:122"
                    }
                ],
                "contractDependencies": [
                    20678,
                    20756,
                    20781,
                    21098
                ],
                "contractKind": "contract",
                "fullyImplemented": true,
                "id": 17158,
                "linearizedBaseContracts": [
                    17158,
                    20678,
                    20781,
                    20756,
                    21098
                ],
                "name": "RBB",
                "nodeType": "ContractDefinition",
                "nodes": [
                    {
                        "constant": false,
                        "functionSelector": "f851a440",
                        "id": 17090,
                        "mutability": "mutable",
                        "name": "admin",
                        "nodeType": "VariableDeclaration",
                        "scope": 17158,
                        "src": "145:20:122",
                        "stateVariable": true,
                        "storageLocation": "default",
                        "typeDescriptions": {
                            "typeIdentifier": "t_address",
                            "typeString": "address"
                        },
                        "typeName": {
                            "id": 17089,
                            "name": "address",
                            "nodeType": "ElementaryTypeName",
                            "src": "145:7:122",
                            "stateMutability": "nonpayable",
                            "typeDescriptions": {
                                "typeIdentifier": "t_address",
                                "typeString": "address"
                            }
                        },
                        "visibility": "public"
                    },
                    {
                        "body": {
                            "id": 17103,
                            "nodeType": "Block",
                            "src": "237:33:122",
                            "statements": [
                                {
                                    "expression": {
                                        "id": 17101,
                                        "isConstant": false,
                                        "isLValue": false,
                                        "isPure": false,
                                        "lValueRequested": false,
                                        "leftHandSide": {
                                            "id": 17099,
                                            "name": "admin",
                                            "nodeType": "Identifier",
                                            "overloadedDeclarations": [],
                                            "referencedDeclaration": 17090,
                                            "src": "247:5:122",
                                            "typeDescriptions": {
                                                "typeIdentifier": "t_address",
                                                "typeString": "address"
                                            }
                                        },
                                        "nodeType": "Assignment",
                                        "operator": "=",
                                        "rightHandSide": {
                                            "id": 17100,
                                            "name": "manager",
                                            "nodeType": "Identifier",
                                            "overloadedDeclarations": [],
                                            "referencedDeclaration": 17092,
                                            "src": "255:7:122",
                                            "typeDescriptions": {
                                                "typeIdentifier": "t_address",
                                                "typeString": "address"
                                            }
                                        },
                                        "src": "247:15:122",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_address",
                                            "typeString": "address"
                                        }
                                    },
                                    "id": 17102,
                                    "nodeType": "ExpressionStatement",
                                    "src": "247:15:122"
                                }
                            ]
                        },
                        "id": 17104,
                        "implemented": true,
                        "kind": "constructor",
                        "modifiers": [
                            {
                                "arguments": [
                                    {
                                        "hexValue": "5261696e626f7720426f6e64",
                                        "id": 17095,
                                        "isConstant": false,
                                        "isLValue": false,
                                        "isPure": true,
                                        "kind": "string",
                                        "lValueRequested": false,
                                        "nodeType": "Literal",
                                        "src": "214:14:122",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_stringliteral_f565288d5175c1076c4b1bc8d212ef171096bf86f7b15e0726756475b44f4788",
                                            "typeString": "literal_string \"Rainbow Bond\""
                                        },
                                        "value": "Rainbow Bond"
                                    },
                                    {
                                        "hexValue": "524242",
                                        "id": 17096,
                                        "isConstant": false,
                                        "isLValue": false,
                                        "isPure": true,
                                        "kind": "string",
                                        "lValueRequested": false,
                                        "nodeType": "Literal",
                                        "src": "230:5:122",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_stringliteral_0c12539b5eb00159ed82275ae2ccd3d656c9cb33664f2dd13923009970944c14",
                                            "typeString": "literal_string \"RBB\""
                                        },
                                        "value": "RBB"
                                    }
                                ],
                                "id": 17097,
                                "modifierName": {
                                    "id": 17094,
                                    "name": "ERC20",
                                    "nodeType": "IdentifierPath",
                                    "referencedDeclaration": 20678,
                                    "src": "208:5:122"
                                },
                                "nodeType": "ModifierInvocation",
                                "src": "208:28:122"
                            }
                        ],
                        "name": "",
                        "nodeType": "FunctionDefinition",
                        "parameters": {
                            "id": 17093,
                            "nodeType": "ParameterList",
                            "parameters": [
                                {
                                    "constant": false,
                                    "id": 17092,
                                    "mutability": "mutable",
                                    "name": "manager",
                                    "nodeType": "VariableDeclaration",
                                    "scope": 17104,
                                    "src": "184:15:122",
                                    "stateVariable": false,
                                    "storageLocation": "default",
                                    "typeDescriptions": {
                                        "typeIdentifier": "t_address",
                                        "typeString": "address"
                                    },
                                    "typeName": {
                                        "id": 17091,
                                        "name": "address",
                                        "nodeType": "ElementaryTypeName",
                                        "src": "184:7:122",
                                        "stateMutability": "nonpayable",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_address",
                                            "typeString": "address"
                                        }
                                    },
                                    "visibility": "internal"
                                }
                            ],
                            "src": "183:17:122"
                        },
                        "returnParameters": {
                            "id": 17098,
                            "nodeType": "ParameterList",
                            "parameters": [],
                            "src": "237:0:122"
                        },
                        "scope": 17158,
                        "src": "172:98:122",
                        "stateMutability": "nonpayable",
                        "virtual": false,
                        "visibility": "public"
                    },
                    {
                        "body": {
                            "id": 17114,
                            "nodeType": "Block",
                            "src": "297:59:122",
                            "statements": [
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "commonType": {
                                                    "typeIdentifier": "t_address",
                                                    "typeString": "address"
                                                },
                                                "id": 17110,
                                                "isConstant": false,
                                                "isLValue": false,
                                                "isPure": false,
                                                "lValueRequested": false,
                                                "leftExpression": {
                                                    "expression": {
                                                        "id": 17107,
                                                        "name": "msg",
                                                        "nodeType": "Identifier",
                                                        "overloadedDeclarations": [],
                                                        "referencedDeclaration": 4294967281,
                                                        "src": "316:3:122",
                                                        "typeDescriptions": {
                                                            "typeIdentifier": "t_magic_message",
                                                            "typeString": "msg"
                                                        }
                                                    },
                                                    "id": 17108,
                                                    "isConstant": false,
                                                    "isLValue": false,
                                                    "isPure": false,
                                                    "lValueRequested": false,
                                                    "memberName": "sender",
                                                    "nodeType": "MemberAccess",
                                                    "src": "316:10:122",
                                                    "typeDescriptions": {
                                                        "typeIdentifier": "t_address",
                                                        "typeString": "address"
                                                    }
                                                },
                                                "nodeType": "BinaryOperation",
                                                "operator": "==",
                                                "rightExpression": {
                                                    "id": 17109,
                                                    "name": "admin",
                                                    "nodeType": "Identifier",
                                                    "overloadedDeclarations": [],
                                                    "referencedDeclaration": 17090,
                                                    "src": "330:5:122",
                                                    "typeDescriptions": {
                                                        "typeIdentifier": "t_address",
                                                        "typeString": "address"
                                                    }
                                                },
                                                "src": "316:19:122",
                                                "typeDescriptions": {
                                                    "typeIdentifier": "t_bool",
                                                    "typeString": "bool"
                                                }
                                            }
                                        ],
                                        "expression": {
                                            "argumentTypes": [
                                                {
                                                    "typeIdentifier": "t_bool",
                                                    "typeString": "bool"
                                                }
                                            ],
                                            "id": 17106,
                                            "name": "require",
                                            "nodeType": "Identifier",
                                            "overloadedDeclarations": [
                                                4294967278,
                                                4294967278
                                            ],
                                            "referencedDeclaration": 4294967278,
                                            "src": "308:7:122",
                                            "typeDescriptions": {
                                                "typeIdentifier": "t_function_require_pure$_t_bool_$returns$__$",
                                                "typeString": "function (bool) pure"
                                            }
                                        },
                                        "id": 17111,
                                        "isConstant": false,
                                        "isLValue": false,
                                        "isPure": false,
                                        "kind": "functionCall",
                                        "lValueRequested": false,
                                        "names": [],
                                        "nodeType": "FunctionCall",
                                        "src": "308:28:122",
                                        "tryCall": false,
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_tuple$__$",
                                            "typeString": "tuple()"
                                        }
                                    },
                                    "id": 17112,
                                    "nodeType": "ExpressionStatement",
                                    "src": "308:28:122"
                                },
                                {
                                    "id": 17113,
                                    "nodeType": "PlaceholderStatement",
                                    "src": "347:1:122"
                                }
                            ]
                        },
                        "id": 17115,
                        "name": "_isOwner",
                        "nodeType": "ModifierDefinition",
                        "parameters": {
                            "id": 17105,
                            "nodeType": "ParameterList",
                            "parameters": [],
                            "src": "294:2:122"
                        },
                        "src": "276:80:122",
                        "virtual": false,
                        "visibility": "internal"
                    },
                    {
                        "body": {
                            "id": 17126,
                            "nodeType": "Block",
                            "src": "424:34:122",
                            "statements": [
                                {
                                    "expression": {
                                        "id": 17124,
                                        "isConstant": false,
                                        "isLValue": false,
                                        "isPure": false,
                                        "lValueRequested": false,
                                        "leftHandSide": {
                                            "id": 17122,
                                            "name": "admin",
                                            "nodeType": "Identifier",
                                            "overloadedDeclarations": [],
                                            "referencedDeclaration": 17090,
                                            "src": "435:5:122",
                                            "typeDescriptions": {
                                                "typeIdentifier": "t_address",
                                                "typeString": "address"
                                            }
                                        },
                                        "nodeType": "Assignment",
                                        "operator": "=",
                                        "rightHandSide": {
                                            "id": 17123,
                                            "name": "manager",
                                            "nodeType": "Identifier",
                                            "overloadedDeclarations": [],
                                            "referencedDeclaration": 17117,
                                            "src": "443:7:122",
                                            "typeDescriptions": {
                                                "typeIdentifier": "t_address",
                                                "typeString": "address"
                                            }
                                        },
                                        "src": "435:15:122",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_address",
                                            "typeString": "address"
                                        }
                                    },
                                    "id": 17125,
                                    "nodeType": "ExpressionStatement",
                                    "src": "435:15:122"
                                }
                            ]
                        },
                        "functionSelector": "a6f9dae1",
                        "id": 17127,
                        "implemented": true,
                        "kind": "function",
                        "modifiers": [
                            {
                                "id": 17120,
                                "modifierName": {
                                    "id": 17119,
                                    "name": "_isOwner",
                                    "nodeType": "IdentifierPath",
                                    "referencedDeclaration": 17115,
                                    "src": "415:8:122"
                                },
                                "nodeType": "ModifierInvocation",
                                "src": "415:8:122"
                            }
                        ],
                        "name": "changeOwner",
                        "nodeType": "FunctionDefinition",
                        "parameters": {
                            "id": 17118,
                            "nodeType": "ParameterList",
                            "parameters": [
                                {
                                    "constant": false,
                                    "id": 17117,
                                    "mutability": "mutable",
                                    "name": "manager",
                                    "nodeType": "VariableDeclaration",
                                    "scope": 17127,
                                    "src": "389:15:122",
                                    "stateVariable": false,
                                    "storageLocation": "default",
                                    "typeDescriptions": {
                                        "typeIdentifier": "t_address",
                                        "typeString": "address"
                                    },
                                    "typeName": {
                                        "id": 17116,
                                        "name": "address",
                                        "nodeType": "ElementaryTypeName",
                                        "src": "389:7:122",
                                        "stateMutability": "nonpayable",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_address",
                                            "typeString": "address"
                                        }
                                    },
                                    "visibility": "internal"
                                }
                            ],
                            "src": "388:17:122"
                        },
                        "returnParameters": {
                            "id": 17121,
                            "nodeType": "ParameterList",
                            "parameters": [],
                            "src": "424:0:122"
                        },
                        "scope": 17158,
                        "src": "368:90:122",
                        "stateMutability": "nonpayable",
                        "virtual": false,
                        "visibility": "external"
                    },
                    {
                        "body": {
                            "id": 17141,
                            "nodeType": "Block",
                            "src": "529:41:122",
                            "statements": [
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "id": 17137,
                                                "name": "account",
                                                "nodeType": "Identifier",
                                                "overloadedDeclarations": [],
                                                "referencedDeclaration": 17129,
                                                "src": "546:7:122",
                                                "typeDescriptions": {
                                                    "typeIdentifier": "t_address",
                                                    "typeString": "address"
                                                }
                                            },
                                            {
                                                "id": 17138,
                                                "name": "amount",
                                                "nodeType": "Identifier",
                                                "overloadedDeclarations": [],
                                                "referencedDeclaration": 17131,
                                                "src": "555:6:122",
                                                "typeDescriptions": {
                                                    "typeIdentifier": "t_uint256",
                                                    "typeString": "uint256"
                                                }
                                            }
                                        ],
                                        "expression": {
                                            "argumentTypes": [
                                                {
                                                    "typeIdentifier": "t_address",
                                                    "typeString": "address"
                                                },
                                                {
                                                    "typeIdentifier": "t_uint256",
                                                    "typeString": "uint256"
                                                }
                                            ],
                                            "id": 17136,
                                            "name": "_mint",
                                            "nodeType": "Identifier",
                                            "overloadedDeclarations": [],
                                            "referencedDeclaration": 20538,
                                            "src": "540:5:122",
                                            "typeDescriptions": {
                                                "typeIdentifier": "t_function_internal_nonpayable$_t_address_$_t_uint256_$returns$__$",
                                                "typeString": "function (address,uint256)"
                                            }
                                        },
                                        "id": 17139,
                                        "isConstant": false,
                                        "isLValue": false,
                                        "isPure": false,
                                        "kind": "functionCall",
                                        "lValueRequested": false,
                                        "names": [],
                                        "nodeType": "FunctionCall",
                                        "src": "540:22:122",
                                        "tryCall": false,
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_tuple$__$",
                                            "typeString": "tuple()"
                                        }
                                    },
                                    "id": 17140,
                                    "nodeType": "ExpressionStatement",
                                    "src": "540:22:122"
                                }
                            ]
                        },
                        "functionSelector": "40c10f19",
                        "id": 17142,
                        "implemented": true,
                        "kind": "function",
                        "modifiers": [
                            {
                                "id": 17134,
                                "modifierName": {
                                    "id": 17133,
                                    "name": "_isOwner",
                                    "nodeType": "IdentifierPath",
                                    "referencedDeclaration": 17115,
                                    "src": "520:8:122"
                                },
                                "nodeType": "ModifierInvocation",
                                "src": "520:8:122"
                            }
                        ],
                        "name": "mint",
                        "nodeType": "FunctionDefinition",
                        "parameters": {
                            "id": 17132,
                            "nodeType": "ParameterList",
                            "parameters": [
                                {
                                    "constant": false,
                                    "id": 17129,
                                    "mutability": "mutable",
                                    "name": "account",
                                    "nodeType": "VariableDeclaration",
                                    "scope": 17142,
                                    "src": "478:15:122",
                                    "stateVariable": false,
                                    "storageLocation": "default",
                                    "typeDescriptions": {
                                        "typeIdentifier": "t_address",
                                        "typeString": "address"
                                    },
                                    "typeName": {
                                        "id": 17128,
                                        "name": "address",
                                        "nodeType": "ElementaryTypeName",
                                        "src": "478:7:122",
                                        "stateMutability": "nonpayable",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_address",
                                            "typeString": "address"
                                        }
                                    },
                                    "visibility": "internal"
                                },
                                {
                                    "constant": false,
                                    "id": 17131,
                                    "mutability": "mutable",
                                    "name": "amount",
                                    "nodeType": "VariableDeclaration",
                                    "scope": 17142,
                                    "src": "495:14:122",
                                    "stateVariable": false,
                                    "storageLocation": "default",
                                    "typeDescriptions": {
                                        "typeIdentifier": "t_uint256",
                                        "typeString": "uint256"
                                    },
                                    "typeName": {
                                        "id": 17130,
                                        "name": "uint256",
                                        "nodeType": "ElementaryTypeName",
                                        "src": "495:7:122",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_uint256",
                                            "typeString": "uint256"
                                        }
                                    },
                                    "visibility": "internal"
                                }
                            ],
                            "src": "477:33:122"
                        },
                        "returnParameters": {
                            "id": 17135,
                            "nodeType": "ParameterList",
                            "parameters": [],
                            "src": "529:0:122"
                        },
                        "scope": 17158,
                        "src": "464:106:122",
                        "stateMutability": "nonpayable",
                        "virtual": false,
                        "visibility": "external"
                    },
                    {
                        "body": {
                            "id": 17156,
                            "nodeType": "Block",
                            "src": "640:41:122",
                            "statements": [
                                {
                                    "expression": {
                                        "arguments": [
                                            {
                                                "id": 17152,
                                                "name": "account",
                                                "nodeType": "Identifier",
                                                "overloadedDeclarations": [],
                                                "referencedDeclaration": 17144,
                                                "src": "657:7:122",
                                                "typeDescriptions": {
                                                    "typeIdentifier": "t_address",
                                                    "typeString": "address"
                                                }
                                            },
                                            {
                                                "id": 17153,
                                                "name": "amount",
                                                "nodeType": "Identifier",
                                                "overloadedDeclarations": [],
                                                "referencedDeclaration": 17146,
                                                "src": "666:6:122",
                                                "typeDescriptions": {
                                                    "typeIdentifier": "t_uint256",
                                                    "typeString": "uint256"
                                                }
                                            }
                                        ],
                                        "expression": {
                                            "argumentTypes": [
                                                {
                                                    "typeIdentifier": "t_address",
                                                    "typeString": "address"
                                                },
                                                {
                                                    "typeIdentifier": "t_uint256",
                                                    "typeString": "uint256"
                                                }
                                            ],
                                            "id": 17151,
                                            "name": "_burn",
                                            "nodeType": "Identifier",
                                            "overloadedDeclarations": [],
                                            "referencedDeclaration": 20610,
                                            "src": "651:5:122",
                                            "typeDescriptions": {
                                                "typeIdentifier": "t_function_internal_nonpayable$_t_address_$_t_uint256_$returns$__$",
                                                "typeString": "function (address,uint256)"
                                            }
                                        },
                                        "id": 17154,
                                        "isConstant": false,
                                        "isLValue": false,
                                        "isPure": false,
                                        "kind": "functionCall",
                                        "lValueRequested": false,
                                        "names": [],
                                        "nodeType": "FunctionCall",
                                        "src": "651:22:122",
                                        "tryCall": false,
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_tuple$__$",
                                            "typeString": "tuple()"
                                        }
                                    },
                                    "id": 17155,
                                    "nodeType": "ExpressionStatement",
                                    "src": "651:22:122"
                                }
                            ]
                        },
                        "functionSelector": "9dc29fac",
                        "id": 17157,
                        "implemented": true,
                        "kind": "function",
                        "modifiers": [
                            {
                                "id": 17149,
                                "modifierName": {
                                    "id": 17148,
                                    "name": "_isOwner",
                                    "nodeType": "IdentifierPath",
                                    "referencedDeclaration": 17115,
                                    "src": "632:8:122"
                                },
                                "nodeType": "ModifierInvocation",
                                "src": "632:8:122"
                            }
                        ],
                        "name": "burn",
                        "nodeType": "FunctionDefinition",
                        "parameters": {
                            "id": 17147,
                            "nodeType": "ParameterList",
                            "parameters": [
                                {
                                    "constant": false,
                                    "id": 17144,
                                    "mutability": "mutable",
                                    "name": "account",
                                    "nodeType": "VariableDeclaration",
                                    "scope": 17157,
                                    "src": "590:15:122",
                                    "stateVariable": false,
                                    "storageLocation": "default",
                                    "typeDescriptions": {
                                        "typeIdentifier": "t_address",
                                        "typeString": "address"
                                    },
                                    "typeName": {
                                        "id": 17143,
                                        "name": "address",
                                        "nodeType": "ElementaryTypeName",
                                        "src": "590:7:122",
                                        "stateMutability": "nonpayable",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_address",
                                            "typeString": "address"
                                        }
                                    },
                                    "visibility": "internal"
                                },
                                {
                                    "constant": false,
                                    "id": 17146,
                                    "mutability": "mutable",
                                    "name": "amount",
                                    "nodeType": "VariableDeclaration",
                                    "scope": 17157,
                                    "src": "607:14:122",
                                    "stateVariable": false,
                                    "storageLocation": "default",
                                    "typeDescriptions": {
                                        "typeIdentifier": "t_uint256",
                                        "typeString": "uint256"
                                    },
                                    "typeName": {
                                        "id": 17145,
                                        "name": "uint256",
                                        "nodeType": "ElementaryTypeName",
                                        "src": "607:7:122",
                                        "typeDescriptions": {
                                            "typeIdentifier": "t_uint256",
                                            "typeString": "uint256"
                                        }
                                    },
                                    "visibility": "internal"
                                }
                            ],
                            "src": "589:33:122"
                        },
                        "returnParameters": {
                            "id": 17150,
                            "nodeType": "ParameterList",
                            "parameters": [],
                            "src": "640:0:122"
                        },
                        "scope": 17158,
                        "src": "576:105:122",
                        "stateMutability": "nonpayable",
                        "virtual": false,
                        "visibility": "external"
                    }
                ],
                "scope": 17159,
                "src": "117:567:122"
            }
        ],
        "src": "33:651:122"
    },
    "compiler": {
        "name": "solc",
        "version": "0.8.0+commit.c7dfd78e.Emscripten.clang"
    },
    "networks": {
        "666": {
            "address": "0x63A2F69c394554577108481FED5d24560C84f67d"
        },
        "1234": {
            "address": "0x3626F8413358C8DF8Ec579eF4C835F830d863440"
        }
    },
    "schemaVersion": "3.4.1",
    "updatedAt": "2021-09-18T07:17:22.741Z",
    "networkType": "ethereum",
    "devdoc": {
        "kind": "dev",
        "methods": {
            "allowance(address,address)": {
                "details": "See {IERC20-allowance}."
            },
            "approve(address,uint256)": {
                "details": "See {IERC20-approve}. Requirements: - `spender` cannot be the zero address."
            },
            "balanceOf(address)": {
                "details": "See {IERC20-balanceOf}."
            },
            "decimals()": {
                "details": "Returns the number of decimals used to get its user representation. For example, if `decimals` equals `2`, a balance of `505` tokens should be displayed to a user as `5,05` (`505 / 10 ** 2`). Tokens usually opt for a value of 18, imitating the relationship between Ether and Wei. This is the value {ERC20} uses, unless this function is overridden; NOTE: This information is only used for _display_ purposes: it in no way affects any of the arithmetic of the contract, including {IERC20-balanceOf} and {IERC20-transfer}."
            },
            "decreaseAllowance(address,uint256)": {
                "details": "Atomically decreases the allowance granted to `spender` by the caller. This is an alternative to {approve} that can be used as a mitigation for problems described in {IERC20-approve}. Emits an {Approval} event indicating the updated allowance. Requirements: - `spender` cannot be the zero address. - `spender` must have allowance for the caller of at least `subtractedValue`."
            },
            "increaseAllowance(address,uint256)": {
                "details": "Atomically increases the allowance granted to `spender` by the caller. This is an alternative to {approve} that can be used as a mitigation for problems described in {IERC20-approve}. Emits an {Approval} event indicating the updated allowance. Requirements: - `spender` cannot be the zero address."
            },
            "name()": {
                "details": "Returns the name of the token."
            },
            "symbol()": {
                "details": "Returns the symbol of the token, usually a shorter version of the name."
            },
            "totalSupply()": {
                "details": "See {IERC20-totalSupply}."
            },
            "transfer(address,uint256)": {
                "details": "See {IERC20-transfer}. Requirements: - `recipient` cannot be the zero address. - the caller must have a balance of at least `amount`."
            },
            "transferFrom(address,address,uint256)": {
                "details": "See {IERC20-transferFrom}. Emits an {Approval} event indicating the updated allowance. This is not required by the EIP. See the note at the beginning of {ERC20}. Requirements: - `sender` and `recipient` cannot be the zero address. - `sender` must have a balance of at least `amount`. - the caller must have allowance for ``sender``'s tokens of at least `amount`."
            }
        },
        "version": 1
    },
    "userdoc": {
        "kind": "user",
        "methods": {},
        "version": 1
    }
}
WIZ;
define('ABI_TRC20',$erc20);
