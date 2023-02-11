<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeacherCertificate>
 */
class TeacherCertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'teacher_id' => Teacher::factory(),
            'certificate' => $this->faker->randomElement(['https://marketplace.canva.com/EAFJXTjgz1M/1/0/1600w/canva-blue-and-yellow-minimalist-employee-of-the-month-certificate-_A_NvKtzEzc.jpg', 'https://marketplace.canva.com/EAFH_f4DrV0/2/0/1600w/canva-gold-luxury-certificate-of-completion-template-yz6w30Bp85w.jpg', 'https://marketplace.canva.com/EAFIEvneNCM/1/0/1600w/canva-golden-elegant-certificate-of-appreciation-0bN-aLORS9U.jpg', 'https://online.visual-paradigm.com/repository/images/10bdbd59-74d6-405c-a210-045e0e9cf63e/certificates-design/black-and-red-frame-certificate.png', 'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/elegant-certificate-of-completion-design-template-908f1750642c3cceba19cbc67086b678_screen.jpg?ts=1561539250'])
        ];
    }
}
