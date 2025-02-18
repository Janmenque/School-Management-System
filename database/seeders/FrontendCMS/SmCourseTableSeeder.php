<?php

namespace Database\Seeders\FrontendCMS;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SmCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sm_courses')->insert([
            [
                'title' => 'InfixEdu Professional Writing Workshop',
                'image' => 'public/uploads/theme/edulia/course/academic1.jpg',
                
                'overview' => 'InfixEdu School invites you to participate in our esteemed Creative Writing Workshop, designed to cultivate and refine your writing skills in a professional setting. 

                Distinguished writers and aspiring authors alike are welcome to join us for an immersive experience, where we delve into the intricacies of creative expression and storytelling. 
                
                Workshop Highlights:
                Structured Writing Exercises for Skill Enhancement 
                
                - Dynamic Creative Storytelling Games for Conceptual Development 
                - Rigorous Poetry Activities to Enhance Expressive Communication 
                - Team-building Word Challenges for Collaborative Learning 
                - Platform to Share and Celebrate Your Literary Achievements! 
                
                Audience Profile:
                
                - Students of All Age Groups 
                - Aspiring Writers and Poets Seeking Professional Growth 
                - Enthusiasts Eager to Explore the Art of Creativity 
                
                 Date and Time:
                [Insert Date] | [Insert Time]
                [Insert Location]
                
                Registration Fee: [Insert Fee]
                
                 Participant Benefits:
                
                - Exclusive Creative Writing Workbook for Practical Insights 
                - Certificate of Participation Recognizing Your Commitment 
                - Networking Opportunities and Lasting Connections! 
                
                Secure your place today to embark on a writing journey that combines professionalism with creative exploration. For inquiries and registrations, please contact [Insert Contact Information].
                
                Join InfixEdu School in elevating the art of writing to new heights! ',
                
                'outline' => 'Overview:
                The "InfixEdu Writing Workshop" provides a dynamic platform for individuals to refine their writing skills in a professional setting. Tailored for students of all ages and aspiring writers, this workshop combines structured exercises, creative storytelling games, and expressive poetry activities to enhance participants\' literary prowess. Facilitated by experts, attendees can expect a comprehensive exploration of the art of writing, fostering collaborative learning through team-building word challenges. Join us for an enriching experience that includes exclusive materials, a certificate of participation, and valuable networking opportunities. Elevate your writing journey with the InfixEdu Writing Workshop.',

                'prerequisites' => 'Module 1: Introduction to Creative Writing

                - Understanding the Basics of Creative Expression
                - Exploring Various Writing Styles and Genres
                
                Module 2: Building Strong Foundations
                
                - Developing Effective Writing Habits
                - Crafting Engaging Openings and Closures
                
                Module 3: Character Development
                
                - Creating Memorable Characters
                - Exploring Character Motivations and Arcs
                
                Module 4: Plot Construction
                
                - Constructing Compelling Storylines
                - Incorporating Conflict and Resolution
                
                Module 5: The Art of Descriptive Writing
                
                - Enhancing Imagery and Vivid Descriptions
                - Creating Atmosphere and Setting
                
                Module 6: Poetry and Expressive Writing
                
                - Crafting Poetic Forms and Styles
                - Channeling Emotion Through Words
                
                Module 7: Editing and Revision Techniques
                
                - Refining Prose for Clarity and Impact
                - Incorporating Feedback for Improvement
                
                Module 8: Collaborative Writing
                
                - Team-building Word Challenges
                - Group Exercises to Stimulate Creative Thinking
                
                Module 9: Final Projects and Presentations
                
                - Crafting and Sharing Personal Projects
                - Receiving Constructive Feedback
                
                Conclusion and Certificate Ceremony
                
                - Recognition of Participants\' Achievements
                - Networking Opportunities and Closing Remarks
                
                Note: The curriculum is subject to adjustments based on participants\' needs and progress throughout the InfixEdu Writing Workshop.',

                'resources' => 'Instructors for "InfixEdu Writing Workshop":

                    1. Dr. Emily Thompson
                        - Background: Ph.D. in Creative Writing
                        - Expertise: Fiction Writing, Plot Development
                    2. Prof. Christopher Rodriguez
                        - Background: M.A. in English Literature
                        - Expertise: Poetry, Descriptive Writing
                    3. Ms. Sarah Turner
                        - Background: B.A. in Journalism
                        - Expertise: Editing and Revision Techniques
                    4. Dr. Michael Harris
                        - Background: Ph.D. in Linguistics
                        - Expertise: Collaborative Writing, Team-building
                    5. Ms. Olivia Bennett
                        - Background: M.F.A. in Creative Writing
                        - Expertise: Character Development, Storytelling Games
                    
                    These seasoned professionals bring a wealth of experience to the InfixEdu Writing Workshop, ensuring a diverse and comprehensive learning experience for participants. Each instructor is dedicated to fostering creativity, refining writing skills, and guiding participants towards achieving their literary goals.',

                'stats' => 'Review of InfixEdu Writing Workshop: Unlocking Creative Potential
                I recently had the privilege of attending the InfixEdu Writing Workshop, and it exceeded all my expectations. The workshop offered a well-rounded curriculum that catered to writers of various skill levels, from beginners to seasoned wordsmiths.
                
                The instructors, each a specialist in their field, brought a unique perspective to the sessions. Dr. Emily Thompson\'s insights into fiction writing and plot development were invaluable, and Prof. Christopher Rodriguez\'s poetic expertise added a delightful dimension to the workshop.
                
                One of the standout features was the emphasis on hands-on activities. The collaborative writing exercises led by Dr. Michael Harris were not only intellectually stimulating but also fostered a sense of camaraderie among participants. Ms. Sarah Turner\'s guidance on editing and revision techniques was practical and immediately applicable to our writing projects.
                
                The workshop\'s structure allowed for a seamless progression from foundational concepts to advanced techniques. I particularly appreciated the individual attention given during the final projects and presentations, where constructive feedback from both instructors and peers proved instrumental in refining our work.
                
                The InfixEdu Writing Workshop not only enhanced my writing skills but also provided a supportive environment for personal growth. The networking opportunities were an unexpected bonus, connecting me with like-minded individuals who share a passion for the written word.
                
                In conclusion, if you\'re looking to elevate your writing abilities in a collaborative and inspiring setting, the InfixEdu Writing Workshop is an exceptional choice. I left the workshop feeling inspired, motivated, and equipped with a toolkit of writing techniques that will undoubtedly shape my future creative endeavors.',

                'active_status' => 1,
            ],
            
            [
                'title' => 'Mathematics Mastery Program',
                'image' => 'public/uploads/theme/edulia/course/academic2.jpg',
                
                'overview' => 'The Mathematics Mastery Program at InfixEdu is designed to instill a deep understanding and proficiency in mathematical concepts. Tailored for students of all levels, this program employs a comprehensive approach to foster critical thinking and problem-solving skills.',
                
                'outline' => 'The Mathematics Mastery Program at InfixEdu is designed to instill a deep understanding and proficiency in mathematical concepts. Tailored for students of all levels, this program employs a comprehensive approach to foster critical thinking and problem-solving skills.',

                'prerequisites' => 'Module 1: Foundations of Mathematics

                - Arithmetic Operations
                - Number Theory
                - Basic Algebraic Concepts
                
                Module 2: Geometry and Spatial Reasoning
                
                - Shapes and Properties
                - Spatial Visualization
                - Geometric Constructions
                
                Module 3: Algebraic Manipulations
                
                - Equations and Inequalities
                - Polynomial Functions
                - Factoring Techniques
                
                Module 4: Advanced Topics in Calculus
                
                - Limits and Derivatives
                - Integration
                - Applications of Calculus
                
                Module 5: Probability and Statistics
                
                - Probability Theory
                - Descriptive Statistics
                - Inferential Statistics
                
                Module 6: Real-world Applications
                
                - Practical Problem Solving
                - Mathematical Modeling
                - Applications Across Disciplines',

                'resources' => '
                1. Dr. Catherine Rodriguez
                    - Background: Ph.D. in Mathematics
                    - Expertise: Algebraic Manipulations, Calculus
                2. Prof. Jonathan Miller
                    - Background: M.S. in Statistics
                    - Expertise: Probability and Statistics, Real-world Applications
                3. Ms. Rachel Turner
                    - Background: B.Ed. in Mathematics Education
                    - Expertise: Foundations of Mathematics, Geometry
                4. Mr. David Harris
                    - Background: M.S. in Applied Mathematics
                    - Expertise: Advanced Topics in Calculus, Real-world Applications',

                'stats' => 'Enrolling in the Mathematics Mastery Program at InfixEdu has been a transformative experience. The curriculum\'s structured progression has equipped me with a solid foundation in fundamental concepts, and the instructors\' expertise ensures a clear understanding of complex topics.

                Dr. Catherine Rodriguez\'s approach to teaching calculus demystifies intricate concepts, making them accessible and applicable. Prof. Jonathan Miller\'s engaging sessions on statistics have enhanced my ability to analyze and interpret data effectively.
                
                Ms. Rachel Turner\'s dedication to building a strong foundation in mathematics through the early modules has been invaluable. Mr. David Harris\'s real-world applications module brought the abstract nature of mathematics to life, showcasing its relevance across diverse fields.
                
                The Mathematics Mastery Program at InfixEdu has not only sharpened my mathematical skills but has also cultivated a genuine passion for the subject. The program\'s holistic approach, expert instructors, and practical applications make it a standout choice for anyone seeking to master mathematics.',

                'active_status' => 1,
            ],
            
            [
                'title' => 'Coding and Robotics Lab',
                'image' => 'public/uploads/theme/edulia/course/academic3.jpg',
                
                'overview' => 'The Coding and Robotics Lab at InfixEdu offers an immersive learning experience that blends coding principles with hands-on robotics projects. Geared towards students with varying levels of coding proficiency, this lab equips participants with practical skills and fosters a passion for technology and innovation.',
                
                'outline' => 'The Coding and Robotics Lab at InfixEdu offers an immersive learning experience that blends coding principles with hands-on robotics projects. Geared towards students with varying levels of coding proficiency, this lab equips participants with practical skills and fosters a passion for technology and innovation.',

                'prerequisites' => 'Module 1: Introduction to Coding

                Fundamentals of Programming Logic
                Basics of Algorithm Design
                Coding Syntax and Best Practices
                Module 2: Robotics Foundations
                
                Understanding Robot Components
                Basic Electronics and Circuitry
                Introduction to Robotics Software
                Module 3: Intermediate Coding Concepts
                
                Object-Oriented Programming (OOP)
                Data Structures and Algorithms
                Version Control with Git
                Module 4: Advanced Robotics Projects
                
                Designing and Building Robot Prototypes
                Integrating Sensors and Actuators
                Programming Robot Behavior
                Module 5: Real-world Applications
                
                Robotics in Industry and Research
                Ethical Considerations in Robotics
                Final Project Showcase',

                'resources' => 'Dr. Alan Carter

                Background: Ph.D. in Computer Science
                Expertise: Introduction to Coding, Intermediate Coding Concepts
                Prof. Michelle Adams
                
                Background: M.Eng. in Robotics
                Expertise: Robotics Foundations, Advanced Robotics Projects
                Mr. Daniel Miller
                
                Background: B.Sc. in Computer Engineering
                Expertise: Coding Syntax and Best Practices, Real-world Applications
                Ms. Emily Turner
                
                Background: M.Sc. in Electrical Engineering
                Expertise: Basic Electronics and Circuitry, Ethical Considerations in Robotics',

                'stats' => 'Enrolling in the Coding and Robotics Lab at InfixEdu has been a game-changer for me. The curriculum\'s balance between coding theory and practical robotics applications has provided a well-rounded understanding of these technologies.

                Dr. Alan Carter\'s clear explanations and engaging coding exercises in the introductory modules laid a strong foundation. Prof. Michelle Adams\' expertise in robotics made the transition to hands-on projects seamless, and Mr. Daniel Miller\'s guidance on coding best practices has been invaluable.
                
                Ms. Emily Turner\'s sessions on electronics and ethical considerations in robotics added a thoughtful dimension to the program. The real-world applications module brought everything together, showcasing the limitless possibilities of coding and robotics.
                
                The Coding and Robotics Lab at InfixEdu has not only broadened my technical skills but has also sparked a genuine interest in exploring the intersection of coding and robotics in various fields. The knowledgeable instructors and practical approach make this lab an exceptional choice for anyone passionate about technology.',

                'active_status' => 1,
            ],
        ]);
    }
}
