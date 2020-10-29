<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS;

use app\services\parsers\FIAS\mappers\AbstractFiasMapper;
use app\services\parsers\FIAS\mappers\FiasMapperInterface;
use app\utils\FIAS\FiasFile;
use Generator;
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
        $name = FiasFile::parseEntityName(basename($filename));

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
        $this->reader->open('zip://' . $filename);
    }

    public function parse(): ?Generator
    {
        while ($this->reader->read() && $this->reader->name !== $this->elementName) {
            continue;
        }

        $xmlString = $this->reader->readOuterXML();

        if (!$xmlString) {
            return null;
        }

        while ($this->reader->name === $this->elementName) {
            $xmlElement = new SimpleXMLElement($this->reader->readOuterXML());

            yield $this->mapper->fromFias($xmlElement);

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
