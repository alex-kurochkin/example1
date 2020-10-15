<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;

use Generator;
use InvalidArgumentException;
use RuntimeException;
use SimpleXMLElement;
use XMLReader;

abstract class FiasParser implements FiasParserInterface
{

    private int $recordsCount = 0;

    private XMLReader $reader;

    protected string $elementName;

    public static function getParser(string $filename): self
    {
        preg_match('/^AS_(\w+)_\d{8}_[\w-]+\.XML$/i', basename($filename), $m);

        if (2 !== count($m)) {
            throw new InvalidArgumentException(__METHOD__ . ' can not parse ' . $filename);
        }

        $name = str_replace('_', ' ', $m[1]);
        $name = ucwords(strtolower($name));
        $name = str_replace(' ', '', $name);

        $c = __NAMESPACE__ . '\\' . $name . 'FiasParser';

        if (!class_exists($c)) {
            throw new RuntimeException('No such FIAS parser found: ' . $c);
        }

        return new $c($filename);
    }

    protected function __construct($file)
    {
        $this->setReader($file);
    }

    private function setReader(string $file): void
    {
        $this->reader = new XMLReader();
        //$this->reader->open('compress.zlib://' . $fn);

        $this->reader->open('file://' . $file);
    }

    protected function parseXML(): ?Generator
    {
        while ($this->reader->read() && $this->reader->name !== $this->elementName) {
            continue;
        }

        $xmlString = $this->reader->readOuterXML();

        if (!$xmlString) {
            return null;
        }

        yield new SimpleXMLElement($this->reader->readOuterXML());
        return null;

        while ($this->reader->name === $this->elementName) {
            yield new SimpleXMLElement($this->reader->readOuterXML());

            $this->recordsCount++;

            $this->reader->next($this->elementName);
        }

        $this->reader->close();
    }

    /**
     * @return int
     */
    public function getRecordsCount(): int
    {
        return $this->recordsCount;
    }
}
