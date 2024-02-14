<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;


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
        $provinces = App::make('provinces');
        $province_id = $this->faker->randomElement(array_keys($provinces));

        return [
            'name' => $company_name ,
            'web' => $company_domain,
            'mail' => 'help@'.$company_domain,
            'available' => $this->faker->randomElement([0,1]),
            'province_id' => $province_id,
            'province' => $provinces[$province_id],
            'department_id' => '00' ,
            'city_id' => '00' ,
            'city' => $this->faker->randomElement($cities) ,
            'address' => $this->faker->address() ,
        ];
    }
}
