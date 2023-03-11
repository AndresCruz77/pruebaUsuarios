<?php
namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\TicketsModel;

class Tickets extends ResourceController
{
    use ResponseTrait;
    // get all 
    public function index()
    {
        $model = new TicketsModel();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }
 
    // get single 
    public function show($id = null)
    {
        $model = new TicketsModel();
        $data = $model->getWhere(['id' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }
 
    // create 
    public function create()
    {
        $model = new TicketsModel();        

        if( !empty($this->request->getPost('usuario')) && !empty($this->request->getPost('estatus')) ){
          $data = [
            'usuario' => $this->request->getPost('usuario'),
            'fecha_creacion' => date('Y-m-d h:i:s'),
            'fecha_actualizacion' => NULL,
            'estatus' => $this->request->getPost('estatus')
          ];  
          $model->insert($data);   
          $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
          ];
        }else{
          $response = [
            'status'   => 400,
            'error'    => 'key',
            'messages' => [
                'success' => 'validar indices o datos vacios'
            ]    
          ];
        }         
        return $this->respondCreated($response, 201);
    }
 
    // update 
    public function update($id = null)
    {
        $model = new TicketsModel();
        $json = $this->request->getJSON();        
        if($json){
          if( !empty($json->usuario) && !empty($json->estatus) ){            
            $data = [
                'usuario' => $json->usuario,
                'estatus' => $json->estatus,
                'fecha_actualizacion' => date('Y-m-d h:i:s'),
            ];
            // update to Database
            $model->update($id, $data);        
            $response = [
              'status'   => 200,
              'error'    => null,
              'messages' => [
                  'success' => 'Data Updated'
              ]
            ];
          }else{            
            $response = [
              'status'   => 400,
              'error'    => 'key',
              'messages' => [
                  'success' => 'validar indices o datos vacios'
              ]    
            ];
          }  
        }else{
          $input = $this->request->getRawInput();
          if( !empty($input['usuario']) && !empty($input['estatus']) ){                      
            $data = [
                'usuario' => $input['usuario'],
                'estatus' => $input['estatus'],
                'fecha_actualizacion' => date('Y-m-d h:i:s'),
            ];
            // update to Database
            $model->update($id, $data);     
            $response = [
              'status'   => 200,
              'error'    => null,
              'messages' => [
                  'success' => 'Data Updated'
              ]
            ];
          }else{            
            $response = [
              'status'   => 400,
              'error'    => 'key',
              'messages' => [
                  'success' => 'validar indices o datos vacios'
              ]    
            ];
          }  
        }
        
        
        
        return $this->respond($response);
    }

    // delete product
    public function delete($id = null)
    {
        $model = new TicketsModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }    
    }
}