<?php

namespace App\Http\Controllers;

use App\Models\Event;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', ['programs' => self::programs()]);
    }

    public function programsIndex()
    {
        return view('pages.programs', ['programs' => self::programs()]);
    }

    public function about()
    {
        return view('pages.about.story');
    }

    public function aboutMission()
    {
        return view('pages.about.mission');
    }

    public function aboutVision()
    {
        return view('pages.about.vision');
    }

    public function aboutValues()
    {
        return view('pages.about.values');
    }

    public function aboutLeadership()
    {
        return view('pages.about.leadership');
    }

    public function aboutSupportModel()
    {
        return view('pages.about.support-model');
    }

    public function giveHelp()
    {
        return view('pages.give-help');
    }

    public function community()
    {
        return view('pages.community');
    }

    public function impact()
    {
        return view('pages.impact');
    }

    public function chapters()
    {
        return view('pages.chapters');
    }

    public function events()
    {
        $upcomingEvents = Event::published()->upcoming()->get();
        $allEvents = Event::published()->orderByDesc('event_date')->get();

        return view('pages.events', compact('upcomingEvents', 'allEvents'));
    }

    public function volunteer()
    {
        return view('pages.volunteer');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function program(string $slug)
    {
        $programs = self::programs();

        abort_unless(isset($programs[$slug]), 404);

        return view('pages.program', ['program' => $programs[$slug], 'slug' => $slug]);
    }

    public function eventsJson()
    {
        return response()->json(
            Event::published()
                ->orderBy('event_date')
                ->get()
                ->map(fn ($e) => [
                    'id' => $e->id,
                    'date' => $e->event_date->toDateString(),
                    'title' => $e->title,
                    'time' => $e->formatted_time,
                    'location' => $e->location,
                    'description' => $e->description,
                    'register_url' => $e->register_url,
                    'flier_url' => $e->flier_url,
                ])
        );
    }

    /**
     * Program page content. Edit freely — each entry drives one page
     * at /program/{slug}.
     */
    public static function programs(): array
    {
        return [
            'hearts-home-relief-support' => [
                'icon' => '🏠',
                'title' => 'Home Management Program',
                'tagline' => 'A Helping Hand When You Need It Most',
                'hero_image' => '/images/Relief/relief-1.jpeg',
                'images' => ['/images/Relief/relief-2.jpeg', '/images/Relief/relief-3.jpeg', '/images/Relief/relief-4.jpeg'],
                'intro' => "You do not have to do this alone. Caregiving comes with unique challenges, and asking for support is a sign of strength. Hearts and Mind Foster Community is here to walk alongside foster parents and kinship caregivers by providing practical support, encouragement, education, and community connection. Some days, it's not the big things that feel overwhelming. It's the laundry that never ends, the dishes in the sink, the meals that still need to be prepared, and trying to keep up with everything while caring for the children in your home. Our Home Management program is here to help. Through the support of our trained volunteers, we provide practical, in-home assistance that gives foster parents and kinship caregivers a chance to catch their breath. Whether it's helping with laundry, light housekeeping, meal preparation, organizing your space, or running errands and decluttering, we're here to lighten the load so you can focus on what matters most. Sometimes, having someone show up to help for a few hours can make all the difference. At Hearts and Mind, we believe caring for caregivers is just as important as caring for children. You don't have to do it all alone. We're here to support you, one helping hand at a time.",
                'sections' => [
                    ['heading' => 'What We Provide', 'list' => [
                        'Laundry support',
                        'Light housekeeping and home organization',
                        'Meal preparation support',
                        'Grocery and essential item assistance',
                        'Decluttering and move-in/move-out support',
                        'Errands and day-to-day tasks',
                    ]],
                    ['heading' => 'Why This Matters', 'text' => 'Caregiver burnout is one of the leading causes of placement breakdown. By easing the daily load, caregivers can focus on relationships and stability.'],
                    ['heading' => 'Our Impact', 'list' => [
                        'Reduced stress and burnout',
                        'More stable and supportive home environments',
                        'Increased ability to focus on children and connections',
                    ]],
                ],
                'quotes' => [
                    '“I didn\'t realize how much I needed help until they showed up. It gave me space to breathe again.”',
                    '“Having someone help with the basics made such a difference in how I showed up for my home.”',
                ],
                'cta' => ['label' => 'Request Support', 'route' => 'home', 'anchor' => '#get-in-touch'],
            ],

            'heart-and-home-closet' => [
                'icon' => '🧺',
                'title' => 'Heart and Home Closet',
                'tagline' => 'Helping Caregivers Welcome Children with Dignity',
                'hero_image' => '/images/Relief/relief-2.jpeg',
                'images' => ['/images/Relief/relief-4.jpeg', '/images/Relief/relief-3.jpeg'],
                'intro' => "When children enter foster care or kinship care, they don't always arrive with the essentials they need. Caregivers are often faced with providing clothing, toiletries, bedding, school supplies, and comfort items at a moment's notice, sometimes before funding or agency resources become available. The Heart and Home Closet was created to bridge that gap. By providing practical essentials when they are needed most, we help reduce the stress of unexpected placements and ensure children feel welcomed, cared for, and supported from the very beginning.",
                'sections' => [
                    ['heading' => 'Welcome Home Kits', 'text' => 'One of the first ways we support caregivers is through our Welcome Home Kits. Prepared for different age groups, these ready-to-go kits contain essential items that help children settle into their new environment with comfort and dignity while giving caregivers immediate peace of mind. Depending on availability, kits may include:', 'list' => [
                        'Clothing and pyjamas',
                        'Underwear and socks',
                        'Toiletries and personal care items',
                        'Blankets',
                        'Comfort items and books',
                        'School supplies',
                        'Baby essentials',
                        'Age appropriate activity items',
                    ]],
                    ['heading' => 'Heart and Home Closet', 'text' => 'Beyond the Welcome Home Kits, caregivers can request additional essentials through the Heart and Home Closet. Available items may include:', 'list' => [
                        'Clothing Collection — everyday clothing, shoes, coats, and seasonal wear',
                        'Baby Essentials Collection — diapers, wipes, bottles, blankets, and other infant necessities',
                        'School Ready Collection — backpacks, lunch bags, notebooks, pencils, and educational supplies',
                        'Comfort Collection — blankets, books, toys, and comfort items that help children feel safe and at home',
                        'Everyday Essentials Collection — toiletries, hygiene products, bedding, and other practical household items',
                        'Inventory is based on community donations and availability',
                    ]],
                    ['heading' => 'How We Support', 'list' => [
                        'Request Support — request items through our online support form and our team will follow up to arrange a pickup or other suitable option',
                        'Emergency Placement Support — Welcome Home Kits provide immediate essentials while caregivers await agency processes or other resources',
                        'Community Closet Days — throughout the year, caregivers are invited to browse available items and connect with other caregivers in a welcoming environment',
                    ]],
                    ['heading' => 'Help Stock the Heart and Home Closet', 'text' => 'The Heart and Home Closet is made possible through the generosity of our community.', 'list' => [
                        'Donate new or gently used items',
                        'Sponsor a Welcome Home Kit',
                        'Organize a collection drive',
                        'Volunteer your time',
                        'Make a financial contribution toward urgently needed essentials',
                    ]],
                    ['heading' => 'Every Stage of the Journey', 'text' => "Every Hearts and Mind program has been intentionally designed to reduce caregiver burden, strengthen wellbeing, and build meaningful community. Whether caregivers need practical relief, emotional support, education, or connection, our programs provide opportunities to grow, recharge, and thrive."],
                ],
                'quotes' => [],
                'cta' => ['label' => 'Request Support', 'route' => 'home', 'anchor' => '#get-in-touch'],
            ],

            'reflect-renew-workshops' => [
                'icon' => '🔄',
                'title' => 'Reflect & Renew Workshops',
                'tagline' => 'Supporting you as a person, not just a caregiver.',
                'hero_image' => '/images/Workshop/Workshop-1.jpg',
                'images' => ['/images/Workshop/Workshop-2.jpg', '/images/Workshop/Workshop-3.jpg', '/images/Workshop/Workshop-4.jpg'],
                'intro' => "As a caregiver, you pour so much of yourself into others, and it is easy to lose sight of your own needs, your own growth, and your own well-being. That is why our Reflect & Renew Workshops are one of our most impactful programs. Hosted monthly, these workshops are designed to give you intentional space to pause, reflect, and invest in yourself. Each session focuses on themes that matter most to you — parenting strategies, self-care and personal development, financial empowerment, and more. We listen to your feedback and shape every workshop to be practical, inspiring, and deeply responsive to your reality. Our community members often tell us how these workshops help them feel seen, supported, and re-energized. Reflect & Renew is about healing, growing, and remembering that your well-being as a foster or kinship caregiver matters too.",
                'sections' => [
                    ['heading' => 'Workshop Themes', 'list' => [
                        'Parenting strategies for children with complex needs',
                        'Self-care and personal development',
                        'Financial empowerment',
                        'Stress management and burnout prevention',
                    ]],
                    ['heading' => 'How It Works', 'text' => 'Workshops are hosted monthly, shaped directly by caregiver feedback, and facilitated in a supportive group environment — practical, inspiring, and responsive to your reality.'],
                ],
                'quotes' => [],
                'cta' => ['label' => 'Join the Next Workshop', 'route' => 'events'],
            ],

            'coaching-mentorship-program' => [
                'icon' => '🤝',
                'title' => 'Coaching & Mentorship Program',
                'tagline' => 'Guidance from people who understand.',
                'hero_image' => '/images/Coaching/Coaching-and-Mentorship-1.jpg',
                'images' => ['/images/Coaching/Coaching-and-Mentorship-2.jpg', '/images/Coaching/Coaching-and-Mentorship-3.jpg', '/images/Coaching/Coaching-and-Mentorship-4.jpg'],
                'intro' => "Becoming or continuing as a foster or kinship caregiver is a journey filled with responsibilities, expectations, and challenges. You are asked to navigate relationships with children, their families, and government systems, all while managing your own household and well-being. It can feel overwhelming, especially if you are just starting out. Our Coaching & Mentorship Program is designed to walk alongside you — whether you are new to caregiving or already experienced. Through guided, step-by-step sessions, we help you understand the responsibilities of caregiving and the expectations from yourself, the children, their families, and the government agencies you may interact with. We tell you what to expect, and we mentor you through it, offering encouragement, clarity, and practical tools. You will gain confidence, insight, and a stronger sense of community as you navigate your caregiving journey.",
                'sections' => [
                    ['heading' => 'What You Gain', 'list' => [
                        'Step-by-step guidance through the caregiving journey',
                        'Clarity on expectations from agencies, families and children',
                        'Encouragement and practical tools from experienced mentors',
                        'Confidence and a stronger sense of community',
                    ]],
                ],
                'quotes' => [],
                'cta' => ['label' => 'Request Mentorship', 'route' => 'home', 'anchor' => '#get-in-touch'],
            ],

            'caregiver-circle' => [
                'icon' => '🌐',
                'title' => 'Hearts and Mind Support Group (Caregiver Circle)',
                'tagline' => 'A support space for foster parents, kinship caregivers and families.',
                'hero_image' => '/images/caregiver-circle-hero.jpg',
                'images' => [],
                'intro' => "The Hearts & Mind Caregiver Circle is a safe, welcoming space designed for connection, reflection, and support. Caregiving comes with deep responsibility and constant transitions, which can feel overwhelming. This program ensures caregivers have a place to pause, share, and be supported.",
                'sections' => [
                    ['heading' => 'What This Space Offers', 'list' => [
                        'Peer connection in small, closed groups',
                        'Shared experiences without judgment',
                        'Opportunities to reflect on stress, boundaries, and wellbeing',
                        'Practical strategies from real-life caregiving',
                        'A sense of belonging within a supportive community',
                    ]],
                    ['heading' => 'How It Works', 'list' => [
                        '8-session cycles for consistency and trust',
                        'Virtual sessions with occasional in-person gatherings',
                        'Guided conversations, check-ins, and practical tools',
                    ]],
                    ['heading' => 'Our Approach', 'text' => 'This is a peer-based support space grounded in trauma-informed care, cultural awareness, and real-life caregiving experience.'],
                ],
                'quotes' => [],
                'cta' => ['label' => 'Join the Circle', 'route' => 'home', 'anchor' => '#get-in-touch'],
            ],

            'hearts-brunch-series' => [
                'icon' => '🍽️',
                'title' => 'Hearts & Brunch Series',
                'tagline' => 'Connection, community, and care.',
                'hero_image' => '/images/Brunch/Brunch-3.jpg',
                'images' => ['/images/Brunch/Brunch-6.jpg', '/images/Brunch/Brunch-7.jpg', '/images/Brunch/Brunch-4.jpg'],
                'intro' => "Caregiving is one of the most rewarding journeys, but it can also feel heavy and isolating. As a caregiver, you carry responsibilities that few truly understand, and sometimes what you need most is simply to sit down with others who truly get it. That is why we created the Hearts & Brunch Series: a monthly gathering where foster parents and kinship caregivers come together for a hearty meal and warm, relaxing conversation. The aim is to provide nourishment for your body and your soul. Around our brunch table, you will find laughter, shared stories, and the comfort of knowing you are not alone. You will meet others who face similar challenges, celebrate victories together, and discover encouragement in the simple act of connection. Our brunches give you space to pause, breathe, and connect with yourself first, then fellow caregivers. They remind you that community care is truly at the heart of what we do.",
                'sections' => [
                    ['heading' => 'What to Expect', 'list' => [
                        'A welcoming monthly gathering over a hearty meal',
                        'Warm, relaxed conversation with people who get it',
                        'Laughter, shared stories and encouragement',
                        'Space to pause, breathe and reconnect',
                    ]],
                ],
                'quotes' => [],
                'cta' => ['label' => 'See Upcoming Brunches', 'route' => 'events'],
            ],
        ];
    }
}
