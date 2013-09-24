<?

defined('C5_EXECUTE') or die("Access Denied.");

class VarnishServers {
	public static function get() {
		$db = Loader::db();
		return $db->GetAll("select * from VarnishServers order by serverName");
	}

	public static function getByID($id) {
		$db = Loader::db();
		return $db->GetRow("select * from VarnishServers where serverID = ?",array($id));
	}

	//replace data, adodb's Replace: 0 on failure, 1 on update success, 2 on record-not-found insert success.
	public static function save($data) {
		$db = Loader::db();
		return $db->Replace('VarnishServers',
			array('serverID'=>(int)$data['serverID'],
					'serverName'=>$data['serverName'],
					'ipAddress'=>$data['ipAddress'],
					'port'=>$data['port'],
					'terminalKey'=>$data['terminalKey'],
					'statsProxyURL'=>$data['statsProxyURL']
			),
			'serverID',
			true);
	}

	public static function delete($id) {
		$db = Loader::db();
		return $db->Execute('delete from VarnishServers where serverID=?',array($id));
	}
}
