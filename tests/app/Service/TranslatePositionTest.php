<?php


use src\Model\ISSPositionModel;
use src\Service\TranslatePosition;
use PHPUnit\Framework\TestCase;

class TranslatePositionTest extends TestCase
{

    /**
    * @dataProvider preparePositionToDisplayCases
    * @param $draftPosition
    * @param $expected
    * @return string
    */
    public function testPreparePositionToDisplay($draftPosition, $expected){

        $ISSPositionModelMock = $this->getMockBuilder(ISSPositionModel::class)
            ->disableOriginalConstructor()
            ->getMock();

        $translatePosition = new TranslatePosition($ISSPositionModelMock);
        $translatePosition->setDraftPosition($draftPosition);

        $this->assertEquals($expected, $translatePosition->preparePositionToDisplay());

        return 'testPreparePositionToDisplay';
    }

    public function preparePositionToDisplayCases()
    {

        $test1 =  array('results' => array(), 'status' => 'ZERO_RESULTS');
        $expected1 = array(0 => 'Stacja znajduje się gdzieś nad którymś z oceanów lub innym dużym zbiornikiem wodnym.');

        $test2 = array('results' => array( 0 => array('formatted_address' => 'Volgograd-Astrakhan, Tambovka, Astrakhanskaya oblast, Russia, 416020')), 'status' => 'OK');
        $expected2 = array(0 => 'Volgograd-Astrakhan, Tambovka, Astrakhanskaya oblast, Russia, 416020');

        return [
            [$test1, $expected1],
            [$test2, $expected2],
        ];
    }
}