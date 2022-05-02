@extends('layouts.app')

@section('content')
    <section class="masthead page-section portfolio" id="portfolio">
            <div class="container">
                 @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Holy guacamole!</strong> {{ session()->get('message'); }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">List of Customers</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Tax Identification Number</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                        <tr>
                            <th scope="row">{{$customer->id}}</th>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->address}}</td>
                            <td>{{$customer->tin}}</td>
                            <td>
                            <a class="btn btn-primary" href="{{ route('customers.edit', ['customer' => $customer->id]) }}"> Edit</a>
                                <form method="POST"    action="{{ route('customers.destroy', ['customer' => $customer->id]) }}"  id="contactForm" class="needs-validation" novalidate>  
                                    {{ csrf_field() }}
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit"> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
    </section>
@endsection