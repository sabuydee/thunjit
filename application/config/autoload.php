<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array(
    'System',
    'table',
    'database',
    'form_validation',
    'Database/Subquery',
    'session',
    'Thunjit/Service',
    'HtmlTool/Htable',
    'HtmlTool/ToolHtml',
    'HtmlTool/Hoption',
    'IForm/IManage',
    'IForm/IDropdown',
    
    'Dropdown',
    'Link',
    'HtmlTool/Hselect',
    'HtmlTool/FM'    
);
$autoload['helper'] = array('url', 'html');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array(
    'ModelUser',
    'ModelUserGroup',
    'ModelGender',
    'ModelProvince',
    'ModelRoute',
    'ModelRouteHasCarType',
    'ModelCarType',
    'ModelTravel',
    'ModelTicket',
    'ModelVans',
    'ModelStation',
    'ModelBooking',
    'ModelTicketStatus',
    'ModelBookingHasTicket'
);
/* End of file autoload.php */
/* Location: ./application/config/autoload.php */