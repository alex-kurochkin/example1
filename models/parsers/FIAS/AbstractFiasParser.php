<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;

use app\models\parsers\FIAS\mappers\AbstractFiasMapper;
use app\models\parsers\FIAS\mappers\FiasMapperInterface;
use Generator;
use InvalidArgumentException;
use RuntimeException;
use SimpleXMLElement;
use XMLReader;

abstract class AbstractFiasParser implements FiasParserInterface
{

    private int $recordsCount = 0;

    private XMLReader $reader;

    protected string $elementName;

    protected FiasMapperInterface $mapper;

    public static function getParser(string $filename): self
    {
        $name = self::parseFilename($filename);

        $c = __NAMESPACE__ . '\\' . $name . 'FiasParser';

        if (!class_exists($c)) {
            throw new RuntimeException('No such FIAS parser found: ' . $c);
        }

        $mapper = AbstractFiasMapper::getMapper($name);

        return new $c($filename, $mapper);
    }

    protected function __construct(string $filename, FiasMapperInterface $mapper)
    {
        $this->mapper = $mapper;
        $this->setReader($filename);
    }

    private function setReader(string $filename): void
    {
        $this->reader = new XMLReader();
        //$this->reader->open('compress.zlib://' . $filename);

        $this->reader->open('file://' . $filename);
    }

    private static function parseFilename(string $filename): string
    {
        preg_match('/^AS_(\w+)_\d{8}_[\w-]+\.XML$/i', basename($filename), $m);

        if (2 !== count($m)) {
            throw new InvalidArgumentException(__METHOD__ . ' can not parse ' . $filename);
        }

        $name = str_replace('_', ' ', $m[1]);
        $name = ucwords(strtolower($name));

        return str_replace(' ', '', $name);
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

        while ($this->reader->name === $this->elementName) {
            $el = new SimpleXMLElement($this->reader->readOuterXML());
            $el = $this->mapper->fromFias($el);

            yield $el;

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
