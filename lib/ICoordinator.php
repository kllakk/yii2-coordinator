<?php
/**
 * ICoordinator.php
 *
 * @package kllakk\coordinator
 * @date: 23.03.2016 20:34
 * @author: Kyshnerev Dmitriy <dimkysh@mail.ru>
 */

namespace kllakk\coordinator;


/**
 * Interface ICoordinator
 * @package kllakk\coordinator
 */
interface ICoordinator
{
    /**
     * @param array $data
     * @return mixed
     */
    public function execute(array $data);
}