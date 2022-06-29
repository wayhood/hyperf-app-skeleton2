<?php

declare(strict_types=1);

namespace App\Contract;

use App\Service\TokenService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Logger\LoggerFactory;
use Wayhood\HyperfAction\Action\AbstractAction as WayhoodAbstractAction;
use Wayhood\HyperfAction\Collector\ActionCollector;
use Wayhood\HyperfAction\Collector\TokenCollector;

abstract class AbstractAction extends WayhoodAbstractAction
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @Inject
     * @var TokenService
     */
    protected $tokenService;

    public function __construct(LoggerFactory $loggerFactory)
    {
        // 第一个参数对应日志的 name, 第二个参数对应 config/autoload/logger.php 内的 key
        $this->logger = $loggerFactory->get('log', 'default');
    }

    public function beforeRun($params, $extras, $headers)
    {
        $action = get_called_class();
        $map = ActionCollector::result();
        $mapping = '';
        if (isset($map[$action])) {
            $mapping = $map[$action];
        }

        $hasToken = false;
        if (isset(TokenCollector::list()[$mapping])) {
            $hasToken = TokenCollector::list()[$mapping];
        }
        if (! $hasToken) {
            return true;
        }

        return true;
    }
}
