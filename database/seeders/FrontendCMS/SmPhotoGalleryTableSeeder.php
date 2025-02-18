<?php

namespace Database\Seeders\FrontendCMS;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SmPhotoGalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sm_photo_galleries')->insert([
            [
                'parent_id' => Null,
                'name' => 'Explore Your Academic Horizons: A Learning Fiesta for Everyone! ',

                'description' => "Dive into a world of knowledge and discovery at our Academic Expo tailored for individuals of all roles in education. Whether you're a teacher, student, administrator, or industry enthusiast, this expo promises to be an exciting platform for learning, connecting, and advancing.

                What's In Store:
                
                1. Empowering Educators:
                    - Immerse yourself in innovative teaching techniques and tech advancements.
                    - Attend workshops led by renowned education experts.
                    - Discover resources to spice up your classrooms and engage students.
                    
                2. Student Zone Extravaganza:
                    - Get career guidance and insights in student-centric sessions.
                    - Explore academic programs and cool extracurricular opportunities.
                    - Engage in interactive exhibits igniting a passion for learning.
                    
                3. Admin Brilliance Unleashed:
                    - Check out the latest and greatest in school management systems.
                    - Mix and mingle with fellow administrators.
                    - Grab strategies to streamline administrative tasks and boost efficiency.
                    
                4. Industry Vibes:
                    - Connect with pros to bridge the gap between school and real-world scenarios.
                    - Chat about aligning academics with industry needs.
                    - See successful collaborations between the academic and business worlds.
                    
                
                Why Be There?
                
                - Network Power: Build connections with educators, students, administrators, and industry buffs.
                
                
                - Innovation Parade: Spot the newest trends shaping the future of education.
                
                
                - Skill Boost: Pick up fresh skills and knowledge to rock your role in the education community.
                
                
                - Team Up for Learning: Swap ideas, success tales, and best practices with peers from various educational realms.
                
                Event Deets:
                🗓️ Date: [Insert Date]
                🕒 Time: [Insert Time]
                📍 Where: [Insert Venue]
                
                Claim Your Spot - RSVP Now!
                Join us at the Academic Fiesta for Everyone and become part of an exhilarating and collaborative learning experience. Reserve your spot now to unlock new possibilities in the world of education. Let's shape the future of academia together!",
                
                'feature_image' => "public/uploads/theme/edulia/photo_gallery/gallery-1.jpg",
                'gallery_image' => Null,
                'position' => 1,
            ],

            [
                'parent_id' => Null,
                'name' => 'Immerse Yourself in Creativity: Arts & Beats Festival for Students! ',
                
                'description' => "Get ready for a one-of-a-kind celebration that fuses artistry and rhythm – the Arts & Beats Festival tailored exclusively for students! Join us for a day filled with vibrant colors, mesmerizing tunes, and a showcase of student talent that promises to be a feast for the senses.

                Event Highlights:
                
                1. Artistic Extravaganza:
                    - Explore an array of student art exhibitions showcasing creativity in various forms.
                    - Participate in interactive art stations to unleash your own artistic expression.
                    - Witness live art demonstrations from talented student artists.
                    
                2. Musical Bliss:
                    - Groove to the beats of student-led musical performances spanning various genres.
                    - Open mic sessions for budding musicians and vocalists to shine.
                    - Collaborative music creation zones for an immersive sonic experience.
                    
                3. Workshops and Masterclasses:
                    - Engage in hands-on workshops led by experienced artists and musicians.
                    - Learn new techniques, brush up on skills, and discover your unique artistic voice.
                    - Interactive sessions to foster collaboration and exchange of artistic ideas.
                    
                4. Community Mural Project:
                    - Contribute to a large-scale community mural, symbolizing unity through art.
                    - Express your creativity alongside fellow students, creating a lasting visual masterpiece.
                
                Why Attend?
                
                - Inspiration Galore: Immerse yourself in an environment that sparks inspiration and creativity.
                - Talent Showcase: Witness the incredible artistic and musical talents of your fellow students.
                - Skill Enhancement: Participate in workshops to enhance your artistic and musical skills.
                - Community Connection: Connect with like-minded peers who share a passion for the arts.
                
                Event Details:
                🗓️ Date: [Insert Date]
                🕒 Time: [Insert Time]
                📍 Location: [Insert Venue]
                
                Let the Creativity Flow - Save Your Spot Now!
                Join us at the Arts & Beats Festival for Students and be part of a day where artistic expression takes center stage. Reserve your spot now for a colorful and rhythmic celebration of student talent! ",
                
                'feature_image' => "public/uploads/theme/edulia/photo_gallery/gallery-2.jpg",
                'gallery_image' => Null,
                'position' => 2,
            ],

            [
                'parent_id' => Null,
                'name' => 'Dive into the World of Words: Language and Literature Fiesta! ',
                
                'description' => "Embark on a literary journey like never before at our Language and Literature Fiesta, a celebration of the profound beauty and power of language. This event is tailored for all the bookworms, wordsmiths, and language enthusiasts who appreciate the magic woven through words.

                Event Highlights:
                
                1. Author Spotlight:
                    - Engage with acclaimed authors as they share insights into their literary works.
                    - Participate in intimate Q&A sessions to delve deeper into the creative process.
                    
                2. Book Bazaar:
                    - Explore a diverse collection of literary gems at our book bazaar.
                    - Discover hidden treasures and add new favorites to your personal library.
                    
                3. Poetry Corner:
                    - Immerse yourself in the lyrical world of poetry with live recitations and open mic sessions.
                    - Join interactive poetry workshops to hone your poetic skills.
                    
                4. Literary Debates and Discussions:
                    - Engage in lively debates on contemporary literary topics.
                    - Participate in book club discussions to share thoughts on recent literary releases.
                    
                5. Multilingual Extravaganza:
                    - Celebrate the richness of language diversity with readings and performances in various languages.
                    - Language exchange booths for attendees to share their linguistic expertise.
                    
                
                Why Attend?
                
                - Literary Exploration: Discover new authors, genres, and literary movements.
                - Interactive Workshops: Hone your writing skills through engaging workshops.
                - Community Connection: Connect with fellow literature enthusiasts and form lasting literary bonds.
                - Cultural Appreciation: Immerse yourself in the beauty of diverse languages and cultures.
                
                Event Details:
                Date: [Insert Date]
                Time: [Insert Time]
                Location: [Insert Venue]
                
                Unlock the World of Words - RSVP Now!
                Join us at the Language and Literature Fiesta for a day filled with the magic of language, literature, and cultural appreciation. Reserve your spot now to be part of an event that celebrates the beauty of words and the stories they tell! ",
                
                'feature_image' => "public/uploads/theme/edulia/photo_gallery/gallery-3.jpg",
                'gallery_image' => Null,
                'position' => 3,
            ],

            [
                'parent_id' => Null,
                'name' => 'Embrace Change: Environmental Awareness Day! ',
                
                'description' => "Gear up for a day devoted to raising awareness, inspiring action, and celebrating our shared commitment to the environment – it's Environmental Awareness Day! This event unites communities, individuals, and organizations in a collective effort to promote sustainable practices and safeguard our planet for future generations.

                Event Highlights:
                
                1. Informative Sessions:
                    - Engage in enlightening sessions on sustainable living, conservation, and the significance of eco-friendly choices.
                    - Discover how small, everyday actions can collectively contribute to a healthier environment.
                    
                2. Eco-Friendly Showcase:
                    - Explore exhibits featuring green products, sustainable technologies, and local eco-friendly initiatives.
                    - Connect with environmental organizations to learn about ongoing projects and ways to participate.
                    
                3. Nature Appreciation Activities:
                    - Immerse yourself in the beauty of nature through guided nature walks that highlight local ecosystems.
                    - Participate in community clean-up drives, contributing directly to the preservation of our natural surroundings.
                    
                4. Expert Talks:
                    - Listen to influential environmentalists and experts sharing insights on global environmental challenges and solutions.
                    - Gain a deeper understanding of the importance of environmental conservation.
                    
                5. Art for Change:
                    - Experience visually compelling art installations conveying powerful messages about environmental issues.
                    - Join interactive art projects symbolizing our collective responsibility to nurture and protect our planet.
                
                Why Participate?
                
                - Learn and Act: Gain practical knowledge and insights to incorporate eco-friendly practices into your daily life.
                - Community Connection: Connect with like-minded individuals and organizations committed to environmental stewardship.
                - Hands-On Impact: Contribute directly to positive environmental change through participation in clean-up initiatives.
                - Inspiration to Adopt Change: Be inspired by experts and fellow participants to make sustainable choices for a greener future.
                
                Event Details:
                 Date: [Insert Date]
                 Time: [Insert Time]
                 Location: [Insert Venue]
                
                Become the Catalyst for Change - RSVP Now!
                Join us at Environmental Awareness Day and play a role in promoting a sustainable and eco-conscious future. Reserve your spot now to be part of this impactful initiative! ",
                
                'feature_image' => "public/uploads/theme/edulia/photo_gallery/gallery-4.jpg",
                'gallery_image' => Null,
                'position' => 4,
            ],
        ]);
    }
}
