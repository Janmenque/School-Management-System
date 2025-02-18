<?php

namespace Database\Seeders\FrontendCMS;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpeechSliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        DB::table('speech_sliders')->insert([
            [
                'name' => $faker->name,
                'designation' => 'Principal',

                'speech' => "A Heartfelt Message from the Principal: A Journey of Heart and Hope at infixEDU School 
                Dear Cherished Students, Esteemed Faculty, Supportive Parents, and Distinguished Guests,
                Today, I stand before you with a heart brimming with pride, gratitude, and a touch of nostalgia. As the Principal of infixEDU School, I find myself overcome with emotion as we embark on yet another chapter of our collective journey.
                
                A Tapestry of Dreams:
                InfixEDU is not just a school; it is a canvas where dreams are painted, aspirations take flight, and the threads of our stories are woven together. Each student, a unique hue in the vibrant tapestry of our educational community.
                
                Shared Stories, Shared Emotions:
                In the hallowed halls of infixEDU, we don't just teach subjects; we share stories of triumphs, challenges, laughter, and growth. Our emotional bonds transcend the mere exchange of knowledge; they reflect the tapestry of emotions that make us human.
                
                Teachers as Mentors, Guides, and Guardians:
                To our dedicated faculty, you are not just educators; you are mentors, guides, and the pillars of support for our students. Your emotional investment in their success is what sets infixEDU apart, creating an atmosphere of trust, understanding, and unwavering encouragement.
                
                The Heartbeat of Our Community:
                Parents, you are the heartbeat of our school community. Your unwavering support, late-night study sessions, and the shared triumphs and challenges have created a bond that goes beyond the classroom. Our connection is deeply emotional, as we collectively nurture the growth and development of your precious ones.
                
                A Symphony of Learning and Love:
                This academic year, let us continue to build on the symphony of learning and love that defines infixEDU School. Let every note be infused with passion, every achievement celebrated with genuine joy, and every setback met with empathy and encouragement.
                
                A Promise of Hope:
                As we navigate the complexities of the educational journey ahead, let us remember that infixEDU is not just a place of learning; it is a sanctuary of hope. Hope for a brighter future, for boundless possibilities, and for the resilience that emerges from facing life's challenges together.
                
                In Closing:
                With a heart full of emotion and hope, I welcome each one of you to a new academic year at infixEDU School. May it be a year of emotional connections, profound growth, and cherished memories that linger for a lifetime.
                Thank you for being an integral part of our emotional odyssey. Here's to a year of shared tears, laughter, and the beautiful mosaic of emotions that make our school truly extraordinary.
                With heartfelt warmth,
                
                Martine Brown
                Principal, infixEDU School ",

                'image' => "public/uploads/theme/edulia/speech_slider/speech-1.jpg",
                'school_id' => 1,
            ],
            
            [
                'name' => $faker->name,
                'designation' => 'Vice Principal',
                
                'speech' => "A Message from Our Founder, Joannie Borer: Nurturing Dreams, Inspiring Futures 
                Dear Beloved infixEDU Community,
                As I stand before you today, my heart swells with gratitude and pride. It feels like just yesterday when infixEDU was a seed of an idea, a dream nurtured with passion, dedication, and a profound belief in the transformative power of education.
                
                A Vision Takes Flight:
                InfixEDU was envisioned as more than a school; it was designed to be a sanctuary where dreams take flight, where the pursuit of knowledge intertwines with the spirit of exploration, and where every student is empowered to chart their unique path to success.
                
                A Tapestry of Achievements:
                Reflecting on the journey thus far, I am humbled by the achievements of our students, the dedication of our faculty, and the unwavering support of our parents. Each success story, each milestone, is a testament to the collective spirit and resilience that defines infixEDU.
                
                Beyond Education, a Community:
                InfixEDU is not just an educational institution; it is a community. A community of learners, educators, and parents, bound together by the shared vision of creating a nurturing environment that goes beyond textbooks and exams – one that fosters character, compassion, and a love for learning.
                
                A Heartfelt Thank You:
                To our exceptional faculty and staff, your dedication to shaping young minds is the heartbeat of infixEDU. Your passion, creativity, and tireless efforts lay the foundation for the dreams that take root within our walls.
                
                Parents, the True Partners:
                To the parents who entrust us with their most precious treasures, your partnership is invaluable. Your trust, involvement, and shared commitment to the educational journey make infixEDU a truly special place.
                
                Looking Forward:
                As we venture into the future, let us carry forward the spirit of innovation, collaboration, and compassion that defines infixEDU. Together, we will continue to explore new horizons, inspire brilliance, and create a legacy that extends beyond the boundaries of classrooms.
                
                Closing Thoughts:
                In closing, I express my deepest gratitude to every member of the infixEDU family. Your dedication, resilience, and passion for learning are the driving forces behind the success of our institution. Let us continue to dream big, reach new heights, and foster an environment where every individual's potential is recognized and celebrated.
                Thank you for being part of the infixEDU journey. Here's to a future filled with boundless possibilities and a legacy that shines bright!
                
                With heartfelt appreciation,
                Joannie Borer
                Founder, infixEDU",
                
                'image' => "public/uploads/theme/edulia/speech_slider/speech-1.jpg",
                'school_id' => 1,
            ],
            
            [
                'name' => $faker->name,
                'designation' => 'Founder',
                
                'speech' => "Dear infixEDU Family,
                It is both an honor and a pleasure to address you today as the Vice Principal of infixEDU. As we stand on the brink of a new academic chapter, I am filled with enthusiasm, anticipation, and an unwavering commitment to the growth and success of each student.
                
                A Commitment to Excellence:
                At infixEDU, our commitment to excellence is not just a slogan; it is a guiding principle. Excellence in education is not about perfection but about a continuous journey of learning, evolving, and surpassing one's own potential.
                
                A Dynamic Learning Environment:
                Our school is more than just a physical space; it is a dynamic learning environment where curiosity is kindled, talents are honed, and character is forged. As Vice Principal, I am dedicated to fostering an atmosphere that encourages academic achievement, personal development, and a love for learning.
                
                Student-Centric Approach:
                To the students, you are at the heart of everything we do. As we navigate this academic year, remember that you are not just here to learn from us; we are here to learn from you. Your unique perspectives, talents, and aspirations shape the vibrant tapestry of our school community.
                
                Educators as Mentors:
                Our esteemed faculty, led by a shared passion for education, is not just here to impart knowledge. They are mentors, guides, and advocates for your success. Their dedication to nurturing your potential goes beyond the classroom, creating an environment where you can thrive academically and personally.
                
                Parents, Our Valued Partners:
                To the parents, you are our valued partners in this journey. Your involvement and support are integral to the success of infixEDU. Together, we form a triumphant alliance dedicated to the holistic development of our students.
                
                Looking Ahead:
                As we look ahead to the upcoming academic endeavors, let us embrace the challenges and triumphs that lie ahead. With collaboration, resilience, and a spirit of inquiry, we can achieve great things together.
                
                Closing Thoughts:
                In conclusion, I extend my gratitude to the entire infixEDU family for entrusting us with the responsibility of shaping the minds and hearts of our future leaders. Let us embark on this academic year with a sense of purpose, unity, and a commitment to fostering an environment where every student can thrive.
                
                Thank you for your trust and support.
                Warm regards,
                Narciso Lakin
                Vice Principal, infixEDU ",
                
                'image' => "public/uploads/theme/edulia/speech_slider/speech-1.jpg",
                'school_id' => 1,
            ],
        ]);
    }
}
