<?php

/**
 * Interface VarExportInterface
 */
interface VarExportInterface
{
    /**
     * VarExportInterface constructor.
     * @param $file - full patch to file
     */
    function __construct(string $filename);

    /**
     * For get data from file
     *
     * @param $key
     * @return mixed
     */
    public function get($key);

    /**
     * For add key with data to file
     *
     * @param $key
     * @param $value
     * @return mixed
     */
    public function add($key, $value): bool;

    /**
     * For update value in file to key
     *
     * @param $key
     * @param $value
     * @return mixed
     */
    public function update($key, $value): bool;

    /**
     * For delete value with key
     *
     * @param $key
     * @return mixed
     */
    public function delete($key): bool;
}

