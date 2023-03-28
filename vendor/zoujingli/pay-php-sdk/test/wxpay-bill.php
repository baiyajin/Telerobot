<?php

// +----------------------------------------------------------------------
// | pay-php-sdk
// +----------------------------------------------------------------------
// | 版权所有 2014~2017 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/zoujingli/pay-php-sdk
// +----------------------------------------------------------------------

include '../init.php';

// 加载配置参数
$config = require(__DIR__ . '/config.php');

// 支付参数
$payOrder = [
    'bill_date' => '20171006', // 对账单日期
    'bill_type' => 'ALL', // 账单类型
    // 'tar_type'  => 'GZIP', // 压缩账单
];

// 实例支付对象
$pay = new \Pay\Pay($config);

try {
    echo '<pre>';
    $options = $pay->driver('wechat')->gateway('bill')->apply($payOrder);
    var_export($options);
} catch (Exception $e) {
    echo $e->getMessage();
}


