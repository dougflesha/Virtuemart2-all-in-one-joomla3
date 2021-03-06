<?php
defined('_JEXEC') or  die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );
/*
* manufacturer Module
*
* @package VirtueMart
* @subpackage modules
*
* 	@copyright (C) 2010 - 2014 Patrick Kohl
// W: demo.st42.fr
// E: cyber__fr|at|hotmail.com
*
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* VirtueMart is Free Software.
* VirtueMart comes with absolute no warranty.
*
* www.virtuemart.net
*/
/* Load  VM fonction */
require('helper.php');
if (!class_exists( 'VirtueMartModelManufacturer' ))
   JLoader::import( 'manufacturer', JPATH_ADMINISTRATOR .'/components/com_virtuemart/models' );

if (!class_exists( 'VmConfig' )) require(JPATH_ADMINISTRATOR .'/components/com_virtuemart/helpers/config.php');

VmConfig::loadConfig();
VmConfig::loadJLang('mod_virtuemart_manufacturer', true);
$vendorId = JRequest::getInt('vendorid', 1);
$model = VmModel::getModel('Manufacturer');
$model->addvalidOrderingFieldName( array('slug') );
$model->_selectedOrdering = 'slug' ;
$display_style = 	$params->get( 'display_style', "div" ); // Display Style
$manufacturers_per_row = $params->get( 'manufacturers_per_row', 1 ); // Display X manufacturers per Row
$headerText = 		$params->get( 'headerText', '' ); // Display a Header Text
$footerText = 		$params->get( 'footerText', ''); // Display a footerText
$show = 			$params->get( 'show', 'all'); // Display a footerText
$moduleclass_sfx = $params->get( 'moduleclass_sfx','' );
$manufacturers = $model->getManufacturers(true, true,true);
$model->addImages($manufacturers);
if(empty($manufacturers)) return false;
/* load the template */
$layout = $params->get('layout','default');
require(JModuleHelper::getLayoutPath('mod_virtuemart_manufacturer',$layout));
?>