<?php
/**
 * Libraries.io API implementation for yii2-hiart.
 *
 * @link      https://github.com/hiqdev/yii2-hiart-librariesio
 * @package   yii2-hiart-librariesio
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\hiart\librariesio;

use hiqdev\hiart\Query;

/**
 * Query builder for Libraries.io API.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class QueryBuilder extends \hiqdev\hiart\rest\QueryBuilder
{
    public function buildUri(Query $query)
    {
        if ($query->from === 'project' && $query->action === 'search') {
            return 'search';
        }

        return $this->from . 's';
    }

    //temp fixed
    //todo confirm for conflict environment or php7.4
    public function buildQueryParams(Query $query)
    {
//        $params = parent::buildQueryParams($query);
        $params = $query->where;
        if ($query->limit) {
            $params['per_page'] = $query->limit;
            if ($query->offset) {
                $params['page'] = 1 + $query->offset/$query->limit;
            }
        }

        return $params;
    }

    public function buildBody(Query $query)
    {
        return null;
    }
}
