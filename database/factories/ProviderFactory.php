<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $company_name = $this->faker->company(); 
        $company_domain = $company_name.'.'.$this->faker->tld(); 
        $cities = ['Olavarria', 'Junin', 'Tandil', 'CABA', 'Bolivar', 'Ituzaingo', 'Mar del plata'];
        return [
            'name' => $company_name ,
            'web' => $company_domain,
            'mail' => 'help@'.$company_domain,
            'province_id' => '00' ,
            'province' => 'Buenos Aires' ,
            'department_id' => '00' ,
            'city_id' => '00' ,
            'city' => $this->faker->randomElement($cities) ,
            'address' => $this->faker->address() ,
        ];
    }
}
