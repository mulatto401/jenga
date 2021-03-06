<?php
namespace Jenga\Db\Engines\Mongo\Query\Conditions;
/**
 * A mongo equals query segment.
 *
 * @author Chris Santos
 */
class Equals extends Base {

    /**
     * @inheritdoc
     */
    public function toQuery() {

        return array($this->field => $this->value);
    }
}
