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
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Invoice List</h2>
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
                            <th scope="col">Klient</th>
                            <th scope="col">Number</th>
                            <th scope="col">Date</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                        <tr>
                            <th scope="row">{{$invoice->id}}</th>
                            <td>{{$invoice->customer->name}}</td>
                            <td>{{$invoice->number}}</td>
                            <td>{{$invoice->date}}</td>
                            <td>{{$invoice->total}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('invoices.edit', ['id' => $invoice->id])}}"> Edit</a>
                                <form action="{{route('invoices.delete', ['id' => $invoice->id] ) }}" method="POST" id="contactForm" class="needs-validation" novalidate>  
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