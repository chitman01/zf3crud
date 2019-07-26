<?php

namespace Post\Form;

use Zend\Form\Form;

class PostForm extends Form{
    
    function __construct($name = null){
        parent::__construct('post');
        $this->setAttribute('method','POST');

        $this->add([
            'name' => 'id',
            'type' => 'hidden'
        ]);
        $this->add([
            'name' => 'title',
            'type' => 'text',
            'option' => [
                'label' => 'Title'
            ]
        ]);
        $this->add([
            'name' => 'description',
            'type' => 'textarea',
            'option' => [
                'label' => 'Description'
            ]
        ]);
        $this->add([
            'name' => 'category',
            'type' => 'text',
            'option' => [
                'label' => 'Category'
            ]
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Save',
                'id' => 'buttonSave'
            ]
        ]);
    }
    
}