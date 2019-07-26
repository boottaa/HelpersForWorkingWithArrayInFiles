<?php

/**
 * Class VarExport - for working with array in files
 */
class VarExport implements VarExportInterface
{
    private $filename;
    private $dataFromFile;

    /**
     * VarExportInterface constructor.
     * @param $file - full patch to file
     */
    public function __construct(string $filename)
    {
        $fileArray = include $filename;
        $this->filename = $filename;
        $this->dataFromFile = $fileArray;
    }

    /**
     * Put data to file
     *
     * @param $data
     */
    private function PutContents($data)
    {
        file_put_contents($this->filename, '<?php return ' . var_export($data, true) . '; ?>');
    }

    /**
     * For get data from file
     *
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        if (isset($this->dataFromFile[$key])) {
            return $this->dataFromFile[$key];
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getFullFile()
    {
        return $this->dataFromFile;
    }

    /**
     * For add key with data to file
     *
     * @param $key
     * @param $value
     * @return mixed
     */
    public function add($key, $value): bool
    {
        if (isset($this->dataFromFile[$key])) {
            return false;
        }

        $this->dataFromFile[$key] = $value;
        $this->PutContents($this->dataFromFile);
        return true;
    }

    /**
     * For update value in file to key
     *
     * @param $key
     * @param $value
     * @return mixed
     */
    public function update($key, $value): bool
    {
        if (isset($this->dataFromFile[$key])) {
            $this->dataFromFile[$key] = $value;
            $this->PutContents($this->dataFromFile);
            return true;
        }
        return false;
    }

    /**
     * For delete value with key
     *
     * @param $key
     * @return mixed
     */
    public function delete($key): bool
    {
        if (isset($this->dataFromFile[$key])) {
            unset($this->dataFromFile[$key]);
            return true;
        }
    }
}