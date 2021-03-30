<?php
// namespace SimplifiedMagento\Database\Model\Plugin;

// use SimplifiedMagento\Database\Api\PostExtensionFactory;
// use SimplifiedMagento\Database\Model\PostRepository;

// class CodeAttributeExtension 
// {
//     protected $extensionFactory;

//     public function __construct(PostExtensionFactory $extensionFactory)
//     {
//         $this->extensionFactory = $extensionFactory;
//     }

//     public function aroundGetPostById(PostRepository $postRepository, \Closure $proceed, $id)
//     {
//         $model = $proceed($id);
//         $extensionAttribute = $model->getExtensionAttributes();
//         if ($extensionAttribute == null) {
//             $extensionAttribute = $this->extensionFactory->create();
//         }
//         $extensionAttribute->setCode("Code # ".$id);
//         $model->setExtensionAttributes($extensionAttribute);
//         return $model;
//     }
// }