<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'pest';
    protected $allowedFields = ['username', 'email', 'password', 'updated_at'];
    /**protected $updated_at = 'updated_at';
    protected $created_at = 'created_at';
   /** protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];





    protected function beforeInsert(array $data){
       $data = $this->passwordHash($data);

        return $data;
    }



    protected function beforeUpdate(array $data){
        $data = $this->passwordHash($data);
        
    

        return $data;
        }
    

 protected function passwordHash(array $data){

            if (! isset($data['data']['password'])) {

                $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
                // code...
            }

        } **/
       
}