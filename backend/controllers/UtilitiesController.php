<?php

namespace backend\controllers;

use common\models\Vlan;
use common\models\Device;
use common\models\Ip;
use common\models\Port;
use common\models\Subnet;
use common\models\Order;
use backend\models\VardaVlan;
use backend\models\VardaCommutator;
use backend\models\VardaCommutatorModel;
use backend\models\VardaSubnet;
use backend\models\VardaClient;

//include 'app\common\utilities\lib.php';
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


function pr($v = '[NOT PR]', $var = 0){
	echo '<pre>';
	if ($var) {
		var_dump($v);
	} else print_r($v);
	echo '</pre>';
}

function dpr($v = '[NOT DPR]',$var = 0){
	pr($v, $var);
	die('[[DIE DPR]]');
}


class UtilitiesController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$_HTML = '';
		$_HTML1 = '';


		if (isset($_GET['st_vlan'])) $_HTML = importvlan();
		if (isset($_GET['st_commutator'])) $_HTML = importcommutator();
		if (isset($_GET['st_subnet'])) $_HTML = importsubnet();
		if (isset($_GET['st_client1'])) {
		
			$vardaclients = VardaClient::find()
		    ->orderBy('id')
			->all()
			;
			$i = 0;
			foreach ($vardaclients as $value) {
				$i++;
				$order = new Order();
				$order->id = $value->id;
				$order->abonent = $value->client_fio;
				$order->address = $value->client_address;
				$order->description = $value->description;
				// $order->number ;
				// $order->service_id ;
				$order->save();
			}
			$_HTML .= '   Обновлено ' . $i . ' из ' . count($vardaclients) . ' записей.';
		}

		if (isset($_GET['st_client2'])) {
			$vardaclients = VardaClient::find()
		    ->orderBy('id')
			->all()
			;
			$i = 0;
			foreach ($vardaclients as $value) {
				// ip
				// subnet
				$ip_a = sprintf('%u', ip2long($value->ip));
				if ($ip_a) {
					$i++;
					$ip = new Ip();
					$ip->iplong = $ip_a;
					$ip->order_id = $value->id;
					$ip->subnet_id = $value->subnet;
					$ip->save();
				}
			}
			$_HTML .= '   Обновлено ' . $i . ' из ' . count($vardaclients) . ' записей.';
		}
		if (isset($_GET['st_client3'])) {
				// port
				// commutator
			$vardaclients = VardaClient::find()
		    ->orderBy('id')
			->all()
			;
			$i = 0;
			foreach ($vardaclients as $value) {
					$i++;
				$port = new Port();
				$port->number = $value->port;
				$port->order_id = $value->id;
				$port->device_id = $value->commutator;
				$port->save();
			}
			$_HTML .= '   Обновлено ' . $i . ' из ' . count($vardaclients) . ' записей.';
		}
				

		if (isset($_GET['st_client4'])) {
			$vardaclients = VardaClient::find()
		    ->orderBy('id')
			->all()
			;
			$i = 0;
			foreach ($vardaclients as $value) {
				// vlan
				$vlan = Vlan::find()->where(['id' => $value->vlan])->one();
				if ($vlan) {
					$i++;
					$vlan->order_id = $value->id;
					$vlan->save();
				}

				// $order->area_id = $value->bras;
			}
			$_HTML .= '   Обновлено ' . $i . ' из ' . count($vardaclients) . ' записей.';
		}
		
        return $this->render('index', ['_HTML' => $_HTML, '_HTML1' => $_HTML1,]);
    }
}
    
    function importvlan() {

			Device::updateAll(['up_port_id' => NULL]);
			Device::updateAll(['mng_ip_id' => NULL]);
			Port::deleteAll();
			Ip::deleteAll();
			Device::deleteAll();
			Subnet::deleteAll();
			Vlan::deleteAll();
			Order::deleteAll();

			$vardavlans = VardaVlan::find()
		    ->orderBy('id')
			->all()
			;
				// вставить новую строку данных
			foreach ($vardavlans as $value) {
				$vlan = new Vlan();
				$vlan->id = $value->id;
				$vlan->number = $value->number;
				$vlan->description = $value->name;
				$vlan->groupvlan_id = $value->bras;
				$vlan->save();
			}
			return $_HTML = 'Обновлено ' . count($vardavlans) . ' записей.';

		}

		function importcommutator() {
		
			//выполняем код по нажатию кнопки "start"
			$vardacommutators = VardaCommutator::find()
		    ->orderBy('id')
			->all()
			;

			$i1 = 0;
			$i2 = 0;
			foreach ($vardacommutators as $value) {
				$device = new Device();
				$device->id = $value->id;
				$device->description = $value->description;
				$device->address = $value->switch_address;
				$device->modeldevice = $value->model0->name;
				$ip = new Ip();
				$ip->iplong = sprintf('%u', ip2long($value->ip));
				$ip->save();
				$device->mng_ip_id = $ip->id;
				$device->save();
				$i1++;
			}
			$_HTML = 'Обновлено ' . $i1 . ' записей.';

			$commutators = Device::find()
			->joinWith('mngIp')
		    ->orderBy('id')
			// ->limit(3)
			->all()
			;
			// Port::updateAll(['device_id' => NULL]);

			foreach ($commutators as $key1 => $value1) {
				$up_ip = sprintf('%u', ip2long($vardacommutators[$key1]['up']));

				foreach ($commutators as $value2) {
					if ($value2['mngIp']['iplong'] == $up_ip) {
						$port = new Port();
						$port->device_id = $value2['id'];
						$port->number = $vardacommutators[$key1]['up_port']; 
						$port->save();
						$value1->up_port_id = $port->id;
						$value1->save();
						$i2++;
						break;
					}
				}
			}
			$_HTML1 = '<br>Обновлено ' . $i2 . ' записей.';
			return $_HTML . $_HTML1;
		}

		function importsubnet() {
		
			$vardasubnets = VardaSubnet::find()
		    ->orderBy('id')
			->all()
			;
			$i = 0;
			foreach ($vardasubnets as $value) {
				$subnet = new Subnet();
				$subnet->id = $value->id;
				$subnet->name = $value->subnet;
				$subnet->description = $value->region;
				$ip = new Ip();
				$ip->iplong = sprintf('%u', ip2long($value->gateway));
				$ip->save();
				$subnet->gateway = $ip->id;
				$subname = explode("/", $value->subnet);
				$subnet->mask = $subname[1];
				$subname[0] = sprintf('%u', ip2long($subname[0]));
				$subnet_ip = Ip::find()->where(['iplong' => $subname[0]])->one();
				if ($subnet_ip) {
					$subnet->ip = $subnet_ip->id;
				} else {
					$ip = new Ip();
					$ip->iplong = $subname[0];
					$ip->save();
					$subnet->gateway = $ip->id;
				}
				// $subnet->area_id = $value->bras;
				$subnet->save();
				$i++;
			}
			return $_HTML = 'Обновлено ' . $i . ' записей.';
		}

/////////////////////////////////////////
		// pr($up_ip);
		// pr($port11);
/////////////////////////////////
		// $_pr1 .= pr($up_ip);
		// $_pr1 .= pr($up_commutator);

        
