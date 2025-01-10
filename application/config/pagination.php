<?php
$config['base_url'] = 'http://enterprise.test/mahasiswa';
$config['use_page_numbers'] = true;
$config['page_query_string'] = true;
$config['query_string_segment'] = 'page';
$config['reuse_query_string'] = true;

$config['full_tag_open'] = '<nav aria-label="Page navigation"> <ul class="pagination justify-content-end">';
$config['full_tag_close'] = '</ul> </nav>';

$config['first_link'] = '1';
$config['first_tag_open'] = '<li class="page-item">';
$config['first_tag_close'] = '</li>';

$config['last_tag_open'] = '<li class="page-item">';
$config['last_tag_close'] = '</li>';

$config['next_link'] = '<i class="bi bi-chevron-right fs-8"></i>';
$config['next_tag_open'] = '<li class="page-item">';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = '<i class="bi bi-chevron-left fs-8"></i>';
$config['prev_tag_open'] = '<li class="page-item">';
$config['prev_tag_close'] = '</li>';

$config['cur_tag_open'] = '<li class="page-item active" aria-current="page"> <a class="page-link" href="">';
$config['cur_tag_close'] = '</a></li>';

$config['num_tag_open'] = '<li class="page-item">';
$config['num_tag_close'] = '</li>';

$config['attributes'] = array('class' => 'page-link');
