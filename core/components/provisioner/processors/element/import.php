<?php
/**
 * Element Import processor
 *
 * @category  Provisioning
 * @author    S. Hamblett <steve.hamblett@linux.com>
 * @copyright 2009 S. Hamblett
 * @license   GPLv3 http://www.gnu.org/licenses/gpl.html
 * @link      none
 *
 * @package   provisioner
 * @subpackage processors
 **/
require_once dirname(dirname(__FILE__)).'/index.php';

/* Check the incoming parameters */
$id = -1;
$convert = false;

if (@$_REQUEST['id'] != '') {
	
	$id = $_REQUEST['id'];
}

if (@$_REQUEST['convert'] != '') {

	if ( $_REQUEST['convert'] == 'true' ) $convert = true;
}

$errorstring = "";

/* Pass the parameters to the Provisioner class method */
$result = $pv->importElements($id, $convert, $errorstring);

/* Check the result for error */
if ($result !== true) {
	return $modx->error->failure($modx->lexicon('importelementsfailed')." - ".$errorstring);
}

return $modx->error->success($modx->lexicon('importsuccess'));;

