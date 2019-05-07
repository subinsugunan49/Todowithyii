<?php
class CustomButtonStatus extends CButtonColumn
{
        protected function renderButton($id, $button, $row, $data)
        {
                if(isset($button['options']['data-status'])) 
                {
                        $button['imageUrl'] = $this->evaluateExpression("($data->status == 1 ? Yii::app()->request->baseUrl.'/images/active.jpg': Yii::app()->request->baseUrl.'/images/inactive.jpg')", array('data' => $data, 'row' => $row));
                }
                parent::renderButton($id, $button, $row, $data);
        }
}
?>

