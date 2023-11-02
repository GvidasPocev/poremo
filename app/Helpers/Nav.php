<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class Nav
{
    private static function format($items)
    {
        return collect($items)->map(function ($item) {
            return [
                'url' => $item['routeName'],
                'label' => $item['label'],
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
                'label' => __('content.nav.services'),
                'active' => [
                    'services',
                ],
            ],
            // [
            //     'routeName' => 'questionnaire',
            //     'label' => __('content.nav.questionnaire'),
            //     'active' => [
            //         'questionnaire',
            //     ],
            // ],
            // [
            //     'routeName' => 'contact',
            //     'label' => __('content.nav.contact'),
            //     'active' => [
            //         'contact',
            //     ],
            // ],
            // [
            //     'routeName' => 'blogs',
            //     'label' => __('content.nav.blog'),
            //     'active' => [
            //         'blogs',
            //     ],
            // ],
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
                'label' => __('content.nav.personal.courses'),
                'active' => [
                    'personal-courses',
                    'personal-course',
                ],
            ],
            [
                'routeName' => 'personal-certificates',
                'label' => __('content.nav.personal.certificates'),
                'active' => [
                    'personal-certificates',
                ],
            ],
            [
                'routeName' => 'personal-messages',
                'label' => __('content.nav.personal.messages'),
                'active' => [
                    'personal-messages',
                ],
            ],
            [
                'routeName' => 'personal-data',
                'label' => __('content.nav.personal.data'),
                'active' => [
                    'personal-data',
                ],
            ],
        ];

        return self::format($items);
    }

    public static function getFooter()
    {
        $items = [
            [
                'routeName' => 'terms-rules',
                'label' => __('content.footer.terms'),
                'active' => [
                    'contact',
                ],
            ],
            [
                'routeName' => 'privacy-rules',
                'label' => __('content.footer.privacy'),
                'active' => [
                    'contact',
                ],
            ],
            [
                'routeName' => 'eu-project',
                'label' => __('content.footer.euproject'),
                'active' => [
                    'contact',
                ],
            ],
        ];

        return self::format($items);
    }

    public static function getFooterNav()
    {
        $items = [
            [
                'routeName' => 'home',
                'label' => __('content.nav.home'),
                'active' => [
                    'home',
                ],
            ],
            [
                'routeName' => 'courses',
                'label' => __('content.nav.courses'),
                'active' => [
                    'courses',
                ],
            ],
            [
                'routeName' => 'questionnaire',
                'label' => __('content.nav.questionnaire'),
                'active' => [
                    'questionnaire',
                ],
            ],
            [
                'routeName' => 'contact',
                'label' => __('content.nav.contact'),
                'active' => [
                    'contact',
                ],
            ],
            [
                'routeName' => 'blogs',
                'label' => __('content.nav.blog'),
                'active' => [
                    'blogs',
                ],
            ],
        ];

        return self::format($items);
    }
}
