<?php

namespace AppBundle\Reader;

class ExcelReader
{
    /**
     * @var \PHPExcel
     */
    private $excel;

    /**
     * @var \PHPExcel_Worksheet
     */
    private $activeSheet;

    public function __construct($file)
    {
        $this->excel = \PHPExcel_IOFactory::createReader('Excel2007')->load($file);
        $this->changeSheet();
    }

    public function changeSheet($index = 0)
    {
        $this->activeSheet = $this->excel->setActiveSheetIndex($index);
    }

    public function readAll()
    {
        return $this->activeSheet->toArray();
    }
}