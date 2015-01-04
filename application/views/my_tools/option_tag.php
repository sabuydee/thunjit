<?php

$html = NULL;
foreach ($table->result_array() as $value) {
    
    if($selected){
        
        $html .= '<option value="'.$value[$index].'" selected>'.$value[$title].'</option>';        
    }else{ 
        
        $html .= '<option value="'.$value[$index].'">'.$value[$title].'</option>';        
    }
}
echo $html;
?>