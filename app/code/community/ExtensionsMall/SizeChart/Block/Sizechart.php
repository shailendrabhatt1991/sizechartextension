<?php

class ExtensionsMall_SizeChart_Block_Sizechart extends Mage_Core_Block_Template {

    protected $config;
    #  protected $data = array();
    protected $columns = array();

    public function getConfig() {
        if (!isset($this->config)) {
            $config['sizechart_table_heading_color'] = Mage::getStoreConfig('sizechart_options/style/sizechart_table_heading_color');
            $this->config = $config;
        }
        return $this->config;
    }
			// print_r(array_filter_recursive($arr1));

	

    public function getTbody() {
        $data = $this->getColumns();
		
		
		
		  $model = Mage::getModel('extensionsmall_sizechart/sizechart');
		//	 $chartname = $model->showChart(); 
			// print_r($chartname);
			// //echo 'FFFF'.$chartname; 
			// //$chart = 'template1';
            // //$chart = $model->showChart();
			// //echo $chart;
             // if (empty($chartname)) {
                 // $chart = $model->getData('Default');
             // }else{
				  
			 // }
			 //print_r($chart);
			 $chart = $model->showChart();
             $columnNames = array(
                 'sizes' => 'Size',
                 'bust' => 'Bust',
                 'waist' => 'Waist',
                 'hip' => 'Hips',
				 'length' => 'Length',
				 'lengthbottom' => 'Length Bottom',
				 'shoulder' => 'Shoulder'
				
             );?>
			 
		
            <?php 
			$chart = $model->showChart();
			//print_r($chart);
			 foreach ($chart as $rows) {
				 
				 // $sizes =$rows['sizes'];
				//  $bust =$rows['bust'];
				//  $waist =$rows['waist'];
				 // $hip =$rows['hip'];
				 // $length =$rows['length'];
				 // $shoulder =$rows['shoulder'];
				// $catname =$rows['categories'];
				// echo $catname;
		
			 }
	
	//print_r(array_filter_recursive($chart));
					$sizeArray = explode(',', $rows['sizes']);
					$shoulderArray = explode(',', $rows['shoulder']);
					$bustArray = explode(',', $rows['bust']);
					$waistArray = explode(',', $rows['waist']);
					$hipArray = explode(',', $rows['hip']);
					$lengthArray = explode(',', $rows['lengthh']);
					$lengthArraybottom = explode(',', $rows['lengthbtm']);
				  
            foreach ($sizeArray as $key => $value) {
			foreach ($shoulderArray as $skey => $svalue) {
			foreach ($bustArray as $bkey => $bvalue) {
			foreach ($waistArray as $Wkey => $Wvalue) {
			foreach ($hipArray as $hkey => $hvalue) {
			foreach ($lengthArray as $lkey => $lvalue) {
			foreach ($lengthArraybottom as $lkeybottom => $lbottomvalue) {
				  if($key == $skey && $skey == $bkey &&  $bkey == $Wkey && $Wkey == $hkey && $hkey == $lkey && $lkey == $lkeybottom){
					echo '<tr><td class="sizeval">'.$value.'</td>';
					echo '<td class="shoulderval">'.$svalue.'</td>';
					echo '<td class="bustval">'.$bvalue.'</td>';
					echo '<td class="waistval">'.$Wvalue.'</td>';
					echo '<td class="hipval">'.$hvalue.'</td>';
					echo '<td class="lengthtopval">'.$lvalue.'</td>';
					echo '<td class="lengthbotomval">'.$lbottomvalue.'</td>';
					
					
					
					}	
				  }	
				}
			}
		}
		}
	}
}?>  

	    
			 
		
  <?php  }
 


    public function getThead() {
        //$columns = $this->getColumns();
		
        $html = '<tr>';
        foreach ($columnNames as $value) {
            $html .= '<th>' . $value['name'] . '</th>';
        }
        $html .= '</tr>';
        return $html;
    }

    public function getColumns() {
		
		 
        if (empty($this->columns)) {
		
             //$chartName = Mage::registry('current_product')->getData('size_chart');
			// $chartName ='template2';
            // $model = Mage::getModel('extensionsmall_sizechart/sizechart');
			// $chartname = $model->showChart(); 
			// print_r($chartname);
			// //echo 'FFFF'.$chartname; 
			// //$chart = 'template1';
            // //$chart = $model->showChart();
			// //echo $chart;
            // if (empty($chartname)) {
                // $chart = $model->getData('Default');
            // }else{
				// $chart = $model->getData($chartname);
			// }
            // $columnNames = array(
                // 'sizes' => 'Size',
                // 'bust' => 'Bust',
                // 'waist' => 'Waist',
                // 'hip' => 'Hips',
				// 'length' => 'Length',
				// 'shoulder' => 'Shoulder'
				
            // );
            // $i = 0;
            // foreach ($columnNames as $key => $value) {
                // $string = trim($chart[$key]);
                // if (!empty($string)) {
                    // $this->columns[$i]['name'] = $value;
                    // $this->columns[$i]['values'] = explode(',', $string);
                    // $i++;
                // }
            // }
        }
        return $this->columns;
    }

    public function getLeftColumnWidth() {
        $columnsNo = count($this->getColumns());
        if ($columnsNo == 6) {
            return '375px';
        } else {
            return ($columnsNo * 80) . 'px';
        }
    }
    public function getTitile(){
		  $model = Mage::getModel('extensionsmall_sizechart/sizechart');
		  $chart = $model->showChart();
		   foreach ($chart as $rows) {
				 
				 // $sizes =$rows['sizes'];
				//  $bust =$rows['bust'];
				//  $waist =$rows['waist'];
				 // $hip =$rows['hip'];
				 // $length =$rows['length'];
				 // $shoulder =$rows['shoulder'];
				 $catname =$rows['categories'];
				 echo $catname;
		
			 }
	
   
}

}
