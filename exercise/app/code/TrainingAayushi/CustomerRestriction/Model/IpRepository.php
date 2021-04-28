<?php
namespace TrainingAayushi\CustomerRestriction\Model;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use TrainingAayushi\CustomerRestriction\Api\IpRepositoryInterface;
use TrainingAayushi\CustomerRestriction\Api\Data\IpInterface;
use TrainingAayushi\CustomerRestriction\Api\Data\IpInterfaceFactory;
use TrainingAayushi\CustomerRestriction\Model\ResourceModel\Ip as ResourceData;
use TrainingAayushi\CustomerRestriction\Model\ResourceModel\Ip\CollectionFactory as IpCollectionFactory;

class IpRepository implements IpRepositoryInterface
{
    /**
     * @var ResourceData
     */
    protected $resource;

    public function __construct(
        ResourceData $resource
    ) {
        $this->resource = $resource;
    }

    /**
     * @param  IpInterface $data
     * @return IpInterface
     * @throws CouldNotSaveException
     */
    public function save(IpInterface $data)
    {
        try {
            /** @var IpInterface|\Magento\Framework\Model\AbstractModel $data */
            $this->resource->save($data);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the data: %1',
                $exception->getMessage()
            ));
        }
        return $data;
    }

}
