<?php

class ExtensionsMall_SizeChart_Block_Sizechart_Anchor extends Mage_Core_Block_Template {

    public function showAnchor() {
		$is_product = Mage::registry('product');
		$categoryIds = $is_product->getCategoryIds();        
            if(count($categoryIds) ){
                $firstCategoryId = $categoryIds[0];
                $_category = Mage::getModel('catalog/category')->load($firstCategoryId);

             $currentproductname= $_category->getName(); //current prouct categories name
               //echo $_category->getId();
            }
		$collection = Mage::getModel('extensionsmall_sizechart/sizechart')->getCollection();
				
			$someCollection = Mage::getModel('extensionsmall_sizechart/sizechart')->getCollection()
                           ->addFieldToSelect('title')
                           ->addFieldToFilter('categories', array('eq' => $currentproductname));
		foreach ($someCollection as $collections){
		
			// $items[] = $collections;
		
			//print_r($collections);
		     $chartName=$collections['title']; // size chart template name
			// print_r($chartName);
			 $templatecat = $collections['categories']; // size chart template assign categories
			//echo $templatetitle;
			// print_r($collections['sizechart_id']);
			
		}
			
		
		 
		
	   // $keys = array_keys($collection->getFirstItem()->getData());
		//foreach ($keys as $key){ // loop through all the keys (fname, lname, email... 
		//foreach ($collection as $obj){//loop throught each object 
			//print_r($obj->getData($key));//get the value for a speficic key. 
			
			//} 
		//}
		//print_r($keys);
		
		
        //$chartName = Mage::registry('current_product')->getData('size_chart');	
		//$test=Mage::register('store_id');
		//print_r($chartName);
		
	
        $model = Mage::getModel('extensionsmall_sizechart/sizechart');
	//print_r($model);
       if ($model->chartExists($chartName)) {
			
           return TRUE;
        } else {
           return FALSE;
        }
    }
	   

}
 


