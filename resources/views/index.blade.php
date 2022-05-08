@extends('layouts.app')

@section('content')
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="{{ asset('assets/img/invoice-svgrepo-com.svg')}}" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Create invoices for free!</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
            </div>
        </header>
        <!-- Portfolio Section
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                 Portfolio Section Heading
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Invoice List</h2>
                 Icon Divider
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
            </div>
        </section>-->
@endsection 