@extends('layouts.app')

@section('content')
        <!-- Add Invoice Section-->
        <section class="masthead page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">You're editing Invoice {{$invoice->id}}</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <!-- Add invoice form-->
                        <form action="{{ route('invoices.update', ['id' => $invoice->id] ) }}" method="POST" id="contactForm" class="needs-validation" novalidate>  
                        {{ csrf_field() }}
                        @method('PUT')
                            <!-- Invoice number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="number" name="number" type="text" placeholder="Invoice Number..." value="{{$invoice->number}}" required/>
                                <label for="number">Invoice Number</label>
                                <div class="invalid-feedback" data-sb-feedback="number:required">A name is required.</div>
                            </div>
                            <!-- Date input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="date" name="date" type="text" placeholder="" value="{{$invoice->date}}" required/>
                                <label for="date">Date (YYYY-MM-DD) </label>
                                <div class="invalid-feedback">Date is required.</div>
                            </div>
                            <!-- Total number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="total" name="total" type="text" placeholder="2137" value="{{$invoice->total}}" required/>
                                <label for="total">Total</label>
                                <div class="invalid-feedback">A phone number is required.</div>
                            </div>
                            <!-- Submit success message-->
                            <div class="d-none" id="submitSuccessMessage">
                            sukces
                            </div>
                            <!-- Submit error message-->
                            <div class="d-none" id="submitErrorMessage">
                                <div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Update Invoice</button>
                        </form>

                        <script>
                         (function() {
                            'use strict';
                            window.addEventListener('load', function() {
                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                var forms = document.getElementsByClassName('needs-validation');
                                // Loop over them and prevent submission
                                var validation = Array.prototype.filter.call(forms, function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                                });
                            }, false);
                            })();
                        </script>
                    </div>
                </div>
            </div>
        </section>
@endsection