@extends('layouts.other')

@section('content')
      <div class="container">
        <div class="row">
            <div class="col">
                @include('layouts.alerts')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fa fa-list-ol"></i> <strong>Survey Results</strong></h3>
                        <p>
                            <b><a href="{{ route('allfeedback') }}">
                                AllFeedback</a></b> <i class="fa fa-chevron-right fa-sm"></i>
                            <b>Client feedback from: <i>{{ $feedback->name }}</i></b>
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h5>What is your overall level of satisfaction with our laboratory services?</h5>
                            @if ($feedback->satisfaction_level === 1)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="very_pleased" checked>
                                    <label class="form-check-label" for="very_pleased"> Very pleased</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="pleased" disabled>
                                    <label class="form-check-label" for="pleased"> Pleased</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="adequate" disabled>
                                    <label class="form-check-label" for="adequate"> Adequate</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="dissatisfied" disabled>
                                    <label class="form-check-label" for="dissatisfied"> Dissatisfied</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="strongly_dissatisfied" disabled>
                                    <label class="form-check-label" for="strongly_dissatisfied"> Strongly dissatisfied</label><br>
                                </div>
                            @elseif ($feedback->satisfaction_level === 2)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="very_pleased" disabled>
                                    <label class="form-check-label" for="very_pleased"> Very pleased</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="pleased" checked>
                                    <label class="form-check-label" for="pleased"> Pleased</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="adequate" disabled>
                                    <label class="form-check-label" for="adequate"> Adequate</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="dissatisfied" disabled>
                                    <label class="form-check-label" for="dissatisfied"> Dissatisfied</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="strongly_dissatisfied" disabled>
                                    <label class="form-check-label" for="strongly_dissatisfied"> Strongly dissatisfied</label><br>
                                </div>
                            @elseif ($feedback->satisfaction_level === 3)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="very_pleased" disabled>
                                    <label class="form-check-label" for="very_pleased"> Very pleased</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="pleased" disabled>
                                    <label class="form-check-label" for="pleased"> Pleased</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="adequate" checked>
                                    <label class="form-check-label" for="adequate"> Adequate</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="dissatisfied" disabled>
                                    <label class="form-check-label" for="dissatisfied"> Dissatisfied</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="strongly_dissatisfied" disabled>
                                    <label class="form-check-label" for="strongly_dissatisfied"> Strongly dissatisfied</label><br>
                                </div>
                            @elseif ($feedback->satisfaction_level === 4)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="very_pleased" disabled>
                                    <label class="form-check-label" for="very_pleased"> Very pleased</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="pleased" disabled>
                                    <label class="form-check-label" for="pleased"> Pleased</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="adequate" disabled>
                                    <label class="form-check-label" for="adequate"> Adequate</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="dissatisfied" checked>
                                    <label class="form-check-label" for="dissatisfied"> Dissatisfied</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="strongly_dissatisfied" disabled>
                                    <label class="form-check-label" for="strongly_dissatisfied"> Strongly dissatisfied</label><br>
                                </div>
                            @else
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="very_pleased" disabled>
                                    <label class="form-check-label" for="very_pleased"> Very pleased</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="pleased" disabled>
                                    <label class="form-check-label" for="pleased"> Pleased</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="adequate" disabled>
                                    <label class="form-check-label" for="adequate"> Adequate</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="dissatisfied" disabled>
                                    <label class="form-check-label" for="dissatisfied"> Dissatisfied</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="strongly_dissatisfied" checked>
                                    <label class="form-check-label" for="strongly_dissatisfied"> Strongly dissatisfied</label><br>
                                </div>
                            @endif
                            
                        </div>

                        <div class="mb-3">
                            <h5>Will you use our services again?</h5>
                            @if ($feedback->services_again === 1)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="services_again" name="services_again" value="yes" checked>
                                    <label class="form-check-label" for="yes"> Yes</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="services_again" name="services_again" value="maybe" disabled>
                                    <label class="form-check-label" for="maybe"> Maybe</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="services_again" name="services_again" value="no" disabled>
                                    <label class="form-check-label" for="no"> No</label><br>
                                </div>
                            @elseif ($feedback->services_again === 2)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="services_again" name="services_again" value="yes" disabled>
                                    <label class="form-check-label" for="yes"> Yes</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="services_again" name="services_again" value="maybe" checked>
                                    <label class="form-check-label" for="maybe"> Maybe</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="services_again" name="services_again" value="no" disabled>
                                    <label class="form-check-label" for="no"> No</label><br>
                                </div>
                            @else
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="services_again" name="services_again" value="yes" disabled>
                                    <label class="form-check-label" for="yes"> Yes</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="services_again" name="services_again" value="maybe" disabled>
                                    <label class="form-check-label" for="maybe"> Maybe</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="services_again" name="services_again" value="no" checked>
                                    <label class="form-check-label" for="no"> No</label><br>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <h5>Did you receive value for the fees charged?</h5>
                            @if ($feedback->value_for_fee === 1)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="value_for_fee" name="value_for_fee" value="yes" checked>
                                    <label class="form-check-label" for="yes"> Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="value_for_fee" name="value_for_fee" value="maybe" disabled>
                                    <label class="form-check-label" for="maybe"> Maybe</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="value_for_fee" name="value_for_fee" value="no" disabled>
                                    <label class="form-check-label" for="no"> No</label><br>
                                </div>
                            @elseif ($feedback->value_for_fee === 2)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="value_for_fee" name="value_for_fee" value="yes" disabled>
                                    <label class="form-check-label" for="yes"> Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="value_for_fee" name="value_for_fee" value="maybe" checked>
                                    <label class="form-check-label" for="maybe"> Maybe</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="value_for_fee" name="value_for_fee" value="no" disabled>
                                    <label class="form-check-label" for="no"> No</label><br>
                                </div>
                            @else
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="value_for_fee" name="value_for_fee" value="yes" disabled>
                                    <label class="form-check-label" for="yes"> Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="value_for_fee" name="value_for_fee" value="maybe" disabled>
                                    <label class="form-check-label" for="maybe"> Maybe</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="value_for_fee" name="value_for_fee" value="no" checked>
                                    <label class="form-check-label" for="no"> No</label><br>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <h5><strong>Instructions:</strong> Please indicate your level of agreement with the statements listed below</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th></th>
                                        <th class="text-center">Strongly Agree</th>
                                        <th class="text-center">Agree</th>
                                        <th class="text-center">Neutral</th>
                                        <th class="text-center">Disagree</th>
                                        <th class="text-center">Strongly Disagree</th>
                                    </tr>
                                    <tr>
                                        <td>Obtaining prices and quotes is easy</td>
                                        @if ($feedback->prices_quotes === 1)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="prices_quotes" checked/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="prices_quotes" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="prices_quotes" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="prices_quotes" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="prices_quotes" disabled/></td>
                                        @elseif ($feedback->prices_quotes === 2)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="prices_quotes" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="prices_quotes" checked/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="prices_quotes" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="prices_quotes" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="prices_quotes" disabled/></td>
                                        @elseif ($feedback->prices_quotes === 3)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="prices_quotes" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="prices_quotes" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="prices_quotes" checked/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="prices_quotes" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="prices_quotes" disabled/></td>
                                        @elseif ($feedback->prices_quotes === 4)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="prices_quotes" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="prices_quotes" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="prices_quotes" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="prices_quotes" checked/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="prices_quotes" disabled/></td>
                                        @else
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="prices_quotes" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="prices_quotes" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="prices_quotes" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="prices_quotes" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="prices_quotes" checked/></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Employees respond in a timely manner</td>
                                        @if ($feedback->employee_response === 1)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="employee_response" checked/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="employee_response" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="employee_response" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="employee_response" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="employee_response" disabled/></td>
                                        @elseif ($feedback->employee_response === 2)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="employee_response" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="employee_response" checked/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="employee_response" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="employee_response" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="employee_response" disabled/></td>
                                        @elseif ($feedback->employee_response === 3)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="employee_response" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="employee_response" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="employee_response" checked/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="employee_response" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="employee_response" disabled/></td>
                                        @elseif ($feedback->employee_response === 4)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="employee_response" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="employee_response" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="employee_response" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="employee_response" checked/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="employee_response" disabled/></td>
                                        @else
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="employee_response" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="employee_response" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="employee_response" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="employee_response" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="employee_response" checked/></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Submitting samples is easy and convenient</td>
                                        @if ($feedback->samples_easy === 1)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="samples_easy" checked/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="samples_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="samples_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="samples_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="samples_easy"disabled /></td>
                                        @elseif ($feedback->samples_easy === 2)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="samples_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="samples_easy" checked/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="samples_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="samples_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="samples_easy" disabled/></td>
                                        @elseif ($feedback->samples_easy === 3)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="samples_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="samples_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="samples_easy" checked/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="samples_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="samples_easy" disabled/></td>
                                        @elseif ($feedback->samples_easy === 4)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="samples_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="samples_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="samples_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="samples_easy" checked/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="samples_easy" disabled/></td>
                                        @else
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="samples_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="samples_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="samples_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="samples_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="samples_easy" checked/></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Agreed turnaround time is met</td>
                                        @if ($feedback->turnaround_time === 1)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="turnaround_time" checked/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="turnaround_time" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="turnaround_time" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="turnaround_time" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="turnaround_time" disabled/></td>
                                        @elseif ($feedback->turnaround_time === 2)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="turnaround_time" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="turnaround_time" checked/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="turnaround_time" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="turnaround_time" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="turnaround_time" disabled/></td>
                                        @elseif ($feedback->turnaround_time === 3)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="turnaround_time" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="turnaround_time" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="turnaround_time" checked/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="turnaround_time" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="turnaround_time" disabled/></td>
                                        @elseif ($feedback->turnaround_time === 4)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="turnaround_time" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="turnaround_time" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="turnaround_time" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="turnaround_time" checked/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="turnaround_time" disabled/></td>
                                        @else
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="turnaround_time" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="turnaround_time" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="turnaround_time" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="turnaround_time" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="turnaround_time" checked/></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Report delivery meets my needs</td>
                                        @if ($feedback->delivery_my_needs === 1)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="delivery_my_needs" checked/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="delivery_my_needs" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="delivery_my_needs" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="delivery_my_needs" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="delivery_my_needs" disabled/></td>
                                        @elseif ($feedback->delivery_my_needs === 2)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="delivery_my_needs" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="delivery_my_needs" checked/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="delivery_my_needs" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="delivery_my_needs" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="delivery_my_needs" disabled/></td>
                                        @elseif ($feedback->delivery_my_needs === 3)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="delivery_my_needs" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="delivery_my_needs" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="delivery_my_needs" checked/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="delivery_my_needs" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="delivery_my_needs" disabled/></td>
                                        @elseif ($feedback->delivery_my_needs === 4)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="delivery_my_needs" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="delivery_my_needs" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="delivery_my_needs" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="delivery_my_needs" checked/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="delivery_my_needs" disabled/></td>
                                        @else
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="delivery_my_needs" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="delivery_my_needs" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="delivery_my_needs" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="delivery_my_needs" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="delivery_my_needs" checked/></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Reports are easy to understand</td>
                                        @if ($feedback->reports_easy === 1)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="reports_easy" checked/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="reports_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="reports_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="reports_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="reports_easy" disabled/></td>
                                        @elseif ($feedback->reports_easy === 2)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="reports_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="reports_easy" checked/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="reports_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="reports_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="reports_easy" disabled/></td>
                                        @elseif ($feedback->reports_easy === 3)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="reports_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="reports_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="reports_easy" checked/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="reports_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="reports_easy" disabled/></td>
                                        @elseif ($feedback->reports_easy === 4)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="reports_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="reports_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="reports_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="reports_easy" checked/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="reports_easy" disabled/></td>
                                        @else
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="reports_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="reports_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="reports_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="reports_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="reports_easy" checked/></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Payment procedures are easy and convenient</td>
                                        @if ($feedback->payments_easy === 1)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="payments_easy" checked/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="payments_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="payments_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="payments_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="payments_easy" disabled/></td>
                                        @elseif ($feedback->payments_easy === 2)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="payments_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="payments_easy" checked/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="payments_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="payments_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="payments_easy" disabled/></td>
                                        @elseif ($feedback->payments_easy === 3)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="payments_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="payments_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="payments_easy" checked/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="payments_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="payments_easy" disabled/></td>
                                        @elseif ($feedback->payments_easy === 4)
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="payments_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="payments_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="payments_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="payments_easy" checked/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="payments_easy" disabled/></td>
                                        @else
                                        <td class="text-center"><input type="radio" value="strongly_agree" name="payments_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="agree" name="payments_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="neutral" name="payments_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="disagree" name="payments_easy" disabled/></td>
                                        <td class="text-center"><input type="radio" value="strongly_disagree" name="payments_easy" checked/></td>
                                        @endif
                                    </tr>
                                </table>
                            </div>
                        </div>
                            
                        <div class="form-group mb-3">
                            <h5>Please share other comments or expand on previous responses here: </h5>
                            <textarea rows="5" class="form-control" name="previous_response" style="border-radius:0;" disabled>{{ $feedback->previous_response }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <h5>Please share your feedback/suggestions to help us serve you better.</h5>
                            <textarea rows="5" class="form-control" name="help_feedback" style="border-radius:0;" disabled>{{ $feedback->help_feedback }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <h5>Share your complaints if any.</h5>
                            <textarea rows="5" class="form-control" name="complaint" style="border-radius:0;" disabled>{{ $feedback->complaint }}</textarea>
                        </div>                      
                    </div>
                </div>
            </div>
        </div>
      </div>
@endsection