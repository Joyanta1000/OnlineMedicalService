<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run()
    {
        DB::table('countries')->delete();

        $countries = array(
            array('code' => 'US', 'country' => 'United States'),
            array('code' => 'CA', 'country' => 'Canada'),
            array('code' => 'AF', 'country' => 'Afghanistan'),
            array('code' => 'AL', 'country' => 'Albania'),
            array('code' => 'DZ', 'country' => 'Algeria'),
            array('code' => 'AS', 'country' => 'American Samoa'),
            array('code' => 'AD', 'country' => 'Andorra'),
            array('code' => 'AO', 'country' => 'Angola'),
            array('code' => 'AI', 'country' => 'Anguilla'),
            array('code' => 'AQ', 'country' => 'Antarctica'),
            array('code' => 'AG', 'country' => 'Antigua and/or Barbuda'),
            array('code' => 'AR', 'country' => 'Argentina'),
            array('code' => 'AM', 'country' => 'Armenia'),
            array('code' => 'AW', 'country' => 'Aruba'),
            array('code' => 'AU', 'country' => 'Australia'),
            array('code' => 'AT', 'country' => 'Austria'),
            array('code' => 'AZ', 'country' => 'Azerbaijan'),
            array('code' => 'BS', 'country' => 'Bahamas'),
            array('code' => 'BH', 'country' => 'Bahrain'),
            array('code' => 'BD', 'country' => 'Bangladesh'),
            array('code' => 'BB', 'country' => 'Barbados'),
            array('code' => 'BY', 'country' => 'Belarus'),
            array('code' => 'BE', 'country' => 'Belgium'),
            array('code' => 'BZ', 'country' => 'Belize'),
            array('code' => 'BJ', 'country' => 'Benin'),
            array('code' => 'BM', 'country' => 'Bermuda'),
            array('code' => 'BT', 'country' => 'Bhutan'),
            array('code' => 'BO', 'country' => 'Bolivia'),
            array('code' => 'BA', 'country' => 'Bosnia and Herzegovina'),
            array('code' => 'BW', 'country' => 'Botswana'),
            array('code' => 'BV', 'country' => 'Bouvet Island'),
            array('code' => 'BR', 'country' => 'Brazil'),
            array('code' => 'IO', 'country' => 'British lndian Ocean Territory'),
            array('code' => 'BN', 'country' => 'Brunei Darussalam'),
            array('code' => 'BG', 'country' => 'Bulgaria'),
            array('code' => 'BF', 'country' => 'Burkina Faso'),
            array('code' => 'BI', 'country' => 'Burundi'),
            array('code' => 'KH', 'country' => 'Cambodia'),
            array('code' => 'CM', 'country' => 'Cameroon'),
            array('code' => 'CV', 'country' => 'Cape Verde'),
            array('code' => 'KY', 'country' => 'Cayman Islands'),
            array('code' => 'CF', 'country' => 'Central African Republic'),
            array('code' => 'TD', 'country' => 'Chad'),
            array('code' => 'CL', 'country' => 'Chile'),
            array('code' => 'CN', 'country' => 'China'),
            array('code' => 'CX', 'country' => 'Christmas Island'),
            array('code' => 'CC', 'country' => 'Cocos (Keeling) Islands'),
            array('code' => 'CO', 'country' => 'Colombia'),
            array('code' => 'KM', 'country' => 'Comoros'),
            array('code' => 'CG', 'country' => 'Congo'),
            array('code' => 'CK', 'country' => 'Cook Islands'),
            array('code' => 'CR', 'country' => 'Costa Rica'),
            array('code' => 'HR', 'country' => 'Croatia (Hrvatska)'),
            array('code' => 'CU', 'country' => 'Cuba'),
            array('code' => 'CY', 'country' => 'Cyprus'),
            array('code' => 'CZ', 'country' => 'Czech Republic'),
            array('code' => 'CD', 'country' => 'Democratic Republic of Congo'),
            array('code' => 'DK', 'country' => 'Denmark'),
            array('code' => 'DJ', 'country' => 'Djibouti'),
            array('code' => 'DM', 'country' => 'Dominica'),
            array('code' => 'DO', 'country' => 'Dominican Republic'),
            array('code' => 'TP', 'country' => 'East Timor'),
            array('code' => 'EC', 'country' => 'Ecudaor'),
            array('code' => 'EG', 'country' => 'Egypt'),
            array('code' => 'SV', 'country' => 'El Salvador'),
            array('code' => 'GQ', 'country' => 'Equatorial Guinea'),
            array('code' => 'ER', 'country' => 'Eritrea'),
            array('code' => 'EE', 'country' => 'Estonia'),
            array('code' => 'ET', 'country' => 'Ethiopia'),
            array('code' => 'FK', 'country' => 'Falkland Islands (Malvinas)'),
            array('code' => 'FO', 'country' => 'Faroe Islands'),
            array('code' => 'FJ', 'country' => 'Fiji'),
            array('code' => 'FI', 'country' => 'Finland'),
            array('code' => 'FR', 'country' => 'France'),
            array('code' => 'FX', 'country' => 'France, Metropolitan'),
            array('code' => 'GF', 'country' => 'French Guiana'),
            array('code' => 'PF', 'country' => 'French Polynesia'),
            array('code' => 'TF', 'country' => 'French Southern Territories'),
            array('code' => 'GA', 'country' => 'Gabon'),
            array('code' => 'GM', 'country' => 'Gambia'),
            array('code' => 'GE', 'country' => 'Georgia'),
            array('code' => 'DE', 'country' => 'Germany'),
            array('code' => 'GH', 'country' => 'Ghana'),
            array('code' => 'GI', 'country' => 'Gibraltar'),
            array('code' => 'GR', 'country' => 'Greece'),
            array('code' => 'GL', 'country' => 'Greenland'),
            array('code' => 'GD', 'country' => 'Grenada'),
            array('code' => 'GP', 'country' => 'Guadeloupe'),
            array('code' => 'GU', 'country' => 'Guam'),
            array('code' => 'GT', 'country' => 'Guatemala'),
            array('code' => 'GN', 'country' => 'Guinea'),
            array('code' => 'GW', 'country' => 'Guinea-Bissau'),
            array('code' => 'GY', 'country' => 'Guyana'),
            array('code' => 'HT', 'country' => 'Haiti'),
            array('code' => 'HM', 'country' => 'Heard and Mc Donald Islands'),
            array('code' => 'HN', 'country' => 'Honduras'),
            array('code' => 'HK', 'country' => 'Hong Kong'),
            array('code' => 'HU', 'country' => 'Hungary'),
            array('code' => 'IS', 'country' => 'Iceland'),
            array('code' => 'IN', 'country' => 'India'),
            array('code' => 'ID', 'country' => 'Indonesia'),
            array('code' => 'IR', 'country' => 'Iran (Islamic Republic of)'),
            array('code' => 'IQ', 'country' => 'Iraq'),
            array('code' => 'IE', 'country' => 'Ireland'),
            array('code' => 'IL', 'country' => 'Israel'),
            array('code' => 'IT', 'country' => 'Italy'),
            array('code' => 'CI', 'country' => 'Ivory Coast'),
            array('code' => 'JM', 'country' => 'Jamaica'),
            array('code' => 'JP', 'country' => 'Japan'),
            array('code' => 'JO', 'country' => 'Jordan'),
            array('code' => 'KZ', 'country' => 'Kazakhstan'),
            array('code' => 'KE', 'country' => 'Kenya'),
            array('code' => 'KI', 'country' => 'Kiribati'),
            array('code' => 'KP', 'country' => 'Korea, Democratic People\'s Republic of'),
            array('code' => 'KR', 'country' => 'Korea, Republic of'),
            array('code' => 'KW', 'country' => 'Kuwait'),
            array('code' => 'KG', 'country' => 'Kyrgyzstan'),
            array('code' => 'LA', 'country' => 'Lao People\'s Democratic Republic'),
            array('code' => 'LV', 'country' => 'Latvia'),
            array('code' => 'LB', 'country' => 'Lebanon'),
            array('code' => 'LS', 'country' => 'Lesotho'),
            array('code' => 'LR', 'country' => 'Liberia'),
            array('code' => 'LY', 'country' => 'Libyan Arab Jamahiriya'),
            array('code' => 'LI', 'country' => 'Liechtenstein'),
            array('code' => 'LT', 'country' => 'Lithuania'),
            array('code' => 'LU', 'country' => 'Luxembourg'),
            array('code' => 'MO', 'country' => 'Macau'),
            array('code' => 'MK', 'country' => 'Macedonia'),
            array('code' => 'MG', 'country' => 'Madagascar'),
            array('code' => 'MW', 'country' => 'Malawi'),
            array('code' => 'MY', 'country' => 'Malaysia'),
            array('code' => 'MV', 'country' => 'Maldives'),
            array('code' => 'ML', 'country' => 'Mali'),
            array('code' => 'MT', 'country' => 'Malta'),
            array('code' => 'MH', 'country' => 'Marshall Islands'),
            array('code' => 'MQ', 'country' => 'Martinique'),
            array('code' => 'MR', 'country' => 'Mauritania'),
            array('code' => 'MU', 'country' => 'Mauritius'),
            array('code' => 'TY', 'country' => 'Mayotte'),
            array('code' => 'MX', 'country' => 'Mexico'),
            array('code' => 'FM', 'country' => 'Micronesia, Federated States of'),
            array('code' => 'MD', 'country' => 'Moldova, Republic of'),
            array('code' => 'MC', 'country' => 'Monaco'),
            array('code' => 'MN', 'country' => 'Mongolia'),
            array('code' => 'MS', 'country' => 'Montserrat'),
            array('code' => 'MA', 'country' => 'Morocco'),
            array('code' => 'MZ', 'country' => 'Mozambique'),
            array('code' => 'MM', 'country' => 'Myanmar'),
            array('code' => 'NA', 'country' => 'Namibia'),
            array('code' => 'NR', 'country' => 'Nauru'),
            array('code' => 'NP', 'country' => 'Nepal'),
            array('code' => 'NL', 'country' => 'Netherlands'),
            array('code' => 'AN', 'country' => 'Netherlands Antilles'),
            array('code' => 'NC', 'country' => 'New Caledonia'),
            array('code' => 'NZ', 'country' => 'New Zealand'),
            array('code' => 'NI', 'country' => 'Nicaragua'),
            array('code' => 'NE', 'country' => 'Niger'),
            array('code' => 'NG', 'country' => 'Nigeria'),
            array('code' => 'NU', 'country' => 'Niue'),
            array('code' => 'NF', 'country' => 'Norfork Island'),
            array('code' => 'MP', 'country' => 'Northern Mariana Islands'),
            array('code' => 'NO', 'country' => 'Norway'),
            array('code' => 'OM', 'country' => 'Oman'),
            array('code' => 'PK', 'country' => 'Pakistan'),
            array('code' => 'PW', 'country' => 'Palau'),
            array('code' => 'PA', 'country' => 'Panama'),
            array('code' => 'PG', 'country' => 'Papua New Guinea'),
            array('code' => 'PY', 'country' => 'Paraguay'),
            array('code' => 'PE', 'country' => 'Peru'),
            array('code' => 'PH', 'country' => 'Philippines'),
            array('code' => 'PN', 'country' => 'Pitcairn'),
            array('code' => 'PL', 'country' => 'Poland'),
            array('code' => 'PT', 'country' => 'Portugal'),
            array('code' => 'PR', 'country' => 'Puerto Rico'),
            array('code' => 'QA', 'country' => 'Qatar'),
            array('code' => 'SS', 'country' => 'Republic of South Sudan'),
            array('code' => 'RE', 'country' => 'Reunion'),
            array('code' => 'RO', 'country' => 'Romania'),
            array('code' => 'RU', 'country' => 'Russian Federation'),
            array('code' => 'RW', 'country' => 'Rwanda'),
            array('code' => 'KN', 'country' => 'Saint Kitts and Nevis'),
            array('code' => 'LC', 'country' => 'Saint Lucia'),
            array('code' => 'VC', 'country' => 'Saint Vincent and the Grenadines'),
            array('code' => 'WS', 'country' => 'Samoa'),
            array('code' => 'SM', 'country' => 'San Marino'),
            array('code' => 'ST', 'country' => 'Sao Tome and Principe'),
            array('code' => 'SA', 'country' => 'Saudi Arabia'),
            array('code' => 'SN', 'country' => 'Senegal'),
            array('code' => 'RS', 'country' => 'Serbia'),
            array('code' => 'SC', 'country' => 'Seychelles'),
            array('code' => 'SL', 'country' => 'Sierra Leone'),
            array('code' => 'SG', 'country' => 'Singapore'),
            array('code' => 'SK', 'country' => 'Slovakia'),
            array('code' => 'SI', 'country' => 'Slovenia'),
            array('code' => 'SB', 'country' => 'Solomon Islands'),
            array('code' => 'SO', 'country' => 'Somalia'),
            array('code' => 'ZA', 'country' => 'South Africa'),
            array('code' => 'GS', 'country' => 'South Georgia South Sandwich Islands'),
            array('code' => 'ES', 'country' => 'Spain'),
            array('code' => 'LK', 'country' => 'Sri Lanka'),
            array('code' => 'SH', 'country' => 'St. Helena'),
            array('code' => 'PM', 'country' => 'St. Pierre and Miquelon'),
            array('code' => 'SD', 'country' => 'Sudan'),
            array('code' => 'SR', 'country' => 'Suriname'),
            array('code' => 'SJ', 'country' => 'Svalbarn and Jan Mayen Islands'),
            array('code' => 'SZ', 'country' => 'Swaziland'),
            array('code' => 'SE', 'country' => 'Sweden'),
            array('code' => 'CH', 'country' => 'Switzerland'),
            array('code' => 'SY', 'country' => 'Syrian Arab Republic'),
            array('code' => 'TW', 'country' => 'Taiwan'),
            array('code' => 'TJ', 'country' => 'Tajikistan'),
            array('code' => 'TZ', 'country' => 'Tanzania, United Republic of'),
            array('code' => 'TH', 'country' => 'Thailand'),
            array('code' => 'TG', 'country' => 'Togo'),
            array('code' => 'TK', 'country' => 'Tokelau'),
            array('code' => 'TO', 'country' => 'Tonga'),
            array('code' => 'TT', 'country' => 'Trinidad and Tobago'),
            array('code' => 'TN', 'country' => 'Tunisia'),
            array('code' => 'TR', 'country' => 'Turkey'),
            array('code' => 'TM', 'country' => 'Turkmenistan'),
            array('code' => 'TC', 'country' => 'Turks and Caicos Islands'),
            array('code' => 'TV', 'country' => 'Tuvalu'),
            array('code' => 'UG', 'country' => 'Uganda'),
            array('code' => 'UA', 'country' => 'Ukraine'),
            array('code' => 'AE', 'country' => 'United Arab Emirates'),
            array('code' => 'GB', 'country' => 'United Kingdom'),
            array('code' => 'UM', 'country' => 'United States minor outlying islands'),
            array('code' => 'UY', 'country' => 'Uruguay'),
            array('code' => 'UZ', 'country' => 'Uzbekistan'),
            array('code' => 'VU', 'country' => 'Vanuatu'),
            array('code' => 'VA', 'country' => 'Vatican City State'),
            array('code' => 'VE', 'country' => 'Venezuela'),
            array('code' => 'VN', 'country' => 'Vietnam'),
            array('code' => 'VG', 'country' => 'Virgin Islands (British)'),
            array('code' => 'VI', 'country' => 'Virgin Islands (U.S.)'),
            array('code' => 'WF', 'country' => 'Wallis and Futuna Islands'),
            array('code' => 'EH', 'country' => 'Western Sahara'),
            array('code' => 'YE', 'country' => 'Yemen'),
            array('code' => 'YU', 'country' => 'Yugoslavia'),
            array('code' => 'ZR', 'country' => 'Zaire'),
            array('code' => 'ZM', 'country' => 'Zambia'),
            array('code' => 'ZW', 'country' => 'Zimbabwe'),
        );

        DB::table('countries')->insert($countries);
    }
}
