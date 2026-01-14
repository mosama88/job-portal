<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profession;

class ProfessionSeeder extends Seeder
{
    public function run(): void
    {
        $professions = [
            ['name' => 'Software Developer', 'slug' => 'software-developer'],
            ['name' => 'Web Developer', 'slug' => 'web-developer'],
            ['name' => 'Mobile App Developer', 'slug' => 'mobile-app-developer'],
            ['name' => 'Backend Developer', 'slug' => 'backend-developer'],
            ['name' => 'Frontend Developer', 'slug' => 'frontend-developer'],
            ['name' => 'Full Stack Developer', 'slug' => 'full-stack-developer'],
            ['name' => 'UI UX Designer', 'slug' => 'ui-ux-designer'],
            ['name' => 'Graphic Designer', 'slug' => 'graphic-designer'],
            ['name' => 'System Administrator', 'slug' => 'system-administrator'],
            ['name' => 'Network Engineer', 'slug' => 'network-engineer'],
            ['name' => 'DevOps Engineer', 'slug' => 'devops-engineer'],
            ['name' => 'Data Analyst', 'slug' => 'data-analyst'],
            ['name' => 'Data Scientist', 'slug' => 'data-scientist'],
            ['name' => 'Database Administrator', 'slug' => 'database-administrator'],
            ['name' => 'Cyber Security Specialist', 'slug' => 'cyber-security-specialist'],
            ['name' => 'IT Support Specialist', 'slug' => 'it-support-specialist'],
            ['name' => 'Project Manager', 'slug' => 'project-manager'],
            ['name' => 'Product Manager', 'slug' => 'product-manager'],
            ['name' => 'Business Analyst', 'slug' => 'business-analyst'],
            ['name' => 'Digital Marketer', 'slug' => 'digital-marketer'],
            ['name' => 'SEO Specialist', 'slug' => 'seo-specialist'],
            ['name' => 'Content Writer', 'slug' => 'content-writer'],
            ['name' => 'Copywriter', 'slug' => 'copywriter'],
            ['name' => 'Social Media Manager', 'slug' => 'social-media-manager'],
            ['name' => 'Sales Manager', 'slug' => 'sales-manager'],
            ['name' => 'Accountant', 'slug' => 'accountant'],
            ['name' => 'Financial Analyst', 'slug' => 'financial-analyst'],
            ['name' => 'HR Specialist', 'slug' => 'hr-specialist'],
            ['name' => 'Recruitment Officer', 'slug' => 'recruitment-officer'],
            ['name' => 'Administrative Assistant', 'slug' => 'administrative-assistant'],
            ['name' => 'Office Manager', 'slug' => 'office-manager'],
            ['name' => 'Customer Support Agent', 'slug' => 'customer-support-agent'],
            ['name' => 'Technical Support Engineer', 'slug' => 'technical-support-engineer'],
            ['name' => 'Quality Assurance Engineer', 'slug' => 'quality-assurance-engineer'],
            ['name' => 'Tester', 'slug' => 'tester'],
            ['name' => 'Teacher', 'slug' => 'teacher'],
            ['name' => 'Instructor', 'slug' => 'instructor'],
            ['name' => 'Trainer', 'slug' => 'trainer'],
            ['name' => 'Doctor', 'slug' => 'doctor'],
            ['name' => 'Nurse', 'slug' => 'nurse'],
            ['name' => 'Pharmacist', 'slug' => 'pharmacist'],
            ['name' => 'Civil Engineer', 'slug' => 'civil-engineer'],
            ['name' => 'Mechanical Engineer', 'slug' => 'mechanical-engineer'],
            ['name' => 'Electrical Engineer', 'slug' => 'electrical-engineer'],
            ['name' => 'Architect', 'slug' => 'architect'],
            ['name' => 'Lawyer', 'slug' => 'lawyer'],
            ['name' => 'Legal Advisor', 'slug' => 'legal-advisor'],
            ['name' => 'Translator', 'slug' => 'translator'],
            ['name' => 'Photographer', 'slug' => 'photographer'],
        ];

        Profession::insert($professions);
    }
}
