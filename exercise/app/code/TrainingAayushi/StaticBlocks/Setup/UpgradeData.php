<?php
namespace TrainingAayushi\StaticBlocks\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Cms\Model\BlockFactory;

class UpgradeData implements UpgradeDataInterface {

	private $blockFactory;

	public function __construct(BlockFactory $blockFactory) {
	    $this->blockFactory = $blockFactory;
	}

	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {

		$content_main = '<h4>Main Block</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Donec sollicitudin molestie malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>
			<p>Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec sollicitudin molestie malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus. Donec sollicitudin molestie malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Nulla quis lorem ut libero malesuada feugiat.</p>
			<p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Nulla quis lorem ut libero malesuada feugiat. Cras ultricies ligula sed magna dictum porta.</p>
		';

	    $setup->startSetup();

	    try{
      		$staticBlockMain = [
                'title' => 'Main Block',
                'identifier' => 'mainblock',
                'stores' => ['0'],
                'is_active' => 1,
                'content' => $content_main
            ];
	        $this->blockFactory->create()->setData($staticBlockMain)->save();
	    }catch (Exception $e){
	        echo $e->getMessage();
	    }

	    $content_left = '<h4>Left Block</h4>
			<p>Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
		';

	    try{
      		$staticBlockLeft = [
                'title' => 'Left Block',
                'identifier' => 'leftblock',
                'stores' => ['0'],
                'is_active' => 1,
                'content' => $content_left
            ];
	        $this->blockFactory->create()->setData($staticBlockLeft)->save();
	    }catch (Exception $e){
	        echo $e->getMessage();
	    }

	    $content_right = '<h4>Right Block</h4>
			<p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada. Donec sollicitudin molestie malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Donec sollicitudin molestie malesuada.</p>
		';

	    try{
      		$staticBlockRight = [
                'title' => 'Right Block',
                'identifier' => 'rightblock',
                'stores' => ['0'],
                'is_active' => 1,
                'content' => $content_right
            ];
	        $this->blockFactory->create()->setData($staticBlockRight)->save();
	    }catch (Exception $e){
	        echo $e->getMessage();
	    }

	    $setup->endSetup();
	}
}