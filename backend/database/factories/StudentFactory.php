<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the model that the factory corresponds to.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name'              => $this->faker->name,
            'fatherName'        => $this->faker->name, 
            'fatherProfession'  => $this->faker->text, 
            'fatherCompanyName' => $this->faker->company, 
            'fatherPhoneNumber' => $this->faker->phoneNumber, 
            'motherName'        => $this->faker->name, 
            'motherProfession'  => $this->faker->text, 
            'motherCompanyName' => $this->faker->company, 
            'motherPhoneNumber' => $this->faker->phoneNumber,
            'birthDate'         => $this->faker->date,
            'bithPlace'         => $this->faker->city,
            'docId'             => $this->faker->numerify,
            'address'           => $this->faker->address,
            'neighborhood'      => $this->faker->name,
            'stratum'           => $this->faker->numerify,
            'city'              => $this->faker->city,
            'eps'               => $this->faker->name,
            'weight'            => $this->faker->numerify,
            'height'            => $this->faker->numerify,
            'blood'             => $this->faker->text,
            'contactEmail'      => $this->faker->unique()->safeEmail,
            'contactPhone'      => $this->faker->phoneNumber,
            'school'            => $this->faker->text,
            'grade'             => $this->faker->text,
            'schoolCity'        => $this->faker->city,
            'schoolStartHour'   => $this->faker->numerify,
            'schoolEndHour'     => $this->faker->numerify,
            'uniformSize'       => $this->faker->numerify,
            'position'          => $this->faker->text
        ];
    }
}
