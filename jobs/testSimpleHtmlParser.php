<?php
	/**
	 * file
	 * file_get_contents
	 * curl
	 */
	define("DEBUG", true);
	define("STARTTIME", microtime());
	$_SGLOBAL = array();
	include("MysqlUtil.class.php");
	include("../libs/simplehtmldom_1_5/simple_html_dom.php");
	
	$db = new MysqlUtil();
	$db -> charset = "utf8";
	$db -> connect("localhost:3306", "root", "root", "huohuamarket");
	
	$url = "http://www.cnphp.info/php-simple-html-dom-parser-intro.html";
	
	// �½�һ��Domʵ��
	$html = new simple_html_dom();
	 
	// ��url�м���
	$html -> load_file($url);
	 
	// ���ַ����м���
	//$html -> load('<html><body>���ַ����м���html�ĵ���ʾ</body></html>');
	 
	//���ļ��м���
	//$html -> load_file('path/file/test.html');
	
	//����html�ĵ��еĳ�����Ԫ��
	$a = $html -> find('a');
	 
	//�����ĵ��е�(N)�������ӣ����û���ҵ��򷵻ؿ�����.
	$a = $html -> find('a', 0);
	 
	// ����idΪmain��divԪ��
	$main = $html -> find('div[id=main]', 0);
	 
	// �������а�����id���Ե�divԪ��
	$divs = $html -> find('div[id]');
	 
	// �������а�����id���Ե�Ԫ��
	$divs = $html -> find('[id]');
	
	// ����id='#container'��Ԫ��
	$ret = $html -> find('#container');
	 
	// �ҵ�����class=foo��Ԫ��
	$ret = $html -> find('.foo');
	 
	// ���Ҷ��html��ǩ
	$ret = $html -> find('a, img');
	 
	// ������������
	$ret = $html -> find('a[title], img[title]');
	
	// ���� ul�б������е�li��
	$ret = $html -> find('ul li');
	 
	//���� ul �б�ָ��class=selected��li��
	$ret = $html -> find('ul li.selected');
	
	$e = $html -> find('a', 0);
	// ���ظ�Ԫ��
	$e -> parent;
	 
	// ������Ԫ������
	$e -> children;
	 
	// ͨ�������ŷ���ָ����Ԫ��
	$e -> children(0);
	 
	// ���ص�һ����Դ��
	$e -> first_child ();
	 
	// �������һ����Ԫ��
	$e -> last_child();
	 
	// ������һ������Ԫ��
	$e -> prev_sibling ();
	 
	//������һ������Ԫ��
	$e -> next_sibling ();
	
	/**
	 * ʹ�ü򵥵�������ʽ����������ѡ������
	 * [attribute] �C ѡ�����ĳ���Ե�htmlԪ��
	 * [attribute=value] �C ѡ������ָ��ֵ���Ե�htmlԪ��
	 * [attribute!=value]- ѡ�����з�ָ��ֵ���Ե�htmlԪ��
	 * [attribute^=value] -ѡ������ָ��ֵ��ͷ���Ե�htmlԪ��
	 * [attribute$=value] ѡ������ָ��ֵ��β���Ե�htmlԪ��
	 * [attribute*=value] -ѡ�����а���ָ��ֵ���Ե�htmlԪ��
	 */
	 // �����н�$a��ê����ֵ����$link����
	$link = $a -> href;
	$link = $html -> find('a', 0) -> href;
	
	/**
	 * ÿ��������4��������������:
	tag �C ����html��ǩ��
	innertext �C ����innerHTML
	outertext �C ����outerHTML
	plaintext �C ����html��ǩ�е��ı�
	 */
	 
	 //��$a��ê���Ӹ���ֵ
	$a -> href = 'http://www.cnphp.info';
	 
	// ɾ��ê����
	$a -> href = null;
	 
	// ����Ƿ����ê����
	if(isset($a -> href)) {
		//����
	}
	
	// ��װԪ��
	$e -> outertext = '<div class="wrap">' . $e -> outertext . '<div>';
 
	// ɾ��Ԫ��
	$e -> outertext = '';
	 
	// ���Ԫ��
	$e -> outertext = $e->outertext . '<div>foo<div>';
	 
	// ����Ԫ��
	$e -> outertext = '<div>foo<div>' . $e->outertext;
	
	$html -> clear();
?>