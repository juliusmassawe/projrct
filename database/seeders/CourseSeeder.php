<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Programme;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            //certificate schedule
            ['name' => 'Introduction to Business Maths and Statistics', 'programme_id' => 1,  'ante' => 'ECS 011', 'nature' => 'Core', 'credits' => 3, 'year' => 1, 'semester' => 1, 'sem' => '1'],
            ['name' => 'Computer Management Information System', 'programme_id' => 1,  'ante' => 'CIT 011', 'nature' => 'Core', 'credits' => 3, 'year' => 1, 'semester' => 1, 'sem' => '1'],
            ['name' => 'Book keeping and Accounting I', 'programme_id' => 1,  'ante' => 'ACC 011', 'nature' => 'Core', 'credits' => 3, 'year' => 1, 'semester' => 1, 'sem' => '1'],
            ['name' => 'Basics of Communication Skills', 'programme_id' => 1,  'ante' => 'MAL 011', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 1, 'sem' => '1'],
            ['name' => 'Computer Hardware and Accessories', 'programme_id' => 1,  'ante' => 'CIT 012', 'nature' => 'Core', 'credits' => 3, 'year' => 1, 'semester' => 1, 'sem' => '1'],
            ['name' => 'Commercial Knowledge', 'programme_id' => 1,  'ante' => 'PSM 012', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 1, 'sem' => '1'],

            ['name' => 'Office Communication', 'programme_id' => 1,  'ante' => 'MAL 013', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 2, 'sem' => '2'],
            ['name' => 'Introduction to Computer Programming', 'programme_id' => 1,  'ante' => 'CIT 014', 'nature' => 'Core', 'credits' => 3, 'year' => 1, 'semester' => 2, 'sem' => '2'],
            ['name' => 'Introduction to Business Law', 'programme_id' => 1,  'ante' => 'MAL 014', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 2, 'sem' => '2'],
            ['name' => 'Computer Software Applications', 'programme_id' => 1,  'ante' => 'CIT 015', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 2, 'sem' => '2'],
            ['name' => 'Introduction to Networking', 'programme_id' => 1,  'ante' => 'CIT 016', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 2, 'sem' => '2'],
            ['name' => 'Principles of Cooperation', 'programme_id' => 1,  'ante' => 'CDM 011', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 2, 'sem' => '2'],
            ['name' => 'Introduction to Database Management', 'programme_id' => 1,  'ante' => 'CIT 013', 'nature' => 'Core', 'credits' => 3, 'year' => 1, 'semester' => 2, 'sem' => '2'],

            //Diploma Courses
            ['name' => 'Essentials of Computer Systems', 'programme_id' => 2,  'ante' => 'CIT 052', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 1, 'sem' => '1'],
            ['name' => 'Computer Software Applications', 'programme_id' => 2,  'ante' => 'CIT 053', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 1, 'sem' => '1'],
            ['name' => 'Aspects of Business Organization and Associations', 'programme_id' => 2,  'ante' => 'MAL 054', 'nature' => 'Core', 'credits' => 1, 'year' => 1, 'semester' => 1, 'sem' => '1'],
            ['name' => 'Basic Business Math and Statistics', 'programme_id' => 2,  'ante' => 'ECS 051', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 1, 'sem' => '1'],
            ['name' => 'Basics of Co-operation && Coop Development', 'programme_id' => 2,  'ante' => 'CDM 051', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 1, 'sem' => '1'],
            ['name' => 'Principles of Business Communication', 'programme_id' => 2,  'ante' => 'MAL 055', 'nature' => 'Core', 'credits' => 1, 'year' => 1, 'semester' => 1, 'sem' => '1'],
            ['name' => 'Numerical Analysis', 'programme_id' => 2,  'ante' => 'ECS 053', 'nature' => 'Elective', 'credits' => 2, 'year' => 1, 'semester' => 1, 'sem' => '1'],
            ['name' => 'Computer Troubleshooting and Maintenance', 'programme_id' => 2,  'ante' => 'CIT 054', 'nature' => 'Elective', 'credits' => 2, 'year' => 1, 'semester' => 1, 'sem' => '1'],

            ['name' => 'Computer Software Programming', 'programme_id' => 2,  'ante' => 'CIT 055', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 2, 'sem' => '2'],
            ['name' => 'Theories of Applications of Database Management', 'programme_id' => 2,  'ante' => 'CIT 056', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 2, 'sem' => '2'],
            ['name' => 'Theories of Applications of Database Management', 'programme_id' => 2,  'ante' => 'CIT 056', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 2, 'sem' => '2'],
            ['name' => 'Practical Networking and the Internet', 'programme_id' => 2,  'ante' => 'CIT 057', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 2, 'sem' => '2'],
            ['name' => 'Introduction to Operating Systems', 'programme_id' => 2,  'ante' => 'CIT 058', 'nature' => 'Core', 'credits' => 1, 'year' => 1, 'semester' => 2, 'sem' => '2'],
            ['name' => 'Basics of Website Designing', 'programme_id' => 2,  'ante' => 'CIT 059', 'nature' => 'Core', 'credits' => 1, 'year' => 1, 'semester' => 2, 'sem' => '2'],
            ['name' => 'Basics of Business Law and Ethics', 'programme_id' => 2,  'ante' => 'MAL 056', 'nature' => 'Core', 'credits' => 1, 'year' => 1, 'semester' => 2, 'sem' => '2'],
            ['name' => 'Development Studies', 'programme_id' => 2,  'ante' => 'CDM 056', 'nature' => 'Core', 'credits' => 1, 'year' => 1, 'semester' => 2, 'sem' => '2'],
            ['name' => 'Statistical and Accounting Packages', 'programme_id' => 2,  'ante' => 'CIT 078', 'nature' => 'Elective', 'credits' => 2, 'year' => 1, 'semester' => 2, 'sem' => '2'],
            ['name' => 'Mathematical Logic', 'programme_id' => 2,  'ante' => 'ECS 054', 'nature' => 'Elective', 'credits' => 2, 'year' => 1, 'semester' => 2, 'sem' => '2'],

            ['name' => 'System Analysis and Design', 'programme_id' => 2,  'ante' => 'CIT 071', 'nature' => 'Core', 'credits' => 1, 'year' => 2, 'semester' => 1, 'sem' => '3'],
            ['name' => 'Commercial Programming', 'programme_id' => 2,  'ante' => 'CIT 072', 'nature' => 'Core', 'credits' => 2, 'year' => 2, 'semester' => 1, 'sem' => '3'],
            ['name' => 'Basics of Research Methods', 'programme_id' => 2,  'ante' => 'CDM 072', 'nature' => 'Core', 'credits' => 1, 'year' => 2, 'semester' => 1, 'sem' => '3'],
            ['name' => 'Computer Arithmetic', 'programme_id' => 2,  'ante' => 'CIT 073', 'nature' => 'Core', 'credits' => 1, 'year' => 2, 'semester' => 1, 'sem' => '3'],
            ['name' => 'Dynamic Website Designing and Graphics', 'programme_id' => 2,  'ante' => 'CIT 074', 'nature' => 'Core', 'credits' => 2, 'year' => 2, 'semester' => 1, 'sem' => '3'],
            ['name' => 'Introduction to Corporate Social Responsibility', 'programme_id' => 2,  'ante' => 'MAL 076', 'nature' => 'Core', 'credits' => 1, 'year' => 2, 'semester' => 1, 'sem' => '3'],
            ['name' => 'Basics of Quantitative Methods', 'programme_id' => 2,  'ante' => 'ECS 071', 'nature' => 'Core', 'credits' => 2, 'year' => 2, 'semester' => 1, 'sem' => '3'],
            ['name' => 'Project Identification and Implementation', 'programme_id' => 2,  'ante' => 'CDM 071', 'nature' => 'Elective', 'credits' => 2, 'year' => 2, 'semester' => 1, 'sem' => '3'],
            ['name' => 'Management Information Systems', 'programme_id' => 2,  'ante' => 'CDM 073', 'nature' => 'Elective', 'credits' => 2, 'year' => 2, 'semester' => 1, 'sem' => '3'],

            ['name' => 'Basic Marketing', 'programme_id' => 2,  'ante' => 'PSM 078', 'nature' => 'Core', 'credits' => 2, 'year' => 2, 'semester' => 2, 'sem' => 4],
            ['name' => 'Fundamentals of E-Commerce', 'programme_id' => 2,  'ante' => 'PSM 072', 'nature' => 'Core', 'credits' => 1, 'year' => 2, 'semester' => 2, 'sem' => 4],
            ['name' => 'Database Systems Implementation', 'programme_id' => 2,  'ante' => 'CIT 075', 'nature' => 'Core', 'credits' => 2, 'year' => 2, 'semester' => 2, 'sem' => 4],
            ['name' => 'Procurement for ICT tools', 'programme_id' => 2,  'ante' => 'PSM 073', 'nature' => 'Core', 'credits' => 2, 'year' => 2, 'semester' => 2, 'sem' => 4],
            ['name' => 'Principles of Entrepreneurship', 'programme_id' => 2,  'ante' => 'MAL 074', 'nature' => 'Core', 'credits' => 1, 'year' => 2, 'semester' => 2, 'sem' => 4],
            ['name' => 'ICT Project', 'programme_id' => 2,  'ante' => 'CIT 077', 'nature' => 'Core', 'credits' => 3, 'year' => 2, 'semester' => 2, 'taught' => 0, 'sem' => 4],
            ['name' => 'Logic Circuits', 'programme_id' => 2,  'ante' => 'CIT 076', 'nature' => 'Elective', 'credits' => 2, 'year' => 2, 'semester' => 2, 'sem' => 4],
            ['name' => 'Critical Thinking and Problem Solving Skills', 'programme_id' => 2,  'ante' => 'CRD 074', 'nature' => 'Elective', 'credits' => 2, 'year' => 2, 'semester' => 2, 'sem' => 4],

            //Bachelors Courses
            ['name' => 'Communication Skills', 'programme_id' => 3,  'ante' => 'MAL 102', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 1, 'sem' => 1],
            ['name' => 'Cooperation and Co-operative Development', 'programme_id' => 3,  'ante' => 'CDM 101', 'nature' => 'Core', 'credits' => 1, 'year' => 1, 'semester' => 1, 'sem' => 1],
            ['name' => 'Fundamentals of Information and Communication Technology', 'programme_id' => 3,  'ante' => 'CIT 106', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 1, 'sem' => 1],
            ['name' => 'Discrete Mathematics', 'programme_id' => 3,  'ante' => 'ECS 116', 'nature' => 'Core', 'credits' => 1, 'year' => 1, 'semester' => 1, 'sem' => 1],
            ['name' => 'Introduction to Algorithms and Programming', 'programme_id' => 3,  'ante' => 'CIT 108', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 1, 'sem' => 1],
            ['name' => 'Business Mathematics and Statistics', 'programme_id' => 3,  'ante' => 'ECS 101', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 1, 'sem' => 1],
            ['name' => 'Fundamentals of Economics', 'programme_id' => 3,  'ante' => 'ECS 108', 'nature' => 'Elective', 'credits' => 2, 'year' => 1, 'semester' => 1, 'sem' => 1],
            ['name' => 'Fundamentals of Economics', 'programme_id' => 3,  'ante' => 'ECS 108', 'nature' => 'Elective', 'credits' => 2, 'year' => 1, 'semester' => 1, 'sem' => 1],
            ['name' => 'Introduction to Entrepreneurship', 'programme_id' => 3,  'ante' => 'MAL 106', 'nature' => 'Elective', 'credits' => 2, 'year' => 1, 'semester' => 1, 'sem' => 1],

            ['name' => 'Business Communication', 'programme_id' => 3,  'ante' => 'MAL 104', 'nature' => 'Core', 'credits' => 1, 'year' => 1, 'semester' => 2, 'sem' => 2],
            ['name' => 'Event-Oriented Programming I', 'programme_id' => 3,  'ante' => 'CIT 105', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 2, 'sem' => 2],
            ['name' => 'Operating Systems I', 'programme_id' => 3,  'ante' => 'CIT 107', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 2, 'sem' => 2],
            ['name' => 'Theories of Development', 'programme_id' => 3,  'ante' => 'CDM 103', 'nature' => 'Core', 'credits' => 1, 'year' => 1, 'semester' => 2, 'sem' => 2],
            ['name' => 'Database Systems I', 'programme_id' => 3,  'ante' => 'CIT 109', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 2, 'sem' => 2],
            ['name' => 'Computer Networking I', 'programme_id' => 3,  'ante' => 'CIT 110', 'nature' => 'Core', 'credits' => 2, 'year' => 1, 'semester' => 2, 'sem' => 2],
            ['name' => 'Software Application in Business', 'programme_id' => 3,  'ante' => 'CIT 112', 'nature' => 'Elective', 'credits' => 2, 'year' => 1, 'semester' => 2, 'sem' => 2],
            ['name' => 'Digital Logic and Computer Organization', 'programme_id' => 3,  'ante' => 'CIT 113', 'nature' => 'Elective', 'credits' => 2, 'year' => 1, 'semester' => 2, 'sem' => 2],

            ['name' => 'Management Information Systems', 'programme_id' => 3,  'ante' => 'CIT 202', 'nature' => 'Core', 'credits' => 2, 'year' => 2, 'semester' => 1, 'sem' => 3],
            ['name' => 'Computer Networking II', 'programme_id' => 3,  'ante' => 'CIT 203', 'nature' => 'Core', 'credits' => 2, 'year' => 2, 'semester' => 1, 'sem' => 3],
            ['name' => 'Website Design and Management', 'programme_id' => 3,  'ante' => 'CIT 208', 'nature' => 'Core', 'credits' => 2, 'year' => 2, 'semester' => 1, 'sem' => 3],
            ['name' => 'Operating Systems II', 'programme_id' => 3,  'ante' => 'CIT 205', 'nature' => 'Core', 'credits' => 2, 'year' => 2, 'semester' => 1, 'sem' => 3],
            ['name' => 'IT Security Management', 'programme_id' => 3,  'ante' => 'CIT 210', 'nature' => 'Core', 'credits' => 2, 'year' => 2, 'semester' => 1, 'sem' => 3],
            ['name' => 'Business Statistics', 'programme_id' => 3,  'ante' => 'ECS 225', 'nature' => 'Core', 'credits' => 1, 'year' => 2, 'semester' => 1, 'sem' => 3],
            ['name' => 'Field Attachment', 'programme_id' => 3,  'ante' => 'CIT 200', 'nature' => 'Core', 'credits' => 0, 'year' => 2, 'semester' => 1, 'sem' => 3],
            ['name' => 'Electronic Media Systems and Multimedia', 'programme_id' => 3,  'ante' => 'CIT 211', 'nature' => 'Elective', 'credits' => 2, 'year' => 2, 'semester' => 1, 'sem' => 3],
            ['name' => 'Legal and Ethical Issues in Information Technology', 'programme_id' => 3,  'ante' => 'MAL 228', 'nature' => 'Elective', 'credits' => 2, 'year' => 2, 'semester' => 1, 'sem' => 3],
            ['name' => 'Human Resource Management', 'programme_id' => 3,  'ante' => 'MAL 201', 'nature' => 'Elective', 'credits' => 2, 'year' => 2, 'semester' => 1, 'sem' => 3],

            ['name' => 'Event-Oriented Programming II', 'programme_id' => 3,  'ante' => 'CIT 207', 'nature' => 'Core', 'credits' => 2, 'year' => 2, 'semester' => 2, 'sem' => 4],
            ['name' => 'Scripting Languages', 'programme_id' => 3,  'ante' => 'CIT 204', 'nature' => 'Core', 'credits' => 1, 'year' => 2, 'semester' => 2, 'sem' => 4],
            ['name' => 'Database Systems II', 'programme_id' => 3,  'ante' => 'CIT 209', 'nature' => 'Core', 'credits' => 2, 'year' => 2, 'semester' => 2, 'sem' => 4],
            ['name' => 'System Analysis and Design', 'programme_id' => 3,  'ante' => 'CIT 206', 'nature' => 'Core', 'credits' => 1, 'year' => 2, 'semester' => 2, 'sem' => 4],
            ['name' => 'Computerized Accounting', 'programme_id' => 3,  'ante' => 'ACC 208', 'nature' => 'Core', 'credits' => 1, 'year' => 2, 'semester' => 2, 'sem' => 4],
            ['name' => 'Research Methods', 'programme_id' => 3,  'ante' => 'CDM 202', 'nature' => 'Core', 'credits' => 2, 'year' => 2, 'semester' => 2, 'sem' => 4],
            ['name' => 'Principles of Marketing', 'programme_id' => 3,  'ante' => 'PSM 211', 'nature' => 'Elective', 'credits' => 2, 'year' => 2, 'semester' => 2, 'sem' => 4],
            ['name' => 'Principles of e-Business', 'programme_id' => 3,  'ante' => 'PSM 212', 'nature' => 'Elective', 'credits' => 2, 'year' => 2, 'semester' => 2, 'sem' => 4],
            ['name' => 'Critical Thinking and Problem Solving Skills', 'programme_id' => 3,  'ante' => 'CRD 213', 'nature' => 'Elective', 'credits' => 2, 'year' => 2, 'semester' => 2, 'sem' => 4],

            ['name' => 'Business Law', 'programme_id' => 3,  'ante' => 'MAL 338', 'nature' => 'Core', 'credits' => 2, 'year' => 3, 'semester' => 1, 'sem' => 5],
            ['name' => 'Internet Applications and Web Programming', 'programme_id' => 3,  'ante' => 'CIT 301', 'nature' => 'Core', 'credits' => 2, 'year' => 3, 'semester' => 1, 'sem' => 5],
            ['name' => 'Wireless Technology', 'programme_id' => 3,  'ante' => 'CIT 302', 'nature' => 'Core', 'credits' => 2, 'year' => 3, 'semester' => 1, 'sem' => 5],
            ['name' => 'Statistical Packages for Data Analysis', 'programme_id' => 3,  'ante' => 'CIT 303', 'nature' => 'Core', 'credits' => 2, 'year' => 3, 'semester' => 1, 'sem' => 5],
            ['name' => 'Computer Maintenance and Troubleshooting', 'programme_id' => 3,  'ante' => 'CIT 305', 'nature' => 'Core', 'credits' => 2, 'year' => 3, 'semester' => 1, 'sem' => 5],
            ['name' => 'ICT Research Project (Proposal)', 'programme_id' => 3,  'ante' => 'CIT-300', 'nature' => 'Core', 'credits' => 1, 'year' => 3, 'semester' => 1, 'taught' => 0, 'sem' => 5],
            ['name' => 'Computer Graphics', 'programme_id' => 3,  'ante' => 'CIT 304', 'nature' => 'Elective', 'credits' => 2, 'year' => 3, 'semester' => 1, 'sem' => 5],
            ['name' => 'Business Policy and Ethics', 'programme_id' => 3,  'ante' => 'MAL 340', 'nature' => 'Elective', 'credits' => 2, 'year' => 3, 'semester' => 1, 'sem' => 5],

            ['name' => 'Business Intelligence and Data Warehousing', 'programme_id' => 3,  'ante' => 'CIT 306', 'nature' => 'Core', 'credits' => 2, 'year' => 3, 'semester' => 2, 'sem' => 6],
            ['name' => 'Software Quality Assurance', 'programme_id' => 3,  'ante' => 'CIT 307', 'nature' => 'Core', 'credits' => 2, 'year' => 3, 'semester' => 2, 'sem' => 6],
            ['name' => 'Group Project', 'programme_id' => 3,  'ante' => 'CIT 308', 'nature' => 'Core', 'credits' => 2, 'year' => 3, 'semester' => 2, 'taught' => 0, 'sem' => 6],
            ['name' => 'Information Technology Project Management', 'programme_id' => 3,  'ante' => 'CIT 309', 'nature' => 'Core', 'credits' => 2, 'year' => 3, 'semester' => 2, 'sem' => 6],
            ['name' => 'Research Project (Report)', 'programme_id' => 3,  'ante' => 'CIT 300 ', 'nature' => 'Core', 'credits' => 2, 'year' => 3, 'semester' => 2, 'taught' => 0, 'sem' => 6],
            ['name' => 'Business Planning and Budgeting', 'programme_id' => 3,  'ante' => 'MAL 341', 'nature' => 'Elective', 'credits' => 2, 'year' => 3, 'semester' => 2, 'sem' => 6],
            ['name' => 'Business Negotiation Skills', 'programme_id' => 3,  'ante' => 'MAL 356', 'nature' => 'Elective', 'credits' => 2, 'year' => 3, 'semester' => 2, 'sem' => 6],
            ['name' => 'Open Source Software Development', 'programme_id' => 3,  'ante' => 'CIT 310', 'nature' => 'Elective', 'credits' => 2, 'year' => 3, 'semester' => 2, 'sem' => 6],

        ];

        foreach ($courses as $course) {
            Course::updateorCreate(['ante' => $course['ante']], $course);
        }
    }
}
