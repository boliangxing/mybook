<?php
/* *
 * 配置文件
 * 版本：3.5
 * 日期：2016-06-25
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 * 安全校验码查看时，输入支付密码后，页面呈灰色的现象，怎么办？
 * 解决方法：
 * 1、检查浏览器配置，不让浏览器做弹框屏蔽设置
 * 2、更换浏览器或电脑，重新登录查询。
 */

//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
//合作身份者ID，签约账号，以2088开头由16位纯数字组成的字符串，查看地址：https://openhome.alipay.com/platform/keyManage.htm?keyType=partner
$alipay_config['partner']		= '2088802578802211';

//收款支付宝账号，以2088开头由16位纯数字组成的字符串，一般情况下收款账号就是签约账号
$alipay_config['seller_id']	= '2088802578802211';

//商户的私钥,此处填写原始私钥去头去尾，RSA公私钥生成：https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.nBDxfy&treeId=58&articleId=103242&docType=1
$alipay_config['private_key']	= 'MIICXgIBAAKBgQDVYYXJKPIlwooEHQxX3uChyOsUdd5HZd9mR3UGEPeFBhNvY8/U
55gMHhbBVErYd95gcK8oeyNZlXz7vDZQ4AfLvx6LuCq/Nr5X/5IC1ufvCj6jzjZS
8Ii3li2pPPkgeJabfW3FJk0BQwNddbRwj5PvESeUlQ2bbp2Odw4NdnDU3wIDAQAB
AoGBAMoobOHaQx/3IV8oTitp4xQkEGQAD6lBINf71yj6JicHTJ55x8uD5w+D6jcb
rxVK64oe+DO4BhO3hwPQmv0gYwCvq0hRYe8EMVtFZN8AipNfiCNh4T3yHeA7GfK+
mDQpZPM4AscmpDufzNbPI+4Oj3tYSaSfF+9dkQxoE2TFbH8RAkEA+apfuXdZoXjV
V8THfXAEzq0tw42ejINPZF7j671z9HFBo8FOxBYO3DyncMVBKQDIbhA2+O3BMDhZ
aCPZtc6UAwJBANrLeSrZbRhCWrVTHz2wZqyO5qquHWQQJnX+cSwDurFhH9fiYPzI
Lyqzlfd/lfjJyBzwkoFpvFIaD4rJ24QRuvUCQGM3LatKnrfoiP/EF3Ll3UM01wbr
dKJqXFaKzxCTzUzK5UbqPx71lRo4kGHkQazFvuDeWLo74ZYEDqOv+4ige3kCQQCw
94K5tcMXrBPSNbk/HD7vs2W/B7WeCbISHgtLnniSoAwxgVkRHJmJ4FecKAYVhJ/n
SG43Xl6DybBogXycBftBAkEA7qraNEGjbS0Z7kZibD7PT7rlHDRACmEM8icwgtHl
4PM9wlqVO5p1GaMTRJ2040+6934e1aLYx9my3OHtD1DYhw==';

//支付宝的公钥，查看地址：https://openhome.alipay.com/platform/keyManage.htm?keyType=partner
$alipay_config['alipay_public_key']='MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDDI6d306Q8fIfCOaTXyiUeJHkrIvYISRcc73s3vF1ZT7XN8RNPwJxo8pWaJMmvyTn9N4HQ632qJBVHf8sxHi/fEsraprwCtzvzQETrNRwVxLO5jVmRGi60j8Ue1efIlzPXV9je9mkjzOmdssymZkh2QhUrCmZYI/FCEa3/cNMW0QIDAQAB
';

// 服务器异步通知页面路径  需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
$alipay_config['notify_url'] = "http://商户网关网址/alipay.wap.create.direct.pay.by.user-PHPUTF-8/notify_url.php";

// 页面跳转同步通知页面路径 需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
$alipay_config['return_url'] = "http://商户网址/alipay.wap.create.direct.pay.by.user-PHP-UTF-8/return_url.php";

//签名方式
$alipay_config['sign_type']    = strtoupper('RSA');

//字符编码格式 目前支持utf-8
$alipay_config['input_charset']= strtolower('utf-8');

//ca证书路径地址，用于curl中ssl校验
//请保证cacert.pem文件在当前文件夹目录中
$alipay_config['cacert']    = getcwd().'\\cacert.pem';

//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
$alipay_config['transport']    = 'http';

// 支付类型 ，无需修改
$alipay_config['payment_type'] = "1";

// 产品类型，无需修改
$alipay_config['service'] = "alipay.wap.create.direct.pay.by.user";

//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑


?>
