<?php
	$str = '{"test":"test"}';
	$obj = new StdClass;
	$obj -> p1 = "";
	class Foo {
		public $p1;
		protected $p2;
		private $p3;
	}
	$json = json_decode($str);
	$reflect = new ReflectionObject($obj);
	echo $reflect -> hasProperty("test");
	
	include("functions.php");
	include("entities\Entity.php");
	class TestEntity extends Entity {
		public function __construct() {
			parent::__construct("test");
		}
		
		function iterateVisible() {
			echo "Entity::iterateVisible:\n";
			foreach($this as $key => $value) {
				print "$key => $value\n";
			}
		}
	}
	$testEntity = new TestEntity();
	$reflect = new ReflectionObject($testEntity);
	
	foreach($testEntity as $key => $value) {
		print "$key => $value\n";
	}
	echo "\n";
	
	$testEntity -> iterateVisible();
	
	$str = "Don't be shy";
	echo str_replace("'", "\'", $str);
	
	
	
	//ȡ��ָ��λַ�ă��ݣ��K������text
	$text = file_get_contents('http://andy.diimii.com/');
	//ȡ������img�˻`���K���������S���match
	preg_match_all('#<img[^>]*>#i', $text, $match);
	//ӡ��match
	print_r($match);
	
	//ȡ��ָ��λַ�ă��ݣ��K������text
	$text = file_get_contents('http://andy.diimii.com/');
	//ȡ�õ�һ��img�˻`���K���������match��regex�Z���c����ͬ�x��
	preg_match('/<img[^>]*>/Ui', $text, $match);
	//ӡ��match
	print_r($match);
	
	//ȡ��ָ��λַ�ă��ݣ��K������text
	$text = file_get_contents('http://andy.diimii.com/2009/01/seo�����P�I�֏V���B�Y/');
	//ȥ���Q�м��հ���Ԫ�����л����ݲ���ʹ�ã�
	//$text=str_replace(array("\r","\n","\t","\s"), '', $text);
	//ȡ��div�˻`��id��PostContent�ă��ݣ��K���������match
	preg_match('/<div[^>]*id="PostContent"[^>]*>(.*?) <\/div>/si', $text, $match);
	//ӡ��match[0]
	print($match[0]);
	
	//ȡ��ָ��λַ�ă��ݣ��K������text
	$text = file_get_contents('http://andy.diimii.com/2009/01/seo�����P�I�֏V���B�Y/');
	//ȡ��div�˻`��id��PostContent�ă��ݣ��K���������match
	preg_match('/<div[^>]*id="PostContent"[^>]*>(.*?) <\/div>/si',$text,$match);
	//ȡ�õ�һ��img�˻`���K���������match2
	preg_match('/<img[^>]*>/Ui', $match[0], $match2);
	//ӡ��match2[0]
	print_r($match2[0]);
	
	function() {
		// ˵���������PHP�ļ���ֱ�ӿ���ͼƬ
		$image = "";
		header("Content-type: image/gif");
		exit(base64_decode($image));
	}
?>