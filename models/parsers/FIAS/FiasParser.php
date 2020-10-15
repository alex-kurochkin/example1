<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;

abstract class FiasParser implements IFiasParser
{

    private int $countIx = 0;

    private \XMLReader $reader;

    protected string $elName;

    public static function getParser(string $filename): self
    {
        preg_match('/AS_(\w+)_\d{8}_[\w-]+\.XML$/i', $filename, $m);

        if (2 !== count($m)) {
            throw new \InvalidArgumentException(__METHOD__ . ' can not parse ' . $filename);
        }

        $name = str_replace('_', ' ', $m[1]);
        $name = ucwords(strtolower($name));
        $name = str_replace(' ', '', $name);

        $c = __NAMESPACE__ . '\\' . $name . 'FiasParser';

        if (!class_exists($c)) {
            throw new \RuntimeException('No such FIAS parser found: ' . $c);
        }

        return new $c($filename);
    }

    protected function __construct($file)
    {
        $this->setReader($file);
    }

    private function setReader(string $file): void
    {
        $this->reader = new \XMLReader();
        //$this->reader->open('compress.zlib://' . $fn);

        $this->reader->open('file://' . $file);
    }

    protected function parseXML(): ?\Generator
    {
        while ($this->reader->read() && $this->reader->name !== $this->elName) {
            continue;
        }

        while ($this->reader->name === $this->elName) {
            yield new \SimpleXMLElement($this->reader->readOuterXML());

            $this->countIx++;

            $this->reader->next($this->elName);
        }

        $this->reader->close();
    }

    /**
     * @return int
     */
    public function getCountIx(): int
    {
        return $this->countIx;
    }
}