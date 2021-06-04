<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table    = 'employee';
    protected $appends  = ["AFP","ARS","ISR","net_salary"];
    
    public function getAFPAttribute(){
        return 2.87 / 100 * $this->salary;
    }

    public function getARSAttribute(){
        return 3.04 / 100 * $this->salary;
    }

    public function getISRAttribute(){
        if($this->salary >  35000){
            return 15 / 100 * $this->salary;
        }
        return 0;
    }

    public function getNetSalaryAttribute(){
        return $this->salary - ($this->AFP + $this->ISR);
    }

}
