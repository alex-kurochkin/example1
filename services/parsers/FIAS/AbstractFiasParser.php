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

    public static function getParser(string $name): self
    {
        $c = __NAMESPACE__ . '\\' . $name . 'FiasParser';

        if (!class_exists($c)) {
            throw new RuntimeException('No such FIAS parser found: ' . $c);
        }

        $mapper = AbstractFiasMapper::getMapper($name);

        return new $c($mapper);
    }

    protected function __construct(FiasMapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @param string $filename - complex file name: zip-filename + '#' + filename-inside-zip
     *  example: /tmp/gar_xml.zip#69/AS_APARTMENTS_PARAMS_20201010_6553f943-550a-4ecf-87ab-556fc956c400.XML
     */
    public function setReader(string $filename): void
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
