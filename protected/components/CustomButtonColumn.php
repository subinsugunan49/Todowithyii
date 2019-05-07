<?php
class CustomButtonColumn extends CButtonColumn
{
        protected function renderButton($id, $button, $row, $data)
        {
                if(isset($button['options']['data-status'])) 
                {
                        $button['imageUrl'] = $this->evaluateExpression("($data->status == 0 ? Yii::app()->request->baseUrl.'/images/pending.jpg': Yii::app()->request->baseUrl.'/images/closed.jpg')", array('data' => $data, 'row' => $row));
                }
                parent::renderButton($id, $button, $row, $data);
        }
}
?>
