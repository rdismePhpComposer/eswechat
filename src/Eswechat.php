<?php

namespace Rdisme\Eswechat;

use EasyWeChat\Factory;
use Symfony\Component\Cache\Adapter\RedisAdapter;


class Eswechat
{

    public static function officialAccount($esConf, $redisConf)
    {
        // 实例化easyWeChat
        $app = Factory::officialAccount($esConf);
        // 创建 redis 实例
        $client = new \Predis\Client($redisConf);
        // 创建缓存实例
        $cache = new RedisAdapter($client);
        // 替换应用中的缓存
        $app->rebind('cache', $cache);

        return $app;
    }
}
