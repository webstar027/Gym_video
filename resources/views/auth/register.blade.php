@extends('layouts.app')

@section('content')
<!-- Section Register Start -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<section class="bg-trans">
		<div class="container">

			<div class="row justify-content-center">
				
				<div class="col-lg-8">
					<div class="login-register">
						<h3>Register</h3>
						<form method="POST" action="{{ route('register') }}">
                        @csrf
							<div class="form-row">
								<div class="form-group col-md-6">
                                    <input id="firstname" placeholder="First Name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-group col-lg-6">
                                    <input id="lastname" placeholder="Last Name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
                                    <input id="name" placeholder="Username" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-group col-lg-6">
                                    <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
                                    <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-group col-lg-6">
                                    <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
								</div>
							</div>
							<div class="form-group btn-group account-type-btn">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn my-btn gym_option active"  id="btn_individual">
                                        <input type="radio" name="role_id" id="option1" value="3" autocomplete="off" checked> Individual
                                    </label>
                                    <label class="btn my-btn gym_option gym_ownner"  id="btn_gym_owner">
                                        <input type="radio" name="role_id" id="option2" value="2" autocomplete="off"> Gym Owner
                                    </label>
                                </div>
							</div>
							<fieldset id="gym_owner_account">
								<div class="form-group">
                                    <input id="gym_name" placeholder="Gym name" type="text" class="form-control @error('gym_name') is-invalid @enderror" name="gym_name" required autocomplete="gym_name">

                                    @error('gym_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-group">
                                    <input id="gym_address_1" placeholder="Gym Mailing Address" type="text" class="form-control @error('gym_address_1') is-invalid @enderror" name="gym_address_1" required autocomplete="gym_address_1">

                                    @error('gym_address_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-group">
                                    <input id="gym_address_2" placeholder="Gym Address 2" type="text" class="form-control @error('gym_address_2') is-invalid @enderror" name="gym_address_2" autocomplete="gym_address_2">

                                    @error('gym_address_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
                                        <input id="city" placeholder="City" type="text" class="form-control @error('city') is-invalid @enderror" name="city" required autocomplete="city">

                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									<div class="form-group col-md-6">
                                        <input id="state_province" placeholder="State / Province" type="text" class="form-control @error('state_province') is-invalid @enderror" name="state_province" required autocomplete="state">

                                        @error('state_province')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
                                        <select id="country" class="form-control @error('country') is-invalid @enderror selectpicker"  data-live-search="true" name="country" required >
                                            <option  data-tokens="United States" value="United States">United States</option>    
                                            <option  data-tokens="Afghanistan" value="Afghanistan">Afghanistan</option>
                                            <option  data-tokens="Åland Islands" value="Åland Islands">Åland Islands</option>
                                            <option  data-tokens="Albania" value="Albania">Albania</option>
                                            <option  data-tokens="Algeria" value="Algeria">Algeria</option>
                                            <option  data-tokens="American Samoa" value="American Samoa">American Samoa</option>
                                            <option  data-tokens="Andorra" value="Andorra">Andorra</option>
                                            <option  data-tokens="Angola" value="Angola">Angola</option>
                                            <option  data-tokens="Anguilla" value="Anguilla">Anguilla</option>
                                            <option  data-tokens="Antarctica" value="Antarctica">Antarctica</option>
                                            <option  data-tokens="Antigua and Barbuda" value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option  data-tokens="Argentina" value="Argentina">Argentina</option>
                                            <option  data-tokens="Armenia" value="Armenia">Armenia</option>
                                            <option  data-tokens="Aruba" value="Aruba">Aruba</option>
                                            <option  data-tokens="Australia" value="Australia">Australia</option>
                                            <option  data-tokens="Austria" value="Austria">Austria</option>
                                            <option  data-tokens="Azerbaijan" value="Azerbaijan">Azerbaijan</option>
                                            <option  data-tokens="Bahamas" value="Bahamas">Bahamas</option>
                                            <option  data-tokens="Bahrain" value="Bahrain">Bahrain</option>
                                            <option  data-tokens="Bangladesh" value="Bangladesh">Bangladesh</option>
                                            <option  data-tokens="Barbados" value="Barbados">Barbados</option>
                                            <option  data-tokens="Belarus" value="Belarus">Belarus</option>
                                            <option  data-tokens="Belgium" value="Belgium">Belgium</option>
                                            <option  data-tokens="Belize" value="Belize">Belize</option>
                                            <option  data-tokens="Benin" value="Benin">Benin</option>
                                            <option  data-tokens="Bermuda" value="Bermuda">Bermuda</option>
                                            <option  data-tokens="Bhutan" value="Bhutan">Bhutan</option>
                                            <option  data-tokens="Bolivia" value="Bolivia">Bolivia</option>
                                            <option  data-tokens="Bosnia and Herzegovina" value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option  data-tokens="Botswana" value="Botswana">Botswana</option>
                                            <option  data-tokens="Bouvet Island" value="Bouvet Island">Bouvet Island</option>
                                            <option  data-tokens="Brazil" value="Brazil">Brazil</option>
                                            <option  data-tokens="British Indian Ocean Territory" value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                            <option  data-tokens="Brunei Darussalam" value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option  data-tokens="Bulgaria" value="Bulgaria">Bulgaria</option>
                                            <option  data-tokens="Burkina Faso" value="Burkina Faso">Burkina Faso</option>
                                            <option  data-tokens="Burundi" value="Burundi">Burundi</option>
                                            <option  data-tokens="Cambodia" value="Cambodia">Cambodia</option>
                                            <option  data-tokens="Cameroon" value="Cameroon">Cameroon</option>
                                            <option  data-tokens="Canada" value="Canada">Canada</option>
                                            <option  data-tokens="Cape Verde" value="Cape Verde">Cape Verde</option>
                                            <option  data-tokens="Cayman Islands" value="Cayman Islands">Cayman Islands</option>
                                            <option  data-tokens="Central African Republic" value="Central African Republic">Central African Republic</option>
                                            <option  data-tokens="Chad" value="Chad">Chad</option>
                                            <option  data-tokens="Chile" value="Chile">Chile</option>
                                            <option  data-tokens="China" value="China">China</option>
                                            <option  data-tokens="Christmas Island" value="Christmas Island">Christmas Island</option>
                                            <option  data-tokens="Cocos (Keeling) Islands" value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                            <option  data-tokens="Colombia" value="Colombia">Colombia</option>
                                            <option  data-tokens="Comoros" value="Comoros">Comoros</option>
                                            <option  data-tokens="Congo" value="Congo">Congo</option>
                                            <option  data-tokens="Congo, The Democratic Republic of The" value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                            <option  data-tokens="Cook Islands" value="Cook Islands">Cook Islands</option>
                                            <option  data-tokens="Costa Rica" value="Costa Rica">Costa Rica</option>
                                            <option  data-tokens="Cote D'ivoire" value="Cote D'ivoire">Cote D'ivoire</option>
                                            <option  data-tokens="Croatia" value="Croatia">Croatia</option>
                                            <option  data-tokens="Cuba" value="Cuba">Cuba</option>
                                            <option  data-tokens="Cyprus" value="Cyprus">Cyprus</option>
                                            <option  data-tokens="Czech Republic" value="Czech Republic">Czech Republic</option>
                                            <option  data-tokens="Denmark" value="Denmark">Denmark</option>
                                            <option  data-tokens="Djibouti" value="Djibouti">Djibouti</option>
                                            <option  data-tokens="Dominica" value="Dominica">Dominica</option>
                                            <option  data-tokens="Dominican Republic" value="Dominican Republic">Dominican Republic</option>
                                            <option  data-tokens="Ecuador" value="Ecuador">Ecuador</option>
                                            <option  data-tokens="Egypt" value="Egypt">Egypt</option>
                                            <option  data-tokens="El Salvador" value="El Salvador">El Salvador</option>
                                            <option  data-tokens="Equatorial Guinea" value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option  data-tokens="Eritrea" value="Eritrea">Eritrea</option>
                                            <option  data-tokens="Estonia" value="Estonia">Estonia</option>
                                            <option  data-tokens="Ethiopia" value="Ethiopia">Ethiopia</option>
                                            <option  data-tokens="Falkland Islands (Malvinas)" value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                            <option  data-tokens="Faroe Islands" value="Faroe Islands">Faroe Islands</option>
                                            <option  data-tokens="Fiji" value="Fiji">Fiji</option>
                                            <option  data-tokens="Finland" value="Finland">Finland</option>
                                            <option  data-tokens="France" value="France">France</option>
                                            <option  data-tokens="French Guiana" value="French Guiana">French Guiana</option>
                                            <option  data-tokens="French Polynesia" value="French Polynesia">French Polynesia</option>
                                            <option  data-tokens="French Southern Territories" value="French Southern Territories">French Southern Territories</option>
                                            <option  data-tokens="Gabon" value="Gabon">Gabon</option>
                                            <option  data-tokens="Gambia" value="Gambia">Gambia</option>
                                            <option  data-tokens="Georgia" value="Georgia">Georgia</option>
                                            <option  data-tokens="Germany" value="Germany">Germany</option>
                                            <option  data-tokens="Ghana" value="Ghana">Ghana</option>
                                            <option  data-tokens="Gibraltar" value="Gibraltar">Gibraltar</option>
                                            <option  data-tokens="Greece" value="Greece">Greece</option>
                                            <option  data-tokens="Greenland" value="Greenland">Greenland</option>
                                            <option  data-tokens="Grenada" value="Grenada">Grenada</option>
                                            <option  data-tokens="Guadeloupe" value="Guadeloupe">Guadeloupe</option>
                                            <option  data-tokens="Guam" value="Guam">Guam</option>
                                            <option  data-tokens="Guatemala" value="Guatemala">Guatemala</option>
                                            <option  data-tokens="Guernsey" value="Guernsey">Guernsey</option>
                                            <option  data-tokens="Guinea" value="Guinea">Guinea</option>
                                            <option  data-tokens="Guinea-bissau" value="Guinea-bissau">Guinea-bissau</option>
                                            <option  data-tokens="Guyana" value="Guyana">Guyana</option>
                                            <option  data-tokens="Haiti" value="Haiti">Haiti</option>
                                            <option  data-tokens="Heard Island and Mcdonald Islands" value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                            <option  data-tokens="Holy See (Vatican City State)" value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                            <option  data-tokens="Honduras" value="Honduras">Honduras</option>
                                            <option  data-tokens="Hong Kong" value="Hong Kong">Hong Kong</option>
                                            <option  data-tokens="Hungary" value="Hungary">Hungary</option>
                                            <option  data-tokens="Iceland" value="Iceland">Iceland</option>
                                            <option  data-tokens="India" value="India">India</option>
                                            <option  data-tokens="Indonesia" value="Indonesia">Indonesia</option>
                                            <option  data-tokens="Iran, Islamic Republic of" value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                            <option  data-tokens="Iraq" value="Iraq">Iraq</option>
                                            <option  data-tokens="Ireland" value="Ireland">Ireland</option>
                                            <option  data-tokens="Isle of Man" value="Isle of Man">Isle of Man</option>
                                            <option  data-tokens="Israel" value="Israel">Israel</option>
                                            <option  data-tokens="Italy" value="Italy">Italy</option>
                                            <option  data-tokens="Jamaica" value="Jamaica">Jamaica</option>
                                            <option  data-tokens="Japan" value="Japan">Japan</option>
                                            <option  data-tokens="Jersey" value="Jersey">Jersey</option>
                                            <option  data-tokens="Jordan" value="Jordan">Jordan</option>
                                            <option  data-tokens="Kazakhstan" value="Kazakhstan">Kazakhstan</option>
                                            <option  data-tokens="Kenya" value="Kenya">Kenya</option>
                                            <option  data-tokens="Kiribati" value="Kiribati">Kiribati</option>
                                            <option  data-tokens="Korea, Democratic People's Republic of" value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                            <option  data-tokens="Korea, Republic of" value="Korea, Republic of">Korea, Republic of</option>
                                            <option  data-tokens="Kuwait" value="Kuwait">Kuwait</option>
                                            <option  data-tokens="Kyrgyzstan" value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option  data-tokens="Lao People's Democratic Republic" value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                            <option  data-tokens="Latvia" value="Latvia">Latvia</option>
                                            <option  data-tokens="Lebanon" value="Lebanon">Lebanon</option>
                                            <option  data-tokens="Lesotho" value="Lesotho">Lesotho</option>
                                            <option  data-tokens="Liberia" value="Liberia">Liberia</option>
                                            <option  data-tokens="Libyan Arab Jamahiriya" value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                            <option  data-tokens="Liechtenstein" value="Liechtenstein">Liechtenstein</option>
                                            <option  data-tokens="Lithuania" value="Lithuania">Lithuania</option>
                                            <option  data-tokens="Luxembourg" value="Luxembourg">Luxembourg</option>
                                            <option  data-tokens="Macao" value="Macao">Macao</option>
                                            <option  data-tokens="Macedonia, The Former Yugoslav Republic of" value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                            <option  data-tokens="Madagascar" value="Madagascar">Madagascar</option>
                                            <option  data-tokens="Malawi" value="Malawi">Malawi</option>
                                            <option  data-tokens="Malaysia" value="Malaysia">Malaysia</option>
                                            <option  data-tokens="Maldives" value="Maldives">Maldives</option>
                                            <option  data-tokens="Mali" value="Mali">Mali</option>
                                            <option  data-tokens="Malta" value="Malta">Malta</option>
                                            <option  data-tokens="Marshall Islands" value="Marshall Islands">Marshall Islands</option>
                                            <option  data-tokens="Martinique" value="Martinique">Martinique</option>
                                            <option  data-tokens="Mauritania" value="Mauritania">Mauritania</option>
                                            <option  data-tokens="Mauritius" value="Mauritius">Mauritius</option>
                                            <option  data-tokens="Mayotte" value="Mayotte">Mayotte</option>
                                            <option  data-tokens="Mexico" value="Mexico">Mexico</option>
                                            <option  data-tokens="Micronesia, Federated States of" value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                            <option  data-tokens="Moldova, Republic of" value="Moldova, Republic of">Moldova, Republic of</option>
                                            <option  data-tokens="Monaco" value="Monaco">Monaco</option>
                                            <option  data-tokens="Mongolia" value="Mongolia">Mongolia</option>
                                            <option  data-tokens="Montenegro" value="Montenegro">Montenegro</option>
                                            <option  data-tokens="Montserrat" value="Montserrat">Montserrat</option>
                                            <option  data-tokens="Morocco" value="Morocco">Morocco</option>
                                            <option  data-tokens="Mozambique" value="Mozambique">Mozambique</option>
                                            <option  data-tokens="Myanmar" value="Myanmar">Myanmar</option>
                                            <option  data-tokens="Namibia" value="Namibia">Namibia</option>
                                            <option  data-tokens="Nauru" value="Nauru">Nauru</option>
                                            <option  data-tokens="Nepal" value="Nepal">Nepal</option>
                                            <option  data-tokens="Netherlands" value="Netherlands">Netherlands</option>
                                            <option  data-tokens="Netherlands Antilles" value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option  data-tokens="New Caledonia" value="New Caledonia">New Caledonia</option>
                                            <option  data-tokens="New Zealand" value="New Zealand">New Zealand</option>
                                            <option  data-tokens="Nicaragua" value="Nicaragua">Nicaragua</option>
                                            <option  data-tokens="Niger" value="Niger">Niger</option>
                                            <option  data-tokens="Nigeria" value="Nigeria">Nigeria</option>
                                            <option  data-tokens="Niue" value="Niue">Niue</option>
                                            <option  data-tokens="Norfolk Island" value="Norfolk Island">Norfolk Island</option>
                                            <option  data-tokens="Northern Mariana Islands" value="Northern Mariana Islands">Northern Mariana Islands</option>
                                            <option  data-tokens="Norway" value="Norway">Norway</option>
                                            <option  data-tokens="Oman" value="Oman">Oman</option>
                                            <option  data-tokens="Pakistan" value="Pakistan">Pakistan</option>
                                            <option  data-tokens="Palau" value="Palau">Palau</option>
                                            <option  data-tokens="Palestinian" value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                            <option  data-tokens="Panama" value="Panama">Panama</option>
                                            <option  data-tokens="Papua New Guinea" value="Papua New Guinea">Papua New Guinea</option>
                                            <option  data-tokens="Paraguay" value="Paraguay">Paraguay</option>
                                            <option  data-tokens="Peru" value="Peru">Peru</option>
                                            <option  data-tokens="Philippines" value="Philippines">Philippines</option>
                                            <option  data-tokens="Pitcairn" value="Pitcairn">Pitcairn</option>
                                            <option  data-tokens="Poland" value="Poland">Poland</option>
                                            <option  data-tokens="Portugal" value="Portugal">Portugal</option>
                                            <option  data-tokens="Puerto Rico" value="Puerto Rico">Puerto Rico</option>
                                            <option  data-tokens="Qatar" value="Qatar">Qatar</option>
                                            <option  data-tokens="Reunion" value="Reunion">Reunion</option>
                                            <option  data-tokens="Romania" value="Romania">Romania</option>
                                            <option  data-tokens="Russian" value="Russian Federation">Russian Federation</option>
                                            <option  data-tokens="Rwanda" value="Rwanda">Rwanda</option>
                                            <option  data-tokens="Saint Helena" value="Saint Helena">Saint Helena</option>
                                            <option  data-tokens="Saint Kitts and Nevis" value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option  data-tokens="Saint Lucia" value="Saint Lucia">Saint Lucia</option>
                                            <option  data-tokens="Saint Pierre and Miquelon" value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                            <option  data-tokens="Saint Vincent and The Grenadines" value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                            <option  data-tokens="Samoa" value="Samoa">Samoa</option>
                                            <option  data-tokens="San Marino" value="San Marino">San Marino</option>
                                            <option  data-tokens="Sao Tome and Principe" value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option  data-tokens="Saudi Arabia" value="Saudi Arabia">Saudi Arabia</option>
                                            <option  data-tokens="Senegal" value="Senegal">Senegal</option>
                                            <option  data-tokens="Serbia" value="Serbia">Serbia</option>
                                            <option  data-tokens="Seychelles" value="Seychelles">Seychelles</option>
                                            <option  data-tokens="Sierra Leone" value="Sierra Leone">Sierra Leone</option>
                                            <option  data-tokens="Singapore" value="Singapore">Singapore</option>
                                            <option  data-tokens="Slovakia" value="Slovakia">Slovakia</option>
                                            <option  data-tokens="Slovenia" value="Slovenia">Slovenia</option>
                                            <option  data-tokens="Solomon Islands" value="Solomon Islands">Solomon Islands</option>
                                            <option  data-tokens="Somalia" value="Somalia">Somalia</option>
                                            <option  data-tokens="South Africa" value="South Africa">South Africa</option>
                                            <option  data-tokens="South Georgia and The South Sandwich Islands" value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                            <option  data-tokens="Spain" value="Spain">Spain</option>
                                            <option  data-tokens="Sri Lanka" value="Sri Lanka">Sri Lanka</option>
                                            <option  data-tokens="Sudan" value="Sudan">Sudan</option>
                                            <option  data-tokens="Suriname" value="Suriname">Suriname</option>
                                            <option  data-tokens="Svalbard and Jan Mayen" value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                            <option  data-tokens="Swaziland" value="Swaziland">Swaziland</option>
                                            <option  data-tokens="Sweden" value="Sweden">Sweden</option>
                                            <option  data-tokens="Switzerland" value="Switzerland">Switzerland</option>
                                            <option  data-tokens="Syrian Arab Republic" value="Syrian Arab Republic">Syrian Arab Republic</option>
                                            <option  data-tokens="Taiwan" value="Taiwan, Province of China">Taiwan, Province of China</option>
                                            <option  data-tokens="Tajikistan" value="Tajikistan">Tajikistan</option>
                                            <option  data-tokens="Tanzania" value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                            <option  data-tokens="Thailand" value="Thailand">Thailand</option>
                                            <option  data-tokens="Timor-leste" value="Timor-leste">Timor-leste</option>
                                            <option  data-tokens="Togo" value="Togo">Togo</option>
                                            <option  data-tokens="Tokelau" value="Tokelau">Tokelau</option>
                                            <option  data-tokens="Tonga" value="Tonga">Tonga</option>
                                            <option  data-tokens="Trinidad" value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option  data-tokens="Tunisia" value="Tunisia">Tunisia</option>
                                            <option  data-tokens="Turkey" value="Turkey">Turkey</option>
                                            <option  data-tokens="Turkmenistan" value="Turkmenistan">Turkmenistan</option>
                                            <option  data-tokens="Turks" value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                            <option  data-tokens="Tuvalu" value="Tuvalu">Tuvalu</option>
                                            <option  data-tokens="Uganda" value="Uganda">Uganda</option>
                                            <option  data-tokens="Ukraine" value="Ukraine">Ukraine</option>
                                            <option  data-tokens="United Arab Emirates" value="United Arab Emirates">United Arab Emirates</option>
                                            <option  data-tokens="United Kingdom" value="United Kingdom">United Kingdom</option>
                                            <option  data-tokens="United States Minor Outlying Islands" value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                            <option  data-tokens="Uruguay" value="Uruguay">Uruguay</option>
                                            <option  data-tokens="Uzbekistan" value="Uzbekistan">Uzbekistan</option>
                                            <option  data-tokens="Vanuatu" value="Vanuatu">Vanuatu</option>
                                            <option  data-tokens="Venezuela" value="Venezuela">Venezuela</option>
                                            <option  data-tokens="Viet Nam" value="Viet Nam">Viet Nam</option>
                                            <option  data-tokens="Virgin Islands, British" value="Virgin Islands, British">Virgin Islands, British</option>
                                            <option  data-tokens="Virgin Islands, U.S." value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                            <option  data-tokens="Wallis and Futuna" value="Wallis and Futuna">Wallis and Futuna</option>
                                            <option  data-tokens="Western Sahara" value="Western Sahara">Western Sahara</option>
                                            <option  data-tokens="Yemen" value="Yemen">Yemen</option>
                                            <option  data-tokens="Zambia" value="Zambia">Zambia</option>
                                            <option  data-tokens="Zimbabwe" value="Zimbabwe">Zimbabwe</option>
                                        </select>

                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									<div class="form-group col-md-6">
                                        <input id="zip_code" placeholder="ZIP / Postal Code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" required autocomplete="zip code">

                                        @error('zip_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
								</div>
								<div class="form-group">
                                    <input id="website" placeholder="Website eg: www.gymname.com" type="text" class="form-control @error('website') is-invalid @enderror" name="website" autocomplete="website">

                                    @error('website')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
							</fieldset>
							<div class="form-group">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customCheck1" required>
									<label class="custom-control-label" for="customCheck1">Sponsors help pay our server costs. I agree to receive a monthly email from our sponsors to use this site for free. if I unsubscribe, then my account will be suspended.</label>
								</div>
							</div>
                            <button type="submit" class="btn my-btn btn-block">
                                    {{ __('Register') }}
                                </button>
						</form>
						<div class="login-register-bottom">
							<hr>
							<p>Already have an account? <a href="{{ route('login') }}">Log in</a></p>
						</div>
					</div>
				</div>

			</div><!-- //.row -->

		</div><!-- //.container -->
	</section><!-- //Section Register End -->
<script>
// jQuery(document).ready(function($){
//     var gym = false;
//     var gym_content = $('.gym-user-fields').html();
//     $('.gym-user-fields').html('');
//     $('.gym_option').click(function(){
//         if($('.gym_ownner').hasClass('active')){
//             $('.gym-user-fields').html(gym_content);
//         }else{
//             $('.gym-user-fields').html('');
//         }
//     });
// })
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
@endsection
