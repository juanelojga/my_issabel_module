<?php

require_once __DIR__ . '/bootstrap/bootstrap.php';
require_once __DIR__ . '/configs/default.conf.php';
require_once __DIR__ . '/../../libs/paloSantoGrid.class.php';

use App\Models\DeviceModel;

$lang_file = __DIR__ . '/lang/' . get_language() . '.lang';
file_exists($lang_file) ? include_once $lang_file : include_once __DIR__ . '/lang/en.lang';

function _moduleContent(&$smarty, $module_name)
{
  global $arrConf;
  global $arrConfModule;
  global $arrLang;
  global $arrLangModule;
  
  $arrConf = array_merge($arrConf, $arrConfModule);
  $arrLang = array_merge($arrLang, $arrLangModule);
  $template = 'modules/' . $module_name . '/' . $arrConf['templates_dir'] . '/default';

  $dsn = generarDSNSistema('root', '');
  $model = new DeviceModel(new \paloDB($dsn));

  $grid = new paloSantoGrid($smarty);
  $grid->setTitle($arrConf['module_title']);
  $grid->pagingShow(false);

  $grid->setColumns([
    _tr('User Extension'),
    _tr('Display Extension'),
  ]);

  $total = $model->count();
  $grid->setTotal($total['total']);

  $list = $model->index();
  $data = [];
  if (is_array($list) && $total['total'] > 0) {
    foreach ($list as $item) {
      array_push($data, [
        $item['user'],
        $item['description']
      ]);
    }
  }
  $grid->setData($data);

  return $grid->fetchGrid();
}
