<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Skill;
use App\Models\Survey;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Support\Facades\Hash;

class StudentDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define realistic student profiles
        $students = $this->getStudentData();

        foreach ($students as $studentData) {
            // Create user
            $user = User::create([
                'name' => $studentData['name'],
                'email' => $studentData['email'],
                'password' => Hash::make('password'), // Default password
                'student_id' => $studentData['student_id'],
                'phone_number' => $studentData['phone_number'],
                'cohort_year' => $studentData['cohort_year'],
                'major' => $studentData['major'],
                'about' => $studentData['about'],
                'role' => 'student',
                'email_verified_at' => now(),
            ]);

            // Attach skills (create if they don't exist)
            $skillIds = $this->getOrCreateSkills($studentData['skills'], $studentData['industry']);
            $user->skills()->attach($skillIds);

            // Create survey
            Survey::create([
                'user_id' => $user->id,
                'cgpa' => $studentData['survey']['cgpa'],
                'primary_interest' => $studentData['survey']['preferred_industry'],
            ]);

            // Create some applications for variety (about 40% of students)
            if (rand(1, 100) <= 40) {
                $this->createApplicationsForStudent($user);
            }
        }

        $this->command->info('Mock student accounts created successfully!');
        $this->command->info('Total students created: ' . count($students));
        $this->command->info('Default password for all students: password');
    }

    /**
     * Get or create skills and return their IDs
     */
    private function getOrCreateSkills(array $skillNames, string $industry): array
    {
        $skillIds = [];
        
        foreach ($skillNames as $skillName) {
            $skill = Skill::firstOrCreate(
                ['name' => $skillName],
                ['industry' => $industry]
            );
            $skillIds[] = $skill->id;
        }
        
        return $skillIds;
    }

    /**
     * Get all student data
     */
    private function getStudentData(): array
    {
        return [
            // Frontend Developers
            [
                'name' => 'Ahmad Rizki Pratama',
                'email' => 'ahmad.rizki@student.ciputra.ac.id',
                'student_id' => '2021110001',
                'phone_number' => '081234567890',
                'cohort_year' => 2021,
                'major' => 'Computer Science',
                'about' => 'Passionate about web development and UI/UX design. I have experience building responsive websites and mobile applications. Looking for opportunities to grow my skills in frontend development.',
                'skills' => ['JavaScript', 'React', 'HTML', 'CSS', 'Figma', 'Git'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.75, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti.nurhaliza@student.ciputra.ac.id',
                'student_id' => '2021110002',
                'phone_number' => '081234567891',
                'cohort_year' => 2021,
                'major' => 'Information Systems',
                'about' => 'Data enthusiast with strong analytical skills. Experienced in Python, SQL, and data visualization tools. Seeking internship opportunities in data science and business analytics.',
                'skills' => ['Python', 'SQL', 'Tableau', 'Excel', 'Statistics', 'Machine Learning'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.85, 'preferred_location' => 'Bandung', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@student.ciputra.ac.id',
                'student_id' => '2021110003',
                'phone_number' => '081234567892',
                'cohort_year' => 2021,
                'major' => 'Software Engineering',
                'about' => 'Backend developer with expertise in Node.js and database management. I enjoy solving complex problems and building scalable systems. Looking for backend development internships.',
                'skills' => ['Node.js', 'Java', 'PostgreSQL', 'MongoDB', 'Docker', 'Git'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.60, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Dewi Kartika',
                'email' => 'dewi.kartika@student.ciputra.ac.id',
                'student_id' => '2021110004',
                'phone_number' => '081234567893',
                'cohort_year' => 2021,
                'major' => 'Computer Science',
                'about' => 'Creative designer and frontend developer. I love creating beautiful and intuitive user interfaces. Skilled in modern design tools and frontend frameworks.',
                'skills' => ['UI/UX Design', 'Figma', 'Adobe XD', 'HTML', 'CSS', 'React', 'TypeScript'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.70, 'preferred_location' => 'Surabaya', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Eko Prasetyo',
                'email' => 'eko.prasetyo@student.ciputra.ac.id',
                'student_id' => '2022110005',
                'phone_number' => '081234567894',
                'cohort_year' => 2022,
                'major' => 'Information Technology',
                'about' => 'Mobile app developer passionate about creating user-friendly applications. Experienced with both iOS and Android development. Always eager to learn new technologies.',
                'skills' => ['Flutter', 'Dart', 'Swift', 'Kotlin', 'Firebase', 'Git'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.65, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Fitri Handayani',
                'email' => 'fitri.handayani@student.ciputra.ac.id',
                'student_id' => '2022110006',
                'phone_number' => '081234567895',
                'cohort_year' => 2022,
                'major' => 'Computer Science',
                'about' => 'Full-stack developer with a focus on modern web technologies. I enjoy working on both frontend and backend to create complete solutions. Open to challenging projects.',
                'skills' => ['React', 'Node.js', 'TypeScript', 'PostgreSQL', 'Docker', 'AWS'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.80, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Gilang Ramadhan',
                'email' => 'gilang.ramadhan@student.ciputra.ac.id',
                'student_id' => '2022110007',
                'phone_number' => '081234567896',
                'cohort_year' => 2022,
                'major' => 'Data Science',
                'about' => 'Aspiring data scientist with strong foundation in statistics and machine learning. Experience in predictive modeling and data analysis. Looking to apply my skills in real-world projects.',
                'skills' => ['Python', 'R', 'Machine Learning', 'TensorFlow', 'SQL', 'Statistics'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.90, 'preferred_location' => 'Bandung', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Hana Salsabila',
                'email' => 'hana.salsabila@student.ciputra.ac.id',
                'student_id' => '2022110008',
                'phone_number' => '081234567897',
                'cohort_year' => 2022,
                'major' => 'Information Systems',
                'about' => 'Business analyst with technical background. I bridge the gap between business needs and technical solutions. Interested in product management and business intelligence.',
                'skills' => ['Business Analysis', 'SQL', 'Tableau', 'Excel', 'Agile', 'Project Management'],
                'industry' => 'Business',
                'survey' => ['cgpa' => 3.72, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Finance'],
            ],
            [
                'name' => 'Ivan Setiawan',
                'email' => 'ivan.setiawan@student.ciputra.ac.id',
                'student_id' => '2023110009',
                'phone_number' => '081234567898',
                'cohort_year' => 2023,
                'major' => 'Software Engineering',
                'about' => 'DevOps enthusiast interested in cloud infrastructure and automation. Learning about CI/CD pipelines and containerization. Eager to gain hands-on experience.',
                'skills' => ['Linux', 'Docker', 'Kubernetes', 'Git', 'AWS', 'Python'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.55, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Julia Anindita',
                'email' => 'julia.anindita@student.ciputra.ac.id',
                'student_id' => '2023110010',
                'phone_number' => '081234567899',
                'cohort_year' => 2023,
                'major' => 'Computer Science',
                'about' => 'Game developer and graphics programmer. Passionate about creating immersive gaming experiences. Proficient in game engines and 3D graphics programming.',
                'skills' => ['Unity', 'C#', 'C++', 'Blender', '3D Modeling', 'Git'],
                'industry' => 'Entertainment',
                'survey' => ['cgpa' => 3.68, 'preferred_location' => 'Surabaya', 'preferred_industry' => 'Entertainment'],
            ],
            // Additional 40 students
            [
                'name' => 'Krisna Wijaya',
                'email' => 'krisna.wijaya@student.ciputra.ac.id',
                'student_id' => '2021110011',
                'phone_number' => '081234567900',
                'cohort_year' => 2021,
                'major' => 'Computer Science',
                'about' => 'Cloud architect enthusiast with knowledge in AWS and Azure. Building scalable and reliable cloud infrastructure.',
                'skills' => ['AWS', 'Azure', 'Cloud Computing', 'Terraform', 'CI/CD', 'DevOps'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.78, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Linda Pratiwi',
                'email' => 'linda.pratiwi@student.ciputra.ac.id',
                'student_id' => '2021110012',
                'phone_number' => '081234567901',
                'cohort_year' => 2021,
                'major' => 'Data Science',
                'about' => 'Machine learning engineer focusing on NLP and computer vision applications.',
                'skills' => ['Python', 'TensorFlow', 'PyTorch', 'NLP', 'Computer Vision', 'Deep Learning'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.88, 'preferred_location' => 'Bandung', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Muhammad Farhan',
                'email' => 'muhammad.farhan@student.ciputra.ac.id',
                'student_id' => '2021110013',
                'phone_number' => '081234567902',
                'cohort_year' => 2021,
                'major' => 'Software Engineering',
                'about' => 'Security-focused developer interested in application security and penetration testing.',
                'skills' => ['Cybersecurity', 'Penetration Testing', 'Python', 'Network Security', 'Cryptography'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.66, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Nadia Kusuma',
                'email' => 'nadia.kusuma@student.ciputra.ac.id',
                'student_id' => '2021110014',
                'phone_number' => '081234567903',
                'cohort_year' => 2021,
                'major' => 'Information Systems',
                'about' => 'Product manager aspirant with strong technical and business acumen.',
                'skills' => ['Product Management', 'User Research', 'Agile', 'Wireframing', 'SQL', 'Analytics'],
                'industry' => 'Business',
                'survey' => ['cgpa' => 3.74, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Oscar Ramadhan',
                'email' => 'oscar.ramadhan@student.ciputra.ac.id',
                'student_id' => '2021110015',
                'phone_number' => '081234567904',
                'cohort_year' => 2021,
                'major' => 'Computer Science',
                'about' => 'AR/VR developer creating immersive experiences using Unity and Unreal Engine.',
                'skills' => ['Unity', 'Unreal Engine', 'AR/VR', 'C#', 'C++', '3D Programming'],
                'industry' => 'Entertainment',
                'survey' => ['cgpa' => 3.71, 'preferred_location' => 'Surabaya', 'preferred_industry' => 'Entertainment'],
            ],
            [
                'name' => 'Putri Maharani',
                'email' => 'putri.maharani@student.ciputra.ac.id',
                'student_id' => '2022110016',
                'phone_number' => '081234567905',
                'cohort_year' => 2022,
                'major' => 'Information Technology',
                'about' => 'QA engineer passionate about test automation and software quality assurance.',
                'skills' => ['Test Automation', 'Selenium', 'Java', 'QA Testing', 'JIRA', 'API Testing'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.63, 'preferred_location' => 'Bandung', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Qori Nurdin',
                'email' => 'qori.nurdin@student.ciputra.ac.id',
                'student_id' => '2022110017',
                'phone_number' => '081234567906',
                'cohort_year' => 2022,
                'major' => 'Computer Science',
                'about' => 'Blockchain developer exploring decentralized applications and smart contracts.',
                'skills' => ['Blockchain', 'Solidity', 'Ethereum', 'Web3', 'Smart Contracts', 'JavaScript'],
                'industry' => 'Finance',
                'survey' => ['cgpa' => 3.69, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Finance'],
            ],
            [
                'name' => 'Rina Anggraini',
                'email' => 'rina.anggraini@student.ciputra.ac.id',
                'student_id' => '2022110018',
                'phone_number' => '081234567907',
                'cohort_year' => 2022,
                'major' => 'Data Science',
                'about' => 'Data engineer specializing in ETL pipelines and big data technologies.',
                'skills' => ['Apache Spark', 'Hadoop', 'ETL', 'Python', 'SQL', 'Data Warehousing'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.82, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Satria Putra',
                'email' => 'satria.putra@student.ciputra.ac.id',
                'student_id' => '2022110019',
                'phone_number' => '081234567908',
                'cohort_year' => 2022,
                'major' => 'Software Engineering',
                'about' => 'Systems programmer interested in operating systems and low-level programming.',
                'skills' => ['C', 'C++', 'Rust', 'Operating Systems', 'Assembly', 'Linux Kernel'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.76, 'preferred_location' => 'Bandung', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Tania Wijayanti',
                'email' => 'tania.wijayanti@student.ciputra.ac.id',
                'student_id' => '2022110020',
                'phone_number' => '081234567909',
                'cohort_year' => 2022,
                'major' => 'Information Systems',
                'about' => 'Digital marketing analyst with strong data analysis and SEO skills.',
                'skills' => ['Digital Marketing', 'SEO', 'Google Analytics', 'Content Marketing', 'Social Media'],
                'industry' => 'Marketing',
                'survey' => ['cgpa' => 3.58, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Marketing'],
            ],
            [
                'name' => 'Umar Faruq',
                'email' => 'umar.faruq@student.ciputra.ac.id',
                'student_id' => '2023110021',
                'phone_number' => '081234567910',
                'cohort_year' => 2023,
                'major' => 'Computer Science',
                'about' => 'IoT developer building smart solutions for everyday problems.',
                'skills' => ['IoT', 'Arduino', 'Raspberry Pi', 'MQTT', 'Python', 'Embedded Systems'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.62, 'preferred_location' => 'Surabaya', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Vina Melati',
                'email' => 'vina.melati@student.ciputra.ac.id',
                'student_id' => '2023110022',
                'phone_number' => '081234567911',
                'cohort_year' => 2023,
                'major' => 'Information Technology',
                'about' => 'Network administrator learning about network design and cybersecurity.',
                'skills' => ['Networking', 'Cisco', 'Network Security', 'TCP/IP', 'Firewall', 'VPN'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.54, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Wahyu Hidayat',
                'email' => 'wahyu.hidayat@student.ciputra.ac.id',
                'student_id' => '2023110023',
                'phone_number' => '081234567912',
                'cohort_year' => 2023,
                'major' => 'Computer Science',
                'about' => 'Aspiring AI researcher focusing on reinforcement learning and robotics.',
                'skills' => ['Artificial Intelligence', 'Reinforcement Learning', 'Python', 'OpenAI Gym', 'ROS'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.86, 'preferred_location' => 'Bandung', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Xena Oktavia',
                'email' => 'xena.oktavia@student.ciputra.ac.id',
                'student_id' => '2023110024',
                'phone_number' => '081234567913',
                'cohort_year' => 2023,
                'major' => 'Data Science',
                'about' => 'Business intelligence analyst creating dashboards and insights for decision making.',
                'skills' => ['Business Intelligence', 'Power BI', 'Tableau', 'SQL', 'Data Visualization'],
                'industry' => 'Business',
                'survey' => ['cgpa' => 3.67, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Finance'],
            ],
            [
                'name' => 'Yusuf Maulana',
                'email' => 'yusuf.maulana@student.ciputra.ac.id',
                'student_id' => '2023110025',
                'phone_number' => '081234567914',
                'cohort_year' => 2023,
                'major' => 'Software Engineering',
                'about' => 'Microservices architect learning about distributed systems and service mesh.',
                'skills' => ['Microservices', 'Kubernetes', 'Docker', 'gRPC', 'Service Mesh', 'Go'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.73, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Zahra Amelia',
                'email' => 'zahra.amelia@student.ciputra.ac.id',
                'student_id' => '2020110026',
                'phone_number' => '081234567915',
                'cohort_year' => 2020,
                'major' => 'Information Systems',
                'about' => 'ERP consultant with SAP and Oracle knowledge. Helping businesses optimize their operations.',
                'skills' => ['SAP', 'ERP Systems', 'Business Process', 'SQL', 'Project Management'],
                'industry' => 'Business',
                'survey' => ['cgpa' => 3.79, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Business'],
            ],
            [
                'name' => 'Aditya Nugraha',
                'email' => 'aditya.nugraha@student.ciputra.ac.id',
                'student_id' => '2020110027',
                'phone_number' => '081234567916',
                'cohort_year' => 2020,
                'major' => 'Computer Science',
                'about' => 'Graphics programmer working on rendering engines and shader development.',
                'skills' => ['OpenGL', 'Vulkan', 'GLSL', 'C++', 'Graphics Programming', 'Shader Development'],
                'industry' => 'Entertainment',
                'survey' => ['cgpa' => 3.84, 'preferred_location' => 'Surabaya', 'preferred_industry' => 'Entertainment'],
            ],
            [
                'name' => 'Bella Safira',
                'email' => 'bella.safira@student.ciputra.ac.id',
                'student_id' => '2020110028',
                'phone_number' => '081234567917',
                'cohort_year' => 2020,
                'major' => 'Data Science',
                'about' => 'Quantitative analyst applying statistical methods to financial markets.',
                'skills' => ['Quantitative Analysis', 'R', 'Python', 'Statistics', 'Financial Modeling'],
                'industry' => 'Finance',
                'survey' => ['cgpa' => 3.91, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Finance'],
            ],
            [
                'name' => 'Chandra Wijaksana',
                'email' => 'chandra.wijaksana@student.ciputra.ac.id',
                'student_id' => '2020110029',
                'phone_number' => '081234567918',
                'cohort_year' => 2020,
                'major' => 'Software Engineering',
                'about' => 'Platform engineer building internal developer tools and improving developer experience.',
                'skills' => ['Platform Engineering', 'Kubernetes', 'GitOps', 'Automation', 'Python', 'Bash'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.77, 'preferred_location' => 'Bandung', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Diana Permata',
                'email' => 'diana.permata@student.ciputra.ac.id',
                'student_id' => '2020110030',
                'phone_number' => '081234567919',
                'cohort_year' => 2020,
                'major' => 'Information Technology',
                'about' => 'Technical writer documenting APIs and creating developer guides.',
                'skills' => ['Technical Writing', 'API Documentation', 'Markdown', 'Git', 'REST APIs'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.61, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Eka Saputra',
                'email' => 'eka.saputra@student.ciputra.ac.id',
                'student_id' => '2021110031',
                'phone_number' => '081234567920',
                'cohort_year' => 2021,
                'major' => 'Computer Science',
                'about' => 'Computer vision engineer developing image recognition and object detection systems.',
                'skills' => ['Computer Vision', 'OpenCV', 'TensorFlow', 'Python', 'Image Processing'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.83, 'preferred_location' => 'Bandung', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Farah Diba',
                'email' => 'farah.diba@student.ciputra.ac.id',
                'student_id' => '2021110032',
                'phone_number' => '081234567921',
                'cohort_year' => 2021,
                'major' => 'Information Systems',
                'about' => 'Scrum master helping teams deliver value through agile methodologies.',
                'skills' => ['Scrum', 'Agile', 'JIRA', 'Team Facilitation', 'Project Management'],
                'industry' => 'Business',
                'survey' => ['cgpa' => 3.65, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Galih Prasetya',
                'email' => 'galih.prasetya@student.ciputra.ac.id',
                'student_id' => '2021110033',
                'phone_number' => '081234567922',
                'cohort_year' => 2021,
                'major' => 'Software Engineering',
                'about' => 'API developer creating RESTful and GraphQL APIs for modern applications.',
                'skills' => ['REST API', 'GraphQL', 'Node.js', 'Express', 'MongoDB', 'API Design'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.70, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Hesti Wulandari',
                'email' => 'hesti.wulandari@student.ciputra.ac.id',
                'student_id' => '2021110034',
                'phone_number' => '081234567923',
                'cohort_year' => 2021,
                'major' => 'Data Science',
                'about' => 'Recommendation systems specialist building personalized user experiences.',
                'skills' => ['Recommendation Systems', 'Collaborative Filtering', 'Python', 'Pandas', 'Scikit-learn'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.75, 'preferred_location' => 'Surabaya', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Irfan Hakim',
                'email' => 'irfan.hakim@student.ciputra.ac.id',
                'student_id' => '2021110035',
                'phone_number' => '081234567924',
                'cohort_year' => 2021,
                'major' => 'Computer Science',
                'about' => 'Embedded systems developer working on firmware and hardware integration.',
                'skills' => ['Embedded Systems', 'C', 'ARM', 'RTOS', 'Firmware Development'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.68, 'preferred_location' => 'Bandung', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Jessica Lie',
                'email' => 'jessica.lie@student.ciputra.ac.id',
                'student_id' => '2022110036',
                'phone_number' => '081234567925',
                'cohort_year' => 2022,
                'major' => 'Information Technology',
                'about' => 'UX researcher conducting user studies and usability testing.',
                'skills' => ['UX Research', 'User Testing', 'Figma', 'Prototyping', 'User Interviews'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.72, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Kevin Gunawan',
                'email' => 'kevin.gunawan@student.ciputra.ac.id',
                'student_id' => '2022110037',
                'phone_number' => '081234567926',
                'cohort_year' => 2022,
                'major' => 'Computer Science',
                'about' => 'Site reliability engineer ensuring system availability and performance.',
                'skills' => ['SRE', 'Monitoring', 'Prometheus', 'Grafana', 'Linux', 'Incident Management'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.81, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Lestari Handayani',
                'email' => 'lestari.handayani@student.ciputra.ac.id',
                'student_id' => '2022110038',
                'phone_number' => '081234567927',
                'cohort_year' => 2022,
                'major' => 'Data Science',
                'about' => 'Time series analyst forecasting trends and patterns in data.',
                'skills' => ['Time Series Analysis', 'Forecasting', 'Python', 'ARIMA', 'Prophet'],
                'industry' => 'Finance',
                'survey' => ['cgpa' => 3.76, 'preferred_location' => 'Bandung', 'preferred_industry' => 'Finance'],
            ],
            [
                'name' => 'Mario Teguh',
                'email' => 'mario.teguh@student.ciputra.ac.id',
                'student_id' => '2022110039',
                'phone_number' => '081234567928',
                'cohort_year' => 2022,
                'major' => 'Software Engineering',
                'about' => 'E-commerce developer building scalable online shopping platforms.',
                'skills' => ['E-commerce', 'Payment Integration', 'React', 'Node.js', 'Stripe', 'PayPal'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.64, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'E-commerce'],
            ],
            [
                'name' => 'Nina Rahmawati',
                'email' => 'nina.rahmawati@student.ciputra.ac.id',
                'student_id' => '2022110040',
                'phone_number' => '081234567929',
                'cohort_year' => 2022,
                'major' => 'Information Systems',
                'about' => 'Database administrator optimizing query performance and ensuring data integrity.',
                'skills' => ['Database Administration', 'MySQL', 'PostgreSQL', 'Query Optimization', 'Backup & Recovery'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.69, 'preferred_location' => 'Surabaya', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Oki Setiawan',
                'email' => 'oki.setiawan@student.ciputra.ac.id',
                'student_id' => '2023110041',
                'phone_number' => '081234567930',
                'cohort_year' => 2023,
                'major' => 'Computer Science',
                'about' => 'Compiler engineer interested in programming language design and implementation.',
                'skills' => ['Compilers', 'LLVM', 'Parsing', 'Type Systems', 'C++', 'Rust'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.87, 'preferred_location' => 'Bandung', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Prita Cahyani',
                'email' => 'prita.cahyani@student.ciputra.ac.id',
                'student_id' => '2023110042',
                'phone_number' => '081234567931',
                'cohort_year' => 2023,
                'major' => 'Data Science',
                'about' => 'NLP specialist developing chatbots and language understanding systems.',
                'skills' => ['NLP', 'Transformers', 'BERT', 'spaCy', 'Python', 'Hugging Face'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.80, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Reza Fauzi',
                'email' => 'reza.fauzi@student.ciputra.ac.id',
                'student_id' => '2023110043',
                'phone_number' => '081234567932',
                'cohort_year' => 2023,
                'major' => 'Information Technology',
                'about' => 'Automation engineer streamlining workflows and reducing manual tasks.',
                'skills' => ['Process Automation', 'RPA', 'Python', 'Selenium', 'Power Automate'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.59, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Sari Indah',
                'email' => 'sari.indah@student.ciputra.ac.id',
                'student_id' => '2023110044',
                'phone_number' => '081234567933',
                'cohort_year' => 2023,
                'major' => 'Software Engineering',
                'about' => 'Fintech developer creating innovative financial technology solutions.',
                'skills' => ['Fintech', 'Payment Systems', 'Blockchain', 'React', 'Node.js', 'Security'],
                'industry' => 'Finance',
                'survey' => ['cgpa' => 3.73, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Finance'],
            ],
            [
                'name' => 'Taufik Hidayat',
                'email' => 'taufik.hidayat@student.ciputra.ac.id',
                'student_id' => '2023110045',
                'phone_number' => '081234567934',
                'cohort_year' => 2023,
                'major' => 'Computer Science',
                'about' => 'Web3 developer building decentralized applications on the blockchain.',
                'skills' => ['Web3', 'Ethereum', 'Solidity', 'React', 'MetaMask', 'DeFi'],
                'industry' => 'Finance',
                'survey' => ['cgpa' => 3.66, 'preferred_location' => 'Surabaya', 'preferred_industry' => 'Finance'],
            ],
            [
                'name' => 'Umi Kalsum',
                'email' => 'umi.kalsum@student.ciputra.ac.id',
                'student_id' => '2020110046',
                'phone_number' => '081234567935',
                'cohort_year' => 2020,
                'major' => 'Information Systems',
                'about' => 'Supply chain analyst optimizing logistics and inventory management.',
                'skills' => ['Supply Chain', 'Logistics', 'SAP', 'Excel', 'Data Analysis', 'Forecasting'],
                'industry' => 'Business',
                'survey' => ['cgpa' => 3.71, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Business'],
            ],
            [
                'name' => 'Victor Tanujaya',
                'email' => 'victor.tanujaya@student.ciputra.ac.id',
                'student_id' => '2020110047',
                'phone_number' => '081234567936',
                'cohort_year' => 2020,
                'major' => 'Computer Science',
                'about' => 'Robotics engineer programming autonomous systems and robots.',
                'skills' => ['Robotics', 'ROS', 'Python', 'Computer Vision', 'Path Planning', 'Control Systems'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.85, 'preferred_location' => 'Bandung', 'preferred_industry' => 'Technology'],
            ],
            [
                'name' => 'Wulan Sari',
                'email' => 'wulan.sari@student.ciputra.ac.id',
                'student_id' => '2020110048',
                'phone_number' => '081234567937',
                'cohort_year' => 2020,
                'major' => 'Data Science',
                'about' => 'Healthcare data analyst using data to improve medical outcomes.',
                'skills' => ['Healthcare Analytics', 'Medical Data', 'R', 'Python', 'Statistical Analysis'],
                'industry' => 'Healthcare',
                'survey' => ['cgpa' => 3.78, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Healthcare'],
            ],
            [
                'name' => 'Xavier Putra',
                'email' => 'xavier.putra@student.ciputra.ac.id',
                'student_id' => '2020110049',
                'phone_number' => '081234567938',
                'cohort_year' => 2020,
                'major' => 'Software Engineering',
                'about' => 'EdTech developer creating educational platforms and learning management systems.',
                'skills' => ['EdTech', 'LMS Development', 'React', 'Node.js', 'Video Streaming', 'Gamification'],
                'industry' => 'Education',
                'survey' => ['cgpa' => 3.67, 'preferred_location' => 'Surabaya', 'preferred_industry' => 'Education'],
            ],
            [
                'name' => 'Yuni Astuti',
                'email' => 'yuni.astuti@student.ciputra.ac.id',
                'student_id' => '2020110050',
                'phone_number' => '081234567939',
                'cohort_year' => 2020,
                'major' => 'Information Technology',
                'about' => 'Customer success engineer helping clients succeed with technical products.',
                'skills' => ['Customer Success', 'Technical Support', 'CRM', 'Problem Solving', 'Communication'],
                'industry' => 'Technology',
                'survey' => ['cgpa' => 3.62, 'preferred_location' => 'Jakarta', 'preferred_industry' => 'Technology'],
            ],
        ];
    }

    /**
     * Create sample applications for a student
     */
    private function createApplicationsForStudent(User $student): void
    {
        $jobs = Job::with('company')->limit(4)->get();
        $statuses = ['pending', 'shortlisted', 'accepted', 'rejected'];

        foreach ($jobs as $index => $job) {
            if ($index >= count($statuses)) break;

            Application::create([
                'user_id' => $student->id,
                'employment_id' => $job->id,
                'cover_letter' => "I am very interested in the {$job->title} position at {$job->company->name}. With my background and skills, I believe I would be a great fit for this role.",
                'status' => $statuses[$index],
                'created_at' => now()->subDays(rand(1, 30)),
            ]);
        }
    }
}
