<?php
    namespace Post\Model;

    use Zend\Db\TableGateway\TableGatewayInterface;

    class PostTable 
    {
        protected $tableGateway;
        
        function __construct(TableGatewayInterface $tableGateway)
        {
            $this->tableGateway = $tableGateway;
        }

        public function fetchAll(){
            $select = $this->tableGateway->getSql()->select(); 
            $resultSet = $this->tableGateway->selectWith($select);
            $resultSet->buffer();
            //$resultSet->next();
    
            return $resultSet;
        }

        public function saveData($post)
        {
            $data = [
                'title' => $post->getTitle(),
                'description' =>$post->getDescription(),
                'category' =>$post->getCategory(),
            ];

            if($post->getId()){
                $this->tableGateway->update($data,[
                    'id' => $post->getId()
                ]);
            }else {
                $this->tableGateway->insert($data);
            }

            return $this->tableGateway->insert($data);
        }

        public function getPost($id){
            $data = $this->tableGateway->select([
                'id' => $id
            ]);
            return $data->current();
        }
    
    }
    