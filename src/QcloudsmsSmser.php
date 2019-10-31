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
class QcloudsmsSmser
{
    /**
     * @var string
     */
    public $appid;
    
    /**
     * @var string
     */
    public $appkey;
    
    /**
     * @var string
     */
    public $smsSign;

    /**
     * @inheritdoc
     *
     * @param string $mobile 15825368746
     * @param string $content 【腾讯云】您的验证码是: 5678
     * @param int $templateId   459670
     * @return mixed
     */
    public function send($mobile, $code, $expire, $templateId)
    {
        try {
            $ssender = new SmsSingleSender($this->appid, $this->appkey);
            $params = [$code, $expire];
            // $result = $ssender->send(0, "86", $mobile, $content, "", "");
            $result = $ssender->sendWithParam("86", $mobile, $templateId, $params, $this->smsSign, "", "");  // 签名参数不能为空串
            $rsp = json_decode($result, true);
            
            if ($rsp['result'] === 0) {
                return true;
            } else {
                return $rsp;
            }
        } catch(\Exception $e) {
            return $e;
        }
    }
}
