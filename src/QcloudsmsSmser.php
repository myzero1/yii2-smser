<?php

namespace myzero1\smser;

use yii\base\NotSupportedException;
use Qcloud\Sms\SmsSingleSender;

/**
 * 腾讯云
 * 
 * @author Myzero1 <myzero1@sina.com>
 * @property string $state read-only state
 * @property string $message read-only message
 */
class QcloudsmsSmser extends Smser
{
    /**
     * @var string
     */
    public $apikey;
    
    /**
     * @var string
     */
    public $appkey;

    /**
     * @inheritdoc
     *
     * @param string $mobile 15825368746
     * @param string $content 【腾讯云】您的验证码是: 5678
     * @return mixed
     */
    public function send($mobile, $content)
    {
        try {
            $ssender = new SmsSingleSender($this->appid, $this->appkey);
            $result = $ssender->send(0, "86", $mobile, $content, "", "");
            $rsp = json_decode($result);

            var_dump($);
            echo $result;
        } catch(\Exception $e) {
            echo var_dump($e);
            return $e;
        }
    }
}
