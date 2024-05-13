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
                    <div class="card-header bg-success text-white">
                        <h3><i class="fa fa-question-circle"></i> <strong>Customer Satisfaction Survey</strong></h3>
                        <p><b>Provide us with your feedback by answering these few questions below</b></p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('submitfeedback') }}" method="post">
                            {{csrf_field()}}
                            
                            <div class="form-row mb-2">
                                <div class="form-group col">
                                    <h5>Full Name</h5>
                                    <input type="text" class="form-control" name="name" style="border:none; border-bottom:1px solid #ccc; border-radius:0; padding:0;" placeholder="Your answer" required>
                                </div>
                                <div class="form-group col">
                                    <h5>Address</h5>
                                    <input type="text" class="form-control" name="address" style="border:none; border-bottom:1px solid #ccc; border-radius:0; padding:0;" placeholder="Your answer" required>
                                </div>
                            </div>
                            
                            <div class="form-row mb-2">
                                <div class="form-group col">
                                    <h5>Phone No.</h5>
                                    <input type="tel" class="form-control" name="phone" style="border:none; border-bottom:1px solid #ccc; border-radius:0; padding:0;" placeholder="Your answer" required>
                                </div>
                                <div class="form-group col">
                                    <h5>Date</h5>
                                    <input type="date" class="form-control" name="date" style="border:none; border-bottom:1px solid #ccc; border-radius:0; padding:0;" required>
                                </div>
                            </div>
                            
                            <div class="form-group mb-3">
                                <h5>Service Offered</h5>
                                <input type="text" class="form-control" name="service_offered" style="border:none; border-bottom:1px solid #ccc; border-radius:0; padding:0;" placeholder="Your answer" required>
                            </div>

                            <div class="mb-3">
                                <h5>What is your overall level of satisfaction with our laboratory services?</h5>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="very_pleased" required>
                                    <label class="form-check-label" for="very_pleased"> Very pleased</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="pleased" required>
                                    <label class="form-check-label" for="pleased"> Pleased</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="adequate" required>
                                    <label class="form-check-label" for="adequate"> Adequate</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="dissatisfied" required>
                                    <label class="form-check-label" for="dissatisfied"> Dissatisfied</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="satisfaction_level" name="satisfaction_level" value="strongly_dissatisfied" required>
                                    <label class="form-check-label" for="strongly_dissatisfied"> Strongly dissatisfied</label><br>
                                </div>
                            </div>

                            <div class="mb-3">
                                <h5>Will you use our services again?</h5>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="services_again" name="services_again" value="yes" required>
                                    <label class="form-check-label" for="yes"> Yes</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="services_again" name="services_again" value="maybe" required>
                                    <label class="form-check-label" for="maybe"> Maybe</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="services_again" name="services_again" value="no" required>
                                    <label class="form-check-label" for="no"> No</label><br>
                                </div>
                            </div>

                            <div class="mb-3">
                                <h5>Did you receive value for the fees charged?</h5>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="value_for_fee" name="value_for_fee" value="yes" required>
                                    <label class="form-check-label" for="yes"> Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="value_for_fee" name="value_for_fee" value="maybe" required>
                                    <label class="form-check-label" for="maybe"> Maybe</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="value_for_fee" name="value_for_fee" value="no" required>
                                    <label class="form-check-label" for="no"> No</label><br>
                                </div>
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
                                            <td class="text-center"><input type="radio" value="strongly_agree" name="prices_quotes" required/></td>
                                            <td class="text-center"><input type="radio" value="agree" name="prices_quotes" required/></td>
                                            <td class="text-center"><input type="radio" value="neutral" name="prices_quotes" required/></td>
                                            <td class="text-center"><input type="radio" value="disagree" name="prices_quotes" required/></td>
                                            <td class="text-center"><input type="radio" value="strongly_disagree" name="prices_quotes" required/></td>
                                        </tr>
                                        <tr>
                                            <td>Employees respond in a timely manner</td>
                                            <td class="text-center"><input type="radio" value="strongly_agree" name="employee_response" required/></td>
                                            <td class="text-center"><input type="radio" value="agree" name="employee_response" required/></td>
                                            <td class="text-center"><input type="radio" value="neutral" name="employee_response" required/></td>
                                            <td class="text-center"><input type="radio" value="disagree" name="employee_response" required/></td>
                                            <td class="text-center"><input type="radio" value="strongly_disagree" name="employee_response" required/></td>
                                        </tr>
                                        <tr>
                                            <td>Submitting samples is easy and convenient</td>
                                            <td class="text-center"><input type="radio" value="strongly_agree" name="samples_easy" required/></td>
                                            <td class="text-center"><input type="radio" value="agree" name="samples_easy" required/></td>
                                            <td class="text-center"><input type="radio" value="neutral" name="samples_easy" required/></td>
                                            <td class="text-center"><input type="radio" value="disagree" name="samples_easy" required/></td>
                                            <td class="text-center"><input type="radio" value="strongly_disagree" name="samples_easy" required/></td>
                                        </tr>
                                        <tr>
                                            <td>Agreed turnaround time is met</td>
                                            <td class="text-center"><input type="radio" value="strongly_agree" name="turnaround_time" required/></td>
                                            <td class="text-center"><input type="radio" value="agree" name="turnaround_time" required/></td>
                                            <td class="text-center"><input type="radio" value="neutral" name="turnaround_time" required/></td>
                                            <td class="text-center"><input type="radio" value="disagree" name="turnaround_time" required/></td>
                                            <td class="text-center"><input type="radio" value="strongly_disagree" name="turnaround_time" required/></td>
                                        </tr>
                                        <tr>
                                            <td>Report delivery meets my needs</td>
                                            <td class="text-center"><input type="radio" value="strongly_agree" name="delivery_my_needs" required/></td>
                                            <td class="text-center"><input type="radio" value="agree" name="delivery_my_needs" required/></td>
                                            <td class="text-center"><input type="radio" value="neutral" name="delivery_my_needs" required/></td>
                                            <td class="text-center"><input type="radio" value="disagree" name="delivery_my_needs" required/></td>
                                            <td class="text-center"><input type="radio" value="strongly_disagree" name="delivery_my_needs" required/></td>
                                        </tr>
                                        <tr>
                                            <td>Reports are easy to understand</td>
                                            <td class="text-center"><input type="radio" value="strongly_agree" name="reports_easy" required/></td>
                                            <td class="text-center"><input type="radio" value="agree" name="reports_easy" required/></td>
                                            <td class="text-center"><input type="radio" value="neutral" name="reports_easy" required/></td>
                                            <td class="text-center"><input type="radio" value="disagree" name="reports_easy" required/></td>
                                            <td class="text-center"><input type="radio" value="strongly_disagree" name="reports_easy" required/></td>
                                        </tr>
                                        <tr>
                                            <td>Payment procedures are easy and convenient</td>
                                            <td class="text-center"><input type="radio" value="strongly_agree" name="payments_easy" required/></td>
                                            <td class="text-center"><input type="radio" value="agree" name="payments_easy" required/></td>
                                            <td class="text-center"><input type="radio" value="neutral" name="payments_easy" required/></td>
                                            <td class="text-center"><input type="radio" value="disagree" name="payments_easy" required/></td>
                                            <td class="text-center"><input type="radio" value="strongly_disagree" name="payments_easy" required/></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="form-group mb-3">
                                <h5>Please share other comments or expand on previous responses here: </h5>
                                <textarea rows="5" class="form-control" name="previous_response" style="border-radius:0;" required></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <h5>Please share your feedback/suggestions to help us serve you better.</h5>
                                <textarea rows="5" class="form-control" name="help_feedback" style="border-radius:0;" required></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <h5>Share your complaints if any.</h5>
                                <textarea rows="5" class="form-control" name="complaint" style="border-radius:0;" required></textarea>
                            </div>

                            <div class="btn-block text-center">
                                <button type="submit" class="btn-success btn-lg" style="border-radius:0;">Send Feedback</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
@endsection