<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\UserInformation;
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
use DB;

class RegisterTenant extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $view_term = false;

    public $email, $password, $confirm_password, $type, $unit_number, $lastname, $firstname, $middlename, $date_of_birth, $gender, $civil_status, $nationality, $phone_number;


    public $unitNumbers, $roomNames, $availableRoomNumber, $occupiedRoom = [];
    public function mount()
    {
        $this->occupiedRoom = UserInformation::whereHas('user', function ($record) {
            $record->where('is_accepted', 1)->where('status', null);
        })->pluck('unit_number')->toArray();
        // dd($this->occupiedRoom);
        $this->availableRoomNumber = array_values(array_diff(range(1, 912), $this->occupiedRoom));

        $this->roomNames = array_map(function ($number) {
            return 'Room ' . $number;
        }, $this->availableRoomNumber);
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make(4)
                ->schema([
                    TextInput::make('email')->label('Email Address')->email(),
                    TextInput::make('password')->label('Password')->password(),
                    TextInput::make('confirm_password')->label('Confirm Password')->password()->same('password'),
                    Select::make('type')->label('Resident Type')
                        ->options([
                            'Unit Owner' => 'Unit Owner',
                            'Tenant' => 'Tenant',

                        ]),
                    Select::make('unit_number')->label('Unit Number')->searchable()
                        ->options(
                            array_combine($this->availableRoomNumber, $this->roomNames)
                        ),
                ]),
            Fieldset::make('GUEST INFORMATION')
                ->schema([
                    TextInput::make('lastname')->label('Lastname'),
                    TextInput::make('firstname')->label('Firtstname'),
                    TextInput::make('middlename')->label('Middlename'),
                    DatePicker::make('date_of_birth')->reactive(),
                    Select::make('gender')->label('Gender')
                        ->options([
                            'Male' => 'Male',
                            'Female' => 'Female',
                        ]),
                    Select::make('civil_status')->label('Civil Status')
                        ->options([
                            'Single' => 'Single',
                            'Married' => 'Married',
                            'Widowed' => 'Widowed',
                            'Divorceced' => 'Divorced'
                        ]),

                    Select::make('nationality')
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

                    TextInput::make('phone_number')->label('Phone Number')->numeric()->mask(fn(TextInput\Mask $mask) => $mask->pattern('00000000000')),


                ])
                ->columns(4)


        ];
    }

    public function updatedDateOfBirth()
    {
        $age = \Carbon\Carbon::parse($this->date_of_birth)->age;

        if ($age <= 18) {
            $this->reset('date_of_birth');
            sweetalert()->addError('Age must be 18 above');

        } else {

        }
    }

    public function registerUser()
    {
        $this->validate([
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'type' => 'required',
            'unit_number' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'civil_status' => 'required',
            'nationality' => 'required',
            'phone_number' => 'required',
        ]);

        $age = \Carbon\Carbon::parse($this->date_of_birth)->age;

        if ($age < 18) {

            sweetalert()->addError('Age must be 18 and above');
            $this->reset('date_of_birth');
        } else {

            DB::beginTransaction();
            $user = User::create([
                'name' => $this->firstname . ' ' . $this->lastname,
                'email' => $this->email,
                'password' => $this->password,
            ]);

            UserInformation::create([
                'user_id' => $user->id,
                'resident_type' => $this->type,
                'unit_number' => $this->unit_number,
                'lastname' => $this->lastname,
                'firstname' => $this->firstname,
                'middlename' => $this->middlename,
                'date_of_birth' => $this->date_of_birth,
                'gender' => $this->gender,
                'civil_status' => $this->civil_status,
                'nationality' => $this->nationality,
                'phone_number' => $this->phone_number
            ]);
            DB::commit();
            sleep(2);
            auth()->loginUsingId($user->id);
            sweetalert()->addSuccess('Registered Successfully');
            return redirect()->route('dashboard');
        }








    }

    public function render()
    {
        return view('livewire.register-tenant');
    }
}
