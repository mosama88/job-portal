<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'PHP Development', 'slug' => 'php-development'],
            ['name' => 'Laravel Framework', 'slug' => 'laravel-framework'],
            ['name' => 'JavaScript Programming', 'slug' => 'javascript-programming'],
            ['name' => 'HTML & CSS', 'slug' => 'html-css'],
            ['name' => 'REST API Development', 'slug' => 'rest-api-development'],
            ['name' => 'MySQL Database', 'slug' => 'mysql-database'],
            ['name' => 'Git Version Control', 'slug' => 'git-version-control'],
            ['name' => 'Linux Server Management', 'slug' => 'linux-server-management'],
            ['name' => 'Windows Server Administration', 'slug' => 'windows-server-administration'],
            ['name' => 'Docker Containers', 'slug' => 'docker-containers'],
            ['name' => 'DevOps Practices', 'slug' => 'devops-practices'],
            ['name' => 'API Integration', 'slug' => 'api-integration'],
            ['name' => 'AJAX Development', 'slug' => 'ajax-development'],
            ['name' => 'jQuery', 'slug' => 'jquery'],
            ['name' => 'Vue.js', 'slug' => 'vue-js'],
            ['name' => 'React.js', 'slug' => 'react-js'],
            ['name' => 'Node.js', 'slug' => 'node-js'],
            ['name' => 'Problem Solving', 'slug' => 'problem-solving'],
            ['name' => 'Clean Code', 'slug' => 'clean-code'],
            ['name' => 'Object Oriented Programming', 'slug' => 'object-oriented-programming'],
            ['name' => 'MVC Architecture', 'slug' => 'mvc-architecture'],
            ['name' => 'Authentication & Authorization', 'slug' => 'authentication-authorization'],
            ['name' => 'Payment Gateway Integration', 'slug' => 'payment-gateway-integration'],
            ['name' => 'Testing & Debugging', 'slug' => 'testing-debugging'],
            ['name' => 'Performance Optimization', 'slug' => 'performance-optimization'],
            ['name' => 'Security Best Practices', 'slug' => 'security-best-practices'],
            ['name' => 'Responsive Web Design', 'slug' => 'responsive-web-design'],
            ['name' => 'UI UX Principles', 'slug' => 'ui-ux-principles'],
            ['name' => 'Graphic Design', 'slug' => 'graphic-design'],
            ['name' => 'SEO Optimization', 'slug' => 'seo-optimization'],
            ['name' => 'Digital Marketing', 'slug' => 'digital-marketing'],
            ['name' => 'Content Writing', 'slug' => 'content-writing'],
            ['name' => 'Social Media Management', 'slug' => 'social-media-management'],
            ['name' => 'Project Management', 'slug' => 'project-management'],
            ['name' => 'Agile & Scrum', 'slug' => 'agile-scrum'],
            ['name' => 'Time Management', 'slug' => 'time-management'],
            ['name' => 'Team Leadership', 'slug' => 'team-leadership'],
            ['name' => 'Communication Skills', 'slug' => 'communication-skills'],
            ['name' => 'Customer Support', 'slug' => 'customer-support'],
            ['name' => 'Technical Documentation', 'slug' => 'technical-documentation'],
            ['name' => 'Data Analysis', 'slug' => 'data-analysis'],
            ['name' => 'Excel Skills', 'slug' => 'excel-skills'],
            ['name' => 'Business Analysis', 'slug' => 'business-analysis'],
            ['name' => 'Financial Reporting', 'slug' => 'financial-reporting'],
            ['name' => 'Risk Management', 'slug' => 'risk-management'],
            ['name' => 'Presentation Skills', 'slug' => 'presentation-skills'],
            ['name' => 'Training & Coaching', 'slug' => 'training-coaching'],
        ];

        Skill::insert($skills);
    }
}
