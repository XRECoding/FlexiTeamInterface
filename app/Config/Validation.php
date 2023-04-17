<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    public $login = [
        'email'     => 'required|valid_email',
        'password'  => 'required|matches[correct]'
    ];

    public $login_errors = [
        'email' => [
            'required'      => 'Sie müssen Ihre E-Mail angeben.',
            'valid_email'   => 'Sie müssen eine gültige E-Mail angeben.'
        ],
        'password' => [
            'required'      => 'Sie müssen Ihr Passwort angeben.',
            'matches'       => "Das Passwort passt nicht zur Email"
        ],
    ];

    public $registration = [
        'email'     => 'required|valid_email|is_unique[users.email]',
        'password1' => 'required|min_length[5]',
        'password2' => 'required|matches[password1]'
    ];

    public $registration_errors = [
        'email'     => [
            'required'      => 'Sie müssen eine E-Mail angeben.',
            'valid_email'   => 'Sie müssen eine gültige E-Mail angeben.',
            'is_unique'     => 'Diese E-mail ist bereits vergeben.',
        ],
        'password1' => [
            'required'      => 'Sie müssen ein Passwort erstellen.',
            'min_length'    => 'Ihr Passwort muss mindestens 5 Stellen lang sein.',
        ],
        'password2' => [
            'required'      => 'Sie müssen Ihr Passwort wiederholen.',
            'matches'       => 'Das wiederholte Passwort stimmt nicht mit der erstellen überein.',
        ],
    ];

    public $entry = [
        'categoryID'        => 'required',
        'designation'       => 'required'
    ];

    public $entry_errors = [
        'categoryID' => [
            'required'      => 'Sie müssen eine Kategorie wählen.',
            'differs'       => 'Sie müssen eine Kategorie wählen.'
        ],
        'designation' => [
            'required'      => 'Sie müssen eine Bezeichnung wählen.'
        ],
    ];


}
