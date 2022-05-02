@extends('layouts.app')

@section('content')
        <!-- Add Invoice Section-->
        <section class="masthead page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">You're editing Customer {{$customer->id}}</h2>
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
                        <form action="{{ route('customers.update', ['customer' => $customer->id] ) }}" method="POST" id="contactForm" class="needs-validation" novalidate>  
                        {{ csrf_field() }}
                        @method('PUT')
                            <!-- Customer Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" name="name" type="text" placeholder="Name of Customer" value="{{$customer->name}}" required/>
                                <label for="number">Customer Name</label>
                                <div class="invalid-feedback" data-sb-feedback="number:required">A name is required.</div>
                            </div>
                            <!-- Customer Address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="address" name="address" type="text" placeholder="Customer's Address" value="{{$customer->address}}" required/>
                                <label for="date">Address</label>
                                <div class="invalid-feedback">Address is required.</div>
                            </div>
                            <!-- Customer TIN input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="tin" name="tin" type="text" placeholder="12345678" value="{{$customer->tin}}" required/>
                                <label for="total">Tax Identification Number</label>
                                <div class="invalid-feedback">TIN is required.</div>
                            </div>
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