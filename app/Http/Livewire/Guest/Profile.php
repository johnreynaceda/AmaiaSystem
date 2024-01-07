<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

class Profile extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $email, $type, $unit_number;
    public $lastname, $firstname, $middlename, $date_of_birth, $gender, $civil_status, $nationality, $preffered_address, $turn_over, $phone_number, $allow_notifications;

    public function mount()
    {
        $this->allow_notifications = auth()->user()->allow_notification;
    }
    public function render()
    {
        return view('livewire.guest.profile');
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make(3)
                ->schema([
                    TextInput::make('email')->label('Email Address')->email()->placeholder(auth()->user()->email),
                    Select::make('type')->label('Resident Type')->disabled()->placeholder(auth()->user()->user_information->resident_type)
                        ->options([
                            'Unit Owner' => 'Unit Owner',
                            'Tenant' => 'Tenant',

                        ]),
                    Select::make('unit_number')->label('Unit Number')->disabled()->placeholder('Room ' . auth()->user()->user_information->unit_number)
                        ->options([
                            'draft' => 'Draft',
                            'reviewing' => 'Reviewing',
                            'published' => 'Published',
                        ]),
                ]),
            Fieldset::make('GUEST INFORMATION')
                ->schema([
                    TextInput::make('lastname')->label('Lastname')->placeholder(auth()->user()->user_information->lastname),
                    TextInput::make('firstname')->label('Firtstname')->placeholder(auth()->user()->user_information->firstname),
                    TextInput::make('middlename')->label('Middlename')->placeholder(auth()->user()->user_information->middlename),
                    DatePicker::make('date_of_birth')->placeholder(\Carbon\Carbon::parse(auth()->user()->user_information->date_of_birth)->format('F d, Y'))->disabled(),
                    Select::make('gender')->label('Gender')->placeholder(auth()->user()->user_information->gender)
                        ->options([
                            'Male' => 'Male',
                            'Female' => 'Female',
                        ]),
                    Select::make('civil_status')->label('Civil Status')->placeholder(auth()->user()->user_information->civil_status)
                        ->options([
                            'Single' => 'Single',
                            'Married' => 'Married',
                            'Windowed' => 'Windowed',
                            'Divorceced' => 'Divorced'
                        ]),

                    // TextInput::make('nationality')->label('Nationality')->placeholder(auth()->user()->user_information->nationality),
                    Select::make('nationality')->placeholder(auth()->user()->user_information->nationality)
                        ->label('Nationality')
                        ->options([
                            'Filipino' => 'Filipino',
                            'Afghan' => 'Afghan',
                            'Albanian' => 'Albanian',
                            'Algerian' => 'Algerian',
                            'American' => 'American',
                            'Andorran' => 'Andorran',
                            'Angolan' => 'Angolan',
                            'Antiguans' => 'Antiguans',
                            'Argentinean' => 'Argentinean',
                            'Armenian' => 'Armenian',
                            'Australian' => 'Australian',
                            'Austrian' => 'Austrian',
                            'Azerbaijani' => 'Azerbaijani',
                            'Bahamian' => 'Bahamian',
                            'Bahraini' => 'Bahraini',
                            'Bangladeshi' => 'Bangladeshi',
                            'Barbadian' => 'Barbadian',
                            'Barbudans' => 'Barbudans',
                            'Batswana' => 'Batswana',
                            'Belarusian' => 'Belarusian',
                            'Belgian' => 'Belgian',
                            'Belizean' => 'Belizean',
                            'Beninese' => 'Beninese',
                            'Bhutanese' => 'Bhutanese',
                            'Bolivian' => 'Bolivian',
                            'Bosnian' => 'Bosnian',
                            'Brazilian' => 'Brazilian',
                            'British' => 'British',
                            'Bruneian' => 'Bruneian',
                            'Bulgarian' => 'Bulgarian',
                            'Burkinabe' => 'Burkinabe',
                            'Burmese' => 'Burmese',
                            'Burundian' => 'Burundian',
                            'Cambodian' => 'Cambodian',
                            'Cameroonian' => 'Cameroonian',
                            'Canadian' => 'Canadian',
                            'Cape Verdean' => 'Cape Verdean',
                            'Central African' => 'Central African',
                            'Chadian' => 'Chadian',
                            'Chilean' => 'Chilean',
                            'Chinese' => 'Chinese',
                            'Colombian' => 'Colombian',
                            'Comoran' => 'Comoran',
                            'Congolese' => 'Congolese',
                            'Costa Rican' => 'Costa Rican',
                            'Croatian' => 'Croatian',
                            'Cuban' => 'Cuban',
                            'Cypriot' => 'Cypriot',
                            'Czech' => 'Czech',
                            'Danish' => 'Danish',
                            'Djibouti' => 'Djibouti',
                            'Dominican' => 'Dominican',
                            'Dutch' => 'Dutch',
                            'East Timorese' => 'East Timorese',
                            'Ecuadorean' => 'Ecuadorean',
                            'Egyptian' => 'Egyptian',
                            'Emirian' => 'Emirian',
                            'Equatorial Guinean' => 'Equatorial Guinean',
                            'Eritrean' => 'Eritrean',
                            'Estonian' => 'Estonian',
                            'Ethiopian' => 'Ethiopian',
                            'Fijian' => 'Fijian',
                            'Finnish' => 'Finnish',
                            'French' => 'French',
                            'Gabonese' => 'Gabonese',
                            'Gambian' => 'Gambian',
                            'Georgian' => 'Georgian',
                            'German' => 'German',
                            'Ghanaian' => 'Ghanaian',
                            'Greek' => 'Greek',
                            'Grenadian' => 'Grenadian',
                            'Guatemalan' => 'Guatemalan',
                            'Guinea-Bissauan' => 'Guinea-Bissauan',
                            'Guinean' => 'Guinean',
                            'Guyanese' => 'Guyanese',
                            'Haitian' => 'Haitian',
                            'Herzegovinian' => 'Herzegovinian',
                            'Honduran' => 'Honduran',
                            'Hungarian' => 'Hungarian',
                            'I-Kiribati' => 'I-Kiribati',
                            'Icelander' => 'Icelander',
                            'Indian' => 'Indian',
                            'Indonesian' => 'Indonesian',
                            'Iranian' => 'Iranian',
                            'Iraqi' => 'Iraqi',
                            'Irish' => 'Irish',
                            'Israeli' => 'Israeli',
                            'Italian' => 'Italian',
                            'Ivorian' => 'Ivorian',
                            'Jamaican' => 'Jamaican',
                            'Japanese' => 'Japanese',
                            'Jordanian' => 'Jordanian',
                            'Kazakhstani' => 'Kazakhstani',
                            'Kenyan' => 'Kenyan',
                            'Kittian and Nevisian' => 'Kittian and Nevisian',
                            'Kuwaiti' => 'Kuwaiti',
                            'Kyrgyz' => 'Kyrgyz',
                            'Laotian' => 'Laotian',
                            'Latvian' => 'Latvian',
                            'Lebanese' => 'Lebanese',
                            'Liberian' => 'Liberian',
                            'Libyan' => 'Libyan',
                            'Liechtensteiner' => 'Liechtensteiner',
                            'Lithuanian' => 'Lithuanian',
                            'Luxembourger' => 'Luxembourger',
                            'Macedonian' => 'Macedonian',
                            'Malagasy' => 'Malagasy',
                            'Malawian' => 'Malawian',
                            'Malaysian' => 'Malaysian',
                            'Maldivian' => 'Maldivian',
                            'Malian' => 'Malian',
                            'Maltese' => 'Maltese',
                            'Marshallese' => 'Marshallese',
                            'Mauritanian' => 'Mauritanian',
                            'Mauritian' => 'Mauritian',
                            'Mexican' => 'Mexican',
                            'Micronesian' => 'Micronesian',
                            'Moldovan' => 'Moldovan',
                            'Monacan' => 'Monacan',
                            'Mongolian' => 'Mongolian',
                            'Moroccan' => 'Moroccan',
                            'Mosotho' => 'Mosotho',
                            'Motswana' => 'Motswana',
                            'Mozambican' => 'Mozambican',
                            'Namibian' => 'Namibian',
                            'Nauruan' => 'Nauruan',
                            'Nepalese' => 'Nepalese',
                            'New Zealander' => 'New Zealander',
                            'Ni-Vanuatu' => 'Ni-Vanuatu',
                            'Nicaraguan' => 'Nicaraguan',
                            'Nigerian' => 'Nigerian',
                            'Nigerien' => 'Nigerien',
                            'North Korean' => 'North Korean',
                            'Northern Irish' => 'Northern Irish',
                            'Norwegian' => 'Norwegian',
                            'Omani' => 'Omani',
                            'Pakistani' => 'Pakistani',
                            'Palauan' => 'Palauan',
                            'Panamanian' => 'Panamanian',
                            'Papua New Guinean' => 'Papua New Guinean',
                            'Paraguayan' => 'Paraguayan',
                            'Peruvian' => 'Peruvian',
                            'Polish' => 'Polish',
                            'Portuguese' => 'Portuguese',
                            'Qatari' => 'Qatari',
                            'Romanian' => 'Romanian',
                            'Russian' => 'Russian',
                            'Rwandan' => 'Rwandan',
                            'Saint Lucian' => 'Saint Lucian',
                            'Salvadoran' => 'Salvadoran',
                            'Samoan' => 'Samoan',
                            'San Marinese' => 'San Marinese',
                            'Sao Tomean' => 'Sao Tomean',
                            'Saudi' => 'Saudi',
                            'Scottish' => 'Scottish',
                            'Senegalese' => 'Senegalese',
                            'Serbian' => 'Serbian',
                            'Seychellois' => 'Seychellois',
                            'Sierra Leonean' => 'Sierra Leonean',
                            'Singaporean' => 'Singaporean',
                            'Slovakian' => 'Slovakian',
                            'Slovenian' => 'Slovenian',
                            'Solomon Islander' => 'Solomon Islander',
                            'Somali' => 'Somali',
                            'South African' => 'South African',
                            'South Korean' => 'South Korean',
                            'Spanish' => 'Spanish',
                            'Sri Lankan' => 'Sri Lankan',
                            'Sudanese' => 'Sudanese',
                            'Surinamer' => 'Surinamer',
                            'Swazi' => 'Swazi',
                            'Swedish' => 'Swedish',
                            'Swiss' => 'Swiss',
                            'Syrian' => 'Syrian',
                            'Taiwanese' => 'Taiwanese',
                            'Tajik' => 'Tajik',
                            'Tanzanian' => 'Tanzanian',
                            'Thai' => 'Thai',
                            'Togolese' => 'Togolese',
                            'Tongan' => 'Tongan',
                            'Trinidadian' => 'Trinidadian',
                            'Tunisian' => 'Tunisian',
                            'Turkish' => 'Turkish',
                            'Tuvaluan' => 'Tuvaluan',
                            'Ugandan' => 'Ugandan',
                            'Ukrainian' => 'Ukrainian',
                            'Uruguayan' => 'Uruguayan',
                            'Uzbekistani' => 'Uzbekistani',
                            'Venezuelan' => 'Venezuelan',
                            'Vietnamese' => 'Vietnamese',
                            'Welsh' => 'Welsh',
                            'Yemenite' => 'Yemenite',
                            'Zambian' => 'Zambian',
                            'Zimbabwean' => 'Zimbabwean',
                        ])->searchable(),
                    Textarea::make('preffered_address')->label('Preferred Mailing Address')->placeholder(auth()->user()->user_information->preferred_mailing_address),
                    DatePicker::make('turn_over')->placeholder(auth()->user()->user_information->turn_over_date == null ? '' : \Carbon\Carbon::parse(auth()->user()->user_information->turn_over_date)->format('F d, Y'))->visible(auth()->user()->user_information->resident_type == 'Unit Owner'),
                    TextInput::make('phone_number')->label('Phone Number')->placeholder(auth()->user()->user_information->phone_number)->mask(fn(TextInput\Mask $mask) => $mask->pattern('00000000000')),

                    // Toggle::make('allow_notifications')->label('Allow Notifications')->inline(false)
                    //     ->onColor('primary')
                    //     ->offColor('danger')->onIcon('heroicon-s-bell')
                    //     ->offIcon('heroicon-s-ban')
                ])
                ->columns(4)


        ];
    }

    public function submitProfile()
    {
        $data = auth()->user();
        $data->update([
            'email' => $this->email == null ? auth()->user()->email : $this->email,
            'allow_notification' => $this->allow_notifications != true ? false : true,
        ]);

        $data->user_information->update([
            'lastname' => $this->lastname == null ? auth()->user()->user_information->lastname : $this->lastname,
            'firstname' => $this->firstname == null ? auth()->user()->user_information->firstname : $this->firstname,
            'middlename' => $this->middlename == null ? auth()->user()->user_information->middlename : $this->middlename,
            'date_of_birth' => $this->date_of_birth == null ? auth()->user()->user_information->date_of_birth : $this->date_of_birth,
            'gender' => $this->gender == null ? auth()->user()->user_information->gender : $this->gender,
            'civil_status' => $this->civil_status == null ? auth()->user()->user_information->civil_status : $this->civil_status,
            'nationality' => $this->nationality == null ? auth()->user()->user_information->nationality : $this->nationality,
            'preferred_mailing_address' => $this->preffered_address == null ? auth()->user()->user_information->preferred_mailing_address : $this->preffered_address,
            'turn_over_date' => $this->turn_over == null ? auth()->user()->user_information->turn_over_date : $this->turn_over,
            'phone_number' => $this->phone_number == null ? auth()->user()->user_information->phone_number : $this->phone_number,
        ]);

        sweetalert()->addSuccess('Profile Updated');

    }

}

