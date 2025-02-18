<?php

namespace Database\Seeders\FrontendCMS;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SmEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sm_events')->insert([
            [
                'event_title' => 'Biggest Robotics Competition in Campus',
                'event_location' => 'Main Campus',
                
                'event_des' => 'Robotics Competition on Campus: Unleashing Innovation and Ingenuity
                Prepare for an electrifying event as InfixEdu proudly announces its upcoming Robotics Competition set to ignite the campus with technological brilliance and inventive spirit.
                Event Overview:
                In the spirit of fostering creativity and technological prowess, our Robotics Competition provides a platform for students to showcase their engineering skills and problem-solving acumen. Participants will design and program robots to navigate challenges, promoting teamwork, critical thinking, and hands-on application of robotics concepts.
                Competition Categories:
                
                1. Autonomous Robot Challenge:
                    - Robots operate independently, completing predefined tasks using onboard sensors and programming.
                2. Sumo Robot Showdown:
                    - Robots face off in a Sumo-style ring, aiming to push opponents out or disable them within the arena.
                3. Innovation Showcase:
                    - Teams present innovative robotic projects, emphasizing real-world applications and creativity.
                
                How to Participate:
                
                - Assemble a team of innovative minds (2-4 members).
                - Register your team by [Registration Deadline].
                - Attend a pre-competition workshop for guidance on building and programming.
                
                Prizes and Recognition:
                Outstanding teams will not only earn recognition for their skills but also compete for exciting prizes, fostering a competitive yet collaborative atmosphere.
                Instructors and Mentors:
                Expert mentors from our robotics faculty will be available to guide and support teams throughout the competition, ensuring a rich learning experience.
                Join us for a day of innovation, competition, and celebration!
                This Robotics Competition promises to be an exhilarating showcase of talent and technology. Don\'t miss the chance to be a part of this thrilling event, where creativity and robotics collide on our campus.
                For inquiries and registration details, contact [Insert Contact Information]. Let the robotics revolution begin! ',
                
                'from_date' => '2019-06-12',
                'to_date' => '2019-06-21',
                'uplad_image_file' => 'public/uploads/events/event1.jpg',
            ],
            
            [
                'event_title' => 'Great Science Fair in main campus',
                'event_location' => 'Main Campus',
                'event_des' => 'Magna odio in. Facilisi arcu nec augue lacus augue maecenas hendrerit euismod cras vulputate dignissim pellentesque sociis est. Ut congue Leo dignissim. Fermentum curabitur pede bibendum aptent, quam, ultrices Nam convallis sed condimentum. Adipiscing mollis lorem integer eget neque, vel.',
                'from_date' => '2019-06-12',
                'to_date' => '2019-06-21',
                'uplad_image_file' => 'public/uploads/events/event2.jpg',
            ],
            
            [
                'event_title' => 'Seminar on Internet of Thing in Campus',
                'event_location' => 'Main Campus',
                'event_des' => 'Libero erat porta ridiculus semper mi eleifend. Nisl nulla. Tempus, rhoncus per. Varius. Pharetra nisi potenti ut ultrices sociosqu adipiscing at. Suscipit vulputate senectus. Nostra. Aliquam fringilla eleifend accumsan dui.',
                'from_date' => '2019-06-12',
                'to_date' => '2019-06-21',
                'uplad_image_file' => 'public/uploads/events/event3.jpg',
            ],
            
            [
                'event_title' => 'Art Competition in Campus',
                'event_location' => 'Main Campus',
                'event_des' => 'Dui nunc faucibus Feugiat penatibus molestie taciti nibh nulla pellentesque convallis praesent. Fusce. Vivamus egestas Rutrum est eu dictum volutpat morbi et. Placerat justo elementum dictumst magna nisl ut mollis varius velit facilisi. Duis tellus ullamcorper aenean massa nibh mi.',
                'from_date' => '2019-06-12',
                'to_date' => '2019-06-21',
                'uplad_image_file' => 'public/uploads/events/event4.jpg',
            ],
        ]);
    }
}
