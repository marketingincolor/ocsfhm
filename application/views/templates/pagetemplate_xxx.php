<?php 

$this->load->view('includes/header');
$this->load->view('includes/nav');
echo '<div id="content">';
echo $content_a;
echo $content_b;
echo $content_c;
echo $content_d;
echo '</div>';
$this->load->view('includes/footer');

/*
$meta = array(
        array('name' => 'robots', 'content' => 'no-cache'),
        array('name' => 'description', 'content' => 'Demo Site'),
        array('name' => 'keywords', 'content' => 'keyword, keyword, keyword, keyword, keyword'),
        array('name' => 'robots', 'content' => 'no-cache'),
        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
    );
$type = 'xhtml11'; 
$headopen = '<html><head>';
$titleopen = '<title>';
$titleclose = '</title>';
$headclose = '</head><body>';
$bodyclose = '</body></html>';
$css = '';//link_tag('css/'.$style.'.css');
//$fave = link_tag('favicon.ico', 'shortcut icon', 'image/ico');

echo doctype($type) . $headopen . meta($meta) . $css;
echo $titleopen . $title . $titleclose;
echo $headclose . $content . $bodyclose; 
*/

