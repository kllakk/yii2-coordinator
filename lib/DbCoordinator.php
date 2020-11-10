<?php
/**
 * DbCoordinator.php
 *
 * @package kllakk\coordinator
 * @date: 23.03.2016 21:20
 * @author: Kyshnerev Dmitriy <dimkysh@mail.ru>
 */

namespace kllakk\coordinator;


use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\db\Connection;

/**
 * Class DbCoordinator
 * @package kllakk\coordinator
 */
class DbCoordinator extends Component implements ICoordinator
{
    /**
     * @var
     */
    public $table;
    /**
     * @var
     */
    public $connect;
    /**
     * @var
     */
    private $db;

    /**
     * @throws InvalidConfigException
     */
    public function init() {
        parent::init();

        if (!$this->table or !isset($this->table['name']) or !isset($this->table['columnSearch']) or !isset($this->table['columnResult'])) {
            throw new InvalidConfigException("Please set table for coordinator component");
        }

        if (!$this->connect) {
            throw new InvalidConfigException("Please set connect for coordinator component");
        }

        $this->db = \Yii::createObject($this->connect);

        if (!$this->db instanceof Connection) {
            throw new InvalidConfigException("Component coordinator not implements Connection interface.");
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function execute(array $data) {
        $result = [];

        if (!$data) {
            return $result;
        }

        $return = $this->db->createCommand("SELECT {$this->table['columnResult']} FROM {$this->table['name']} WHERE {$this->table['columnSearch']} IN (".implode(",", $data).")")
            ->queryAll();

        foreach ($return as $value) {
            $result[] = $value[$this->table['columnResult']];
        }

        return array_unique($result);
    }
}