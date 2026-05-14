<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillController extends Controller
{
    private function getSkills()
    {
        return [
            [
                'id'          => 1,
                'name'        => 'Web Development',
                'offered_by'  => 'Maria Santos',
                'looking_for' => 'Graphic Design',
                'level'       => 'Advanced',
                'category'    => 'Technology',
                'description' => 'Experienced in building full-stack web apps using Laravel, Vue.js, and MySQL. Can teach front-end and back-end development from scratch.',
                'schedule'    => 'Weekends, 9AM–12PM',
                'contact'     => 'maria.santos@school.edu',
            ],
            [
                'id'          => 2,
                'name'        => 'Graphic Design',
                'offered_by'  => 'Carlos Reyes',
                'looking_for' => 'Video Editing',
                'level'       => 'Intermediate',
                'category'    => 'Creative Arts',
                'description' => 'Skilled in Adobe Photoshop, Illustrator, and Canva. Can create logos, posters, and social media content with a modern aesthetic.',
                'schedule'    => 'Monday & Wednesday, 4PM–6PM',
                'contact'     => 'carlos.reyes@school.edu',
            ],
            [
                'id'          => 3,
                'name'        => 'Video Editing',
                'offered_by'  => 'Angela Cruz',
                'looking_for' => 'Public Speaking',
                'level'       => 'Advanced',
                'category'    => 'Creative Arts',
                'description' => 'Proficient in Adobe Premiere Pro and DaVinci Resolve. Specializes in cinematic cuts, color grading, and motion graphics for YouTube.',
                'schedule'    => 'Tuesday & Thursday, 5PM–7PM',
                'contact'     => 'angela.cruz@school.edu',
            ],
            [
                'id'          => 4,
                'name'        => 'Public Speaking',
                'offered_by'  => 'Ramon Dela Torre',
                'looking_for' => 'Web Development',
                'level'       => 'Expert',
                'category'    => 'Communication',
                'description' => 'Champion debater and trained in Toastmasters. Coaches students on speech delivery, confidence building, and persuasive communication.',
                'schedule'    => 'Friday, 3PM–5PM',
                'contact'     => 'ramon.delatorre@school.edu',
            ],
            [
                'id'          => 5,
                'name'        => 'Photography',
                'offered_by'  => 'Pia Mercado',
                'looking_for' => 'Graphic Design',
                'level'       => 'Intermediate',
                'category'    => 'Creative Arts',
                'description' => 'Passionate about portrait and street photography. Teaches composition, lighting techniques, and basic photo editing using Lightroom.',
                'schedule'    => 'Saturday, 8AM–11AM',
                'contact'     => 'pia.mercado@school.edu',
            ],
            [
                'id'          => 6,
                'name'        => 'Data Analysis',
                'offered_by'  => 'Jerome Lim',
                'looking_for' => 'Public Speaking',
                'level'       => 'Advanced',
                'category'    => 'Technology',
                'description' => 'Experienced with Python, Pandas, and Excel for data analytics. Can guide students through data cleaning, visualization, and basic ML concepts.',
                'schedule'    => 'Wednesday & Friday, 6PM–8PM',
                'contact'     => 'jerome.lim@school.edu',
            ],
            [
                'id'          => 7,
                'name'        => 'Music Production',
                'offered_by'  => 'Trisha Villanueva',
                'looking_for' => 'Video Editing',
                'level'       => 'Intermediate',
                'category'    => 'Music',
                'description' => 'Produces beats and original tracks using FL Studio and GarageBand. Teaches melody creation, sound layering, and basic mixing for beginners.',
                'schedule'    => 'Sunday, 2PM–5PM',
                'contact'     => 'trisha.villanueva@school.edu',
            ],
        ];
    }

    // Display all skills
    public function index()
    {
        $skills = $this->getSkills();
        return view('skills.index', compact('skills'));
    }

    // Display single skill detail
    public function show($id)
    {
        $skills = $this->getSkills();
        $skill  = collect($skills)->firstWhere('id', (int) $id);

        if (!$skill) {
            abort(404);
        }

        return view('skills.show', compact('skill'));
    }
}
