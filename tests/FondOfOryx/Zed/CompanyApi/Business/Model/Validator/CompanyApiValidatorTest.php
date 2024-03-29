<?php


namespace FondOfOryx\Zed\CompanyApi\Business\Model\Validator;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiRequestTransfer;

class CompanyApiValidatorTest extends Unit
{
    /**
     * @var \Generated\Shared\Transfer\ApiRequestTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $apiRequestTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ApiDataTransfer
     */
    protected $apiDataTransferMock;

    /**
     * @var \FondOfOryx\Zed\CompanyApi\Business\Model\Validator\CompanyApiValidator
     */
    protected $companyApiValidator;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->apiRequestTransferMock = $this->getMockBuilder(ApiRequestTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiDataTransferMock = $this->getMockBuilder(ApiDataTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyApiValidator = new CompanyApiValidator();
    }

    /**
     * @return void
     */
    public function testValidate(): void
    {
        $transferData = ['name' => 'Lorem Ipsum'];

        $this->apiRequestTransferMock->expects(static::atLeastOnce())
            ->method('getApiDataOrFail')
            ->willReturn($this->apiDataTransferMock);

        $this->apiDataTransferMock->expects(static::atLeastOnce())
            ->method('getData')
            ->willReturn($transferData);

        $errors = $this->companyApiValidator->validate($this->apiRequestTransferMock);

        static::assertCount(0, $errors);
    }

    /**
     * @return void
     */
    public function testValidateWithEmptyString(): void
    {
        $transferData = ['name' => ' '];

        $this->apiRequestTransferMock->expects(static::atLeastOnce())
            ->method('getApiDataOrFail')
            ->willReturn($this->apiDataTransferMock);

        $this->apiDataTransferMock->expects(static::atLeastOnce())
            ->method('getData')
            ->willReturn($transferData);

        $errors = $this->companyApiValidator->validate($this->apiRequestTransferMock);

        static::assertCount(0, $errors);
    }

    /**
     * @return void
     */
    public function testValidateWithEmptyTransferData(): void
    {
        $transferData = [];

        $this->apiRequestTransferMock->expects(static::atLeastOnce())
            ->method('getApiDataOrFail')
            ->willReturn($this->apiDataTransferMock);

        $this->apiDataTransferMock->expects(static::atLeastOnce())
            ->method('getData')
            ->willReturn($transferData);

        $errors = $this->companyApiValidator->validate($this->apiRequestTransferMock);

        static::assertCount(1, $errors);
    }
}
