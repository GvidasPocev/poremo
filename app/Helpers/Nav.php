<?php

namespace App\Helpers;

class Nav
{
    private static function format($items)
    {
        return collect($items)->map(function ($item) {
            return [
                'url'    => $item['routeName'],
                'label'  => $item['label'],
                'active' => $item['active'],
            ];
        });
    }

    public static function getPublic()
    {
        $items = [
            // [
            //     'routeName' => 'home',
            //     'label' => __('content.nav.home'),
            //     'active' => [
            //         'home',
            //     ],
            // ],
            [
                'routeName' => 'services',
                'label'     => __('content.nav.services'),
                'active'    => [
                    'services',
                ],
            ],
            [
                'routeName' => 'about',
                'label'     => __('content.nav.about'),
                'active'    => [
                    'about',
                ],
            ],
            [
                'routeName' => 'completed-works',
                'label'     => __('content.nav.work'),
                'active'    => [
                    'completed-works',
                ],
            ],
            [
                'routeName' => 'gallery',
                'label'     => __('content.nav.gallery'),
                'active'    => [
                    'gallery',
                ],
            ],
            [
                'routeName' => 'certificates',
                'label'     => __('content.nav.certificates'),
                'active'    => [
                    'certificates',
                ],
            ],
            [
                'routeName' => 'contact',
                'label'     => __('content.nav.contact'),
                'active'    => [
                    'contact',
                ],
            ],
        ];

        // if(isset(Auth::user()->id)){
        //     $items[] = [
        //         'routeName' => 'personal-courses',
        //         'label' => __('content.nav.personal.courses'),
        //         'active' => [
        //             'personal-courses',
        //             'personal-course',
        //         ],
        //     ];
        // }

        return self::format($items);
    }

    public static function getPrivate()
    {
        $items = [
            [
                'routeName' => 'personal-courses',
                'label'     => __('content.nav.personal.courses'),
                'active'    => [
                    'personal-courses',
                    'personal-course',
                ],
            ],
            [
                'routeName' => 'personal-certificates',
                'label'     => __('content.nav.personal.certificates'),
                'active'    => [
                    'personal-certificates',
                ],
            ],
            [
                'routeName' => 'personal-messages',
                'label'     => __('content.nav.personal.messages'),
                'active'    => [
                    'personal-messages',
                ],
            ],
            [
                'routeName' => 'personal-data',
                'label'     => __('content.nav.personal.data'),
                'active'    => [
                    'personal-data',
                ],
            ],
        ];

        return self::format($items);
    }

    public static function getFooter()
    {
        $items = [
            'column1' => [
                'title' => 'Kontaktai',
                'items' => [
                    ['text' => 'Gamyklos g. 54'],
                    ['text' => 'Mažeikiai'],
                    ['text' => 'Lietuva'],
                ],
            ],
            'column2' => [
                'title' => 'Direktorius',
                'items' => [
                    ['text' => 'Tadas Šikšnius'],
                    ['text' => 'Mob. tel.: +370 671 10266'],
                    ['text' => 'El. paštas: tadas@poremo.com'],
                ],
            ],
            'column3' => [
                'title' => 'Vykdantysis direktorius',
                'items' => [
                    ['text' => 'Vytautas Jasmontas'],
                    ['text' => 'Mob. tel.: +370 614 09176'],
                    ['text' => 'El. paštas: vytautas@poremo.com'],
                ],
            ],
        ];

        return $items;
    }

    public static function getFooterNav()
    {
        $items = [
            [
                'routeName' => 'home',
                'label'     => __('content.nav.home'),
                'active'    => [
                    'home',
                ],
            ],
            [
                'routeName' => 'courses',
                'label'     => __('content.nav.courses'),
                'active'    => [
                    'courses',
                ],
            ],
            [
                'routeName' => 'questionnaire',
                'label'     => __('content.nav.questionnaire'),
                'active'    => [
                    'questionnaire',
                ],
            ],
            [
                'routeName' => 'contact',
                'label'     => __('content.nav.contact'),
                'active'    => [
                    'contact',
                ],
            ],
            [
                'routeName' => 'blogs',
                'label'     => __('content.nav.blog'),
                'active'    => [
                    'blogs',
                ],
            ],
        ];

        return self::format($items);
    }
}
