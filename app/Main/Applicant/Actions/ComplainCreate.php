<?php
namespace App\Main\Applicant\Actions;

use App\Main\Applicant\Repository\ApplicantRepositoryInterface;

class ComplainCreate
{
    public function __construct(
        private ApplicantRepositoryInterface $applicantRepository
    ){}

    public function create()
    {
        return "Container worked";
    }
}
