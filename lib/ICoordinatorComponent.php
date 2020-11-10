<?php
/**
 * ICoordinatorComponent.php
 *
 * @package kllakk\coordinator
 * @date: 25.03.2016 20:11
 * @author: Kyshnerev Dmitriy <dimkysh@mail.ru>
 */

namespace kllakk\coordinator;


/**
 * Interface ICoordinatorComponent
 * @package kllakk\coordinator
 */
interface ICoordinatorComponent
{
    /**
     * @param array $db
     * @param $data
     * @return mixed
     */
    public function getShard(array $db, $data);
}