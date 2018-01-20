<?php

class ExtensionsMall_SizeChart_Model_SizeChart extends Mage_Core_Model_Abstract {

    const IMAGEDIR = 'sizechart/';
	
    public function _construct() {
        parent::_construct();
        $this->_init('extensionsmall_sizechart/sizechart');
    }

    public function saveImage() {
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
            try {
                $uploader = new Varien_File_Uploader('image');
                $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png'));
                $uploader->setAllowRenameFiles(false);
                $uploader->setFilesDispersion(false);
                // We set media as the upload dir
                $path = Mage::getBaseDir('media') . DS . 'sizechart' . DS;
                $result = $uploader->save($path, $_FILES['image']['name']);
                return self::IMAGEDIR . $result['file'];
            } catch (Exception $e) {
                return $_FILES['image']['name'];
            }
        }
    }

    public function getChart($chartTitle) {
        $collection = $this->getCollection();
        $collection->addFieldToFilter('title', $chartTitle);
        $data = $collection->getData();
		//print_r($data);
        return $data;
    }

    public function chartExists($chartName) {
		
        $data = $this->getChart($chartName);
		//print_r($data);
        if (empty($data)) {
            return FALSE;
        }else {
            return TRUE;
        }
    }
	
	 public function showChart() {
		
		// print_r($collection); 
			$chartName = '';
        	$is_product = Mage::registry('product');
			$categoryIds = $is_product->getCategoryIds();        
            if(count($categoryIds) ){
                $firstCategoryId = $categoryIds[0];
                $_category = Mage::getModel('catalog/category')->load($firstCategoryId);

             $currentproductname= $_category->getName(); //current prouct categories name
			// echo $currentproductname;
               //echo $_category->getId();
            }
			
			//echo $currentproductname;
		// $collection = Mage::getModel('extensionsmall_sizechart/sizechart')->getCollection();
				
			// $someCollection = Mage::getModel('extensionsmall_sizechart/sizechart')->getCollection()
                           // ->addFieldToSelect('title')
                           // ->addFieldToFilter('categories', array('eq' => $currentproductname));
						   // $i = 0;
						   
						   $connection = Mage::getSingleton('core/resource')->getConnection('core_read');
						   $re = "Select * from extensionsmall_sizechart where categories = '". $currentproductname ."'";
						//   echo $re;
						$query      = $re;
						$rows       = $connection->fetchAll($query);

		//print_r($someCollection[0]['title']);	  
		//print_r($rows[0]['title']);
		// foreach ($rows as $someCollection){
		// // print_r($collections['title']);
			// // $items[] = $collections;
		
			// //print_r($collections);
			
		     // $chartName=$someCollection[0]['title']; // size chart template name
			 // print_r($chartName);
			 // $templatecat = $collections['categories']; // size chart template assign categories
			// //echo $templatetitle;
			// // print_r($collections['sizechart_id']);
			
			// $i++;
			
		// }
		$chartName = $rows;
		//echo $chartName;
		return $chartName;
    }

}
